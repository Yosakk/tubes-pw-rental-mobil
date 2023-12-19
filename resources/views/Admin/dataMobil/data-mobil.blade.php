@extends('Admin.dashboard.admin-dashboard')

@section('content')

<head>
    <title>
        JogjaCar - Data Mobil
    </title>
</head>

<div class="container-details">
    <h1 class="fw-bold my-4 text-center">Data Mobil</h1>
    <div class="col d-flex">
        <div class="me-auto">
            <a href="{{ route('admin.create') }}" class="btn btn-primary">Tambah Mobil</a>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-flex col-md-flex col-sm-flex mt-2">
                <div class="card">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Bahan Bakar</th>
                                <th scope="col">Transmisi</th>
                                <th scope="col">Jumlah Kursi</th>
                                <th scope="col">Tahun Produksi</th>
                                <th scope="col">Warna</th>
                                <th scope="col">Tarif</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mobil as $mobil)
                            <tr>
                                <td>{{ $mobil['id_mobil'] }}</td>
                                <td>{{ $mobil['bahan_bakar'] }}</td>
                                <td>{{ $mobil['transmisi'] }}</td>
                                <td>{{ $mobil['jumlah_kursi'] }}</td>
                                <td>{{ $mobil['tahun_produksi'] }}</td>
                                <td>{{ $mobil['warna'] }}</td>
                                <td>{{ $mobil['tarif'] }}</td>
                                <td>{{ $mobil['status'] }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col">
                                            <a href="{{ route('admin.update', $mobil['id_mobil']) }}"> <button
                                                    class="btn btn-primary">Edit</button></a>
                                            <form action="{{ route('admin.delete', $mobil['id_mobil']) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger mt-2">Delete</button>
                                            </form>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection