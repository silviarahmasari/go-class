@extends('layout.mainlayout')
@section('title','Class')
@section('PWBF','')
@section('auth', $user->name)

@section('content')
<div class="section-header">
    <h1>DETAIL DATA</h1>
    <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="#">CLASS</a></div>
    <div class="breadcrumb-item"><a href="#">DETAIL DATA</a></div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
            <h4>DETAIL CLASS</h4>
            </div>
            <div class="card-body">
                <form>
                    @csrf
                    <div class="form-group">
                        <label>NAME</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $classes[0]->users->name }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>CLASS CODE</label>
                        <input type="text" class="form-control" id="class_code" name="class_code" value="{{ $classes[0]->class_code }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Class Name</label>
                        <input type="text" class="form-control" id="class_name" name="class_name" value="{{ $classes[0]->class_name }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Class Description</label>
                        <textarea class="form-control" style="height: auto; width:100%;" id="class_desc" name="class_desc" disabled>{{ $classes[0]->class_desc }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Class Status</label>
                        <select class="form-control" id="class_status" name="class_status" disabled>
                            <option value=""> -- Pilih Status -- </option>
                            <option value="Aktif" @if($classes[0]->class_status == "Aktif") selected @endif> Aktif </option>
                            <option value="Non-Aktif" @if($classes[0]->class_status == "Non-Aktif") selected @endif> Non-Aktif </option>
                        </select>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection