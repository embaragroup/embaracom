@extends('backend.admin-embara.master-admin-backend')
@section('title', 'Create')

@section('content')
    <div class="main_content_iner ">
        <div class="container-fluid p-0 sm_padding_15px">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Buat Kategori</h3>
                                </div>
                                <hr>
                            </div>
                        </div>
                        <div class="white_card_body">
                            @if (isset($result))
                                <form action="{{ url('admin-embara/storeKategori/'. $result->id) }}" enctype="multipart/form-data" method="POST">
                            @endif
                            <form action="{{url('admin-embara/storeKategori')}}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Kategori Trip</label>
                                    <input type="text" name="kategori_trip" class="form-control @error('kategori_trip')  is-invalid @enderror" placeholder="Enter title" value="{{ isset($result) ? $result->kategori_trip : old('kategori_trip')}}" required>
                                    @error('kategori_trip')
                                        <label class="text-danger">{{ $message }}</label>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" required>
                                    @error('image')
                                        <label class="text-danger">{{ $message }}</label>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary" onclick="return confirm('Sudah Benar ?')">Submit</button>
                                <a href="/admin-embara/pageKategori" type="button" class="btn btn-dark">Back</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
