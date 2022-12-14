@extends('layout.mainlayout')
@section('title','Beranda')
@section('PWBF','')
@section('beranda')
<li class="dropdown dropdown-list-toggle">
    <a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep">
        <i class="fas fa-plus"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-sm-right rounded-lg">
        <div class="">
          <a href="#" data-toggle="modal" data-target="#buatKelas" class="dropdown-item dropdown-item-unread">
              <h6>Buat Kelas</h6>
          </a>
          <a href="#" data-toggle="modal" data-target="#gabungKelas" class="dropdown-item dropdown-item-unread">
              <h6>Gabung Kelas</h6>
          </a>
        </div>
    </div>
</li>
@endsection

@section('content')
<style>
    .banner {
        width: 50px;
    }
</style>
<body>
    <div class="row px-lg-5">
        @if ($class->count() != 0) 
            @foreach ($class as $data)
                <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                @if ($data->is_owner == 1)
                    <a href="{{ route('teacher.classes.show', $data->class_id) }}">
                        <article class="article">
                            <div class="article-header">
                                <div class="article-image" data-background="{{ asset ('assets/img/class/banner-class.jpg') }}"></div>
                                <div class="article-title text-white pl-3 pb-0">
                                    <h2>{{ $data->class_name}}</h2>
                                </div>
                            </div>
                            <div class="article-details">
                                <p>{{ $data->class_desc}} </p>
                                <hr>
                                <div class="container p-1 pb-3">
                                    <a href="#" data-toggle="modal" data-target="#editKelas" title="Edit Kelas"><li class="fas fa-edit" style="position: absolute; right: 6%"></li></a>
                                </div>
                            </div>
                        </article>
                    </a>
                @else
                    <a href="{{ route('students.dashboard', $data->class_id) }}">
                        <article class="article">
                            <div class="article-header">
                                <div class="article-image" data-background="{{ asset ('assets/img/class/banner-class.jpg') }}"></div>
                                <div class="article-title text-white pl-3 pb-0">
                                    <h2>{{ $data->class_name}}</h2>
                                </div>
                            </div>
                            <div class="article-details">
                                <p>{{ $data->class_desc}} </p>
                                <hr>
                            </div>
                        </article>
                    </a>
                @endif 
                </div>
                
            @endforeach
        @endif 
    </div>
</body>
@endsection

{{-- Modal Buat Kelas --}}
<div class="modal fade" tabindex="-2" role="dialog" id="buatKelas">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Buat Kelas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container px-3 pt-2">
                    <div class="card shadow-none">
                        <form action="{{ route('buatkelas') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Kode Kelas</label>
                                <input type="text" name="class_code" placeholder="Kode Kelas" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nama Kelas</label>
                                <input type="text" name="class_name" placeholder="Nama Kelas" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Deskripsi Kelas</label>
                                <input type="text" name="class_desc" placeholder="Deskripsi Kelas" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-outline-dark">Buat Kelas</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal Edit Kelas --}}
@foreach ($class as $data)
<div class="modal fade" tabindex="-2" role="dialog" id="editKelas">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Kelas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container px-3 pt-2">
                    <div class="card shadow-none">
                        <form action="{{ route('editkelas', $data->class_id) }}" method="POST">
                            @csrf
                                <div class="form-group">
                                    <label>Kode Kelas</label>
                                    <input type="text" name="class_code" placeholder="Kode Kelas" class="form-control" value="{{ $data->class_code }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Nama Kelas</label>
                                    <input type="text" name="class_name" placeholder="Nama Kelas" class="form-control" value="{{ $data->class_name }}">
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi Kelas</label>
                                    <input type="text" name="class_desc" placeholder="Deskripsi Kelas" class="form-control" value="{{ $data->class_desc }}">
                                </div>
                                <button type="submit" class="btn btn-outline-dark">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

{{-- Modal Gabung Kelas --}}
<div class="modal fade" tabindex="-1" role="dialog" id="gabungKelas">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
            <div class="container px-3 pt-4">
                <div class="card shadow-none">
                    <p class="text-md-start accordion-button">Saat ini Anda login sebagai</p>
                    <div class="row">
                        <div class="col col-auto">
                            <img alt="image" src="{{ asset('assets/stisla/img/avatar/avatar-1.png') }}" style="width:40px" class="rounded-circle mr-1">
                        </div>
                        <div class="col col-auto">
                            <h5>{{ Auth::user()->name }}</h5>
                            <h6 class="text-muted">{{ Auth::user()->email }}</h6>
                        </div>
                    </div><hr>
                </div>
                <div class="card shadow-none">
                    <h4>Kode Kelas</h4>
                    <p>Mintalah kode kelas kepada pengajar, lalu masukkan kode di sini.</p>
                    <form action="{{ route('gabungkelas') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="class_code" placeholder="Kode Kelas" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-outline-dark">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>