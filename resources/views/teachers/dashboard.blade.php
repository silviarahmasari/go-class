@extends('layout.mainlayout')
@section('title','Teachers Home')
@section('PWBF','')

@section('content')
<div class="container px-4">
    <div class="section-header">
        <div class="container-fluid">
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('teacher.classes.show', $class[0]->class_id)}}">
                        <h5>Streaming</h5>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('teacher.task.index', $class[0]->class_id)}}">
                        <h5>Tugas Kelas</h5>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('teacher.orang', $class[0]->class_id) }}">
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
                        <b class="card-text text-bg-primary">{{ $class[0]->class_code }}</b>
                    </div>
                </div>
            </div>
            <div class="col col-9 pt-4">
                <div class="card rounded-lg shadow-primary">
                    <div class="card-body">
                        <div id="closeForm">
                            <a type="button" class="text-primary" id="newPost"><h5>Umumkan sesuatu untuk kelas Anda</h5></a>
                        </div>    
                        <div id="openForm">
                            <form action="{{ route('teacher.post.store', $class[0]->class_id) }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="post_title">Judul Post</label>
                                    <input id="post_title" class="form-control" type="text" name="post_title">
                                </div>
                                <div class="form-group">
                                    <label for="post_description">Deskripsi Post</label>
                                    <textarea id="post_description" class="form-control" type="text" name="post_description"></textarea>
                                </div>
                                <div class="form-group">    
                                    <label for="post_file">Upload File</label>
                                    <input id="post_file" class="form-control" type="file" name="post_file">
                                </div>    
                                <div class="form-group">
                                    <a class="btn btn-secondary" id="cancelPost">batal</a>
                                    <button class="btn btn-success">simpan</button>
                                </div>
                            </form>    
                        </div>
                    </div>
                </div>
                @foreach ($posts as $post)
                    <div class="card rounded-lg">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->post_title }}</h5>
                            <h6 class="card-subtitle  text-muted text-sm">oleh {{ $post->name }}</h6>
                            <p class="card-text">{{ $post->post_description }}</p>
                            <a class="card-link" type="button" target="_blank">
                                @if ($post->post_file != '')
                                    <div class="card card-danger p-2 px-2">
                                        <b class="text-primary"><li class="far fa-folder-open"></li> {{ $post->post_file }}</b>
                                    </div>
                                @endif
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script>
    $(document).ready(function() {
        $("#openForm").hide();

        $( "#newPost" ).click(function() {
            $("#closeForm").hide();
            $( "#openForm" ).show( 500 );
        });

        $( "#cancelPost" ).click(function() {
            $("#openForm").hide();
            $( "#closeForm" ).show( 200 );
        });
    })   

</script>