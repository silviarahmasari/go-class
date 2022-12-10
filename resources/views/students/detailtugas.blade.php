@extends('layout.mainlayout')
@section('title','Class')
@section('PWBF','')

@section('content')
<div class="container px-2">
    <div class="section-header">
        <div class="container-fluid">
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('students.dashboard', $class[0]->class_id)) }}">
                        <h5>Streaming</h5>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('students.tugaskelas', $class[0]->class_id)) }}">
                        <h5>Tugas Kelas</h5>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <h5>Orang</h5>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            @foreach ($tugas as $tasks)
                <div class="col col-9 pt-4">
                    <div class="card rounded-lg">
                        <div class="card-body">
                            <h5 class="card-title">{{ }}</h5>
                            <b class="card-text text-bg-primary">KJSDIUE873</b>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col col-3 pt-4">
                <div class="card rounded-lg">
                    <div class="card-body">
                        <form action="">
                            <div class="container">
                                <h4>Tugas Anda</h4>
                                <div class="form-group">

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection