@extends('layout.mainlayout')
@section('title','People Details')
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
                    <a class="nav-link" href="#">
                        <h5>Orang</h5>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="card rounded-lg col-12 p-4">
                <div class="card-body">
                    <h3 class="pl-4">Pengajar</h3><hr>
                    <div class="row pl-4">
                        <div class="col col-auto">
                            <img alt="image" src="{{ asset('assets/stisla/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1" style="width: 25px; height:25px">
                        </div>
                        <div class="col col-10">
                            <h5>{{ $teacher[0]->name }}</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col col-10">
                            <h3 class="pl-4">Teman Sekelas</h3>
                        </div>
                        <div class="col col-2 pt-3">
                            <h6 class="text-end text-muted">{{ $count }} siswa</h6>
                        </div>
                    </div>
                    <hr>
                    @foreach ($student as $siswa)
                    <div class="row pl-4 p-1">
                        <div class="col col-auto">
                            <img alt="image" src="{{ asset('assets/stisla/img/avatar/avatar-2.png') }}" class="rounded-circle mr-1" style="width: 25px; height:25px">
                        </div>
                        <div class="col col-10">
                            <h5>{{ $siswa->name }}</h5>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection