@extends('layouts.master')

@section('title', 'Modernize Bootstrap Admin')

@section('pageContent')

        @include('layouts.breadcrumb', ['title' => 'Chart Apex Radar', 'subtitle' => 'Home'])
          <!-- Start Basic Radar Chart -->
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Basic Radar Chart</h4>
              <div id="chart-radar-basic"></div>
            </div>
          </div>
          <!-- End Basic Radar Chart -->
          <!-- Start Multiple Series Radar Chart -->
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Multiple Series Radar Chart</h4>
              <div id="chart-radar-multiple-series"></div>
            </div>
          </div>
          <!-- End Multiple Series Radar Chart -->
          <!-- Start Polygon-fill Radar Chart -->
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Polygon Fill Radar Chart</h4>
              <div id="chart-radar-polygon-fill"></div>
            </div>
          </div>
          <!-- End Polygon-fill Radar Chart -->
@endsection

@section('scripts')
  <script src="{{ URL::asset('build/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
  <script src="{{ URL::asset('build/js/apex-chart/apex.radar.init.js') }}"></script>
@endsection