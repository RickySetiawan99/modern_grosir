@extends('layouts.master')

@section('title', 'Order Details')

@section('pageContent')
<div class="container-fluid">
    @include('partials.invoice', ['data' => $order])
</div>
@endsection
