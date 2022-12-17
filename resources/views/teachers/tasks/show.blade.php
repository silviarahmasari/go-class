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