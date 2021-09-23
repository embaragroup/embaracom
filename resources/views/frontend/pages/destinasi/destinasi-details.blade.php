@extends('frontend.master-front')
@section('title', 'Detail Destinasi')
@section('destinasi', 'active')

@section('content')
<div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>Destinasi Detail</h1>

          <span>
              {{$paketTrip->title}}
          </span>
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
        <div class="col-md-7">
          <div>
            <img src="{{ Storage::url($paketTrip->cover_image) }}" alt="" class="img-fluid wc-image">
          </div>

          <br>

          <div class="row">
            @if ($paketTrip->detail_image != "")
              @foreach (json_decode($paketTrip->detail_image) as $image)
                  <div class="col-sm-4 col-6">
                      <div>
                        <img src="{{ Storage::url($image) }}" class="img-fluid"/>
                      </div>
                      <br>
                  </div>
              @endforeach
            @endif
          </div>

          <br>
        </div>

        <div class="col-md-5">
          <form action="#" method="post" class="form">
            <ul class="list-group list-group-flush">
             <li class="list-group-item">
                  <div class="clearfix">
                       <span class="pull-left">Kategori</span>

                       <strong class="pull-right">{{$paketTrip->KategoriTrip->kategori_trip}}</strong>
                  </div>
             </li>

             <li class="list-group-item">
                  <div class="clearfix">
                       <span class="pull-left">Jumlah Waktu</span>

                       <strong class="pull-right">{{$paketTrip->range_date}}</strong>
                  </div>
             </li>

             <li class="list-group-item">
                  <div class="clearfix">
                       <span class="pull-left"> Breakfast</span>

                       <strong class="pull-right">{{$paketTrip->include_breakfast}}</strong>
                  </div>
             </li>

             <li class="list-group-item">
                  <div class="clearfix">
                       <span class="pull-left">Flight Included</span>

                       <strong class="pull-right">{{$paketTrip->include_flight}}</strong>
                  </div>
             </li>
             <li class="list-group-item">
                <div class="clearfix">
                     <span class="pull-left">Transport Include</span>

                     <strong class="pull-right">{{$paketTrip->include_transport}}</strong>
                </div>
             </li>
             <li class="list-group-item">
                  <div class="clearfix">
                       <span class="pull-left">Free parking spot</span>

                       <strong class="pull-right">{{$paketTrip->include_parking}}</strong>
                  </div>
             </li>
            </ul>
          </form>

          <br>
            <a href="{{url('add-to-cart/'. $paketTrip->id)}}" class="filled-button btn-block text-center">Pesan Sekarang</a>


          <br>
        </div>
      </div>

      <br>

      <div class="tabs-content" style="display: block;">
        <h4>INFO</h4>

        <ul class="list-group list-group-no-border">
            <li class="list-group-item">
                {!! $paketTrip->deskripsi !!}
            </li>
        </ul>
      </div>

      <br>



      <br>
      <br>
      <br>
    </div>
  </div>
@endsection
