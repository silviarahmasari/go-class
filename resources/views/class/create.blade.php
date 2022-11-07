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
            <h4>NEW CLASS</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('classes.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>NAME</label>
                        <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ $user->id_user }}">
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>CLASS CODE</label>
                        <input type="text" class="form-control" id="class_code" name="class_code">
                    </div>
                    <div class="form-group">
                        <label>Class Name</label>
                        <input type="text" class="form-control" id="class_name" name="class_name">
                    </div>
                    <div class="form-group">
                        <label>Class Description</label>
                        <textarea name="class_desc" id="class_desc" class="summernote-simple" style="display: none;"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Class Status</label>
                        <select class="form-control" name="class_status" id="class_status">
                            <option value=""> -- Pilih Status -- </option>
                            <option value="Aktif"> Aktif </option>
                            <option value="Non-Aktif"> Non-Aktif </option>
                        </select>
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