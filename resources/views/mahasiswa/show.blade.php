@extends('layouts.app')
@section('content')
<div class='container'>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                     Data Mahasiswa
                </div>
                <div class="card-body">
                    <form action="{{route('mahasiswa.show', $mhs->id)}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama Mahasiswa</label>
                            <input type="text" name="nama" value="{{$mhs->nama}}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Nim Mahasiswa</label>
                            <input type="number" name="nim" value="{{$mhs->nim}}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Dosen</label>
                            <input type="text" name="id_dosen" value="{{$mhs->dosen->nama}}" class="form-control" readonly>
                        </div>

                        <div class="form-group">
                        <a href="{{url()->previous()}}"class="btn btn-primary">Kembali</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
