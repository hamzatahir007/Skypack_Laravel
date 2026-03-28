<?php

namespace App\Services;

use App\Mail\NotifyMail;
use App\Models\InquiryMaster;
use Illuminate\Support\Facades\Mail;

/**
 * Central notification service for LuggageLink.
 * Call these static methods from any controller.
 */
class NotificationService
{
    // ─────────────────────────────────────────────────────────────
    //  1. CLIENT created an inquiry  →  notify Traveler
    // ─────────────────────────────────────────────────────────────
    public static function inquiryCreated(InquiryMaster $inquiry): void
    {
        $traveler = $inquiry->traveler;
        $client   = $inquiry->client;

        if (!$traveler?->email) return;

        Mail::to($traveler->email)->send(new NotifyMail(
            heading: 'New Inquiry Received',
            body: "Hi {$traveler->full_name},\n\nYou have received a new inquiry from {$client->full_name}.\n\nInquiry ID: #{$inquiry->id}\nStatus: {$inquiry->status}\n\nPlease login to review and accept or reject this inquiry.",
            actionUrl: url('/traveler/dashboard'),
            actionLabel: 'View Inquiry',
            color: 'primary'
        ));
    }

    // ─────────────────────────────────────────────────────────────
    //  2. TRAVELER accepted inquiry  →  notify Client
    // ─────────────────────────────────────────────────────────────
    public static function inquiryAccepted(InquiryMaster $inquiry): void
    {
        $client   = $inquiry->client;
        $traveler = $inquiry->traveler;

        if (!$client?->email) return;

        Mail::to($client->email)->send(new NotifyMail(
            heading: 'Your Inquiry Has Been Accepted! 🎉',
            body: "Hi {$client->full_name},\n\nGreat news! Your inquiry #{$inquiry->id} has been accepted by {$traveler->full_name}.\n\nYou can now proceed to payment to confirm your delivery.",
            actionUrl: url('/client/inquiries'),
            actionLabel: 'Proceed to Payment',
            color: 'success'
        ));
    }

    // ─────────────────────────────────────────────────────────────
    //  3. TRAVELER rejected inquiry  →  notify Client
    // ─────────────────────────────────────────────────────────────
    public static function inquiryRejected(InquiryMaster $inquiry): void
    {
        $client   = $inquiry->client;
        $traveler = $inquiry->traveler;

        if (!$client?->email) return;

        Mail::to($client->email)->send(new NotifyMail(
            heading: 'Inquiry Update',
            body: "Hi {$client->full_name},\n\nUnfortunately your inquiry #{$inquiry->id} has been rejected by {$traveler->full_name}.\n\nYou can browse other available flights and submit a new inquiry.",
            actionUrl: url('/browsespace'),
            actionLabel: 'Browse Flights',
            color: 'danger'
        ));
    }

    // ─────────────────────────────────────────────────────────────
    //  4. CLIENT paid (Deposit)  →  notify Traveler
    // ─────────────────────────────────────────────────────────────
    public static function paymentReceived(InquiryMaster $inquiry): void
    {
        $traveler = $inquiry->traveler;
        $client   = $inquiry->client;

        if (!$traveler?->email) return;

        Mail::to($traveler->email)->send(new NotifyMail(
            heading: 'Payment Received for Inquiry #' . $inquiry->id,
            body: "Hi {$traveler->full_name},\n\nThe client {$client->full_name} has completed payment for inquiry #{$inquiry->id}.\n\nPlease verify code with the client upon delivery.",
            actionUrl: url('/traveler/dashboard'),
            actionLabel: 'View Dashboard',
            color: 'success'
        ));
    }

    // ─────────────────────────────────────────────────────────────
    //  5. TRAVELER marked delivered (code verified)  →  notify Client
    // ─────────────────────────────────────────────────────────────
    public static function packageDelivered(InquiryMaster $inquiry): void
    {
        $client   = $inquiry->client;
        $traveler = $inquiry->traveler;

        if (!$client?->email) return;

        Mail::to($client->email)->send(new NotifyMail(
            heading: 'Your Package Has Been Delivered! ✅',
            body: "Hi {$client->full_name},\n\nYour package for inquiry #{$inquiry->id} has been successfully delivered by {$traveler->full_name}.\n\nThank you for using LuggageLink!",
            actionUrl: url('/client/inquiries'),
            actionLabel: 'View My Inquiries',
            color: 'success'
        ));
    }

    // ─────────────────────────────────────────────────────────────
    //  6. TRAVELER submitted withdrawal  →  notify Admin (via config email)
    // ─────────────────────────────────────────────────────────────
    public static function withdrawalRequested(InquiryMaster $inquiry, float $amount): void
    {
        // $adminEmail = config('mail.admin_email', config('mail.from.address'));
        $traveler   = $inquiry->traveler;
        $admin = \App\Models\User::first(); // or ->where('name', 'Admin')->first()


        if (!$admin?->email) return;

        Mail::to($admin->email)->send(new NotifyMail(
            heading: 'New Withdrawal Request',
            body: "A traveler has submitted a withdrawal request.\n\nTraveler: {$traveler->full_name}\nEmail: {$traveler->email}\nInquiry ID: #{$inquiry->id}\nAmount: \${$amount} USD\n\nPlease login to the admin panel to review and process this request.",
            actionUrl: url('/admin/withdrawRequest'),
            actionLabel: 'Review in Admin Panel',
            color: 'warning'
        ));
    }

    // ─────────────────────────────────────────────────────────────
    //  7. ADMIN confirmed withdrawal  →  notify Traveler
    // ─────────────────────────────────────────────────────────────
    public static function withdrawalCompleted(InquiryMaster $inquiry, float $amount): void
    {
        $traveler = $inquiry->traveler;

        if (!$traveler?->email) return;

        Mail::to($traveler->email)->send(new NotifyMail(
            heading: 'Withdrawal Processed! 💰',
            body: "Hi {$traveler->full_name},\n\nYour withdrawal request for inquiry #{$inquiry->id} has been approved and processed by the admin.\n\nAmount: \${$amount} USD\n\nThe funds will be transferred to your registered bank account shortly.",
            actionUrl: url('/traveler/dashboard'),
            actionLabel: 'View Dashboard',
            color: 'success'
        ));
    }


    // ─────────────────────────────────────────────────────────────
    //  8. MESSAGE sent  →  notify the receiver
    // ─────────────────────────────────────────────────────────────
    public static function messageSent(
        string $receiverEmail,
        string $receiverName,
        string $senderName,
        int    $inquiryId,
        string $receiverType,
        string $messageTitle,      // ← new
        string $messageBody        // ← new
    ): void {
        if (!$receiverEmail) return;

        $threadBase = $receiverType === 'traveler'
            ? url('/traveler/messages')
            : url('/client/messages');

        Mail::to($receiverEmail)->send(new \App\Mail\NotifyMail(
            heading: 'New Message from ' . $senderName,
            body: "Hi {$receiverName},\n\nYou have a new message from {$senderName} regarding Inquiry #{$inquiryId}.\n\n"
                . "────────────────────\n"
                . "Subject: {$messageTitle}\n\n"
                . "{$messageBody}\n"
                . "────────────────────\n\n"
                . "Login to reply to this message.",
            actionUrl: $threadBase,
            actionLabel: 'Reply Now',
            color: 'primary'
        ));
    }
}
