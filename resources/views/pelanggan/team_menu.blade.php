@extends('layouts.master')

@section('hero')
    @include('hero.team', ['title' => 'Tim']) {{-- Bisa pakai variabel judul --}}
@endsection

@section('content')
    @include('include.team')
@endsection
