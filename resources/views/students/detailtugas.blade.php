@extends('layout.mainlayout')
@section('title','Class')
@section('PWBF','')

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="row justify-content-center">
            @foreach ($tugas as $tasks)
                <div class="col col-8 pt-2">
                    <div class="card rounded-lg">
                        <div class="card-body m-3">
                            <h4 class="card-title">{{ $tasks->task_title }}</h4>
                            <h6 class="text-muted">{{ $tasks->name }}</h6><hr>
                            <p>{{ $tasks->task_description }}</p><hr>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col col-4 pt-2">
                <div class="card rounded-lg">
                    <div class="card-body">
                        <form action="">
                            <div class="container p-3">
                                <h4>Tugas Anda</h4><br>
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary w-full">Tandai dan Selesai</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection