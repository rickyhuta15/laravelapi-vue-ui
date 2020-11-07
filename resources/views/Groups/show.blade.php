@extends('layouts.app')

@section('title', 'Show Groups')

@section('content')
<div class="card">
  <div class="card-body">
<h3> Nama Group : {{ $group['name'] }} </h3>
<h3> Deskripsi Group : {{ $group['description'] }} </h3>
  </div>
</div>
@endsection

    
