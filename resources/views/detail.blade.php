@extends('layout.template')

@section('title', $laptop ? $laptop->nama : 'Detail Laptop')

@section('content')
    @if ($laptop)
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-9">
                    <div class="card-body">
                        <h2 class="card-title">{{ $laptop->nama }}</h2>
                        <p class="card-text">{{ $laptop->sinopsis }}</p>
                        <p class="card-text">Kategori :
                            {{ $laptop->category ? $laptop->category->nama_kategori : 'Tidak ada kategori' }}</p>
                        <p class="card-text">Tahun : {{ $laptop->tahun }}</p>
                        <p class="card-text">Brand : {{ $laptop->brand }}</p>
                        <a href="/" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <img src="/images/{{ $laptop->foto_sampul }}" class="img-fluid rounded-end" alt="...">
                </div>
            </div>
        </div>
    @else
        <p>Data laptop tidak ditemukan.</p>
    @endif
@endsection
