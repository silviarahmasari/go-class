@extends('layout.mainlayout')
@section('title','Tasks')
@section('PWBF','')

@section('content')
<div class="container px-2">
    <div class="section-header">
        <div class="container-fluid">
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('students.dashboard', $kelas) }}">
                        <h5>Streaming</h5>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('students.tugaskelas', $kelas) }}">
                        <h5>Tugas Kelas</h5>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('students.orang', $kelas) }}">
                        <h5>Orang</h5>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="card rounded-lg col-12 p-3">
                <div class="card-body">
                    @if ($tugas->count() != 0) 
                        @foreach ($tugas as $data)
                        <h6>List Tugas</h6><br>
                            <a href="{{ route('students.detailtugas', $data->id) }}">
                                <div class="row">
                                    <div class="col-1 pl-5">
                                        <li class="fas fa-book"></li>
                                    </div>
                                    <div class="col-11">
                                        <h5>{{ $data->task_title }}</h5>
                                    </div>
                                </div>
                            </a>
                        <hr>
                        @endforeach
                    @else
                        <p>Tugas belum diberikan</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection