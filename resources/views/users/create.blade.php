@extends('layout.mainlayout')
@section('title','Users')
@section('PWBF','')

@section('content')
<div class="section-header">
    <h1>ADD NEW DATA</h1>
    <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="#">USERS</a></div>
    <div class="breadcrumb-item"><a href="#">ADD NEW DATA</a></div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
            <h4>NEW USERS</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('users.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection