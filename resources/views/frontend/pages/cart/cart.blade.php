@extends('frontend.master-front')
@section('title', 'Pesanan')

<style>
    th {
        font-size: 14px
    }
    .total{
        font-size: 18px;
    }
    .text-transform{
        text-transform: uppercase;
    }
    @media (max-width: 414px) {
        .text-transform{
            font-size: 14px !important;
        }
    }
</style>

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
        <div class="container table-responsive">
            <table id="cart" class="table table-hover table-condensed">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th class="text-center">Subtotal</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0 @endphp
                    @if (session('cart'))
                        @foreach (session('cart') as $id => $details)
                            @php $total += $details['price'] * $details['quantity'] @endphp
                            <tr data-id="{{ $id }}">
                                <form action="{{ url('/checkout') }}" method="POST">
                                    @csrf
                                    <td data-th="Product">
                                        <input type="text" class="form-control text-center" name="pesanan"
                                            value="{{ $details['name'] }}" readonly>
                                    </td>
                                    <td data-th="Price">Rp. {{ number_format($details['price']) }}</td>
                                    <td data-th="Quantity">
                                        <input type="number" value="{{ $details['quantity'] }}"
                                            class="form-control quantity update-cart" />
                                    </td>
                                    <td data-th="Subtotal" class="text-center">Rp.
                                        {{ number_format($details['price'] * $details['quantity']) }}</td>
                                    <td class="actions" data-th="">
                                        <button class="btn btn-danger btn-sm remove-from-cart"><i
                                                class="fa fa-trash-o"></i></button>
                                    </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5" class="text-right">
                            <p class="total"><strong>Total: Rp.</strong>
                                <input name="total" class="text-center" value="{{ number_format($total) }}" readonly />
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" class="text-right">
                            <a href="{{ url('/destinasi') }}" class="btn btn-primary text-transform"><i class="fa fa-angle-left"></i>
                                <strong>Continue Shopping</strong></a>
                            @if (session('cart'))
                                <button type="submit" class="btn btn-success text-transform"><strong>Checkout</strong></button>
                            @endif
                        </td>
                    </tr>
                    </form>
                </tfoot>
        </div>
        </table>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        $(".update-cart").change(function(e) {
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
                success: function(response) {
                    window.location.reload();
                }
            });
        });

        $(".remove-from-cart").click(function(e) {
            e.preventDefault();

            var ele = $(this);

            if (confirm("Anda Yakin Akan Hapus Pesanan?")) {
                $.ajax({
                    url: '{{ url('delete-cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
@endsection
