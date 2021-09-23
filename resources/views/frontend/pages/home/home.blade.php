@extends('frontend.master-front')
@section('title', 'Home')
@section('home', 'active')

<style>
    .title {
        font-size: 30px;
        color: black;
        font-weight: bold;
    }

    .title-destination {
        color: black
    }

    .title-in {
        color: black;
    }

    .mb {
        margin-bottom: 10px;
        font-size: 15px;
        color: rgb(2, 131, 2);
        font-weight: bold;
    }

    .card-radius {
        padding: 1rem;
        border-radius: 1.5rem !important;
        background: white;
        box-shadow: 0px 0px 10px -2px grey;
    }

    .card-title {
        font-size: 18px;
    }

    .btn-sm {
        border-radius: 2rem !important;
    }

    .hr {
        width: 100px;
        border: 2px solid rgb(240, 218, 20);
    }

    .br-radius{
        background: #00AEEF;
        padding: 5rem;
        z-index: 0;
        border-bottom-left-radius: 79px;
        border-bottom-right-radius: 79px;
    }
    .em{
        color: rgb(240, 218, 20) !important;
    }
    .img{
        height: 250px;
    }

    @media (max-width: 414px) {
        .title {
            font-size: 20px;
            color: black;
        }
        .font-size-h2{
            font-size: 25px !important;
        }
        .services-color{
            font-size: 14px !important;
        }
        .mt-top{
            margin-top: 2rem;
            margin-bottom: 7rem !important;
        }
        .br-radius{
            padding: 1rem;
        }
        .hr{
            margin-bottom: 1rem
        }
    }
</style>

