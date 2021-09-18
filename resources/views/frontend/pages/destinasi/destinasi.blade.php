@extends('frontend.master-front')
@section('title', 'Destinasi')
@section('destinasi', 'active')

<style>
    .title-destination {
        color: black
    }

    .mb {
        margin-bottom: 10px;
        font-size: 15px;
        color: rgb(2, 131, 2);
        font-weight: bold;
    }

</style>

@section('content')
    <!-- Page Content -->
    <div class="page-heading header-text">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Destinasi Trip</h1>
                    <span>Semua Destinasi Wisata Kami</span>
                </div>
            </div>
        </div>
    </div>

    <div class="request-form">
        @include('frontend.layouts.filterPaket')
    </div>

    <div class="services">
        <div class="container">
            <div class="row">
                @foreach ($paketTrip as $paket)
                    <div class="col-md-4">
                        <div class="service-item">
                            <img src="{{ Storage::url($paket->cover_image) }}" alt="Image Not Found" height="250px">
                            <div class="down-content">
                                <h4>{{ $paket->title }}</h4>
                                <div class="mb">
                                    <span> <sup>Rp. </sup>{{ number_format($paket->price) }}</span>
                                </div>

                                <p class="title-destination">Wisata Dengan Paket {{ $paket->range_date }}</p>

                                <a href="{{ url('destinasi-details/' . $paket->id) }}" class="filled-button">Lihat
                                    Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <nav class="mb-5 mt-5">
                <ul class="pagination pagination-lg justify-content-center">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">«</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">»</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@endsection
