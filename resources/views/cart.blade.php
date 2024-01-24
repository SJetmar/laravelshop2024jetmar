@extends('layouts.base')
@push('styles')
<link id="color-link" rel="stylesheet" type="text/css" href="assets/css/demo2.css">
<style>
    h2 {
      text-transform: none;
    }
</style>
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
                    <h3>Košík</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('app.index')}}">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Košík</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- Cart Section Start -->
    <section class="cart-section section-b-space">
        <div class="container">
            @if($cartItems->Count() > 0)
            <div class="row">
                <div class="col-md-12 text-center">
                    <table class="table cart-table">
                        <thead>
                            <tr class="table-head">
                                <th scope="col">Obrázek</th>
                                <th scope="col">Jméno produktu</th>
                                <th scope="col">Cena</th>
                                <th scope="col">Množství</th>
                                <th scope="col">Celkem</th>
                                <th scope="col">Akce</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cartItems as $item)
                            <tr>
                                <td>
                                    <a href="{{route('shop.product.details',['slug'=>$item->model->slug])}}">
                                        <img src="{{asset('assets/images/fashion/product/front')}}/{{$item->model->image}}" class="blur-up lazyloaded"
                                            alt="{{$item->model->name}}">
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('shop.product.details',['slug'=>$item->model->slug])}}">{{$item->model->name}}</a>
                                    <div class="mobile-cart-content row">
                                        <div class="col">
                                            <div class="qty-box">
                                                <div class="input-group">
                                                    <input type="text" name="quantity" class="form-control input-number"
                                                        value="1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <h2>{{$item->price}} Kč</h2>
                                        </div>
                                        <div class="col">
                                            <h2 class="td-color">
                                                <a href="javascript:void(0)">
                                                    <i class="fas fa-times"></i>
                                                </a>
                                            </h2>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h2>{{$item->price}} Kč</h2>
                                </td>
                                <td>
                                    <div class="qty-box">
                                        <div class="input-group">
                                            <input type="number" name="quantity" data-rowid="{{$item->rowId}}" onchange="updateQuantity(this)" class="form-control input-number" value="{{$item->qty}}">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h2 class="td-color">{{$item->subtotal()}} Kč</h2>
                                </td>
                                <td>
                                    <a href="javascript:void(0)" onclick="removeItemFromCart('{{$item->rowId}}')">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-12 mt-md-5 mt-4">
                    <div class="row">
                        <div class="col-sm-7 col-5 order-1">
                            <div class="left-side-button text-end d-flex d-block justify-content-end">
                                <a href="javascript:void(0)" onclick="clearCart()"
                                    class="text-decoration-underline theme-color d-block text-capitalize">Vymazat všechny produkty</a>
                            </div>
                        </div>
                        <div class="col-sm-5 col-7">
                            <div class="left-side-button float-start">
                                <a href="{{route('shop.index')}}" class="btn btn-solid-default btn fw-bold mb-0 ms-0">
                                    <i class="fas fa-arrow-left"></i> Pokračovat v nákupu</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="cart-checkout-section">
                    <div class="row g-4">
                        <div class="col-lg-4 col-sm-6">
                            
                        </div>

                        <div class="col-lg-4 col-sm-6 ">
                        
                        </div>

                        <div class="col-lg-4">
                            <div class="cart-box">
                                <div class="cart-box-details">
                                    <div class="total-details">
                                        <div class="top-details">
                                            <h3>Celková cena košíku</h3>
                                            <h6>Celkem bez DPH<span>{{Cart::instance('cart')->subtotal()}} Kč</span></h6>
                                            <h6>Daň <span>{{Cart::instance('cart')->tax()}} Kč</span></h6>

                                            <h6>Celkem s DPH <span>{{Cart::instance('cart')->total()}} Kč</span></h6>
                                        </div>
                                        <div class="bottom-details">
                                            <a href="checkout">Pokračovat na pokladnu</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
                <div class="row">
                
                    <div class="col-md-12 text-center">
                        <h2>Tvůj nákupní košík je prázdný!</h2>
                        <h5 class="mt-3">Přidejte si zboží.</h5>
                        <a href="{{route('shop.index')}}" class="btn btn-warning mt-5"> Nakupuj ihned</a>
                    </div>
                </div>
            @endif
        </div>
    </section>
    <form id="updateCartQty" action="{{route('cart.update')}}" method="post">
    @csrf
    @method('put')
    <input type="hidden" id="rowId" name="rowId" />
    <input type="hidden" id="quantity" name="quantity" />
</form>
<form id="deleteFromCart" action="{{route('cart.remove')}}" method="post">
    @csrf
    @method('delete')
    <input type="hidden" id="rowId_D" name="rowId" />

</form>
<form id="clearCart" action="{{route('cart.clear')}}" method="post">
    @csrf
    @method('delete')
</form>

@endsection
@push('scripts')
<script>
    function updateQuantity(qty)
    {
        $('#rowId').val($(qty).data('rowid'));
        $('#quantity').val($(qty).val());
        $('#updateCartQty').submit();
    }
    function removeItemFromCart(rowId)
    {
        console.log(rowId);
        $('#rowId_D').val(rowId);  
        $('#deleteFromCart').submit();
    }

    function clearCart()
    {
        $('#clearCart').submit();  
        
    }
</script>
@endpush