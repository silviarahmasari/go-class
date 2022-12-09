@extends('layout.mainlayout')
@section('title','Class')
@section('PWBF','')

@section('content')
<div class="section-header">
    <h1>EDIT DATA</h1>
    <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="#">CLASS</a></div>
    <div class="breadcrumb-item"><a href="#">EDIT DATA</a></div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
            <h4>EDIT CLASS</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('classes.update', $classes[0]->id_class) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>NAME</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $classes[0]->users->name }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>CLASS CODE</label>
                        <input type="text" class="form-control" id="class_code" name="class_code" value="{{ $classes[0]->class_code }}">
                    </div>
                    <div class="form-group">
                        <label>Class Name</label>
                        <input type="text" class="form-control" id="class_name" name="class_name" value="{{ $classes[0]->class_name }}">
                    </div>
                    <div class="form-group">
                        <label>Class Description</label>
                        <textarea class="form-control" style="height: auto; width:100%;" id="class_desc" name="class_desc">{{ $classes[0]->class_desc }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Class Status</label>
                        <select class="form-control" id="class_status" name="class_status">
                            <option value=""> -- Pilih Status -- </option>
                            <option value="Aktif" @if($classes[0]->class_status == "Aktif") selected @endif> Aktif </option>
                            <option value="Non-Aktif" @if($classes[0]->class_status == "Non-Aktif") selected @endif> Non-Aktif </option>
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