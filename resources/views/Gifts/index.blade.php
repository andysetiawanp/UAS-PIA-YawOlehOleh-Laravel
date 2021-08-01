@extends('layouts.app')

@section('title', 'Gifts')
@section('content')
<a href="/gifts/create" type="button" class="btn btn-primary mb-2 btn-sm">Tambah Oleh-oleh</a>
<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">Oleh-oleh</th>
      <th scope="col"></th>
      <th scope="col">Jenis</th>
      <th scope="col">Harga</th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach ($gifts as $gift)
    <tr>
    <td><a href="/gifts/{{$gift->id}}" >{{$gift->oleholeh}}</td>
    <td><img src="{{ url('image') }}/{{$gift['gambar']}}" width="150" heigh="200"></img></td>
    <td>{!!$gift->jenis !!}</td>
    <td>{!!$gift->harga !!}</td>
    <td><a href="/gifts/{{$gift->id}}/edit"><button type="button" class="btn btn-outline-secondary">Edit</a></button></td>
    <form action="/gifts/{{ $gift->id}}" method="POST">
    @csrf
    @method('DELETE')
    <td><button class="btn btn-outline-danger">Delete</button></td>
    </form>
    </tr>
    @endforeach
  </tbody>
</table>
<div>
    {{ $gifts -> links() }}
    </div>
@endsection