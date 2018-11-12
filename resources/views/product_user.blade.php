@extends('main')
@section('page')
Sản phẩm
@endsection

<!-- Header -->
@section('header')
@include('modules/header_all')
@endsection
<!-- Cart -->
@section('cart')
@include('modules/cart')
@endsection	
<!-- Product -->
@section('product_product')
@include('modules/product_user')
@endsection
<!-- Footer -->
@section('footer')
@include('modules/footer')
@endsection
<!-- Back to top -->
@section('back')
@include('modules/backtotop')
@endsection
<!-- Modal1 -->
@section('modal')
@include('modules/modal')
@endsection