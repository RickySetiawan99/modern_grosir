@extends('layouts.master')

@section('title', 'ModernGrosir Dashboard')

@section('css')
  <link rel="stylesheet" href="{{ URL::asset('build/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}" />
@endsection

@section('pageContent')
    <!--  Owl carousel -->
    <div class="owl-carousel counter-carousel owl-theme">
        @role('admin')
        <div class="item">
            <div class="card border-0 zoom-in bg-primary-subtle shadow-none">
                <div class="card-body">
                    <div class="text-center">
                        <img src="{{ URL::asset('build/images/svgs/icon-user-male.svg') }}" width="50" height="50" class="mb-3" alt="modernize-img" />
                        <p class="fw-semibold fs-3 text-primary mb-1">Resellers</p>
                        <h5 class="fw-semibold text-primary mb-0">{{ number_format($totalResellers) }}</h5>
                    </div>
                </div>
            </div>
        </div>
        @endrole
        <div class="item">
            <div class="card border-0 zoom-in bg-warning-subtle shadow-none">
                <div class="card-body">
                    <div class="text-center">
                        <img src="{{ URL::asset('build/images/svgs/icon-briefcase.svg') }}" width="50" height="50" class="mb-3" alt="modernize-img" />
                        <p class="fw-semibold fs-3 text-warning mb-1">Products</p>
                        <h5 class="fw-semibold text-warning mb-0">{{ number_format($totalProducts) }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="card border-0 zoom-in bg-info-subtle shadow-none">
                <div class="card-body">
                    <div class="text-center">
                        <img src="{{ URL::asset('build/images/svgs/icon-connect.svg') }}" width="50" height="50" class="mb-3" alt="modernize-img" />
                        <p class="fw-semibold fs-3 text-info mb-1">Transactions</p>
                        <h5 class="fw-semibold text-info mb-0">{{ number_format($totalTransactions) }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="card border-0 zoom-in bg-danger-subtle shadow-none">
                <div class="card-body">
                    <div class="text-center">
                        <img src="{{ URL::asset('build/images/svgs/icon-favorites.svg') }}" width="50" height="50" class="mb-3" alt="modernize-img" />
                        <p class="fw-semibold fs-3 text-danger mb-1">Total Sales</p>
                        <h5 class="fw-semibold text-danger mb-0">Rp {{ number_format($totalSales / 1000000, 1) }}M</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Sales Overview Chart -->
        <div class="col-lg-8 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body">
                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                        <div class="mb-3 mb-sm-0">
                            <h4 class="card-title fw-semibold">Sales Overview</h4>
                            <p class="card-subtitle mb-0">Monthly Revenue in {{ date('Y') }}</p>
                        </div>
                    </div>
                    <div id="sales-chart"></div>
                </div>
            </div>
        </div>

        <!-- Top Products -->
        <div class="col-lg-4 d-flex align-items-stretch">
            <div class="card w-100 mt-n1">
                <div class="card-body">
                    <h4 class="card-title fw-semibold">Top Selling Products</h4>
                    <p class="card-subtitle mb-4">By quantity sold</p>
                    <div class="position-relative">
                        @forelse($topProducts as $tp)
                            <div class="d-flex align-items-center justify-content-between mb-7">
                                <div class="d-flex align-items-center">
                                    <div class="me-6">
                                        <img src="{{ $tp->product->image ? asset($tp->product->image) : asset('build/images/products/product-1.jpg') }}" alt="{{ $tp->product->name }}" class="rounded" width="45" height="45" style="object-fit: cover;">
                                    </div>
                                    <div>
                                        <h6 class="mb-1 fs-4 fw-semibold">{{ Str::limit($tp->product->name, 20) }}</h6>
                                        <p class="fs-3 mb-0">{{ $tp->product->category->name ?? 'Uncategorized' }}</p>
                                    </div>
                                </div>
                                <div class="bg-primary-subtle badge">
                                    <p class="fs-3 text-primary fw-semibold mb-0">{{ $tp->total_qty }} Sold</p>
                                </div>
                            </div>
                        @empty
                            <p class="text-center text-muted">No sales data yet</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Transactions Table -->
    <div class="row">
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body">
                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                        <div class="mb-3 mb-sm-0">
                            <h4 class="card-title fw-semibold">Recent Transactions</h4>
                            <p class="card-subtitle">Last 5 activities</p>
                        </div>
                        <a href="{{ route('transactions.index') }}" class="btn btn-outline-primary btn-sm">View All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-middle text-nowrap mb-0">
                            <thead>
                                <tr class="text-muted fw-semibold">
                                    <th scope="col" class="ps-0">Code</th>
                                    @unless(auth()->user()->hasRole('reseller'))
                                        <th scope="col">Reseller</th>
                                    @endunless
                                    <th scope="col">Amount</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody class="border-top">
                                @forelse($recentTransactions as $tx)
                                    <tr>
                                        <td class="ps-0">
                                            <h6 class="fw-semibold mb-1">{{ $tx->transaction_code }}</h6>
                                        </td>
                                        @unless(auth()->user()->hasRole('reseller'))
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="{{ ($tx->customer?->avatar) ? asset($tx->customer->avatar) : asset('build/images/profile/user-1.jpg') }}" class="rounded-circle me-2" width="30" height="30" style="object-fit: cover;">
                                                <p class="mb-0 fs-3">{{ $tx->customer->name ?? 'Guest' }}</p>
                                            </div>
                                        </td>
                                        @endunless
                                        <td>
                                            <p class="fs-3 text-dark mb-0 fw-semibold">Rp {{ number_format($tx->total_amount, 0, ',', '.') }}</p>
                                        </td>
                                        <td>
                                            @php
                                                $badgeClass = match($tx->status) {
                                                    'completed' => 'bg-success-subtle text-success',
                                                    'pending' => 'bg-warning-subtle text-warning',
                                                    'cancelled' => 'bg-danger-subtle text-danger',
                                                    default => 'bg-primary-subtle text-primary'
                                                };
                                            @endphp
                                            <span class="badge fw-semibold py-1 w-85 {{ $badgeClass }}">{{ ucfirst($tx->status) }}</span>
                                        </td>
                                        <td>
                                            <p class="fs-3 text-muted mb-0">{{ $tx->created_at->format('d M Y, H:i') }}</p>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-4">No transactions found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
  <script src="{{ URL::asset('build/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
  <script src="{{ URL::asset('build/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
  
  <script>
    $(function () {
        // Counter Carousel
        $(".counter-carousel").owlCarousel({
            loop: true,
            margin: 30,
            mouseDrag: true,
            autoplay: true,
            autoplayTimeout: 4000,
            autoplaySpeed: 2000,
            nav: false,
            dots: false,
            responsive: {
                0: { items: 2 },
                576: { items: 2 },
                768: { items: 3 },
                1200: { items: 4 },
            },
        });

        // Sales Chart
        var options = {
            series: [{
                name: "Monthly Sales",
                data: @json($chartData),
            }],
            chart: {
                fontFamily: "inherit",
                type: "area",
                height: 300,
                toolbar: { show: false },
                background: "transparent"
            },
            plotOptions: {},
            legend: { show: false },
            dataLabels: { enabled: false },
            fill: {
                type: "gradient",
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.4,
                    opacityTo: 0.05,
                    stops: [0, 100]
                }
            },
            stroke: {
                curve: "smooth",
                width: 2,
            },
            xaxis: {
                categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                axisBorder: { show: false },
                axisTicks: { show: false },
                labels: {
                    style: { colors: "#adb5bd" }
                }
            },
            yaxis: {
                labels: {
                    style: { colors: "#adb5bd" },
                    formatter: function(val) {
                        return "Rp " + (val / 1000).toFixed(0) + "k";
                    }
                }
            },
            tooltip: {
                theme: (document.documentElement.getAttribute('data-bs-theme') === 'dark' ? "dark" : "light"),
            },
            colors: ["var(--bs-primary)"],
            grid: {
                show: true,
                borderColor: "rgba(0,0,0,0.1)",
                strokeDashArray: 1,
                position: "back",
            },
        };

        var chart = new ApexCharts(document.querySelector("#sales-chart"), options);
        chart.render();
    });
  </script>
@endsection