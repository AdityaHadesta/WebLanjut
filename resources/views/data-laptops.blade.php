@extends('layout.template')

@section('title', 'Data Laptop Pemoggraman')

@section('content')

    <h1>Daftar Laptop Gaming</h1>
    <a href="/laptops/create" class="btn btn-primary"> Tambah Laptop</a>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Kategori</th>
                <th scope="col">Tahun</th>
                <th scope="col">Brand</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($laptops as $laptop)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $laptop->nama }}</td>
                    <td>{{ $laptop->category->nama_kategori }}</td>
                    <td>{{ $laptop->tahun }}</td>
                    <td>{{ $laptop->brand }}</td>
                    <td class="text-nowrap">
                        <a href="/laptop/{{ $laptop['id'] }}/edit" class="btn btn-warning">Edit</a>
                        <a href="/laptop/delete/{{ $laptop->id }}" class="btn btn-danger"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $laptops->links() }}
    </div>
@endsection
