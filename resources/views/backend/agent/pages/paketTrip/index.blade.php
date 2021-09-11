@extends('backend.agent.master-admin-embara')
@section('title', 'Index Produk')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Index Paket Trip</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    @if (Session::has('status'))
        <p class="alert alert-{{ Session::get('alert-class', 'info') }} font-weight-bold mb-4">
            {{ Session::get('status') }}
            <button type="button" class="close" data-dismiss="alert">×</button>
        </p>
    @endif
    <div class="card-body">
        <div class="add_button mb-4">
            <a href="{{ url('admin/create-pakettrip') }}" class="btn btn-primary">Add New</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered text-nowrap text-center" id="dataTable" width="100%" cellspacing="0">
                <thead class="">
                    <tr>
                        <th>Judul</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th>Tanggal mulai</th>
                        <th>Tanggal selesai</th>
                        <th>Rentang waktu</th>
                        <th>Provinsi</th>
                        <th>Kota</th>
                        <th>Kategori</th>
                        <th>Cover gambar</th>
                        <th>Detail gambar</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{!! $product->deskripsi !!}</td>
                            <td>{{ $product->start_date }}</td>
                            <td>{{ $product->end_date }}</td>
                            <td>{{ $product->range_date }}</td>
                            <td>{{ $product->Provinsi->province }}</td>
                            <td>{{ $product->City->city }}</td>
                            <td>{{ $product->KategoriTrip->kategori_trip }}</td>
                            <td>
                                <img src="{{ Storage::url($product->cover_image) }}" class="img-thumbnail" style="height:80px; width:100px"/>
                            </td>
                            <td>
                                @foreach (json_decode($product->detail_image) as $image)
                                    <img src="{{ Storage::url($image) }}" class="border" style="height:80px; width:100px"/>
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ url('admin/create-pakettrip/'. $product->id) }}" class="btn btn-sm btn-outline-success rounded-pill"><i class="fas fa-edit"></i> Edit</a>
                                <a href="{{ url('admin/delete/'. $product->id) }}" class="btn btn-sm btn-outline-danger rounded-pill"><i class="fas fa-trash-alt"></i> Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('js')
    <!-- Page level plugins -->
    <script src="{{asset('assets/admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('assets/admin/js/demo/datatables-demo.js')}}"></script>
@endsection
