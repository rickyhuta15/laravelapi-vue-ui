@extends('layouts.app')

@section('title', 'Title Pake Yield')

@section('content')

@foreach($numbers as $number)

<h2>Urutan ke - {{ $number['ke'] }}</h2>
<h3>Nomor ke - {{ $number['nomor'] }}</h3>

@endforeach

@endsection

    
