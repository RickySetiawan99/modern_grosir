@extends('layouts.master')

@section('title', 'Modernize Bootstrap Admin')

@section('pageContent')

        @include('layouts.breadcrumb', ['title' => 'Chart Apex Area', 'subtitle' => 'Home'])

          <!-- start Basic Area Chart -->
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Basic Area Chart</h4>
              <div class="mx-n2" id="chart-area-basic"></div>
            </div>
          </div>
          <!-- end Basic Area Chart -->
          <!-- start Spline Area Chart -->
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Spline Area Chart</h4>
              <div class="mx-n3" id="chart-area-spline"></div>
            </div>
          </div>
          <!-- end Spline Area Chart -->
          <!-- start DateTime X-axis Area Chart -->
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">DateTime X-axis Area Chart</h4>
              <div class="mx-n3" id="chart-area-datetime"></div>
            </div>
          </div>
          <!-- end DateTime X-axis Area Chart -->
@endsection

@section('scripts')
  <script src="{{ URL::asset('build/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
  <script src="{{ URL::asset('build/js/apex-chart/apex.area.init.js') }}"></script>
@endsection