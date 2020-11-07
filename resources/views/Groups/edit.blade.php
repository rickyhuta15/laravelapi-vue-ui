@extends('layouts.app')

@section('title', 'Edit Group')

@section('content')

<form action="/groups/{{ $group['$id'] }}" method="POST">
  @csrf
  @method('PUT')
  <div class="form-group">
    <label for="exampleInputEmail1">Nama</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp" value="{{ old('name') ? old('name') : $group['name'] }}">
  </div>
  @error('name')
    <div class="alert alert-danger"> {{ $message }}
    </div>
  @enderror
  <div class="form-group">
    <label for="exampleInputPassword1">Deskripsi</label>
    <input type="text" class="form-control" name="description" id="exampleInputPassword1" value="{{ old('description') ? old('description') : $group['description'] }}">
  </div>
  @error('description')
    <div class="alert alert-danger"> {{ $message }}
    </div>
  @enderror
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection

    
