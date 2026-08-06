@extends('layouts.master')

@section('title', config('app.name', 'ModernGrosir') . ' - Expiration Reports')

@section('css')
<link rel="stylesheet" href="{{ asset('build/libs/daterangepicker/daterangepicker.css') }}">
@endsection

@section('pageContent')
    <!-- Header Banner Card -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4 bg-primary-subtle position-relative">
        <div class="card-body p-4">
            <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                <div>
                    <div class="d-flex align-items-center gap-2 mb-1">
                        <span class="badge bg-primary text-white px-2.5 py-1 rounded-pill fs-2 fw-medium">FEFO Loss Prevention</span>
                        <span class="text-muted fs-2">&bull; Laporan Kadaluarsa & Retur Stok</span>
                    </div>
                    <h3 class="fw-bold mb-1 text-dark">Laporan Kadaluarsa & Disposisi Barang</h3>
                    <p class="text-muted mb-0 fs-3">Evaluasi tren pembuangan barang expired, kepatuhan rotasi FEFO, dan estimasi kerugian di gudang.</p>
                </div>
                <div class="d-flex align-items-center gap-2 flex-shrink-0">
                    <div class="input-group" style="min-width: 220px;">
                        <span class="input-group-text bg-white border-end-0 text-muted"><i class="ti ti-calendar"></i></span>
                        <input type="text" class="form-control bg-white border-start-0" id="report-daterange">
                    </div>
                    <button class="btn btn-primary" id="btn-refresh" title="Segarkan Data">
                        <i class="ti ti-refresh"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- KPI Summary Cards -->
    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span class="fs-2 text-muted fw-medium text-uppercase tracking-wider">Total Item Disposisi / Retur</span>
                        <div class="p-2.5 rounded-3 bg-danger-subtle text-danger d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            <i class="ti ti-trash fs-6"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold mb-1 text-dark" id="kpi-disposed-value">0 items</h3>
                    <div class="d-flex align-items-center gap-1 fs-2 text-danger">
                        <i class="ti ti-alert-circle fs-3"></i>
                        <span>Item Ditarik Pada Periode Ini</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span class="fs-2 text-muted fw-medium text-uppercase tracking-wider">Potensi Kerugian (30 Hari)</span>
                        <div class="p-2.5 rounded-3 bg-warning-subtle text-warning d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            <i class="ti ti-clock-hour-4 fs-6"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold mb-1 text-dark" id="kpi-potential-loss">Rp 0</h3>
                    <div class="d-flex align-items-center gap-1 fs-2 text-warning">
                        <i class="ti ti-alert-triangle fs-3"></i>
                        <span>Stok Kadaluarsa 30 Hari Kedepan</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span class="fs-2 text-muted fw-medium text-uppercase tracking-wider">Tingkat Kepatuhan FEFO</span>
                        <div class="p-2.5 rounded-3 bg-success-subtle text-success d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            <i class="ti ti-circle-check fs-6"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold mb-1 text-dark" id="kpi-fefo-rate">0%</h3>
                    <div class="d-flex align-items-center gap-1 fs-2 text-success">
                        <i class="ti ti-shield-check fs-3"></i>
                        <span>Rasio Pengeluaran Barang FEFO</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="row g-3 mb-4">
        <!-- Forecast Chart -->
        <div class="col-lg-6 d-flex align-items-stretch">
            <div class="card border-0 shadow-sm rounded-4 w-100 overflow-hidden">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-3 text-dark d-flex align-items-center gap-2">
                        <i class="ti ti-chart-dots fs-5 text-primary"></i> Proyeksi Expired (90 Hari Kedepan)
                    </h5>
                    <div id="forecast-chart" style="height: 300px;"></div>
                </div>
            </div>
        </div>
        <!-- Disposal Trends Chart -->
        <div class="col-lg-6 d-flex align-items-stretch">
            <div class="card border-0 shadow-sm rounded-4 w-100 overflow-hidden">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-3 text-dark d-flex align-items-center gap-2">
                        <i class="ti ti-chart-donut fs-5 text-primary"></i> Distribusi Alasan Disposisi
                    </h5>
                    <div id="disposal-chart" style="height: 300px;"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Disposals Table Card -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-body p-4">
            <h5 class="fw-bold mb-3 text-dark d-flex align-items-center gap-2">
                <i class="ti ti-history fs-5 text-primary"></i> Riwayat Disposisi Terakhir
            </h5>
            <div class="table-responsive">
                <table class="table table-hover align-middle text-nowrap mb-0">
                    <thead>
                        <tr class="text-uppercase fs-2 text-muted tracking-wider border-bottom">
                            <th class="ps-3 py-3">Tanggal</th>
                            <th class="py-3">No. Batch & Produk</th>
                            <th class="py-3">Alasan Retur / Pembuangan</th>
                            <th class="py-3">Jumlah (Qty)</th>
                            <th class="py-3">Petugas</th>
                            <th class="pe-3 py-3">Catatan</th>
                        </tr>
                    </thead>
                    <tbody id="disposal-table-body" class="border-top-0">
                        <tr><td colspan="6" class="text-center py-4 text-muted">Memuat data disposisi...</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="{{ asset('build/libs/daterangepicker/moment.min.js') }}"></script>
