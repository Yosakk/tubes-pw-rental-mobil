@extends('User.dashboard.user-dashboard')

@section('content1')

    <head>
        <title>JogjaCar - Home</title>

        <link rel="stylesheet" type="text/css" href="css/msdropdown/dd.css" />
    </head>

    <style>
        body {
            background-image: url("images/bg-rental.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            height: 100%;
            overflow-x: hidden;
            height: 100vh;
        }

        * {
            font-family: 'Inter', sans-serif;
        }

        .container-details {
            margin-top: 70px;
            align-items: center;
            justify-content: center;
            z-index: 2;
        }

        .container-content {
            border: 1px solid #A3A3A3;
            background-size: cover;
            background-position: center;
        }

        .header {
            font-family: 'Poppins', sans-serif;
        }

        .tombol {
            text-align: center;
            background-color: #003EB7;
        }

        .tombol-2 {
            background-color: #001A4E;
            pointer-events: none;
        }

        .container-image {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 0;
        }

        .container-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            aspect-ratio: 16/9;
        }

        .container-item {
            text-align: center;
            justify-content: center;
        }

        .container-detail p {
            color: #ffffff;
            text-shadow: 1px 1px 4px #000000a3;
        }
    </style>

    <div class="container-details">
        <div class="row" style="margin-bottom: 50px;">
            <div class="col-lg-12">
                <div class="container-detail text-center mx-auto my-5"
                    style="max-width: 70%; position: relative; z-index: 2;">
                    <p class="text" style="font-size: 50px; font-family: 'Inter', sans-serif; font-weight: 600">
                        <strong>Selamat Datang di JogjaCar</strong>
                    </p>
                    <p>JogjaCar adalah penyedia layanan car rental terkemuka yang berlokasi di Yogyakarta, Indonesia. Dengan
                        komitmen untuk memberikan pengalaman perjalanan yang tak terlupakan, JogjaCar telah menjadi pilihan
                        utama bagi pelanggan yang mencari kendaraan berkualitas dan layanan yang handal.</p>
                </div>
            </div>
        </div>

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ session('error') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        <form class="form-inline" method="POST" action="{{ route('transaksi.select-mobil') }}">
            @csrf
            <div class="card mt-4">
                <div class="row gx-2 mt-2 mx-2 d-block d-md-flex d-sm-flex row-md row-sm">
                    <div class="col">
                        <div class="container-content bg-white rounded py-2 px-2 my-2">
                            <label for="lokasiPengambilan" class="form-label">Lokasi Pengambilan</label>
                            <input type="text" class="form-control" name="lokasi_pengambilan" id="lokasiPengambilan" placeholder="">
                        </div>
                    </div>

                    <div class="col-lg col-md-flex">
                        <div class="container-content rounded bg-white py-2 px-2 my-2">
                            <div class="row">
                                <div class="col" style="border-right: 1px solid #A3A3A3">
                                    <label for="tanggalPengambilan" class="form-label">Tanggal Pengambilan</label>
                                    <input type="date" class="form-control" name="tanggal_pengambilan" id="tanggalPengambilan" placeholder=""
                                        min="">
                                </div>
                                <div class="col">
                                    <label for="jamPengambilan" class="form-label">Jam Pengambilan</label>
                                    <input type="time" min="06:00" max="21:00" name="jam_pengambilan" class="form-control"
                                        id="jamPengambilan" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg col-md-flex">
                        <div class="container-content rounded bg-white py-2 px-2 my-2">
                            <div class="row">
                                <div class="col" style="border-right: 1px solid #A3A3A3">
                                    <label for="tanggalPengembalian" class="form-label">Tanggal Pengambilan</label>
                                    <input type="date" class="form-control" name="tanggal_pengembalian" id="tanggalPengembalian" placeholder=""
                                        min="">
                                </div>
                                <div class="col">
                                    <label for="jamPengembalian" class="form-label">Jam Pengembalian</label>
                                    <input type="time" min="06:00" max="21:00" name="jam_pengembalian" class="form-control"
                                        id="jamPengembalian" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- @auth
                        <div class="col-lg-2 d-flex col-md col-sm">
                            <button type="submit"
                                class="tombol btn btn-primary my-2 w-100 d-flex justify-content-center align-items-center"
                                id="tombolForm">
                                <h3 class="d-lg-block fw-bold" style="color:white;">Lanjutkan</h3>
                            </button>
                        </div>
                    @endauth
                    @guest
                        <div class="col-lg-2 d-flex col-md col-sm">
                            <button
                                class="tombol-2 btn btn-primary my-2 w-100 d-flex justify-content-center align-items-center">
                                <h5 class="d-lg-block fw-bold opacity-50">Log In untuk Melanjutkan</h5>
                            </button>
                        </div>
                    @endguest --}}
                </div>
                {{-- <div class="row mx-2 d-block d-md-flex d-sm-flex row-md row-sm">
                    <div class="container-content rounded bg-white p-2 my-2">
                        <select name="id_mobil" id="selectMobil" class="form-select">
                            <option value="" selected disabled>Pilih Mobil</option>
                            @foreach ($mobil as $item)
                                <option value="{{ $item['id'] }}" data-image="{{ asset('images/mobil/' . $item['gambar']) }}">
                                    <div class="row d-flex justify-content-between">
                                        {{ $item['nama'] }}
                                    </div>
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div> --}}
                <div class="row mb-2 mx-2 d-block d-md-flex d-sm-flex row-md row-sm">
                    @auth
                        <button type="submit"
                            class="tombol btn btn-primary my-2 w-100 d-flex justify-content-center align-items-center"
                            id="tombolForm" disabled>
                            <h3 class="d-lg-block fw-bold">Lanjutkan</h3>
                        </button>
                    @endauth
                    @guest
                        <button class="tombol-2 btn btn-primary my-2 w-100 d-flex justify-content-center align-items-center">
                            <h3 class="d-lg-block fw-bold opacity-50">Log In untuk Melanjutkan</h3>
                        </button>
                    @endguest
                </div>
            </div>
        </form>

        <p class="text-white" style="font-style: italic; opacity: 80%;">*Jam operasional JogjaCar adalah 06:00-21:00</p>
    </div>

    <script src="js/msdropdown/jquery-1.3.2.min.js" type="text/javascript"></script>
    <script src="js/msdropdown/jquery.dd.min.js" type="text/javascript"></script>

    <script language="javascript">
        $(document).ready(function(e) {
            try {
                $("body select").msDropDown();
            } catch (e) {
                alert(e.message);
            }
        });
    </script>

    <script>
        const lokasiPengambilan = document.getElementById('lokasiPengambilan');
        const tanggalPengambilan = document.getElementById('tanggalPengambilan');
        const jamPengambilan = document.getElementById('jamPengambilan');
        const tanggalPengembalian = document.getElementById('tanggalPengembalian');
        const jamPengembalian = document.getElementById('jamPengembalian');

        const tombol = document.getElementById('tombolForm');

        jamPengambilan.addEventListener('input', function() {
            enforcedMinMaxTime(jamPengambilan);
        });
        jamPengembalian.addEventListener('input', function() {
            enforcedMinMaxTime(jamPengembalian);
        });

        function enforcedMinMaxTime(inputField) {
            let inputFieldValue = inputField.value;

            if (inputFieldValue < '06:00' || inputFieldValue > '21:00') {
                // alert('Pilih jam 06:00 - 21:00');
                inputField.value = '';
            }
        }

        tanggalPengambilan.min = new Date().toISOString().split("T")[0];

        tanggalPengambilan.addEventListener('input', function() {
            setMinDate();
        });

        function setMinDate() {
            var selectedDate = new Date(tanggalPengambilan.value);
            selectedDate.setDate(selectedDate.getDate() + 1);

            var formattedMinDate = selectedDate.toISOString().split('T')[0];

            tanggalPengembalian.min = formattedMinDate;
        }


        [lokasiPengambilan, tanggalPengambilan, jamPengambilan, tanggalPengembalian, jamPengembalian].forEach(field => {
            field.addEventListener('input', () => {
                if (lokasiPengambilan.value !== '' && tanggalPengambilan.value !== '' && jamPengambilan
                    .value !== '' && tanggalPengembalian.value !== '' && jamPengembalian.value !== '') {
                    tombol.disabled = false;
                } else {
                    tombol.disabled = true;
                }
            });
        });
    </script>
@endsection
