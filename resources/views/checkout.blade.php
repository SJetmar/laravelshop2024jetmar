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
</style>
@endpush
@section('content')
<div class="container">
  <div class="py-5 text-center">
    
    <h2>Souhrn objednávky</h2>
    <p class="lead">Prosím vyplňte všechny potřebné informace pro doručení a platbu.</p>
  </div>

  <div class="row">
    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Košík</span>
        <span class="badge badge-secondary badge-pill">3</span>
      </h4>
      <ul class="list-group mb-3">
    @foreach ($cartItems as $item)
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">{{$item->model->name}}</h6>
            <small class="text-muted">{{$item->qty}}x</small>
          </div>
          <span class="text-muted">{{$item->subtotal()}}Kč</span>
        </li>
    @endforeach
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Celková cena košíku</h6>
          </div>
          <div>
          <h6>Celkem bez DPH <span>{{Cart::instance('cart')->subtotal()}}Kč</span></h6>
          <h6> + DPH <span>{{Cart::instance('cart')->tax()}}Kč</span></h6>
          <h6>--------------------------------------</h6>
          <h5>Celkem s DPH <span>{{Cart::instance('cart')->total()}}Kč</span></h5>
          </div>
          
        </li>
    
    
      </ul>
    </div>
    <div class="col-md-8 order-md-1">
      <h2 class="mb-3">Doručovací adresa</h2>
      <form class="needs-validation" method="POST" action="checkout/ordersave" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">Jméno</label>
            <input type="text" class="form-control" name="firstName" id="firstName" placeholder="Jan" value="" required>
            <div class="invalid-feedback">
            Vaše příjmení je požadováno.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Příjmení</label>
            <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Dolež" value="" required>
            <div class="invalid-feedback">
              Vaše příjmení je požadováno.
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="email">Email </label>
          <input type="email" class="form-control" name="email" id="email" placeholder="vy@priklad.com" required>
          <div class="invalid-feedback">
            Prosím zvolte emailovou adresu pro odbržení stavu objednávky.
          </div>
        </div>

        <div class="mb-3">
          <label for="address">Doručovací adresa</label>
          <input type="text" class="form-control" name="address" id="address" placeholder="Palachova 483" required>
          <div class="invalid-feedback">
           Prosím zadejte doručovací adresu.
          </div>
        </div>

        <div class="row">
          <div class="col-md-5 mb-3">
            <label for="zeme">Země</label>
            <select class="custom-select d-block w-100" name="zeme" id="zeme" required>
              <option value="">Vyberte...</option>
              <option>Česká Republika</option>
            </select>
            <div class="invalid-feedback">
              Prosím zvolte.
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="kraj">Kraj</label>
            <select class="custom-select d-block w-100" name="kraj" id="kraj" required>
              <option value="">Vybarte...</option>
              <option>Liberecký kraj</option>
              <option>Hlavní město Praha</option>
              <option>Ústecký kraj </option>
              <option>Středočeský kraj</option>
              <option>Olomoucký kraj</option>
              <option>Pardubický kraj</option>
              <option>Jihočeský kraj</option>
              <option>Plzeňský kraj</option>
              <option>Karlovarský kraj</option>
              <option>Královéhradecký kraj</option>
              <option>Zlínský kraj</option>
              <option>Moravskoslezský kraj</option>
              <option>Jihomoravský kraj</option>
              <option>Kraj Vysočina</option>
            </select>
            <div class="invalid-feedback">
              Prosím zvolte kraj.
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="psc">Poštovní směrovací číslo</label>
            <input type="text" class="form-control" name="psc" id="psc" placeholder="PSČ" required>
            <div class="invalid-feedback">
              PSČ je vyžadováno.
            </div>
          </div>
  </div>
        <hr class="mb-4">

        <h4 class="mb-3">Platba</h4>

        <div class="d-block my-3">
          <div class="custom-control custom-radio">
            <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" value="Creadit card" checked required>
            <label class="custom-control-label" for="credit">Kreditní karta</label>
          </div>
          <div class="custom-control custom-radio">
            <input id="GoPay" name="paymentMethod" type="radio" class="custom-control-input" value="GoPay" required>
            <label class="custom-control-label" for="GoPay">GoPay</label>
          </div>
          <div class="custom-control custom-radio">
            <input id="Google Pay" name="paymentMethod" type="radio" class="custom-control-input" value="Google Pay" required>
            <label class="custom-control-label" for="Google Pay">Google Pay</label>
          </div>
          <div class="custom-control custom-radio">
            <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" value="PayPal" required>
            <label class="custom-control-label" for="paypal">PayPal</label>
          </div>
          <div class="custom-control custom-radio">
            <input id="prevod" name="paymentMethod" type="radio" class="custom-control-input" value="prevod" required>
            <label class="custom-control-label" for="prevod">Bankovní převod</label>
          </div>
        </div>

        <h4 class="mb-3">Doprava</h4>
        Dopravu zajišťuje naše firma přes kurýrní společnost. Prosíme o bezchybné vyplnění doručovací adresy. Očekávejte, že vás kurýr informuje o plánovaném datu doručení prostřednictvím e-mailové adresy. Sledujte svou e-mailovou schránku na oznámení s podrobnostmi o doručení, včetně sledovacího čísla zásilky.
      
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Odeslat objednávku </button>
      </form>
    </div>
  </div>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2022-2023 Company Name</p>
    <ul class="list-inline">
    </ul>
  </footer>
</div>
<!-- <div class="col-lg-4">
    <div class="cart-box">
        <div class="cart-box-details">
            <div class="total-details">
                <div class="top-details">
                    <h3>Cart Totals</h3>
                    <h6>Sub Total <span>${{Cart::instance('cart')->subtotal()}}</span></h6>
                    <h6>Daň <span>${{Cart::instance('cart')->tax()}}</span></h6>

                    <h6>Total <span>${{Cart::instance('cart')->total()}}</span></h6>
                </div>
               
            </div>
        </div>
    </div>
</div> -->
@endsection
