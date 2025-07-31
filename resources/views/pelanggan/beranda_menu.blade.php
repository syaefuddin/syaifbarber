@extends('layouts.master')

@section('hero')
    @include('hero.home') {{-- atau kasih variable kalau perlu --}}
@endsection

@section('content')
    {{-- Kamu bisa ambil konten lama dari pelanggan/home.blade.php dan pindahkan ke sini --}}
    @include('include.about')
    @include('include.menu')
    @include('include.team')
    {{-- Bisa tambahkan konten style dan semir juga di sini --}}
@endsection
