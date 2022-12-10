@extends('layout.mainlayout')
@section('title','Class')
@section('PWBF','')

@section('content')
<div class="container px-2">
    <div class="section-header">
        <div class="container-fluid">
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('students.dashboard') }}">
                        <h5>Streaming</h5>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('students.tugaskelas') }}">
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
            <img class="rounded-lg img-fluid" style="max-width: 100%" alt="" src="https://img.freepik.com/free-vector/night-rice-field-terraces-asian-mountains-landscape-with-paddy-plantation-cascades-chinese-agricultural-farm-dark-starry-sky-with-full-moon-glowing-fireflies-cartoon-vector-illustration_107791-10584.jpg?w=1380&t=st=1670643219~exp=1670643819~hmac=29c00556c78936c881e21d474eff4f6309e05dfe521116831ef9c97bcbe2e394">
            <div class="col col-3 pt-4">
                <div class="card rounded-lg">
                    <div class="card-body">
                        <h5 class="card-title">Kode Kelas</h5>
                        <b class="card-text text-bg-primary">KJSDIUE873</b>
                    </div>
                </div>
            </div>
            <div class="col col-9 pt-4">
                <div class="card rounded-lg">
                    <div class="card-body">
                        <a href="">
                            <div class="row justify-content-center">
                                <div class="col col-2">
                                    <h5><li class="fas fa-plus"></li></h5>
                                </div>
                                <div class="col col-10">
                                    <h5>Umumkan sesuatu ke kelas Anda</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection