@extends('layout.mainlayout')
@section('title','Home')
@section('PWBF','')

@section('content')
<style>
    .banner {
        width: 50px;
    }
</style>
<body>
    <div class="row px-lg-5">
        @foreach ($class as $data)
        <div class="col-12 col-sm-6 col-md-6 col-lg-4">
            <a href="#">
                <article class="article">
                    <div class="article-header">
                        <div class="article-image" data-background="{{ asset ('assets/img/class/banner-class.jpg') }}"></div>
                        <div class="article-title text-white pl-3 pb-0">
                            <h2>{{ $data->class_name}}</h2>
                        </div>
                    </div>
                    <div class="article-details">
                        <p>{{ $data->class_desc}} </p>
                        <hr>
                        <div class="row">

                        </div>
                    </div>
                </article>
            </a>
        </div>
        @endforeach 
    </div>
</body>
@endsection