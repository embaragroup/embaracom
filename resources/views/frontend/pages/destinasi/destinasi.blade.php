@extends('frontend.master-front')
@section('title', 'Destinasi')
@section('destinasi','active')

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
          <div class="row text-center">
                @foreach ($paketTrip as $paket)
                <div class="col-md-4">
                    <div class="service-item">
                      <img src="{{ Storage::url($paket->cover_image) }}" alt="">
                      <div class="down-content">
                        <h4>{{$paket->title}}</h4>
                        <div style="margin-bottom:10px;">
                          <span> <sup>Rp. </sup>{{number_format($paket->price)}}</span>
                        </div>

                        <p>Wisata Dengan Paket {{ $paket->range_date }}</p>

                        <a href="{{url('destinasi-details/' . $paket->id)}}" class="filled-button">Lihat Detail</a>
                      </div>
                    </div>

                    <br>
                </div>
                @endforeach
          </div>

          <br>
          <br>

          <nav>
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

          <br>
          <br>
          <br>
          <br>
        </div>
      </div>
@endsection
