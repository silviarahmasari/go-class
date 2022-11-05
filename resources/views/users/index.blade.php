@extends('layout.mainlayout')
@section('title','Users')
@section('PWBF','')

@section('content')
    <div class="section-header">
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">CLASS</a></div>
            <div class="breadcrumb-item"><a href="#">ADD NEW DATA</a></div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Users</h4>
                    <div class="card-header-form">
                        <a href="{{ route('users.create') }}" class="btn btn-lg btn-primary"><i class="fas fa-plus"></i> Tambah</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID User</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id_user}}</td>
                                        <td>{{ $user->name}}</td>
                                        <td>{{ $user->email}}</td>
                                        <td>{{ $user->password}}</td>
                                        <td>
                                            <a href="#" class="btn btn-warning"><i class="fas fa-pen"></i> Edit</a>
                                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection