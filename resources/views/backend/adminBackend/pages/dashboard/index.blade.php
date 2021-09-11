@extends('backend.adminBackend.master-admin-backend')
@section('title', 'Index')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Admin Embara</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    @if (Session::has('status'))
        <p class="alert alert-{{ Session::get('alert-class', 'info') }} font-weight-bold mb-4">
            {{ Session::get('status') }}
            <button type="button" class="close" data-dismiss="alert">×</button>
        </p>
    @endif
    <div class="card-body">
        <div class="add_button mb-4">
            <a href="{{ url('admin-embara/pageCreate') }}" class="btn btn-primary">Add New</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered text-nowrap" id="dataTable" width="100%" cellspacing="0">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Company Name</th>
                        <th>Copy Right</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($adminBackend as $Ad)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $Ad->company_name }}</td>
                            <td>{{ $Ad->copyright }}</td>
                            <td>
                                <a href="{{ url('admin-embara/pageCreate', $Ad->id) }}"
                                    class="btn btn-sm btn-outline-success rounded-pill"><i class="fas fa-edit"></i>
                                    Edit</a>
                                <a href="{{ url('admin-embara/delete', $Ad->id) }}"
                                    class="btn btn-sm btn-outline-danger rounded-pill"><i class="fas fa-trash-alt"></i>
                                    Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('js')
<!-- Page level plugins -->
<script src="{{ asset('assets/admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('assets/admin/js/demo/datatables-demo.js') }}"></script>
@endsection
