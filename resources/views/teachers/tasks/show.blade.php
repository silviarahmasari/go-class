@extends('layout.mainlayout')
@section('title','Class')
@section('PWBF','')

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="row justify-content-center">
            {{-- @foreach ($tugas as $tasks) --}}
                <div class="col col-4 pt-2">
                    <div class="card rounded-lg">
                        <div class="card-body m-3">
                            <h4 class="card-title">List Siswa</h4>
                            {{-- <h6 class="text-muted">Test</h6><hr> --}}
                            @foreach ($results as $data)
                                <a onclick="" class="btn text-primary">{{ $data->name }}</a><hr>
                            @endforeach
                        </div>
                    </div>
                </div>
            {{-- @endforeach --}}
            <div class="col col-8 pt-2">
                <div class="card rounded-lg">
                    <div class="card-body">
                        <div class="container p-3">
                            <h4>Jawaban Siswa</h4><br>
                            <div id="taskResult">
                                {{-- @foreach ( as ) --}}
                                <label for="result_description">Deskripsi Jawaban</label>
                                <p id="result_description">INI Deskripsi Jawaban</p>
                                {{-- @endforeach --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    
</script>