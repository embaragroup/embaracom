@extends('backend.agent.master-admin-embara')
@section('title', 'Orders')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Orders</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    @if (Session::has('status'))
        <p class="alert alert-{{ Session::get('alert-class', 'info') }} font-weight-bold mb-4">
            {{ Session::get('status') }}
            <button type="button" class="close" data-dismiss="alert">×</button>
        </p>
    @endif
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-nowrap text-center" id="dataTable" width="100%" cellspacing="0">
                <thead class="">
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Kategori Trip</th>
                        <th>Pesanan</th>
                        <th>Harga</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($orders) > 0)
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->pesanan }}</td>
                                <td>{{ $order->qty }}</td>
                                <td>Rp. {{ number_format($order->total) }}</td>
                                <td>{{ $order->status }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="text-center" colspan="6">Belum ada order masuk ..</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
