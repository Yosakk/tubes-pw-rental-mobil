<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initialscale=1">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <!-- Boostrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
    integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
  {{-- favicon --}}
  <link rel="icon" type="image/x-icon" href="{{ asset('images/logo-favicon.png') }}">

  <link rel="stylesheet" href="fonts/icomoon/style.css" />

  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/bootstrap-datepicker.css" />
  <link rel="stylesheet" href="css/jquery.fancybox.min.css" />
  <link rel="stylesheet" href="css/owl.carousel.min.css" />
  <link rel="stylesheet" href="css/owl.theme.default.min.css" />
  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css" />
  <link rel="stylesheet" href="css/aos.css" />

  <!-- MAIN CSS -->
  <link rel="stylesheet" href="css/style.css" />

  <style>
    body {
      /* background-color: #F8F7FC; */
    }

    a {
      text-decoration: none;
      color: black;
    }

    * {
      font-family: 'Poppins', sans-serif;
    }

    .app {
      /* background-color: #F8F7FC; */
      /* height: 100vh; */
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    footer {
      position: relative;
      z-index: 1;
    }

    .profile-pic {
      height: 24px;
      width: 24px;
    }

    .content-wrapper {
      min-height: 100vh;
    }

    .footer {
      margin-top: auto;
    }
  </style>
</head>

<body>
  <div class="app">
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-white">
      <div class="container-fluid px-3">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
          aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <span class="navbar-brand d-lg-none d-md-block d-sm-block fw-bold">
          <img height="30" src="{{ asset('images/logo.png') }}" alt="logo">
        </span>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <a class="navbar-brand d-none d-lg-block d-md-none" href="{{ url('/') }}"><img height="30"
              src="{{ asset('images/logo.png') }}" alt="logo"></a>
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">Daftar Mobil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/kontak') }}">Kontak</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/cara-order') }}">Cara Order</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('ulasan') }}">Ulasan</a>
            </li>
            @auth
            <li class="nav-item d-lg-none">
              <a class="nav-link" href="{{ url('/profile') }}">Profile Anda</a>
            </li>
            <li class="nav-item d-lg-none d-md-block d-sm-block">
              <a href="{{ route('logout') }}" class="nav-link text-danger fw-bold">Log Out</a>
            </li>
            @endauth
            @guest
            <li class="nav-item d-md-none d-sm-block">
              <a href="{{ url('/login') }}" class="nav-link fw-semibold btn btn-primary">Log In</a>
            </li>
            <li class="nav-item d-md-none d-sm-block">
              <a href="{{ url('/register') }}" class="nav-link fw-semibold">Register</a>
            </li>
            @endguest
          </ul>
          <hr>
          @auth
          <ul class="navbar-nav d-none d-md-none d-lg-flex">
            <li class="nav-item">
              <a class="nav-link" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling"
                aria-controls="offcanvasScrolling">
                Selamat datang,
                {{ auth()->user()->username }}
                @if (Auth::user()->photo == null)
                <img src="{{ asset('images/profilepic.png') }}" alt="Profile pic" class="profile-pic rounded-circle"
                  style="margin-left: 5px">
                @else
                <img src="{{ asset('storage/profileUser/' . auth()->user()->photo) }}" alt="Profile pic"
                  class="profile-pic rounded-circle" style="margin-left: 5px; object-fit: cover;">
                @endif

              </a>
            </li>
          </ul>
          @endauth
          @guest
          <ul class="navbar-nav d-none d-md-flex">
            <li class="nav-item">
              <a href="{{ url('/login') }}" class="nav-link fw-semibold">Log In</a>
            </li>
            <span class="nav-link d-none d-lg-block">-</span>
            <li class="nav-item">
            <li class="nav-item">
              <a href="{{ url('/register') }}" class="nav-link fw-semibold">Register</a>
            </li>
            </li>
          </ul>
          @endguest
        </div>
      </div>
    </nav>


    @auth
    {{-- sidebar profile --}}
    <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
      id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
      <div class="offcanvas-header mt-2">
        <h4 class="offcanvas-title" id="offcanvasScrollingLabel">Profile</h4>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <hr>
      <div class="offcanvas-body">
        <div class="container-fluid">
          <div class="row gx-2 gy-2 mb-auto">
            <a href="{{ url('/profile') }}" class="h5 btn btn-light">Profile Anda</a>
            <a href="" class="h5 btn btn-light">Transaksi Anda</a>
          </div>
          <div class="justify-content-end d-flex">
            <button type="button"
              class="btn btn-danger align-items-end d-flex position-absolute bottom-0 mb-2 fw-semibold"
              data-bs-target="#confirmLogout" data-bs-toggle="modal">Log
              Out</button>
          </div>
        </div>
      </div>
    </div>

    {{-- modal confirm keluar --}}
    <div class="modal fade" id="confirmLogout" tabindex="-1" role="dialog" aria-labelledby="confirmLogoutModal"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body align-content-center">
            <p>
              Apakah Anda yakin ingin keluar?
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
            <a href="{{ route('logout') }}" class="btn btn-danger">Ya</a>
          </div>
        </div>
      </div>
    </div>
    @endauth
    <div class="content-wrapper">
      <div class="container">
        @yield('content')
      </div>
      @yield('content1')
    </div>

    <footer>
      <div class="site-section">
        <div class="container">
          <h2 class="section-heading"><strong>Cara Pemesanan</strong></h2>
          <p class="mb-5">Langkah yang mudah untuk menyewa mobil</p>

          <div class="row mb-5">
            <div class="col-lg-4 mb-4 mb-lg-0">
              <div class="step">
                <span>1</span>
                <div class="step-inner">
                  <span class="number text-primary">01.</span>
                  <h3>Login</h3>
                  <p>
                    Login akun agar dapat melakukan rental. Jika tidak mempunyai akun, dapat melakukan
                    register akun terlebih dahulu.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 mb-4 mb-lg-0">
              <div class="step">
                <span>2</span>
                <div class="step-inner">
                  <span class="number text-primary">02.</span>
                  <h3>Pilih Lokasi</h3>
                  <p>
                    Pilih lokasi pengambilan, tanggal pengambilan, jam pengambilan, tanggal pengembalian,
                    jam pengembalian. Setelah itu klik tombol "Lanjutkan" untuk memilih mobil
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 mb-4 mb-lg-0">
              <div class="step">
                <span>3</span>
                <div class="step-inner">
                  <span class="number text-primary">03.</span>
                  <h3>Pilih Mobil</h3>
                  <p>
                    Pilih mobil rental yang tersedia.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 mb-4 mb-lg-0">
              <div class="step">
                <span>4</span>
                <div class="step-inner">
                  <span class="number text-primary">04.</span>
                  <h3>Pilih Mobil</h3>
                  <p>
                    Pilih mobil rental yang tersedia.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 mb-4 mb-lg-0">
              <div class="step">
                <span>5</span>
                <div class="step-inner">
                  <span class="number text-primary">05.</span>
                  <h3>Pembayaran</h3>
                  <p>
                    Lakukan pembayaran sebelum deadline yang telah ditentukan.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="site-section">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-7 text-center order-lg-2">
              <div class="img-wrap-1 mb-5">
                <img height="200" src="{{ asset('images/avanza.png') }}" alt="logo">
              </div>
            </div>
            <div class="col-lg-4 ml-auto order-lg-1">
              <h3 class="mb-4 section-heading">
                <strong>Kami berkomitmen untuk memberikan pelayanan terbaik kepada Pelanggan</strong>
              </h3>
              <p class="mb-5">
                JOGJACAR merupakan pilihan utama dalam rental mobil di Yogyakarta karena komitmennya
                terhadap kualitas terbaik dalam layanan. Dengan armada mobil yang selalu terjaga, staf
                yang profesional dan ramah, serta transparansi dalam biaya dan prosedur sewa, JOGJACAR
                telah membangun reputasi yang kokoh sebagai penyedia layanan terbaik yang memberikan pengalaman
                menyewa mobil yang tak tertandingi di Yogyakarta.
              </p>
              <p><a href="#" class="btn btn-primary">Kontak Kami</a></p>
            </div>
          </div>
        </div>
      </div>

      <div class="site-section bg-white">
        <div class="container">
          <div class="row">
            <div class="col-lg-7">
              <h2 class="section-heading"><strong>Daftar Mobil</strong></h2>
              <p class="mb-5">

              </p>
            </div>
          </div>



          <div class="row">
            <div class="col-md-6 col-lg-4 mb-4">
              <div class="listing d-block align-items-stretch">
                <div class="listing-img h-100 mr-4">
                  <img height="100" src="{{ asset('images/mitshubishi_xpander.png') }}" alt="mobil">
                </div>
                <div class="listing-contents h-100">
                  <h3>Mitsubishi Xpander</h3>
                  <div class="rent-price">
                    <strong>Rp900.000</strong><span class="mx-1">/</span>hari
                    <div class="row border-bottom mb-3">
                      <div class="col-lg-4">
                        <p>Bahan Bakar : 4</p>
                      </div>
                      <div class="col-lg-4">
                        <p>Transmisi : 4</p>
                      </div>
                      <div class="col-lg-4">
                        <p>Jumlah Kursi: 4</p>
                      </div>
                      <div class="col-lg-4">
                        <p>Warna : Hitam</p>
                      </div>
                      <div class="col-lg-6">
                        <p>Tahun Produksi: 4</p>
                      </div>
                    </div>
                    <p>
                      m ipsum dolor sit amet, consectetur adipisicing elit.
                      Quos eos at eum, voluptatem quibusdam.Lore
                    </p>
                    <p>
                      <a href="#" class="btn btn-primary btn-sm">Sewa Sekarang</a>
                    </p>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-4">
              <div class="listing d-block align-items-stretch">
                <div class="listing-img h-100 mr-4">
                  <img height="100" src="{{ asset('images/mitshubishi_xpander.png') }}" alt="mobil">
                </div>
                <div class="listing-contents h-100">
                  <h3>Mitsubishi Xpander</h3>
                  <div class="rent-price">
                    <strong>Rp900.000</strong><span class="mx-1">/</span>hari
                    <div class="row border-bottom mb-3">
                      <div class="col-lg-4">
                        <p>Bahan Bakar : 4</p>
                      </div>
                      <div class="col-lg-4">
                        <p>Transmisi : 4</p>
                      </div>
                      <div class="col-lg-4">
                        <p>Jumlah Kursi: 4</p>
                      </div>
                      <div class="col-lg-4">
                        <p>Warna : Hitam</p>
                      </div>
                      <div class="col-lg-6">
                        <p>Tahun Produksi: 4</p>
                      </div>
                    </div>
                    <p>
                      m ipsum dolor sit amet, consectetur adipisicing elit.
                      Quos eos at eum, voluptatem quibusdam.Lore
                    </p>
                    <p>
                      <a href="#" class="btn btn-primary btn-sm">Sewa Sekarang</a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
              <div class="listing d-block align-items-stretch">
                <div class="listing-img h-100 mr-4">
                  <img height="100" src="{{ asset('images/mitshubishi_xpander.png') }}" alt="mobil">
                </div>
                <div class="listing-contents h-100">
                  <h3>Mitsubishi Xpander</h3>
                  <div class="rent-price">
                    <strong>Rp900.000</strong><span class="mx-1">/</span>hari
                    <div class="row border-bottom mb-3">
                      <div class="col-lg-4">
                        <p>Bahan Bakar : 4</p>
                      </div>
                      <div class="col-lg-4">
                        <p>Transmisi : 4</p>
                      </div>
                      <div class="col-lg-4">
                        <p>Jumlah Kursi: 4</p>
                      </div>
                      <div class="col-lg-4">
                        <p>Warna : Hitam</p>
                      </div>
                      <div class="col-lg-6">
                        <p>Tahun Produksi: 4</p>
                      </div>
                    </div>
                    <p>
                      m ipsum dolor sit amet, consectetur adipisicing elit.
                      Quos eos at eum, voluptatem quibusdam.Lore
                    </p>
                    <p>
                      <a href="#" class="btn btn-primary btn-sm">Sewa Sekarang</a>
                    </p>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-4">
              <div class="listing d-block align-items-stretch">
                <div class="listing-img h-100 mr-4">
                  <img height="100" src="{{ asset('images/mitshubishi_xpander.png') }}" alt="mobil">
                </div>
                <div class="listing-contents h-100">
                  <h3>Mitsubishi Xpander</h3>
                  <div class="rent-price">
                    <strong>Rp900.000</strong><span class="mx-1">/</span>hari
                    <div class="row border-bottom mb-3">
                      <div class="col-lg-4">
                        <p>Bahan Bakar : 4</p>
                      </div>
                      <div class="col-lg-4">
                        <p>Transmisi : 4</p>
                      </div>
                      <div class="col-lg-4">
                        <p>Jumlah Kursi: 4</p>
                      </div>
                      <div class="col-lg-4">
                        <p>Warna : Hitam</p>
                      </div>
                      <div class="col-lg-6">
                        <p>Tahun Produksi: 4</p>
                      </div>
                    </div>
                    <p>
                      m ipsum dolor sit amet, consectetur adipisicing elit.
                      Quos eos at eum, voluptatem quibusdam.Lore
                    </p>
                    <p>
                      <a href="#" class="btn btn-primary btn-sm">Sewa Sekarang</a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
              <div class="listing d-block align-items-stretch">
                <div class="listing-img h-100 mr-4">
                  <img height="100" src="{{ asset('images/mitshubishi_xpander.png') }}" alt="mobil">
                </div>
                <div class="listing-contents h-100">
                  <h3>Mitsubishi Xpander</h3>
                  <div class="rent-price">
                    <strong>Rp900.000</strong><span class="mx-1">/</span>hari
                    <div class="row border-bottom mb-3">
                      <div class="col-lg-4">
                        <p>Bahan Bakar : 4</p>
                      </div>
                      <div class="col-lg-4">
                        <p>Transmisi : 4</p>
                      </div>
                      <div class="col-lg-4">
                        <p>Jumlah Kursi: 4</p>
                      </div>
                      <div class="col-lg-4">
                        <p>Warna : Hitam</p>
                      </div>
                      <div class="col-lg-6">
                        <p>Tahun Produksi: 4</p>
                      </div>
                    </div>
                    <p>
                      m ipsum dolor sit amet, consectetur adipisicing elit.
                      Quos eos at eum, voluptatem quibusdam.Lore
                    </p>
                    <p>
                      <a href="#" class="btn btn-primary btn-sm">Sewa Sekarang</a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            </div>
          </div>

          <div class="site-section bg-white">
            <div class="container">
              <div class="row">
                <div class="col-lg-7">
                  <h2 class="section-heading"><strong>Ulasan</strong></h2>
                  <p class="mb-5">
                    Apa kata mereka
                  </p>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                  <div class="testimonial-2">
                    <blockquote class="mb-4">
                      <p>
                        "Saya sangat terkesan dengan layanan yang diberikan oleh JogjaCar. Mereka memiliki staf yang
                        ramah dan profesional. Saat saya melakukan pemesanan, mereka dengan sabar menjelaskan semua
                        detail dan memberikan saran yang berguna. Selain itu, mobil yang saya sewa dalam kondisi yang
                        sangat baik dan bersih. Saya pasti akan merekomendasikan JogjaCar kepada teman dan keluarga
                        saya!"
                      </p>
                    </blockquote>
                    <div class="d-flex v-card align-items-center">
                      <img src="{{ asset('images/jihyo.jpg') }}" alt="Image" class="img-fluid mr-3" />
                      <div class="author-name">
                        <span class="d-block">Park Jihyo</span>
                        <span>Chef</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 mb-4 mb-lg-0">
                  <div class="testimonial-2">
                    <blockquote class="mb-4">
                      <p>
                        "Pilihan mobil yang ditawarkan oleh JogjaCar sangat luas dan memuaskan. Saya dapat dengan mudah
                        menemukan mobil yang sesuai dengan kebutuhan saya. Selain itu, mobil yang saya sewa terawat
                        dengan baik dan dalam kondisi prima. Pengalaman menyewa mobil dengan JogjaCar membuat perjalanan
                        saya menjadi lebih nyaman dan menyenangkan. Terima kasih
                      </p>
                    </blockquote>
                    <div class="d-flex v-card align-items-center">
                      <img src="{{ asset('images/momo.jpg') }}" alt="Image" class="img-fluid mr-3" />
                      <div class="author-name">
                        <span class="d-block">Hirai Momo</span>
                        <span>Traveler</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 mb-4 mb-lg-0">
                  <div class="testimonial-2">
                    <blockquote class="mb-4">
                      <p>
                        "Pemesanan mobil di JogjaCar sangat mudah dan efisien. Situs web mereka sangat user-friendly dan
                        memudahkan saya dalam memilih mobil serta melihat ketersediaan. Proses reservasi pun cepat dan
                        tanpa masalah. Ketika saya tiba di lokasi, mobil yang saya pesan sudah siap untuk digunakan.
                        Saya merasa sangat puas dengan pengalaman menyewa mobil bersama JogjaCar"
                      </p>
                    </blockquote>
                    <div class="d-flex v-card align-items-center">
                      <img src="{{ asset('images/sana.jpg') }}" alt="Image" class="img-fluid mr-3" />
                      <div class="author-name">
                        <span class="d-block">Sana Pie</span>
                        <span>Customer</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="site-section bg-primary py-5">
            <div class="container">
              <div class="row align-items-center">
                <div class="col-lg-7 mb-4 mb-md-0">
                  <h2 class="mb-0 text-white">Tunggu Apa Lagi?</h2>
                  <p class="mb-0 opa-7">
                    Segera Daftar dan Sewa Mobil di JOGJACAR sekarang Juga!!!!
                </div>
                <div class="col-lg-5 text-md-right">
                  <a href="#" class="btn btn-primary btn-white">Sewa Sekarang</a>
                </div>
              </div>
            </div>
          </div>
          <div class="container-footer mt-5">
            <div class="display-footer bg-white">
              <div class="row pt-5 pb-5" style="max-width: 100%;">
                <div class="col-lg-6" style="padding-left: 100px;">
                  <h5><strong>About Us</strong></h5>
                  <p>
                    Selamat datang di JogjaCar, penyedia layanan rental kendaraan yang Anda percayai untuk
                    memenuhi kebutuhan perjalanan Anda di Yogyakarta. JogjaCar merupakan perusahaan rental
                    kendaraan yang berdedikasi dalam memberikan pengalaman berkendara yang aman, nyaman, dan
                    terpercaya bagi pelanggan kami. Dengan armada kendaraan yang terawat baik dan beragam
                    pilihan mulai dari mobil keluarga hingga kendaraan mewah, kami berkomitmen untuk
                    menyediakan layanan berkualitas tinggi dan kepuasan pelanggan yang prima. Dengan
                    JogjaCar, Anda dapat menjelajahi pesona Yogyakarta dengan percaya diri dan kenyamanan,
                    menjadikan setiap perjalanan Anda sebagai pengalaman yang berkesan dan menyenangkan.
                  </p>
                </div>
                <div class="col-lg 6" style="padding-left: 100px;">
                  <p><strong>Layanan Pengaduan Konsumen</strong></p>
                  <p><strong>PT JogjaTrans</strong></p>
                  <kaifuku@halodoc.com>l. Dirgantara I No.15, Kabupaten Sleman, Atma Jaya Yogyakarta,
                    Yogyakarta</p>
                </div>
              </div>
            </div>
            <div class="container-footer-bottom" style="background-color:#003EB7;">
              <div class="text-light text-center py-2 container pt-3">
                <p>&copy; 2023 Jogja Car</p>
                <p>Kelompok 3 Pemrograman Web D</p>
              </div>
            </div>
          </div>
    </footer>
  </div>
  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <!-- Bootstrap 5.3 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>
</body>

</html>