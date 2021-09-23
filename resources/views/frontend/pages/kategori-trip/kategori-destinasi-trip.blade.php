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
                    <span>Semua Destinasi Trip Di kategori {{ $paketTrip[0]->KategoriTrip->kategori_trip }}</span>
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
                @foreach ($paketTrip as $destinasi)
                    <div class="col-lg-3 col-md-4 col-sm-12 col-12 py-2 px-2">
                        <div class="service-item">
                            <img src="{{ Storage::url($destinasi->cover_image) }}" alt="">
                            <div class="down-content">
                                <h4>{{ $destinasi->title }}</h4>
                                <div class="mb">
                                    <span> <sup>Rp. </sup>{{ number_format($destinasi->price) }}</span>
                                </div>

                                <p><b>{{ $destinasi->range_date }}</b></p>

                                <a href="{{ url('destinasi-details/' . $destinasi->id) }}" class="filled-button">Lihat
                                    Detail</a>
                            </div>
                        </div>
                        <br>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection