@extends('layout.mainlayout')
@section('title','Mata Kuliah')
@section('PWBF','')

@section('content')
<body>
    <div class="section-header">
        <div class="card">
            <div class="card-header">
                <h4>Data Mata Kuliah</h4>
                <div class="card-header-form">
                    <button class="btn btn-primary btn-lg"><i></i>Tambah</button>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped">
                    <tr class="text-center">
                        <th>ID Class</th>
                        <th>Class Code</th>
                        <th>Class Name</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td>Create a mobile app</td>
                        <td class="align-middle">
                            <div class="progress" data-height="4" data-toggle="tooltip" title="100%">
                                <div class="progress-bar bg-success" data-width="100"></div>
                            </div>
                        </td>
                        <td>
                            <img alt="image" src="assets/img/avatar/avatar-5.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Wildan Ahdian">
                        </td>
                        <td>2018-01-20</td>
                        <td><div class="badge badge-success">Completed</div></td>
                        <td>
                            <a href="#" class="btn btn-warning"><i class="fas fa-pen"></i> Edit</a>
                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection