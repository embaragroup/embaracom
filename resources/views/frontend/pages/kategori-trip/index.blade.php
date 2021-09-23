@extends('frontend.master-front')
@section('title', 'Kategori Trip')
@section('kategori','active')

@section('content')
    <!-- Page Content -->
    <div class="page-heading header-text">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Kategori Trip</h1>
                    <span>Semua Kategory Trip Kami</span>
                </div>
            </div>
        </div>
    </div>

    <div class="services">
        <div class="container">
            @if (session('success'))
                <p class="alert alert-{{ session('success')}} font-weight-bold mb-4">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert">×</button>
                </p>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Kategori <em>Trip</em></h2>
                        <span>Pilih kategori untuk spesifikasi khusus</span>
                    </div>
                </div>
            </div>
            <div class="row">
                @if (count($kategoriTrip) > 0)
                    @foreach ($kategoriTrip as $item)
                        <div class="col-lg-3 col-md-4 col-sm-12 col-12 py-2 px-1">
                            <div class="card">
                                <img src="{{ Storage::url($item->image) }}" class="card-img-top" alt="..." height="200px">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->kategori_trip }}</h5>
                                    <a href="{{ url('kategori-trip/detail/'.$item->id) }}" class="btn btn-primary">Lihat destinasi</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection

