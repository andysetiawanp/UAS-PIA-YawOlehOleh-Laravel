@extends('layouts.app')

@section('title', 'create')
@section('content')
<form action="/gifts" method='POST'>
  @csrf
  <div a href=""class="form-group" >
    <label for="exampleInputEmail1">Gambar</label>
    <input type="file" class="form-control" id="exampleInputEmail1" name="gambar" aria-describedby="emailHelp" value="{{ old('gambar')}}">
    @error('gambar')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  <div class="form-group">
    <label for="exampleInputEmail1">Oleh-oleh</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="oleholeh" aria-describedby="emailHelp" value="{{ old('oleholeh')}}">
    @error('oleholeh')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Jenis</label>
    <input type="text" class="form-control" name="jenis" id="exampleInputPassword1" value="{{ old('jenis')}}">
    @error('jenis')
    <div class="alert alert-danger">{{ $message }}</div>
    <div class="form-group">
    <label for="exampleInputPassword1">Harga</label>
    <input type="text" class="form-control" name="harga" id="exampleInputPassword1" value="{{ old('harga')}}">
    @error('harga')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<div a href=""class="form-group" >
    <label for="exampleInputEmail1">Data ID</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="data_id" aria-describedby="emailHelp" value="{{ old('data_id')}}">
    

  </div>
  <button type="submit" class="btn btn-outline-secondary">Tambah</button>
</form>

@endsection