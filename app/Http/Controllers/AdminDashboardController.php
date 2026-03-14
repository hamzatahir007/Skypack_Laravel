<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Traveler;
use App\Models\TravelFlight;
use App\Models\InquiryMaster;
use App\Models\WithdrawRequest;
use App\Models\Inventory;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // ── Summary Cards ──────────────────────────────────────────────
        $totalClients   = Client::whereNull('deleted_at')->count();
        $totalTravelers = Traveler::whereNull('deleted_at')->count();
        $totalFlights   = TravelFlight::whereNull('deleted_at')->count();

        $pendingInquiries = InquiryMaster::whereNull('deleted_at')
            ->where('status', 'Pending')
            ->count();

        $pendingWithdrawals = WithdrawRequest::whereNull('deleted_at')
            ->where('status', 'Pending')
            ->count();

        // Total revenue from completed inquiries (sum of inquiry detail amounts)
        $totalRevenue = DB::table('inquiry_detail')
            ->join('inquiry_master', 'inquiry_detail.inquiry_master_id', '=', 'inquiry_master.id')
            ->whereNull('inquiry_master.deleted_at')
            ->where('inquiry_master.status', 'Completed')
            ->sum('inquiry_detail.amount');

        $monthlyRevenue = DB::table('inquiry_detail')
            ->join('inquiry_master', 'inquiry_detail.inquiry_master_id', '=', 'inquiry_master.id')
            ->whereNull('inquiry_master.deleted_at')
            ->where('inquiry_master.status', 'Completed')
            ->whereMonth('inquiry_master.entry_date', Carbon::now()->month)
            ->whereYear('inquiry_master.entry_date', Carbon::now()->year)
            ->sum('inquiry_detail.amount');

        // ── Monthly Earnings Chart (last 12 months) ────────────────────
        $monthlyEarnings = DB::table('inquiry_detail')
            ->join('inquiry_master', 'inquiry_detail.inquiry_master_id', '=', 'inquiry_master.id')
            ->whereNull('inquiry_master.deleted_at')
            ->where('inquiry_master.status', 'Completed')
            ->where('inquiry_master.entry_date', '>=', Carbon::now()->subMonths(11)->startOfMonth())
            ->select(
                DB::raw("DATE_FORMAT(inquiry_master.entry_date, '%b %Y') as month_label"),
                DB::raw("DATE_FORMAT(inquiry_master.entry_date, '%Y-%m') as month_key"),
                DB::raw('SUM(inquiry_detail.amount) as total')
            )
            ->groupBy('month_key', 'month_label')
            ->orderBy('month_key')
            ->get();

        // Fill all 12 months (even empty ones = 0)
        $earningsLabels = [];
        $earningsData   = [];
        for ($i = 11; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $key   = $month->format('Y-m');
            $label = $month->format('M Y');
            $earningsLabels[] = $label;
            $found = $monthlyEarnings->firstWhere('month_key', $key);
            $earningsData[] = $found ? (float)$found->total : 0;
        }

        // ── Inquiry Status Breakdown (Pie chart) ───────────────────────
        $inquiryStatusData = InquiryMaster::whereNull('deleted_at')
            ->select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->pluck('total', 'status');

        $pieLabels = $inquiryStatusData->keys()->toArray();
        $pieData   = $inquiryStatusData->values()->toArray();

        // ── Top Routes (origin → destination) ─────────────────────────
        $topRoutes = TravelFlight::whereNull('deleted_at')
            ->select('origin', 'destination', DB::raw('count(*) as flights'))
            ->groupBy('origin', 'destination')
            ->orderByDesc('flights')
            ->limit(5)
            ->get();

        // ── Recent Inquiries ───────────────────────────────────────────
        $recentInquiries = InquiryMaster::with(['client', 'traveler', 'travelFlight'])
            ->whereNull('deleted_at')
            ->latest()
            ->limit(8)
            ->get();

        // ── Withdraw Requests Summary ──────────────────────────────────
        $withdrawStats = WithdrawRequest::whereNull('deleted_at')
            ->select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->pluck('total', 'status');

        // ── New registrations this month ───────────────────────────────
        $newClientsThisMonth   = Client::whereNull('deleted_at')
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();

        $newTravelersThisMonth = Traveler::whereNull('deleted_at')
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();

        return view('dashboard', compact(
            'totalClients',
            'totalTravelers',
            'totalFlights',
            'pendingInquiries',
            'pendingWithdrawals',
            'totalRevenue',
            'monthlyRevenue',
            'earningsLabels',
            'earningsData',
            'pieLabels',
            'pieData',
            'topRoutes',
            'recentInquiries',
            'withdrawStats',
            'newClientsThisMonth',
            'newTravelersThisMonth'
        ));
    }
}