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
                                    <h6 class="my-0" id="pesananCart">{{$details['name']}}</h6>
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
                                  <strong id="totalCart">Rp. {{number_format($total)}}</strong>
                              </li>
                          @endforeach
                      @endif
                </ul>

                {{-- <form class="card p-2">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Promo code">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-secondary">Redeem</button>
                    </div>
                  </div>
                </form> --}}
            </div>
            <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Detail Personal</h4>
            <form>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">First name</label>
                        <input type="text" class="form-control" id="firstName" placeholder="" value="{{Auth::user()->first_name}}" required>
                        <div class="invalid-feedback">
                          Tambah First Name.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Last name</label>
                        <input type="text" class="form-control" id="lastName" placeholder="" value="{{Auth::user()->last_name}}" required>
                        <div class="invalid-feedback">
                          Tambah Last Name.
                        </div>
                    </div>
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" value="{{Auth::user()->email}}" placeholder="you@example.com" required>
                        <div class="invalid-feedback">
                          Tambah Email.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="phone">Nomor Telepon</label>
                        <input type="text" class="form-control" id="phone" placeholder="Alamat" value="{{Auth::user()->phone}}" required>
                        <div class="invalid-feedback">
                          Tambah Alamat.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="address">Alamat</label>
                        <input type="text" class="form-control" id="address" placeholder="Alamat" value="{{Auth::user()->alamat}}" required>
                        <div class="invalid-feedback">
                          Tambah Alamat.
                        </div>
                    </div>
                </div>
                <hr class="mb-4">
                </div>
            </form>
            <button id="pay-button" class="btn btn-primary btn-lg btn-block mb-4">Continue to checkout</button>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key = config('apikey.midtrans.client_key')></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#pay-button').click(function() {
                window.snap.pay('{{ Session::get('snapToken') }}');
            })
        })
    </script>
@endsection