<script src="{{ asset('build/libs/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ URL::asset('build/libs/apexcharts/dist/apexcharts.min.js') }}"></script>

<script>
    $(document).ready(function() {
        // Init Date Range Picker
        const start = moment().startOf('month');
        const end = moment().endOf('month');

        function cb(start, end) {
            $('#report-daterange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            loadData(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'));
        }

        $('#report-daterange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
               'Hari Ini': [moment(), moment()],
               'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
               '7 Hari Terakhir': [moment().subtract(6, 'days'), moment()],
               '30 Hari Terakhir': [moment().subtract(29, 'days'), moment()],
               'Bulan Ini': [moment().startOf('month'), moment().endOf('month')],
               'Bulan Lalu': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);

        // Initial Load
        loadData(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'));

        $('#btn-refresh').click(function() {
            const drp = $('#report-daterange').data('daterangepicker');
            loadData(drp.startDate.format('YYYY-MM-DD'), drp.endDate.format('YYYY-MM-DD'));
        });

        // Charts
        let forecastChart, disposalChart;

        function initForecastChart(data) {
            const options = {
                series: [{
                    name: 'Value at Risk',
                    data: [data['30_days'].total_value, data['60_days'].total_value, data['90_days'].total_value]
                }],
                chart: {
                    type: 'bar',
                    height: 300,
                    toolbar: { show: false }
                },
                plotOptions: {
                    bar: {
                        borderRadius: 6,
                        horizontal: false,
                        columnWidth: '45%',
                        distributed: true
                    }
                },
                colors: ['#ffae1f', '#fa896b', '#13deb9'],
                dataLabels: { enabled: false },
                xaxis: {
                    categories: ['30 Hari Kedepan', '60 Hari Kedepan', '90 Hari Kedepan'],
                },
                yaxis: {
                    labels: {
                        formatter: function (value) {
                            return "Rp " + new Intl.NumberFormat('id-ID').format(value);
                        }
                    }
                },
                tooltip: {
                    y: {
                        formatter: function (value) {
                            return "Rp " + new Intl.NumberFormat('id-ID').format(value);
                        }
                    }
                }
            };

            if(forecastChart) forecastChart.destroy();
            forecastChart = new ApexCharts(document.querySelector("#forecast-chart"), options);
            forecastChart.render();
            
            // Update KPI
            $('#kpi-potential-loss').text("Rp " + new Intl.NumberFormat('id-ID').format(data['30_days'].total_value));
        }

        function initDisposalChart(summary) {
            const labels = [];
            const series = [];
            
            const reasons = Object.keys(summary);
            reasons.forEach(r => {
                labels.push(r.charAt(0).toUpperCase() + r.slice(1));
                series.push(summary[r].count);
            });

            const options = {
                series: series,
                labels: labels,
                chart: {
                    type: 'donut',
                    height: 300,
                },
                colors: ['#fa896b', '#ffae1f', '#5d87ff', '#13deb9'],
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: { width: 200 },
                        legend: { position: 'bottom' }
                    }
                }]
            };

            if(disposalChart) disposalChart.destroy();
            disposalChart = new ApexCharts(document.querySelector("#disposal-chart"), options);
            disposalChart.render();
        }

        function loadData(startDate, endDate) {
            // 1. Forecast Data
            $.get("{{ route('reports.expiration.forecast') }}", function(data) {
                initForecastChart(data);
            });

            // 2. Disposal Data
            $.get("{{ route('reports.expiration.disposal') }}", { start_date: startDate, end_date: endDate }, function(rep) {
                initDisposalChart(rep.summary);
                
                let html = '';
                let totalDisposedQty = 0;

                rep.disposals.forEach(d => {
                    totalDisposedQty += parseFloat(d.quantity);
                    
                    html += `
                        <tr>
                            <td class="ps-3 fs-3 text-secondary">${moment(d.created_at).format('DD MMM YYYY')}</td>
                            <td>
                                <div class="d-flex flex-column gap-1">
                                    <span class="badge bg-light text-dark font-monospace border border-secondary-subtle px-2.5 py-1 rounded-2 fs-2 fw-semibold w-fit-content">#${d.batch.batch_number}</span>
                                    <span class="fs-3 text-dark fw-medium">${d.batch.product ? d.batch.product.name : 'Unknown Product'}</span>
                                </div>
                            </td>
                            <td><span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill fs-2 px-2.5 py-1">${d.reason}</span></td>
                            <td class="fw-bold fs-3 text-dark">${d.quantity}</td>
                            <td class="fs-3 text-dark">${d.user ? d.user.name : '-'}</td>
                            <td class="pe-3 fs-2 text-muted">${d.notes || '-'}</td>
                        </tr>
                    `;
                });

                if(rep.disposals.length === 0) {
                    html = '<tr><td colspan="6" class="text-center py-4 text-muted fs-3">Tidak ada data disposisi pada periode ini</td></tr>';
                }

                $('#disposal-table-body').html(html);
                $('#kpi-disposed-value').text(new Intl.NumberFormat('id-ID').format(totalDisposedQty) + " items");
            });

            // 3. FEFO Compliance
            $.get("{{ route('reports.expiration.fefo') }}", { start_date: startDate, end_date: endDate }, function(data) {
                $('#kpi-fefo-rate').text(data.compliance_rate + "%");
            });
        }
    });
</script>
@endsection
