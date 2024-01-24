@extends('layouts.base')
@push('styles')
<link id="color-link" rel="stylesheet" type="text/css" href="{{asset('assets/css/demo2.css')}}">
@endpush
@section('content')
<section class="breadcrumb-section section-b-space" style="padding-top:20px;padding-bottom:20px;">
        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
        <div class="container">
            <div class="row">
                <div class="col-12">
               
                    <h3>{{$product->name}}</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('app.index')}}">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section> 
    <!-- Shop Section start -->

    <section>
        <div class="container">
            <div class="row gx-4 gy-5">
                <div class="col-lg-12 col-12">
                    <div class="details-items">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <div class="details-image-vertical black-slide rounded">
                                            <div>
                                                <img src="{{asset('assets/images/fashion/product/front')}}/{{$product->image}}"class="img-fluid blur-up lazyload" alt="{{$product->name}}">
                                            </div>
                                            @if($product->images)
                                            @php
                                                $images = explode(',',$product->images);
                                            @endphp
                                                @foreach($images as $image)
                                                    <div>
                                                    <img src="{{asset('assets/images/fashion/product/front')}}/{{$image}}" class="img-fluid blur-up lazyload" alt="">
                                                </div>
                                                @endforeach
                                            
                                            @endif
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-10">
                                        <div class="details-image-1 ratio_asos">
                                            <div>
                                                <img src="{{asset('assets/images/fashion/product/front')}}/{{$product->image}}"class="img-fluid w-100 image_zoom_cls-0 blur-up lazyload" alt="{{$product->name}}">
                                            </div>

                                            @if($product->images)
                                            @php
                                                $images = explode(',',$product->images);
                                            @endphp
                                                @foreach($images as $image)
                                                <div>
                                                <img src="{{asset('assets/images/fashion/product/front')}}/{{$image}}" class="img-fluid w-100 image_zoom_cls-1 blur-up lazyload" alt="">
                                                </div>
                                                @endforeach
                                            
                                            @endif
                                    
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="cloth-details-size">

                                    <div class="details-image-concept">
                                        <h2>{{$product->name}}</h2>
                                    </div>

                                    <h3 class="price-detail">
                                        @if($product->sale_price)
                                            ${{$product->sale_price}}
                                         <del>${{$product->regular_price}}</del><span>
                                            {{ round((($product->regular_price - $product->sale_price)/$product->regular_price)*100)}}
                                            % off</span>
                                         @else
                                         {{$product->regular_price}}
                                         @endif
                                         Kč
                                </h3>

                

                                    <div id="selectSize" class="addeffect-section product-description border-product">

                                        <h6 class="product-title product-title-2 d-block">Množství</h6>

                                        <div class="qty-box">
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <button type="button" id="minus" class="btn quantity-left-minus"
                                                        onclick="updateQuantity(this)" data-type="minus" data-field="">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                </span>
                                                <input type="text" name="quantity" id="quantity"
                                                    class="form-control input-number" value="1">
                                                <span class="input-group-prepend">
                                                    <button type="button" id="plus" class="btn quantity-right-plus"
                                                        onclick="updateQuantity(this)" data-type="plus" data-field="">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product-buttons">
                                        <a href="javascript:void(0)"  onclick="event.preventDefault();document.getElementById('addtocart').submit();"                                           
                                            id="cartEffect" class="btn btn-solid hover-solid btn-animation">
                                            <i class="fa fa-shopping-cart"></i>
                                            <span>Přidat do košíku</span>
                                            <form id="addtocart" method="post" action="{{route('cart.store')}}">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$product->id}}">
                                                <input type="hidden" name="quantity" id="qty">
                                            </form>
                                        </a>



                                    </div>

                                    <ul class="product-count shipping-order">
                                        <li>
                                            <img src="../assets/images/gif/truck.png" class="img-fluid blur-up lazyload"alt="image">
                                            <span class="lang">Doprava zdarma</span>
                                        </li>
                                    </ul>

                                    <div class="mt-2 mt-md-3 border-product">
                                        <h6 class="product-title hurry-title d-block">
                                            @if($product->stock_status=='instock')
                                            Skladem
                                            @else
                                            Není skladem
                                            @endif
                                        </h6>
                                    </div>

                                    <div class="border-product">
                                        <h6 class="product-title d-block">Sdílejte</h6>
                                        <div class="product-icon">
                                            <ul class="product-social">
                                                <li>
                                                    <a href="https://www.facebook.com/">
                                                        <i class="fab fa-facebook-f"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://www.google.com/">
                                                        <i class="fab fa-google-plus-g"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://twitter.com/">
                                                        <i class="fab fa-twitter"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://www.instagram.com/">
                                                        <i class="fab fa-instagram"></i>
                                                    </a>
                                                </li>
                                                <li class="pe-0">
                                                    <a href="https://www.google.com/">
                                                        <i class="fas fa-rss"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="cloth-review">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                    data-bs-target="#desc" type="button">Popis produktu</button>
                            </div>
                        </nav>

                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="desc">
                                <div class="shipping-chart">
                                  {{$product->description}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section end -->
    <!-- product section end -->
@endsection
@push('scripts')
<script>
    $(function() {
        $("#qty").val(1);
    })

    function updateQuantity(qty)
    {
        const newVal = parseInt($("#quantity").val()) + ($(qty)[0].id === "plus" ? 1 : -1);
        $('#rowId').val($(qty).data('rowid'));
        $('#qty').val(newVal);
        // $('#updateCartQty').submit();
    }
</script>
@endpush