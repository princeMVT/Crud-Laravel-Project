@extends('layout')
@section('content')
<style>
    .container {
      max-width: 450px;
    }
    .push-top {
      margin-top: 50px;
    }
</style>
<div class="card push-top">
  <div class="card-header">
    Add User
  </div>
  <div class="card-body">

      <form method="post" action="{{ route('student.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email"/>
          </div>
          <div class="form-group">
              <label for="address">Address</label>
              <input type="text" class="form-control" name="address"/>
          </div>
          <div class="form-group">
              <label for="country">Country</label>
              <input type="text" class="form-control" name="country"/>
          </div>
          <div class="form-group">
              <label for="city">City</label>
              <input type="text" class="form-control" name="city"/>
          </div>
          <div class="form-group">
              <label for="pincode">Pincode</label>
              <input type="pincode" class="form-control" name="pincode"/>
          </div>
          
          <button type="submit" class="btn btn-block btn-danger">Submit</button>
      </form>
      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
  </div>
</div>
@endsection