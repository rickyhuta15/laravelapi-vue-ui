@extends('layouts.app')

@section('title', 'Add Member')

@section('content')

<form action="/groups/addmember/{{ $group->id }}" method="post">
@csrf
@method('PUT')
  <div class="form-group">
    <label for="exampleInputEmail1">Nama</label>
    <select class="form-select" aria-label="Default select example" name="friends_id">
      <option selected>Pilih Teman :</option>
        @foreach($friends as $f)
          <option value="{{ $f->id }}">{{ $f->nama }}</option>
        @endforeach 
    </select>
  </div>
  
  
  <button type="submit" class="btn btn-primary">Add Member</button>
</form>

@endsection

    
