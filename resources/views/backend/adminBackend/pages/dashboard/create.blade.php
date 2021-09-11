@extends('backend.adminBackend.master-admin-backend')
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
                                <form action="{{ url('admin-embara/storeBackend/'. $result->id) }}" enctype="multipart/form-data" method="POST">
                            @endif
                            <form action="{{url('admin-embara/storeBackend')}}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Company Name</label>
                                    <input type="text" name="company_name" class="form-control" @error('company_name') is-invalid @enderror placeholder="Enter title" value="{{ isset($result) ? $result->company_name : old('company_name')}}" required>
                                    @error('company_name')
                                        <label class="text-danger">{{ $message }}</label>
                                    @enderror
                                </div>
                                <div class=" form-group">
                                    <label for="title">Copy Right</label>
                                    <input type="text" name="copyright" class="form-control" @error('copyright') is-invalid @enderror placeholder="Enter title" value="{{ isset($result) ? $result->copyright : old('copyright')}}" required>
                                    @error('copyright')
                                        <label class="text-danger">{{ $message }}</label>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary" onclick="return confirm('Sudah Benar ?')">Submit</button>
                                <a href="/admin-embara/pageBackend" type="button" class="btn btn-dark">Back</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
