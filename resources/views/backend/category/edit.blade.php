@extends('layouts.backend')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Edit category
                </div>
                <div class="card-body">
                    <form action="{{ route('category.update', $category->id ) }}" method="post">
                        <div class="mb-2">
                            <table for="">Nama kategori</table>
                            <input type="text" name="name" value="{{ $category->name }}" 
                            class="form-control @error ('name') is-invalid @enderror">
                            @error('name')
                            <span class="invalid-feedback" role="alter">
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
