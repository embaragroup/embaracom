@extends('backend.admin-embara.master-admin-backend')
@section('title', 'Embara Registration')

@section('content')
<form action="{{ url('admin-embara/register-agent/post') }}" method="POST">
    @csrf
    <h3 class="pb-4">
      Agent Registration
    </h3>
    <div class="form-group" data-validate = "Name is required">
      <label for="name">Name</label>
      <input type="text" class="form-control" name="name" placeholder="Name">
    </div>
    <div class="form-group" data-validate = "Email is required">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" placeholder="Email">
    </div>
    <div class="form-group" data-validate = "Password is required">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
