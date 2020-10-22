@extends('layouts.app')

@section('title', 'Title Pake Yield')

@section('content')

@foreach($friends as $friend)

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">{{ $friend['nama'] }}</h5>
    <h6 class="card-subtitle mb-2 text-muted">{{ $friend['no_tlp'] }}</h6>
    <p class="card-text">{{ $friend['alamat'] }}</p>
    
    <a href="#" class="card-link btn-warning">Edit Kontak</a>
    <a href="#" class="card-link btn-danger">Hapus Kontak</a>
    <?php //btn pada class di atas berfungsi untuk memberi warna sesuai kebutuhan ?>
  </div>
</div>

@endforeach
    {{ $friends->links() }}
@endsection

    
