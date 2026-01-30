@extends('layouts.master')

@section('title', 'Modernize Bootstrap Admin')

@section('pageContent')

        @include('layouts.breadcrumb', ['title' => 'Chart Apex Line', 'subtitle' => 'Home'])
          <!-- Start Basic Line Chart -->
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Basic Line Chart</h4>
              <div id="chart-line-basic" class="mx-n3"></div>
            </div>
          </div>
          <!-- End Basic Line Chart -->
          <!-- Start Line Chart With Data Label -->
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Data Label Line Chart</h4>
              <div id="chart-line-with-data-label" class="mx-n3"></div>
            </div>
          </div>
          <!-- End Line Chart With Data Label -->
          <!-- Start Zoomable Line Chart -->
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Zoomable Line Chart</h4>
              <div id="chart-line-zoomable" class="mx-n3"></div>
            </div>
          </div>
          <!-- End Zoomable Line Chart -->
          <!-- Start Gradient Line Chart -->
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Gradient Line Chart</h4>
              <div id="chart-line-gradient" class="mx-n3"></div>
            </div>
          </div>
          <!-- End Gradient Line Chart -->
          <!-- Start Real Time Line Chart -->
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Real Time Line Chart</h4>
              <div id="chart-line-real-time" class="mx-n3"></div>
            </div>
          </div>
          <!-- End Real Time Line Chart -->

@endsection

@section('scripts')
  <script src="{{ URL::asset('build/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
  <script src="{{ URL::asset('build/js/apex-chart/apex.line.init.js') }}"></script>
@endsection