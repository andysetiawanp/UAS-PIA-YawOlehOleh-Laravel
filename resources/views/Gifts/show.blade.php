@extends('layouts.app')

@section('title', 'Oleh-oleh')
@section('content')
    <div class="card">
    <h3><img src="{{ url('gambar') }}/{{$gift['gambar']}}" width="150" heigh="200"></img></h3>
    <h3>Oleh-oleh : {{ $gift['oleholeh'] }}</h3>
    <h3>Jenis : {{ $gift['jenis'] }}</h3>
    </div>
    
@endsection
   