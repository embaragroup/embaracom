@extends('frontend.master-front')
@section('title', 'Pesanan')

@section('content')
<div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>Cart</h1>
          <span>Daftar Pesanan Anda</span>
        </div>
      </div>
    </div>
</div>
<div class="services">
    <div class="container">
        <table id="cart" class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th style="width:50%">Product</th>
                    <th style="width:12%">Price</th>
                    <th style="width:7%">Quantity</th>
                    <th style="width:22%" class="text-center">Subtotal</th>
                    <th style="width:10%"></th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0 @endphp
                @if(session('cart'))
                    @foreach(session('cart') as $id => $details)
                        @php $total += $details['price'] * $details['quantity'] @endphp
                        <tr data-id="{{ $id }}">
                            <td data-th="Product">
                                <div class="row">
                                    <div class="col-sm-3 hidden-xs"><img src="{{ $details['image'] }}" width="100" height="100" class="img-responsive"/></div>
                                    <div class="col-sm-9">
                                        <h4 class="nomargin" style="font-size: 20px; font-weight: 600; color: #1e1e1e;">{{ $details['name'] }}</h4>
                                    </div>
                                </div>
                            </td>
                            <td data-th="Price">Rp. {{ number_format($details['price']) }}</td>
                            <td data-th="Quantity">
                                <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" />
                            </td>
                            <td data-th="Subtotal" class="text-center">Rp. {{ number_format($details['price'] * $details['quantity']) }}</td>
                            <td class="actions" data-th="">
                                <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></button>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
            <tfoot>
                <form action="{{url('/checkout')}}" method="POST">
                    @csrf
                    <tr>
                        <td colspan="5" class="text-right"><h3><strong>Total: Rp.</strong>
                                <input name="total" class="text-center" value="{{$total}}" readonly/>
                        </h3></td>
                    </tr>
                    <tr>
                        <td colspan="5" class="text-right">
                            <a href="{{ url('/destinasi') }}" class="filled-button"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                            @if (session('cart'))
                                <button type="submit" class="filled-checkout">Checkout</button>
                            @endif
                        </td>
                    </tr>
                </form>
            </tfoot>
        </table>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">

    $(".update-cart").change(function (e) {
        e.preventDefault();

        var ele = $(this);

        $.ajax({
            url: '{{ url('update-cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}',
                id: ele.parents("tr").attr("data-id"),
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });

    $(".remove-from-cart").click(function (e) {
        e.preventDefault();

        var ele = $(this);

        if(confirm("Anda Yakin Akan Hapus Pesanan?")) {
            $.ajax({
                url: '{{ url('delete-cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });

</script>
@endsection
