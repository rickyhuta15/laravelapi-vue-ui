@extends('layouts.app')

@section('title', 'Title Pake Yield')

@section('content')

<form action="/friends" method="post">
@csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Nama</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="nama" aria-describedby="emailHelp" value="{{ old('nama') }}">
  </div>
  @error('nama')
    <div class="alert alert-danger"> {{ $message }}
    </div>
  @enderror
  <div class="form-group">
    <label for="exampleInputPassword1">No Telepon</label>
    <input type="text" class="form-control" name="no_tlp" id="exampleInputPassword1" value="{{ old('no_tlp') }}">
  </div>
  @error('no_tlp')
    <div class="alert alert-danger"> {{ $message }}
    </div>
  @enderror
  <div class="form-group">
    <label for="exampleInputPassword1">Alamat</label>
    <input type="text" class="form-control" name="alamat" id="exampleInputPassword1" value="{{ old('alamat') }}">
  </div>
  @error('alamat')
    <div class="alert alert-danger"> {{ $message }}
    </div>
  @enderror
  <div class="form-group">
    <label for="exampleInputPassword1">Kode Group</label>
    <input type="text" class="form-control" name="groups_id" id="exampleInputPassword1" value="{{ old('groups_id') }}">
  </div>
  @error('groups_id')
    <div class="alert alert-danger"> {{ $message }}
    </div>
  @enderror
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection

    
