@extends('layout.mainlayout')
@section('title','Class')
@section('PWBF','')

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col col-8 pt-2">
                <div class="card rounded-lg">
                    <div class="card-body m-3">
                        <h4 class="card-title">{{ $detail[0]->task_title }}</h4>
                        <h6 class="text-muted">{{ $detail[0]->name }}</h6><hr>
                        <p>{{ $detail[0]->task_description }}</p><hr>
                    </div>
                </div>
            </div>
            <div class="col col-4 pt-2">
                <div class="card rounded-lg">
                    <div class="card-body">
                        <form action="{{ route('add.result', $detail[0]->task_id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="container p-3">
                                <h4>Tugas Anda</h4><br>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <input type="text" class="form-control" id="result_description" name="result_description">
                                </div>
                                <div class="form-group">
                                    <label for="">Upload Jawaban</label>
                                    <input class="form-control" type="file" id="result_file" name="result_file">
                                </div>
                                <button type="submit" class="btn btn-primary w-full">Tandai dan Selesai</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card rounded-lg">
                    <div class="card-body">
                        @foreach ($detail as $doc)
                            <div class="container">
                                <a class="card-link" type="button" target="_blank" href="{{ url('result_tasks/'. $doc->result_file) }}">
                                    @if ($doc->result_file != '')
                                        <div class="card card-danger p-2 px-2">
                                            <b class="text-primary"><li class="far fa-folder-open"></li> {{ $doc->result_file }}</b>
                                        </div>
                                    @endif
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection