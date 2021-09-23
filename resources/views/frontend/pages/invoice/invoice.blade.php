@extends('frontend.master-front')
@section('title', 'Invoice')

@section('css')
    <link rel="stylesheet" href="{{asset('assets/user/css/invoice.css')}}">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
@endsection

@section('content')
<div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>Invoice</h1>
          <span>Invoice Detail</span>
        </div>
      </div>
    </div>
</div>
<div class="page-content container">
    <div class="container px-0">
        <div class="row mt-4">
            <div class="col-12 col-lg-10 offset-lg-1">
                <div class="row">
                    <div class="col-12">
                        <div class="text-center text-150">
                            <img width="150" height="150" src="{{asset('assets/user/images/logo-embara.png')}}" alt="">
                            <span class="text-default-d3">embara.com</span>
                        </div>
                    </div>
                </div>
                <!-- .row -->

                <hr class="row brc-default-l1 mx-n1 mb-4" />

                <div class="row">
                    <div class="col-sm-6">
                        <div>
                            <span class="text-sm text-grey-m2 align-middle">Kepada:</span>
                            <span class="text-600 text-110 text-blue align-middle">{{ $invoice->Order->first_name }}</span>
                        </div>
                        <div>
                            <span class="text-sm text-grey-m2 align-middle">Email:</span>
                            <span class="text-600 text-110 text-blue align-middle">{{$invoice->Order->email}}</span>
                        </div>
                    </div>
                    <!-- /.col -->

                    <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                        <hr class="d-sm-none" />
                        <div class="text-grey-m2">
                            <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                Invoice
                            </div>

                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Order Id: </span>{{ $invoice->order_id }}</div>

                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Tanggal: </span>{{date('d-M-Y', strtotime($invoice->created_at))}}</div>

                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Status:</span> <span class="badge badge-warning badge-pill px-25">{{$status}}</span></div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>

                <div class="mt-4">
                    <div class="row text-600 text-white bgc-default-tp1 py-25">
                        <div class="d-none d-sm-block col-1">#</div>
                        <div class="col-9 col-sm-5">Pesanan</div>
                        <div class="d-none d-sm-block col-4 col-sm-2">Jumlah(orang)</div>
                    </div>

                    <div class="text-95 text-secondary-d3">
                        <div class="row mb-2 mb-sm-0 py-25">
                            <div class="d-none d-sm-block col-1">1</div>
                            <div class="col-9 col-sm-5">{{$invoice->Order->pesanan}}</div>
                            <div class="d-none d-sm-block col-2">2</div>
                        </div>
                    </div>

                    <div class="row border-b-2 brc-default-l2"></div>

                    <!-- or use a table instead -->
                    <!--
            <div class="table-responsive">
                <table class="table table-striped table-borderless border-0 border-b-2 brc-default-l1">
                    <thead class="bg-none bgc-default-tp1">
                        <tr class="text-white">
                            <th class="opacity-2">#</th>
                            <th>Description</th>
                            <th>Qty</th>
                            <th>Unit Price</th>
                            <th width="140">Amount</th>
                        </tr>
                    </thead>

                    <tbody class="text-95 text-secondary-d3">
                        <tr></tr>
                        <tr>
                            <td>1</td>
                            <td>Domain registration</td>
                            <td>2</td>
                            <td class="text-95">$10</td>
                            <td class="text-secondary-d2">$20</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            -->

                    <div class="row mt-3">
                        <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                            Extra note such as company or payment information...
                        </div>

                        <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                            <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                <div class="col-7 text-right">
                                    Total (IDR)
                                </div>
                                <div class="col-5">
                                    <span class="text-150 text-success-d3 opacity-2">{{number_format($invoice->Order->total)}}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr />

                    <div>
                        <span class="text-secondary-d1 text-105">Copyright © 2020 PT.Embara Solusi Kreatif. All Right Reserved</span>
                        <a href="{{url('/home')}}" class="btn btn-info btn-bold px-4 float-right mt-3 mt-lg-0">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
