@extends('layout.mainlayout')
@section('title','Scores')
@section('PWBF','')

@section('custom_css')
{{-- <link rel="stylesheet" href="{{asset('assets/modules/prism/prism.css')}}"> --}}
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col col-12 pt-2">
            <div class="card rounded-lg" >
                <div class="card-body" >
                    <div class="container p-3">
                        <div class="card">
                            <div class="card-header">
                                <h4>Detail Siswa</h4>
                                <div class="card-header-action">
                                    <a data-collapse="#detail_siswa" class="btn btn-icon btn-info" href="#"><i class="fas fa-minus"></i></a>
                                </div>
                            </div>
                            <div class="collapse show" id="detail_siswa">
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <th scope="col" class="col col-6">Nama</th>
                                                <th scope="col" class="col col-6">{{ $user[0]->name }}</th>
                                            </tr>
                                            <tr>
                                                <th scope="col" class="col col-6">Email</th>
                                                <th scope="col" class="col col-6">{{ $user[0]->email }}</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                {{-- <div class="card-footer"></div> --}}
                            </div>
                        </div>
                        @if ($score->count() != 0)
                        <p>Nilai : {{ $score[0]->result_score }}</p>
                        @else
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('teacher.resultscore.store', [$user[0]->id, $results[0]->task_id]) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="result_score">Masukkan Nilai</label>
                                        <input id="result_score" class="form-control" type="text" name="result_score">
                                    </div>  
                                    <div class="form-group">
                                        <button class="btn btn-success">simpan</button>
                                    </div>
                                </form>  
                            </div>
                        </div>
                        @endif
                        <div class="card">
                            <div class="card-header">
                                <h4>Jawaban Siswa</h4>
                            </div>
                            @foreach ($results as $data)
                            <div class="card">
                                <div class="card-header">
                                    <h4>Jawaban {{ $loop->iteration }}</h4>
                                </div>
                                <div class="card-body">
                                    {{ $data->result_description}}
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom_script')
{{-- <script src="{{asset('assets/modules/prism/prism.js')}}"></script> --}}
<script src="{{asset('assets/js/page/bootstrap-modal.js')}}"></script>
@endsection