@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Dashboard E-commerce')
    {{-- vendor css --}}
@section('vendor-styles')
 
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/extensions/swiper.min.css')}}">
@endsection

@section('page-styles')
   
@endsection

@section('login')
@if (!Auth::check())
<Auth></Auth>
@endif
@endsection
@section('sidebar2')
    <sidebar ruta ="{{ asset('') }}"></sidebar>
@endsection

@section('content')

<transition name="fade" mode="out-in">
    @if (Auth::check())
        <router-view></router-view> 
       
    @endif
           
</transition>
@endsection
  



@section('vendor-scripts')

<script src="{{asset('vendors/js/extensions/swiper.min.js')}}"></script>
@endsection

@section('page-scripts')

@endsection
