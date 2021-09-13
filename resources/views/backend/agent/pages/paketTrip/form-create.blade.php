@extends('backend.agent.master-admin-embara')
@section('title', 'Index Paket Trip')

@section('content')
<div class="main_content_iner ">
    <div class="container-fluid p-0 sm_padding_15px">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="white_card card_height_100 mb_30">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title mb-3">
                                <h3 class="m-0">Buat Paket Trip</h3>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body">
                    @if (isset($products))
                        <form action="{{ url('admin/save-pakettrip/'.$products->id) }}" enctype="multipart/form-data" method="POST">
                    @endif
                        <form action="{{ url('admin/save-pakettrip') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="row">
                                <input class="d-none" type="text" name="agent_id" value="{{Auth::user()->id}}">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="title">Judul</label>
                                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Masukan judul" value="{{ isset($products) ? $products->title : old('title')}}">
                                        @error('title')
                                            <label class="text-danger">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="price">Harga</label>
                                        <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="Rp: 1.000.000" value="{{ isset($products) ? $products->price : old('price')}}">
                                        @error('price')
                                            <label class="text-danger">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea type="text" name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror">{!! isset($products) ? $products->deskripsi : old('deskripsi') !!}</textarea>
                                @error('deskripsi')
                                    <label class="text-danger">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="start_date">Tanggal mulai</label>
                                        <input class="form-control @error('start_date') is-invalid @enderror" type="date" name="start_date" data-language="en" value="{{ isset($products) ? $products->start_date : old('start_date')}}">
                                        @error('start_date')
                                            <label class="text-danger">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="end_date">Tanggal selesai</label>
                                        <input class="form-control @error('end_date') is-invalid @enderror" type="date" name="end_date" data-language="en" value="{{ isset($products) ? $products->end_date : old('end_date')}}">
                                        @error('end_date')
                                            <label class="text-danger">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="image_product">Gambar cover&nbsp;<span style="color: red">*required</span></label>
                                        @if (isset($products))
                                            <br>
                                            <img src="{{ Storage::url($products->cover_image) }}" class="border mb-1" alt="" width="70" height="50">
                                        @endif
                                        <input type="file" name="cover_image" class="form-control @error('cover_image') is-invalid @enderror" placeholder="Image" value="{{ isset($products) ? $products->cover_image : '' }}">
                                        @error('cover_image')
                                            <label class="text-danger">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="form-group detail_image">
                                        <label for="image_product">Gambar detail&nbsp;<span style="color: red">*optional</span></label>
                                        @if (isset($products))
                                            <br>
                                            @foreach (json_decode($products->detail_image) as $image)
                                                <img src="{{ Storage::url($image) }}" class="border mb-1" width="70" height="50"/>
                                            @endforeach
                                        @endif
                                        <div class="d-flex">
                                            <input type="file" name="detail_image[]" accept="detail_image/*" class="form-control" placeholder="Image" value="{{ isset($products) ? $products->detail_image : ''}}">
                                            <button class="btn btn-success btn-sm add" type="button"><i class="fas fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <div class="clone hide">
                                        <div class="form-group">
                                            <div class="d-flex">
                                                <input type="file" name="detail_image[]" accept="detail_image/*" class="form-control" placeholder="Image" value="{{ isset($products) ? $products->detail_image : ''}}">
                                                <button class="btn btn-danger btn-sm remove"><i class="fas fa-trash"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="province_id"> Pilih Provinsi Destinasi</label>
                                        <select class="form-control @error('province_id') is-invalid @enderror" name="province_id" id="province_id">
                                            <option value="" readonly> Pilih Provinsi </option>
                                            @foreach($dataProvinsi as $data)
                                                <option value="{{ $data->id }}" {{ isset($products) ? ($products->province_id == $data->id ? 'selected' : '') : (old('province_id') == $data->id ? 'selected' : '')}}>{{ $data->province }}</option>
                                            @endforeach
                                        </select>
                                        @error('province_id')
                                            <label class="text-danger">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="city_id"> Pilih Kota Destinasi</label>
                                        <select class="form-control @error('city_id') is-invalid @enderror" name="city_id" id="city_id">
                                            <option value="" readonly> Pilih Kota </option>
                                        </select>
                                        @error('city_id')
                                            <label class="text-danger">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="kategori_trip_id"> Pilih Kategori Trip</label>
                                        <select class="form-control @error('kategori_trip_id') is-invalid @enderror" name="kategori_trip_id" id="kategori_trip_id">
                                            <option value="" readonly> Pilih Kategori </option>
                                            @foreach($dataKategori as $data)
                                                <option value="{{ $data->id }}" {{ isset($products) ? ($products->kategori_trip_id == $data->id ? 'selected' : '') : (old('kategori_trip_id') == $data->id ? 'selected' : '')}}> {{ $data->kategori_trip }}</option>
                                            @endforeach
                                        </select>
                                        @error('kategori_trip_id')
                                            <label class="text-danger">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="range_date">Rentang waktu</label>
                                        <input type="text" class="form-control @error('range_date') is-invalid @enderror" name="range_date" placeholder="Ex: 3 hari 2 malam" value="{{ isset($products) ? $products->range_date : old('range_date')}}">
                                        @error('range_date')
                                            <label class="text-danger">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label>Include Breakfast</label>
                                        <br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input @error('include_breakfast') is-invalid @enderror" type="radio" name="include_breakfast" id="" value="Ya" {{ isset($products) ? ($products->include_breakfast == 'Ya' ? 'checked' : '') : (old('include_breakfast') == 'Ya' ? 'checked' : '') }}>
                                            <label class="form-check-label" for="">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input @error('include_breakfast') is-invalid @enderror" type="radio" name="include_breakfast" id="" value="Tidak" {{ isset($products) ? ($products->include_breakfast == 'Tidak' ? 'checked' : '') : (old('include_breakfast') == 'Tidak' ? 'checked' : '') }}>
                                            <label class="form-check-label" for="">Tidak</label>
                                        </div>
                                        <br>
                                        @error('include_breakfast')
                                            <label class="text-danger">{{ $message }}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Include Tiket Pesawat</label>
                                        <br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input @error('include_flight') is-invalid @enderror" type="radio" name="include_flight" id="" value="Ya" {{ isset($products) ? ($products->include_flight == 'Ya' ? 'checked' : '') : (old('include_flight') == 'Ya' ? 'checked' : '') }}>
                                            <label class="form-check-label" for="">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input @error('include_flight') is-invalid @enderror" type="radio" name="include_flight" id="" value="Tidak" {{ isset($products) ? ($products->include_flight == 'Tidak' ? 'checked' : '') : (old('include_flight') == 'Tidak' ? 'checked' : '') }}>
                                            <label class="form-check-label" for="">Tidak</label>
                                        </div>
                                        <br>
                                        @error('include_flight')
                                            <label class="text-danger">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label>Include Transport</label>
                                        <br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input @error('include_transport') is-invalid @enderror" type="radio" name="include_transport" id="" value="Ya" {{ isset($products) ? ($products->include_transport == 'Ya' ? 'checked' : '') : (old('include_transport') == 'Ya' ? 'checked' : '') }}>
                                            <label class="form-check-label" for="">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input @error('include_transport') is-invalid @enderror" type="radio" name="include_transport" id="" value="Tidak" {{ isset($products) ? ($products->include_transport == 'Tidak' ? 'checked' : '') : (old('include_transport') == 'Tidak' ? 'checked' : '') }}>
                                            <label class="form-check-label" for="">Tidak</label>
                                        </div>
                                        <br>
                                        @error('include_transport')
                                            <label class="text-danger">{{ $message }}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Include Parking</label>
                                        <br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input @error('include_parking') is-invalid @enderror" type="radio" name="include_parking" id="" value="Ya" {{ isset($products) ? ($products->include_parking == 'Ya' ? 'checked' : '') : (old('include_parking') == 'Ya' ? 'checked' : '') }}>
                                            <label class="form-check-label" for="">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input  @error('include_parking') is-invalid @enderror" type="radio" name="include_parking" id="" value="Tidak" {{ isset($products) ? ($products->include_parking == 'Tidak' ? 'checked' : '') : (old('include_parking') == 'Tidak' ? 'checked' : '') }}>
                                            <label class="form-check-label" for="">Tidak</label>
                                        </div>
                                        <br>
                                        @error('include_parking')
                                            <label class="text-danger">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{asset('assets/admin/vendor/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".hide").hide();
            $(".add").click(function(){
                var lsthmtl = $(".clone").html();
                $(".detail_image").after(lsthmtl);
            });
            $("body").on("click",".remove",function(e){
                e.preventDefault();
                $(this).parent('div').remove(); x--;
            });
        });
    </script>
    <script>
        CKEDITOR.replace('deskripsi')
    </script>
    <script>
        $(document).ready(function() {
            let provinsiId = $('#province_id option:selected').val()
            if (provinsiId != '') {
                $.ajax({
                    url: '/admin/getKotaList/' +provinsiId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('select[name="city_id"]').empty();
                        $.each(data, function(value, key) {
                            $('select[name="city_id"]').append('<option value="'+ key +'">'+ value +'</option>')
                        })
                    }
                })
            }

            $('select[name="province_id"]').on('change', function(){
                var provinsiId = $(this).val();
                if (provinsiId) {
                    $.ajax({
                        url: '/admin/getKotaList/' +provinsiId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('select[name="city_id"]').empty();
                            $.each(data, function(value, key) {
                                $('select[name="city_id"]').append('<option value="'+ key +'">'+ value +'</option>')
                            })
                        }
                    })
                } else {
                    $('select[name="city_id"]').empty();
                }
            })
        })
    </script>
@endsection
