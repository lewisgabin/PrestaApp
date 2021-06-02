@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Dashboard E-commerce')
    {{-- vendor css --}}
@section('vendor-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/charts/apexcharts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/extensions/swiper.min.css')}}">
@endsection

@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection

@section('sidebar2')
    <sidebar ruta ="{{ asset('') }}"></sidebar>
@endsection

@section('content')

<transition :name="fade" mode="out-in">
            <router-view></router-view>
</transition>
@endsection
  



@section('vendor-scripts')
<script src="{{asset('vendors/js/charts/apexcharts.min.js')}}"></script>
<script src="{{asset('vendors/js/extensions/swiper.min.js')}}"></script>
@endsection

@section('page-scripts')
<script src="{{asset('js/scripts/pages/dashboard-ecommerce.js')}}"></script>
@endsection
