@extends('frontend.master-front')
@section('title', 'Checkout')

@section('content')
<div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>Checkout</h1>
          <span>Checkout Detail</span>
        </div>
      </div>
    </div>
</div>
<div class="services">
    <div class="container">
      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <span class="badge badge-secondary badge-pill">{{ count((array) session('cart')) }}</span>
          </h4>
          <ul class="list-group mb-3">
            @if (session('cart'))
                @foreach (session('cart') as $id => $details)
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                          <h6 class="my-0">{{$details['name']}}</h6>
                          <small class="text-muted">{{$details['quantity']}} Orang</small>
                        </div>
                        <span class="text-muted">Rp. {{number_format($details['price'])}}</span>
                      </li>
                      @php $total = 0 @endphp
                      @foreach((array) session('cart') as $id => $details)
                          @php $total += $details['price'] * $details['quantity'] @endphp
                      @endforeach
                      <li class="list-group-item d-flex justify-content-between">
                        <span>Total (Rp)</span>
                        <strong>Rp. {{number_format($total)}}</strong>
                    </li>
                @endforeach
            @endif
          </ul>

          <form class="card p-2">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Promo code">
              <div class="input-group-append">
                <button type="submit" class="btn btn-secondary">Redeem</button>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-8 order-md-1">
        <h4 class="mb-3">Billing address</h4>
        <form class="needs-validation" novalidate>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div>

            <div class="mb-3">
                <label for="email">Email <span class="text-muted">(Optional)</span></label>
                <input type="email" class="form-control" id="email" placeholder="you@example.com">
                <div class="invalid-feedback">
                  Please enter a valid email address for shipping updates.
                </div>
            </div>

            <div class="mb-3">
              <label for="address">Address</label>
              <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            <div class="mb-3">
                <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
            </div>

            <div class="row">
              <div class="col-md-5 mb-3">
                    <label for="country">Country</label>
                    <select class="custom-select d-block w-100" id="country" required>
                      <option value="">Choose...</option>
                      <option>United States</option>
                    </select>
                    <div class="invalid-feedback">
                      Please select a valid country.
                    </div>
              </div>
              <div class="col-md-4 mb-3">
                    <label for="state">State</label>
                    <select class="custom-select d-block w-100" id="state" required>
                      <option value="">Choose...</option>
                      <option>California</option>
                    </select>
                    <div class="invalid-feedback">
                      Please provide a valid state.
                    </div>
              </div>
              <div class="col-md-3 mb-3">
                    <label for="zip">Zip</label>
                    <input type="text" class="form-control" id="zip" placeholder="" required>
                    <div class="invalid-feedback">
                      Zip code required.
                    </div>
              </div>
            </div>
            <hr class="mb-4">
        </form>

        <button id="pay-button" class="btn btn-primary btn-lg btn-block mb-4">Continue to checkout</button>
        </div>
      </div>
    </div>
</div>
@endsection

@section('js')
    <script type="text/javascript"
    src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="SB-Mid-client-o8I3OwvAUrsBAk3N"></script>
    {{-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment  --}}

    <script type="text/javascript">
        $(document).ready(function() {
            $('#pay-button').click(function() {
                window.snap.pay('{{ Session::get('snapToken') }}'); // Replace it with your transaction token

                {{ Session::forget('cart') }}
            })
        })
    </script>
@endsection
