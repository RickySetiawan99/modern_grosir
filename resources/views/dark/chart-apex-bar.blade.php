@extends('layouts.master')

@section('title', 'Modernize Bootstrap Admin')

@section('pageContent')

        @include('layouts.breadcrumb', ['title' => 'Chart Apex Bars', 'subtitle' => 'Home'])

          <!-- Start Basic Bar Chart -->
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Basic Bar Chart</h4>
              <div id="chart-bar-basic"></div>
            </div>
          </div>
          <!-- End Basic Bar Chart -->
          <!-- Start Stacked Bar Chart -->
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Stacked Bar Chart</h4>
              <div id="chart-bar-stacked"></div>
            </div>
          </div>
          <!-- End Stacked Bar Chart -->
          <!-- Start Reversed Bar Chart -->
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Reversed Bar Chart</h4>
              <div id="chart-bar-reversed"></div>
            </div>
          </div>
          <!-- End Reversed Bar Chart -->
          <!-- Start Patterned Bar Chart -->
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Patterned Bar Chart</h4>
              <div id="chart-bar-patterned"></div>
            </div>
          </div>
          <!-- End Patterned Bar Chart -->
        
@endsection

@section('scripts')
  <script src="{{ URL::asset('build/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
  <script src="{{ URL::asset('build/js/apex-chart/apex.bar.init.js') }}"></script>
@endsection