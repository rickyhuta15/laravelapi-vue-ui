@extends('layouts.app')

@section('title', 'Groups')

@section('content')
<a href="/groups/create" class="card-link btn-primary">Tambah Groups </a>

@foreach($groups as $group)
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <a  href="/groups/{{ $group['id'] }}" class="card-title">{{ $group['name'] }}</a>

    <p class="card-text">{{ $group['description'] }}</p>
      <hr>
      <a href="/groups/addmember/{{ $group['id'] }}" class="card-link btn-primary">Tambah Anggota Group </a>
      <ul class="list-group">
      @foreach ($group->friends as $friend)
        <li class="list-group-item d-flex justify-content-between align-items-center">
          {{ $friend->nama }}
          <form action="/groups/deletemember/{{ $friend['id'] }}" method="post">
          <?php // penulisan {{group['id']}} bisa diganti dengan {{$group->id}} ?>
          @csrf
          @method('PUT')
          <button class="card-link btn-danger">Hapus</button>
          </form>
        </li>
      @endforeach
      </ul>
      
      <hr>
    
    <a href="/groups/{{ $group['id'] }}/edit" class="card-link btn-warning">Edit Groups</a>
    <?php //btn pada class di atas berfungsi untuk memberi warna sesuai kebutuhan ?>
    <form action="/groups/{{ $group['id'] }}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit" class="card-link btn-danger">Hapus Groups</button>
    </form>
    
  </div>
</div>

@endforeach
    {{ $groups->links() }}
    <? // links berfungsi untuk membuat button previous dan next
@endsection

    