@section('content')
    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="main-banner header-text" id="top">
        <div class="Modern-Slider">
            <!-- Item -->
            <div class="item item-1">
                <div class="img-fill">
                    <div class="text-content">
                        <h6>MERDEKA !!!</h6>
                        <h4>DIRGAHAYU RI-76 <br> </h4>
                        <p>Merdeka Merdeka Merdeka, kita rayakan HUT RI yang ini dengan Menikamti indahnya INDONESIA</p>
                        <a href="packages.html" class="filled-button">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <!-- // Item -->
            <!-- Item -->
            <div class="item item-2">
                <div class="img-fill">
                    <div class="text-content">
                        <h6></h6>
                        <h4>Fotografer & Videografer <br> </h4>
                        <p>Buat kamu yang Punya hobi foto, Dan bikin video. pas banget nih lagi ada penawaran spesial, Kamu
                            bisa datengin 5 objek destinasi di indonesia dengan harga mulai 1 JUTA aja, penasarankan
                            langsung cek aja</p>
                        <a href="about.html" class="filled-button">Lihat</a>
                    </div>
                </div>
            </div>
            <!-- // Item -->
            <!-- Item -->
            <div class="item item-3">
                <div class="img-fill">
                    <div class="text-content">
                        <h6>liburan keluarga</h6>
                        <h4>KEPULAUAN SERIBU<br></h4>
                        <p>Wisata kepulauan seribu identik dengan pengalaman snorkeling, diving dan aktifitas yang
                            berhubungan dengan pantai lainnya. Buat momen yang mewakili pengalaman mu di KEPULAUAN SERIBU.
                        </p>
                        <a href="contact.html" class="filled-button">Lihat</a>
                    </div>
                </div>
            </div>
            <!-- // Item -->
        </div>
    </div>
    <!-- Banner Ends Here -->

    <div class="request-form">
        <div class="col-md-12">
            <div class="line text-center">
                <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                    <div class="filter_1">
                        <label id="paketTrip" class="btn btn-outline-white" for="btncheck2"><i class="fa fa-suitcase"
                                aria-hidden="true"></i> Paket Trip</label>
                        <label id="pesawat" class="btn btn-outline-white" for="btncheck3"><i class="fa fa-plane"
                                aria-hidden="true"></i> Tiket pesawat </label>
                        <label id="hotel" class="btn btn-outline-white" for="btncheck1"><i class="fa fa-bed"
                                aria-hidden="true"></i> Hotel</label>
                        <label id="transport" class="btn btn-outline-white" for="btncheck3"><i class="fa fa-car"
                                aria-hidden="true"></i> Transportasi</label>
                    </div>
                </div>
            </div>
        </div>

        @include('frontend.layouts.filterPaket')

        @include('frontend.layouts.filterPesawat')

        @include('frontend.layouts.filterTransport')

        @include('frontend.layouts.filterHotel')

    </div>

    <div class="services">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <p class="title">Semua <em>Perjalanan</em></p>
                        <span>Pilih lokasi tujuan perjalananmu</span>
                    </div>
                </div>
                @foreach ($homePaketTrip as $allPaket)
                    <div class="col-md-4">
                        <div class="service-item">
                            <img src="{{ Storage::url($allPaket->cover_image) }}" alt="Image Not Found" class="img">
                            <div class="down-content">
                                <h4>{{ $allPaket->title }}</h4>
                                <div class="mb">
                                    <span> <sup>Rp. </sup>{{ number_format($allPaket->price) }}</span>
                                </div>

                                <p class="title-destination">Wisata Dengan Paket {{ $allPaket->range_date }}</p>

                                <a href="{{ url('destinasi-details/' . $allPaket->id) }}" class="filled-button">Lihat
                                    Detail</a>
                            </div>
                        </div>
                        <br>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="services">
        <div class="br-radius">
            <div class="col-md-12">
                <div class="section-heading mt-top">
                    <h2 class="font-size-h2" style="color: white">Kategori <em class="em">Trip</em></h2>
                    <span class="services-color" style="color: white">Pilih kategori untuk spesifikasi khusus</span>
                    <hr class="hr">
                </div>
            </div>
        </div>
        <div class="container" style="margin-top: -5rem">
            <div class="row">
                @if (count($kategoriTrip) > 0)
                    @foreach ($kategoriTrip as $item)
                        <div class="col-lg-3 col-md-4 col-sm-12 col-12 py-1">
                            <div class="card card-radius">
                                <img src="{{ Storage::url($item->image) }}" class="card-img-top" alt="..."
                                    height="200px">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->kategori_trip }}</h5>
                                    <hr>
                                    <a href="#" class="btn btn-primary btn-sm">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

                <div class="col-md-12" style="margin-top: 3rem">
                    <div class="section-heading">
                        <a href="" class="btn btn-outline-dark"><strong>Read More</strong></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="fun-facts">
        <div class="container">
            <div class="more-info-content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="left-image">
                            <img src="{{ asset('assets/user/images/about-1-570x350.jpg') }}" class="img-fluid"
                                alt="">
                        </div>
                    </div>
                    <div class="col-md-6 align-self-center">
                        <div class="right-content">
                            <div id="pixlee_container"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        var PaketTrip = document.getElementById('paketTrip');
        var Pesawat = document.getElementById('pesawat');
        var Hotel = document.getElementById('hotel');
        var Transport = document.getElementById('transport');

        Pesawat.addEventListener('click', function() {
            document.getElementById('paketfilter').style.display = 'none';
            document.getElementById('pesawatfilter').style.display = 'block';
            document.getElementById('hotelfilter').style.display = 'none';
            document.getElementById('transportfilter').style.display = 'none';
        });

        Hotel.addEventListener('click', function() {
            document.getElementById('paketfilter').style.display = 'none';
            document.getElementById('pesawatfilter').style.display = 'none';
            document.getElementById('hotelfilter').style.display = 'block';
            document.getElementById('transportfilter').style.display = 'none';
        });

        Transport.addEventListener('click', function() {
            document.getElementById('paketfilter').style.display = 'none';
            document.getElementById('pesawatfilter').style.display = 'none';
            document.getElementById('hotelfilter').style.display = 'none';
            document.getElementById('transportfilter').style.display = 'block';
        });

        PaketTrip.addEventListener('click', function() {
            document.getElementById('paketfilter').style.display = 'block';
            document.getElementById('pesawatfilter').style.display = 'none';
            document.getElementById('hotelfilter').style.display = 'none';
            document.getElementById('transportfilter').style.display = 'none';
        });
    </script>

    {{-- <script type="text/javascript">
        window.PixleeAsyncInit = function() {
            Pixlee.init({apiKey:'WwuF3jYhN_mwrqmde1lR'});
            Pixlee.addSimpleWidget({widgetId:'33837'});
        };
    </script>
    <script src="//instafeed.assets.pxlecdn.com/assets/pixlee_widget_1_0_0.js"></script> --}}
@endsection
