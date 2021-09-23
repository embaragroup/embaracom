@extends('frontend.master-front')
@section('title', 'Tentang Kami')
@section('Tentang Kami', 'active')

@section('content')
    <div class="page-heading header-text">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h1>About Us</h1>
                        <span>Pixel perfect design with awesome contents</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="more-info about-info">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="more-info-content">
                        <div class="row">
                            <div class="col-md-6 align-self-center">
                                <div class="right-content">
                                    <span>Embara Travel</span>
                                    <h2>Get to know about <em>our company</em></h2>
                                    <p>Fusce nec ultrices lectus. Duis nec scelerisque risus. Ut id tempor turpis, ac
                                        dignissim ipsum. Nulla ullamcorper, ipsum vel condimentum congue, mi odio vehicula
                                        tellus, sit amet malesuada justo sem.
                                        <br><br>Pellentesque in sagittis lacus, vel auctor sem. Quisque eu quam eleifend,
                                        ullamcorper dui nec, luctus quam.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="left-image">
                                    <img src="{{asset('assets/user/images/about-1-570x350.jpg')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="fun-facts">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="left-content">
                        <span>Embara Travel</span>
                        <h2>Modi esse sapiente tenetur <em>impedit laudantium laborum</em></h2>
                        <p>Pellentesque ultrices at turpis in vestibulum. Aenean pretium elit nec congue elementum. Nulla
                            luctus laoreet porta. Maecenas at nisi tempus, porta metus vitae, faucibus augue.
                            <br><br>Fusce et venenatis ex. Quisque varius, velit quis dictum sagittis, odio velit molestie
                            nunc, ut posuere ante tortor ut neque.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 align-self-center">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="count-area-content">
                                <div class="count-digit">1234</div>
                                <div class="count-title">Destinations</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="count-area-content">
                                <div class="count-digit">6280</div>
                                <div class="count-title">Happy clients</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="count-area-content">
                                <div class="count-digit">115</div>
                                <div class="count-title">Cities</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="count-area-content">
                                <div class="count-digit">26</div>
                                <div class="count-title">Packages</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
