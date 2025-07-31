@extends('layouts.master')

@section('hero')
    @include('hero.about', ['title' => 'Tentang']) {{-- Bisa pakai variabel judul --}}
@endsection

@section('content')
    @include('include.about')
@endsection
