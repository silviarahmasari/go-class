@extends('layout.mainlayout')
@section('title','Task Details')
@section('PWBF','')

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="card col-12">
                <div class="card-header">
                    <h4>Detail Tugas <a href="#" data-toggle="modal" data-target="#editTugas" title="Edit Kelas"><li class="fas fa-edit"></li></a></h4>
                    <div class="card-header-action">
                        <a data-collapse="#detail_siswa" class="btn btn-icon btn-info" href="#"><i class="fas fa-minus"></i></a>
                    </div>
                </div>
                <div class="collapse show" id="detail_siswa">
                    <div class="card-body">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th>Judul Tugas</th>
                                    <th>: {{ $task[0]->task_title }}</th>
                                </tr>
                                <tr>
                                    <th>Deskripsi Tugas</th>
                                    <th>: {{ $task[0]->task_description }}</th>
                                </tr>
                                <tr>
                                    <th>File Tugas</th>
                                    <th>: </th>
                                </tr>
                            </tbody>
                        </table>
                        <a class="card-link" type="button" target="_blank" href="{{ url('task_files/'. $task[0]->task_file) }}">
                            @if ($task[0]->task_file != '')
                                <div class="card card-danger p-2 px-2">
                                    <b class="text-primary"><li class="far fa-folder-open"></li> {{ $task[0]->task_file }}</b>
                                </div>
                            @endif
                        </a>
                    </div>
                    {{-- <div class="card-footer"></div> --}}
                </div>
            </div>
        </div>    
        <div class="row justify-content-center">
            {{-- @foreach ($tugas as $tasks) --}}
                <div class="col col-4 pt-2">
                    <div class="card rounded-lg">
                        <div class="card-body m-3">
                            <h4 class="card-title">List Siswa</h4>
                            @foreach ($users as $data)
                            <div class="list-group" id="list-tab" role="tablist">
                                <a href="#" onclick="getStudentResult({{ $data->user_id }}, {{ $data->task_id }})" class="btn btn-outline-primary">{{ $data->name }}</a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            {{-- @endforeach --}}
            <div class="col col-8 pt-2">
                <div class="card rounded-lg" >
                    <div class="card-body" >
                        <div class="container p-3">
                            <div class="card" id="taskResult">  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- @foreach ($class as $data) --}}
<div class="modal fade" tabindex="-2" role="dialog" id="editTugas">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Tugas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container px-3 pt-2">
                    <div class="card shadow-none">
                        <form action="{{ route('teacher.task.update', [$task[0]->class_id, $task[0]->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group">
                                    <label>Judul Tugas</label>
                                    <input type="text" name="task_title" class="form-control" value="{{ $task[0]->task_title }}">
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi Tugas</label>
                                    <input type="text" name="task_description" class="form-control" value="{{ $task[0]->task_description }}">
                                </div>
                                <div class="form-group">
                                    <label>File Tugas</label>
                                    <input type="file" name="task_file" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-outline-dark">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- @endforeach --}}

<script> 
    function getStudentResult(id_user, id_task) {
        $("#taskResult").load(window.location.href + " #taskResult" );
        $.ajax({
            url: "/teacher/resulttask/show/" + id_user + "/" + id_task,
            type: "GET",
            dataType: 'json',
            success: function(response){
                console.log(response);
                
                count = 1;
                $("#taskResult").append(
                    $(`
                    <div class="col col-auto"><a class="btn btn-primary" href="/teacher/resultscore/show/`+id_user+`/`+id_task+`"><u>Lihat Nilai</u></i></a></div>
                    `)
                );

                $.each(response,function(key, response){
                    $("#taskResult").append(
                        $(`   
                            <div class="card-header">
                                <h4>Jawaban ` + count + `</h4>
                            </div>
                            <div class="card-body">`
                                + response.result_description + 
                                `<div class="container pt-3" id="resultFile`+key+`">
                                    
                                </div>
                            </div>
                        `)
                    );
                    if (response.result_file !== null) {
                        $("#resultFile"+key).append(`
                            <a class="card-link" type="button" target="_blank" href="{{ url('result_tasks/`+response.result_file+`') }}">
                                <div class="card card-danger p-2 px-2">
                                    <b class="text-primary"><li class="far fa-folder-open"></li>`+response.result_file+`</b>
                                </div>
                            </a>
                        `);
                    }
                count++
                })
            },
            error: function(xhr, status, error) {
                alert(error);
            }
            
        });
    }
</script>