@extends('layouts.app')

@section('title', 'Create Groups')

@section('content')

<form action="/groups" method="post">
@csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Nama</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp" value="{{ old('nama') }}">
  </div>
  @error('name')
    <div class="alert alert-danger"> {{ $message }}
    </div>
  @enderror
  <div class="form-group">
    <label for="exampleInputPassword1">Deskripsi</label>
    <input type="text" class="form-control" name="description" id="exampleInputPassword1" value="{{ old('no_tlp') }}">
  </div>
  @error('description')
    <div class="alert alert-danger"> {{ $message }}
    </div>
  @enderror
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection

    
