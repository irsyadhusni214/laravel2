@extends('layouts.app')
@section('content')
<div class='container'>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Data Hobi
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Nama Hobi</label>
                        <input type="text" name="nama" value="{{$hobi->hobi}}" class="form-control" readonly>
                    </div>
                        <div class="form-group">
                        <a href="{{url()->previous()}}"class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
