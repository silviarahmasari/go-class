@extends('layout.mainlayout')
@section('title','Class')
@section('PWBF','')
@section('auth', $user->name)

@section('content')
<div class="section-header">
    <h1>ADD NEW DATA</h1>
    <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="#">CLASS</a></div>
    <div class="breadcrumb-item"><a href="#">ADD NEW DATA</a></div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>Class Data</h4>
                <div class="card-header-form">
                    <a href="{{ route('classes.create') }}" class="btn btn-primary btn-lg"><i></i>Add</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                    <tr class="text-center">
                        <th>Class Code</th>
                        <th>ID User</th>
                        <th>Class Name</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($data as $class)
                        <tr>
                            <td>{{ $class->class_code }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $class->class_name }}</td>
                            <td>{{ $class->class_desc }}</td>
                            <td>{{ $class->class_status }}</td>
                            <td>
                                <a href="{{ route('classes.show', $class->id_class)}}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('classes.edit', $class->id_class)}}" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                <a href="{{ route('classes.destroy', $class->id_class)}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection