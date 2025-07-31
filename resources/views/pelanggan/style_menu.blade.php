@extends('layouts.master')

@section('hero')
    @include('hero.style', ['title' => 'Pelayanan']) {{-- Bisa pakai variabel judul --}}
@endsection

@section('content')
    @include('include.menu')
@endsection
