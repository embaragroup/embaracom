@extends('frontend.master-front')
@section('title', 'Destinasi Trip')
@section('destinasi','active')

@section('content')
    <!-- Page Content -->
    <div class="page-heading header-text">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Destinasi Trip</h1>
                    <span>Semua Destinasi Trip Di kategori {{ count($paketTrip) > 0 ? $paketTrip[0]->KategoriTrip->kategori_trip : 'ini'}}</span>
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
                        <h2>Destinasi <em>Trip</em></h2>
                        <span>Pilih destinasi untuk spesifikasi khusus</span>
                    </div>
                </div>
            </div>
            <div class="row">
                @if (count($paketTrip) > 0)
                    @foreach ($paketTrip as $destinasi)
                        <div class="col-lg-4 col-md-4 col-sm-12 col-12 py-2 px-2">
                            <div class="service-item">
                                <img src="{{ Storage::url($destinasi->cover_image) }}" alt="Image Not Found" style="height: 250px;">
                                <div class="down-content">
                                    <h4>{{ $destinasi->title }}</h4>
                                    <div class="mb">
                                        <span> <sup>Rp. </sup>{{ number_format($destinasi->price) }}</span>
                                    </div>
                                    <p class="title-destination text-dark">Wisata Dengan Paket {{ $destinasi->range_date }}</p>
                                    <a href="{{ url('destinasi-details/' . $destinasi->id) }}" class="filled-button">Lihat Kategori</a>
                                </div>
                            </div>
                            <br>
                        </div>
                    @endforeach
                @else
                    <div class="col-lg-12 text-center mb-5">
                        <h4>Belum ada destinasi dikategori ini</h4>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
