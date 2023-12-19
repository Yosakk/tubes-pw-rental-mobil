@extends('Admin.dashboard.admin-dashboard')

@section('content')

<head>
    <title>JogjaCar - Data Mobil</title>
</head>

<style>
</style>

<div class="container-details">
    {{-- <h1 class="fw-bold my-4 text-center">Log In</h1> --}}
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-9 col-sm-flex mt-2">
                <div class="card">
                    <div class="card-body p-5">
                        <form class="mt-1" action="{{route('admin.edit', $mobil['id_mobil'])}}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-2">
                                <label for="registerModel" class="form-label">Model</label>
                                <input type="text" class="form-control" id="registerModel" name="registerModel"
                                    value="{{ $mobil['model'] }}">
                            </div>
                            <div class="mb-2">
                                <label for="registerFoto" class="form-label">Foto</label>
                                <input type="file" class="form-control" id="registerFoto" name="registerFoto"
                                    accept="image/*">
                            </div>
                            <div class="mb-2">
                                <label for="registerBahanBakar" class="form-label">Bahan Bakar</label>
                                <input value="{{ $mobil['bahan_bakar'] }}" type="text" class="form-control"
                                    id="registerBahanBakar" name="registerBahanBakar">
                            </div>
                            <div class="mb-2">
                                <label for="registerTransmisi" class="form-label">Transmisi</label>
                                <input value="{{ $mobil['transmisi'] }}" type="text" class="form-control"
                                    id="registerTransmisi" name="registerTransmisi">
                            </div>
                            <div class="mb-2">
                                <label for="registerKursi" class="form-label">Jumlah Kursi</label>
                                <input value="{{ $mobil['jumlah_kursi'] }}" type="number" class="form-control"
                                    id="registerKursi" name="registerKursi">
                            </div>
                            <div class="mb-2">
                                <label for="registerTahun" class="form-label">Tahun Produksi</label>
                                <input value="{{ $mobil['tahun_produksi'] }}" type="number" class="form-control"
                                    id="registerTahun" name="registerTahun">
                            </div>
                            <div class="mb-2">
                                <label for="registerWarna" class="form-label">Warna</label>
                                <input value="{{ $mobil['warna'] }}" type="text" class="form-control" id="registerWarna"
                                    name="registerWarna">
                            </div>
                            <div class="mb-2">
                                <label for="registerTarif" class="form-label">Tarif</label>
                                <input value="{{ $mobil['tarif'] }}" type="number" class="form-control"
                                    id="registerTarif" name="registerTarif">
                            </div>
                            <div class="mb-2">
                                <label for="registerStatus" class="form-label">Status</label>
                                <select name="registerStatus" id="registerStatus" class="form-select">
                                    <option value="">Pilih Status</option>
                                    <option value="Ready">Ready</option>
                                    <option value="Tidak Ready">Tidak Ready</option>
                                </select>
                            </div>
                            <div class="col-flex ms-auto col-md-flex col-sm-flex">
                                <button type="submit"
                                    class="btn btn-primary btn-confirm btn-block px-5 fw-semibold">Simpan</button>
                                <a href="{{ url('/dataMobil') }}" type="button"
                                    class="btn btn-danger btn-cancel btn-md btn-block px-5 fw-semibold">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection