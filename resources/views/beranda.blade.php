@extends('layout.mainlayout')
@section('title','Kelas')
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
            @if ($data->is_owner == 1)
                <a href="{{ route('teacher.classes.show', $data->class_id) }}">
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
                            <div class="row"></div>
                        </div>
                    </article>
                </a>
            @else
                <a href="{{ route('students.dashboard', $data->class_id) }}">
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
                            <div class="row"></div>
                        </div>
                    </article>
                </a>
            @endif 
        </div>
        @endforeach 
    </div>
</body>
@endsection