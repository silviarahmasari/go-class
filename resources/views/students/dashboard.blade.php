@extends('layout.mainlayout')
@section('title','Student Dashboard')
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
            <img class="rounded-lg img-fluid" style="max-width: 100%" alt="" src="https://img.freepik.com/free-vector/night-rice-field-terraces-asian-mountains-landscape-with-paddy-plantation-cascades-chinese-agricultural-farm-dark-starry-sky-with-full-moon-glowing-fireflies-cartoon-vector-illustration_107791-10584.jpg?w=1380&t=st=1670643219~exp=1670643819~hmac=29c00556c78936c881e21d474eff4f6309e05dfe521116831ef9c97bcbe2e394">
            <div class="col col-3 pt-4">
                <div class="card rounded-lg">
                    <div class="card-body">
                        <h6 class="text-warning text-center card-title">Semoga harimu menyenangkan!</h6>
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
                            <form action="{{ route('students.insertposts', $class[0]->id_class) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="my-input">Judul Postingan</label>
                                    <input id="my-input" class="form-control" type="text" name="post_title" required>
                                </div>
                                <div class="form-group">
                                    <label for="my-input">Deskripsi</label>
                                    <input id="my-input" class="form-control" type="text" name="post_description">
                                </div>
                                <div class="form-group">
                                    <label for="my-input">Upload sesuatu (Opsional)</label>
                                    <input id="my-input" class="form-control" type="file" name="post_file">
                                </div>
                                <div class="form-group">
                                    <a class="btn btn-secondary" id="cancelPost">Batal</a>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @foreach ($posts as $post)
                    <div class="card rounded-lg">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->post_title }}</h5>
                            <h6 class="card-subtitle text-muted text-sm">oleh {{ $post->name }}</h6>
                            <p class="card-text">{{ $post->post_description }}</p>
                            
                            <a class="card-link" type="button" target="_blank" href="{{ url('post_files/'. $post->post_file) }}">
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