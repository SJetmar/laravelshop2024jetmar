@extends('layouts.base')
@push('styles')
<link id="color-link" rel="stylesheet" type="text/css" href="assets/css/demo2.css">
<style>
    nav svg {
        height: 20px;
    }

    .product-box .product-details h5 {

        width: 100%;

    }

    h2 {
      text-transform: none;
      text-align: center;
      margin-top: 4rem;
    }
</style>
@endpush
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Děkujeme za objednávku, hned ji začneme zpracovávat</h2>
        </div>
    </div>
@endsection