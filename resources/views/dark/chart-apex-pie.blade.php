@extends('layouts.master')

@section('title', 'Modernize Bootstrap Admin')

@section('pageContent')

        @include('layouts.breadcrumb', ['title' => 'Chart Apex Pie', 'subtitle' => 'Home'])
          <!-- Start Simple Pie Chart -->
          <div class="row align-items-stretch">
            <div class="col-lg-6">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Simple Pie Chart</h4>
                  <div id="chart-pie-simple"></div>
                </div>
              </div>
            </div>
            <!-- Start Dinut Pie Chart -->
            <div class="col-lg-6">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Donut Pie Chart</h4>
                  <div id="chart-pie-donut"></div>
                </div>
              </div>
            </div>
            <!-- End Dinut Pie Chart -->
            <!-- Start Monochrome Pie Chart -->
            <div class="col-lg-6">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Monochrome Pie Chart</h4>
                  <div id="chart-pie-monochrome"></div>
                </div>
              </div>
            </div>
            <!-- End Monochrome Pie Chart -->
          </div>
          <!-- End Simple Pie Chart -->
@endsection

@section('scripts')
  <script src="{{ URL::asset('build/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
  <script src="{{ URL::asset('build/js/apex-chart/apex.pie.init.js') }}"></script>
@endsection