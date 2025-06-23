@extends('layouts.backend')
@section('content')
<div class="container-fluid">
    <div classs="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Tambah category
                </div>
                <div class="card-body">
                    <form action="{{ route('category.store') }}" method="post">
                        <table foe="">Nama ketegory</table>
                        <input type="text" name="name" class="form-control" @error('name') is-invalid @enderror">
                        @error('name')
                        <span class="invalid-feedback" rolr="alter">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                </div>
                        <div class="mb-2" >
                            <button type="submit" class="btn btn-sm btn-outline-priymary">simpan</button>
                            <button type="reset" class="btn btn-sm btn-outline-warning">reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection