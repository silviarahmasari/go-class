@extends('layout.mainlayout')
@section('title','Class')
@section('PWBF','')

@section('content')
<div class="section-header">
    <div class="container-fluid">
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <h5>Streaming</h5>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
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
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
        </div>
        <div class="col col-9 pt-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection