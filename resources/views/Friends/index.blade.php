@extends('layouts.app')

@section('title', 'Title Pake Yield')

@section('content')

@foreach($friends as $friend)

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <a  href="/friends/{{ $friend['id'] }}" class="card-title">{{ $friend['nama'] }}</a>
    <h6 class="card-subtitle mb-2 text-muted">{{ $friend['no_tlp'] }}</h6>
    <p class="card-text">{{ $friend['alamat'] }}</p>
    
    <a href="/friends/{{ $friend['id'] }}/edit" class="card-link btn-warning">Edit Kontak</a>
    <?php //btn pada class di atas berfungsi untuk memberi warna sesuai kebutuhan ?>
    <form action="/friends/{{ $friend['id'] }}" method="post">
    @csrf
    @method('DELETE')
    <button class="card-link btn-danger">Hapus Kontak</button>
    </form>
    
  </div>
</div>

@endforeach
    {{ $friends->links() }}
    <? // links berfungsi untuk membuat button previous dan next
@endsection

    
