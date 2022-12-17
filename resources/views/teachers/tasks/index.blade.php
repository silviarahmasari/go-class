@extends('layout.mainlayout')
@section('title','Tasks')
@section('PWBF','')

@section('content')
<div class="container px-2">
    <div class="section-header">
        <div class="container-fluid">
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('teacher.classes.show', $id) }}">
                        <h5>Streaming</h5>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('teacher.task.index', $id) }}">
                        <h5>Tugas Kelas</h5>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('teacher.orang', $id) }}">
                        <h5>Orang</h5>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="card rounded-lg col-12 p-3">
                <div class="card rounded-lg">
                    <div class="card-body">
                        <div id="closeForm">
                            <a type="button" class="text-primary" id="newPost">Tambahkan tugas baru</a>
                        </div>    
                        <div id="openForm">
                            <form action="{{ route('teacher.task.store', $id) }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="task_title">Nama Tugas</label>
                                    <input id="task_title" class="form-control" type="text" name="task_title">
                                </div>
                                <div class="form-group">
                                    <label for="task_description">Deskripsi Tugas</label>
                                    <textarea id="task_description" class="form-control" type="text" name="task_description"></textarea>
                                </div>
                                <div class="form-group">    
                                    <label for="task_file">Upload Tugas</label>
                                    <input id="task_file" class="form-control" type="file" name="task_file">
                                </div>    
                                <div class="form-group">
                                    <a class="btn btn-secondary" id="cancelPost">batal</a>
                                    <button class="btn btn-success">simpan</button>
                                </div>
                            </form>    
                        </div>
                    </div>
                </div>
                <div class="card rounded-lg">
                    <div class="card-body">
                        @if ($tasks->count() != 0) 
                            @foreach ($tasks as $data)
                            <h6>List Tugas</h6><br>
                                <a href="{{ route('teacher.task.show', [$data->class_id, $data->id]) }}">
                                    <div class="row justify-content-center">
                                        <div class="col-1 pl-5 pt-2">
                                            <li class="fas fa-book"></li>
                                        </div>
                                        <div class="col-11 pt-1">
                                            <h5>{{ $data->task_title }}</h5>
                                        </div>
                                    </div>
                                </a>
                            <hr>
                            @endforeach
                        @else
                            <p>Belum ada tugas yang diberikan</p>
                        @endif
                        
                    </div>
                </div>
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