@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    {{-- Page Heading --}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <span class="text-muted small">Last updated: {{ now()->format('d M Y, h:i A') }}</span>
    </div>

    {{-- ── Row 1: Summary Cards ── --}}
    <div class="row">

        {{-- Monthly Revenue --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Revenue (This Month)
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                ${{ number_format($monthlyRevenue, 2) }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Total Revenue --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Revenue (All Time)
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                ${{ number_format($totalRevenue, 2) }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Pending Inquiries --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Pending Inquiries
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pendingInquiries }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Pending Withdrawals --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Pending Withdrawals
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pendingWithdrawals }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-hand-holding-usd fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- ── Row 2: Users & Flights Mini Cards ── --}}
    <div class="row">

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Clients</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalClients }}</div>
                            <div class="text-xs text-muted mt-1">+{{ $newClientsThisMonth }} this month</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Travelers</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalTravelers }}</div>
                            <div class="text-xs text-muted mt-1">+{{ $newTravelersThisMonth }} this month</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-plane fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Active Flights</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalFlights }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-luggage-cart fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Withdrawals Completed</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $withdrawStats['Completed'] ?? 0 }}
                            </div>
                            <div class="text-xs text-muted mt-1">{{ $withdrawStats['Pending'] ?? 0 }} still pending</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- ── Row 3: Area Chart + Pie Chart ── --}}
    <div class="row">

        {{-- Monthly Earnings Area Chart --}}
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Monthly Earnings (Last 12 Months)</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        {{-- Inquiry Status Pie Chart --}}
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Inquiry Status Breakdown</h6>
                </div>
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        @php
                            $pieColors = ['text-warning', 'text-success', 'text-danger', 'text-info', 'text-primary'];
                        @endphp
                        @foreach($pieLabels as $i => $label)
                            <span class="mr-2">
                                <i class="fas fa-circle {{ $pieColors[$i % count($pieColors)] }}"></i>
                                {{ $label }}
                            </span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- ── Row 4: Recent Inquiries + Top Routes ── --}}
    <div class="row">

        {{-- Recent Inquiries Table --}}
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Recent Inquiries</h6>
                    <a href="{{ route('inquiries.index') }}" class="btn btn-sm btn-primary">View All</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Client</th>
                                    <th>Traveler</th>
                                    <th>Flight (PNR)</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentInquiries as $inquiry)
                                <tr>
                                    <td>{{ $inquiry->id }}</td>
                                    <td>{{ $inquiry->client->full_name ?? '—' }}</td>
                                    <td>{{ $inquiry->traveler->full_name ?? '—' }}</td>
                                    <td>{{ $inquiry->travelFlight->pnr_no ?? '—' }}</td>
                                    <td>{{ $inquiry->entry_date ? \Carbon\Carbon::parse($inquiry->entry_date)->format('d M Y') : '—' }}</td>
                                    <td>
                                        @php
                                            $statusClass = match($inquiry->status) {
                                                'Completed' => 'success',
                                                'Pending'   => 'warning',
                                                'Cancelled' => 'danger',
                                                default     => 'secondary',
                                            };
                                        @endphp
                                        <span class="badge badge-{{ $statusClass }}">
                                            {{ $inquiry->status ?? 'N/A' }}
                                        </span>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">No inquiries found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- Top Routes --}}
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Top Flight Routes</h6>
                </div>
                <div class="card-body">
                    @forelse($topRoutes as $route)
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <span class="text-sm font-weight-bold">
                                <i class="fas fa-plane-departure text-primary mr-1"></i>
                                {{ $route->origin ?? 'N/A' }}
                                <i class="fas fa-arrow-right text-muted mx-1"></i>
                                {{ $route->destination ?? 'N/A' }}
                            </span>
                            <span class="text-xs text-muted">{{ $route->flights }} flights</span>
                        </div>
                        @php
                            $maxFlights = $topRoutes->max('flights');
                            $pct = $maxFlights > 0 ? round(($route->flights / $maxFlights) * 100) : 0;
                        @endphp
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-primary" role="progressbar"
                                style="width: {{ $pct }}%"
                                aria-valuenow="{{ $pct }}" aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                    </div>
                    @empty
                    <p class="text-center text-muted mt-3">No flight routes found.</p>
                    @endforelse
                </div>
            </div>
        </div>

    </div>

</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
<script>
// ── Area Chart: Monthly Earnings ────────────────────────────────────
const earningsLabels = @json($earningsLabels);
const earningsData   = @json($earningsData);

const ctxArea = document.getElementById('myAreaChart').getContext('2d');
new Chart(ctxArea, {
    type: 'line',
    data: {
        labels: earningsLabels,
        datasets: [{
            label: 'Earnings ($)',
            data: earningsData,
            backgroundColor: 'rgba(78, 115, 223, 0.10)',
            borderColor: 'rgba(78, 115, 223, 1)',
            pointBackgroundColor: 'rgba(78, 115, 223, 1)',
            pointBorderColor: '#fff',
            pointHoverRadius: 5,
            pointRadius: 4,
            fill: true,
            tension: 0.35,
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: { display: false },
            tooltip: {
                callbacks: {
                    label: ctx => ' $' + ctx.parsed.y.toLocaleString(undefined, {minimumFractionDigits: 2})
                }
            }
        },
        scales: {
            x: { grid: { display: false } },
            y: {
                beginAtZero: true,
                ticks: {
                    callback: val => '$' + val.toLocaleString()
                }
            }
        }
    }
});

// ── Pie Chart: Inquiry Statuses ─────────────────────────────────────
const pieLabels = @json($pieLabels);
const pieData   = @json($pieData);
const pieColors = [
    '#f6c23e', // Pending  → yellow
    '#1cc88a', // Completed → green
    '#e74a3b', // Cancelled → red
    '#36b9cc', // info
    '#4e73df', // primary
];

const ctxPie = document.getElementById('myPieChart').getContext('2d');
new Chart(ctxPie, {
    type: 'doughnut',
    data: {
        labels: pieLabels,
        datasets: [{
            data: pieData,
            backgroundColor: pieColors.slice(0, pieLabels.length),
            hoverBackgroundColor: pieColors.slice(0, pieLabels.length),
            hoverBorderColor: 'rgba(234, 236, 244, 1)',
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: { display: false },
            tooltip: {
                callbacks: {
                    label: ctx => ` ${ctx.label}: ${ctx.parsed}`
                }
            }
        },
        cutout: '70%',
    }
});
</script>
@endpush