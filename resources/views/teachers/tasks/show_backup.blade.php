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
                                <a href="#" onclick="getStudentResult({{ $data->user_id }}, {{ $data->task_id }})" class="list-group-item list-group-item-action" id="list-home-list" data-toggle="list" role="tab" aria-selected="false">{{ $data->name }}</a>
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
                            {{-- <div id="closeForm">
                                <button class="btn btn-primary" id="newPost">Nilai</button>
                            </div>
                            <div>
                                <form action="{{ route('teacher.resultscore.store') }}" method="POST" id="openForm">
                                    @csrf
                                </form>
                            </div>   --}}
                            <div class="card" id="taskResult">
                                {{-- <div class="card-header">
                                    <h4 id="title"></h4>
                                    <div class="card-header-action">
                                        <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info" href="#"><i class="fas fa-minus"></i></a>
                                    </div>
                                </div>
                                <div class="collapse show" id="mycard-collapse" style="">
                                    <div class="card-body">
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>        
                    {{-- <div class="card-body">
                        <div class="container p-3">
                            <h4>Jawaban Siswa</h4>
                            <label for="result_description">Deskripsi Jawaban</label>
                            <div id="taskResult"></div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> --}}
<script> 
    function getStudentResult(id_user, id_task) {
        // $('#closeForm').load(window.location.href + " #closeForm");
        // $("#openForm").load(window.location.href + " #openForm" );
        $("#taskResult").load(window.location.href + " #taskResult" );
        // $("#closeForm").hide();
        // console.log(id_user + ' ' + id_task);
        $.ajax({
            url: "/teacher/resulttask/show/" + id_user + "/" + id_task,
            type: "GET",
            dataType: 'json',
            success: function(response){
                // console.log(response);
                
                count = 1;
                $("#taskResult").append(
                    $(`
                        <div id="closeForm">
                            <button class="btn btn-primary" id="newPost">Nilai</button>
                        </div>    
                        <div id="openForm">
                            <form>
                                <div class="form-group">
                                    <label for="result_score">Masukkan Nilai</label>
                                    <input id="result_score" class="form-control" type="text" name="result_score">
                                    <input id="user_id" class="form-control" type="hidden" name="user_id" value="`+ response[0].user_id +`">
                                    <input id="task_id" class="form-control" type="hidden" name="task_id" value="`+ response[0].task_id +`">
                                </div>  
                                <div class="form-group">
                                    <a class="btn btn-secondary" id="cancelPost">batal</a>
                                    <button class="btn btn-success" onclick="postStudentResultScore()">simpan</button>
                                </div>
                            </form>    
                        </div>
                        `)
                );
                
                $("#openForm").hide();

                $( "#newPost" ).click(function() {
                    $("#closeForm").hide();
                    $( "#openForm" ).show( 500 );
                });

                $( "#cancelPost" ).click(function() {
                    $("#openForm").hide();
                    $( "#closeForm" ).show( 200 );
                });

                function postStudentResultScore() {
                    var result_score = document.getElementById("result_score").value;
                    var id_user = document.getElementById("id_user").value;
                    var id_task = document.getElementById("id_task").value;
                    console.log(result_score);
                    console.log(id_user);
                    console.log(id_task);
                    alert();
                }

                $.each(response,function(key, response){
                    // console.log(response.result_description);
                    
                    $("#taskResult").append(
                        $(
                            `<div class="card">
                                <div class="card-header">
                                    <h4>Jawaban ` + count + `</h4>
                                </div>
                                <div class="card-body">`
                                    + response.result_description +    
                                `</div>
                            </div>`
                        )
                    );
                count++
                })

                // $("#bodyData").append(bodyData);
            },
            error: function(xhr, status, error) {
                alert(error);
            }
            
        });
    }

    function postStudentResultScore() {
        var result_score = document.getElementById("result_score").value;
        var id_user = document.getElementById("id_user").value;
        var id_task = document.getElementById("id_task").value;
        console.log(result_score);
        console.log(id_user);
        console.log(id_task);
        alert();
        // $.ajax({
        //     url:"/teacher/resultscore/store",
        //     method:"POST",
        //     data: {
        //         CSRF: getCSRFTokenValue(),
        //         result_score: result_score
        //     },
        //     success:function(response){
        //         alert(response);
        //         console.log(response);
        //         // var responseData = JSON.stringify(response);
        //         // var data = JSON.parse(responseData);
        //     },
        //     error: function(xhr, status, error) {
        //         alert(error);
        //     }
        // });
    }
</script>