<?php

namespace App;


final class Pricing
{
    /** Tax rate (e.g. 0.05 = 5%) */
    const TAX_RATE = 0.05;

    /** Fixed rate charged to client per kg */
    const RATE_PER_KG = 25.00;

    /** Platform fee charged to client at checkout */
    const CLIENT_PLATFORM_FEE = 3.99;

    /** Platform fee deducted from traveler payout */
    const TRAVELER_PLATFORM_FEE = 3.99;

    /** Traveler receives this % of cargo amount (after platform fee) */
    const TRAVELER_SHARE_PERCENT = 55;

    /** Platform keeps this % of cargo amount */
    const PLATFORM_SHARE_PERCENT = 45;

    /** Stripe currency */
    const CURRENCY = 'usd';

    public static function clientCheckout(float $kg): array
    {
        $cargo = round($kg * self::RATE_PER_KG, 2);
        $fee   = self::CLIENT_PLATFORM_FEE;
        $subtotal = round($cargo + $fee, 2);
        $tax     = round($subtotal * self::TAX_RATE, 2);
        return [
            'cargo_amount'   => $cargo,
            'platform_fee'   => $fee,
            'tax'   => $tax,
            'total'        => round($subtotal + $tax, 2),
        ];
    }

    public static function travelerPayout(float $cargoAmount): array
    {
        $travelerShare   = round($cargoAmount * self::TRAVELER_SHARE_PERCENT / 100, 2);
        $platformShare   = round($cargoAmount * self::PLATFORM_SHARE_PERCENT / 100, 2);
        // $travelerPayout  = round($travelerShare - self::TRAVELER_PLATFORM_FEE, 2);
        $travelerPayout  = round($travelerShare, 2);

        return [
            'cargo_amount'      => $cargoAmount,
            'traveler_share'    => $travelerShare,    // 55% of cargo
            'platform_share'    => $platformShare,    // 45% of cargo
            'platform_fee'      => self::TRAVELER_PLATFORM_FEE, // $3.99 deducted
            'traveler_payout'   => $travelerPayout,   // what traveler actually receives
        ];
    }
}
