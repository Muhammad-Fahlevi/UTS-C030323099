<?php
use App\Models\Profil;
use App\Models\Kendaraan;
use App\Models\Penyewaan;
use App\Models\Pembayaran;
use App\Models\Pelanggan;

$profils = Profil::all();
$kendaraans = Kendaraan::all();
$penyewaans = Penyewaan::all();
$pembayarans = pembayaran::all();
$pelanggans = pelanggan::all();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with JohnDoe landing page.">
    <meta name="author" content="Devcrud">
    <title>Rental mobil Sale</title>
    <!-- font icons -->
    <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">
    <!-- Bootstrap + JohnDoe main styles -->
	<link rel="stylesheet" href="{{ asset('johndoe.css') }}">
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
    <a href="components.html" class="btn btn-primary btn-component" data-spy="affix" data-offset-top="600"><i class="ti-shift-left-alt"></i> Components</a>
    <header class="header">
        <div class="container">
            <ul class="social-icons pt-3">
                <li class="social-item"><a class="social-link text-light" href="#"><i class="ti-facebook" aria-hidden="true"></i></a></li>
                <li class="social-item"><a class="social-link text-light" href="#"><i class="ti-twitter" aria-hidden="true"></i></a></li>
                <li class="social-item"><a class="social-link text-light" href="#"><i class="ti-google" aria-hidden="true"></i></a></li>
                <li class="social-item"><a class="social-link text-light" href="#"><i class="ti-instagram" aria-hidden="true"></i></a></li>
                <li class="social-item"><a class="social-link text-light" href="#"><i class="ti-github" aria-hidden="true"></i></a></li>
            </ul>  
            <div class="header-content">
                <h4 class="header-subtitle" >Halo, Selamat datang</h4>
                <h1 class="header-title">SaLe</h1>
                <h6 class="header-mono" >Rental Kendaraan Sahal & Levi</h6>
                <button class="btn btn-primary btn-rounded"><i class="ti-printer pr-2"></i>Pesan</button>
            </div>
        </div>
    </header>
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-white" data-spy="affix" data-offset-top="510">
        <div class="container">
            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse mt-sm-20 navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="#home" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#about" class="nav-link">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="#resume" class="nav-link">Resume</a>
                    </li>
                </ul>
                <ul class="navbar-nav brand">
                    <img src="assets/imgs/avatar.jpg" alt="" class="brand-img">
                    <li class="brand-txt">
                        <h5 class="brand-title">John Doe</h5>
                        <div class="brand-subtitle">Web Designer | Developer</div>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <!-- <li class="nav-item">
                        <a href="#portfolio" class="nav-link">Portfolio</a>
                    </li> -->
                    <li class="nav-item">
                        <a href="#kendaraan" class="nav-link">Kendaraan</a>
                    </li>
                    <li class="nav-item last-item">
                        <a href="#profil" class="nav-link">Profil</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>
    <section class="section" id="about">
    <div class="container-fluid">
        <div id="daftar-profil" class="row about-section">
            @foreach ($profils as $profil)
            <div class="col-lg-4 about-card mb-4">
                <h3 class="font-weight-light text-left">{{ $profil->nama }}</h3>
                <span class="line mb-3"></span>
                <p><strong>NIM:</strong> {{ $profil->NIM }}</p>
                <p><strong>Prodi:</strong> {{ $profil->prodi }}</p>
                <p><strong>Alamat:</strong> {{ $profil->alamat }}</p>
                @if ($profil->gambar)
                <div class="text-center mt-3">
                    <img src="{{ asset('storage/' . $profil->gambar) }}" alt="Gambar Profil" class="img-fluid" style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover;">
                </div>
                @else
                <p class="text-muted text-center">Tidak ada gambar</p>
                @endif
            </div>
            @endforeach
        </div>
    </div>
    </section>

    <!--Resume Section-->
    <section class="section" id="resume">
    <div class="container">
        <h2 class="mb-5"><span class="text-danger">Daftar</span> Penyewaan & Pembayaran</h2>
        
        <div class="row">
            <!-- Form Input Pelanggan -->
            <div class="col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah Pelanggan</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pelanggan.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nama">Nama Pelanggan</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="no_telepon">No Telepon</label>
                                <input type="text" class="form-control" id="no_telepon" name="no_telepon" required>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah Pelanggan</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Form Input Penyewaan -->
            <div class="col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah Penyewaan</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('penyewaan.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="id_pelanggan">Pelanggan</label>
                                <select name="id_pelanggan" class="form-control" required>
                                    @foreach($pelanggans as $pelanggan)
                                        <option value="{{ $pelanggan->email }}">{{ $pelanggan->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_kendaraan">Kendaraan</label>
                                <select name="id_kendaraan" class="form-control" required>
                                    @foreach($kendaraans as $kendaraan)
                                        <option value="{{ $kendaraan->id }}">{{ $kendaraan->jenis_kendaraan }} ({{ $kendaraan->plat_nomor }})</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_sewa">Tanggal Sewa</label>
                                <input type="date" class="form-control" name="tanggal_sewa" required>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_kembali">Tanggal Kembali</label>
                                <input type="date" class="form-control" name="tanggal_kembali" required>
                            </div>
                            <div class="form-group">
                                <label for="durasi">Durasi (Hari)</label>
                                <input type="number" class="form-control" name="durasi" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah Penyewaan</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Form Input Pembayaran -->
            <div class="col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah Pembayaran</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pembayaran.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="id_penyewaan">Penyewaan</label>
                                <select name="id_penyewaan" class="form-control" required>
                                    @foreach($penyewaans as $penyewaan)
                                        <option value="{{ $penyewaan->id }}">Penyewaan #{{ $penyewaan->id }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="metode_pembayaran">Metode Pembayaran</label>
                                <select name="metode_pembayaran" class="form-control" required>
                                    <option value="Transfer">Transfer</option>
                                    <option value="Cash">Cash</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="tanggal_pembayaran">Tanggal Pembayaran</label>
                                <input type="date" class="form-control" name="tanggal_pembayaran" required>
                            </div>
                            <div class="form-group">
                                <label for="jumlah_bayar">Jumlah Bayar</label>
                                <input type="number" class="form-control" name="jumlah_bayar" required>
                                </div>
                            <div class="form-group">
        <label for="bukti_pembayaran">Bukti Pembayaran</label>
        <input type="file" class="form-control" name="bukti_pembayaran" id="bukti_pembayaran" accept="image/*">
    </div>
                            <button type="submit" class="btn btn-primary">Tambah Pembayaran</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



    <section class="section bg-dark text-center">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-6 col-lg-3">
                    <div class="row ">
                        <div class="col-5 text-right text-light border-right py-3">
                            <div class="m-auto"><i class="ti-alarm-clock icon-xl"></i></div>
                        </div>
                        <div class="col-7 text-left py-3">
                            <h1 class="text-danger font-weight-bold font40">500</h1>
                            <p class="text-light mb-1">Hours Worked</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="row">
                        <div class="col-5 text-right text-light border-right py-3">
                            <div class="m-auto"><i class="ti-layers-alt icon-xl"></i></div>
                        </div>
                        <div class="col-7 text-left py-3">
                            <h1 class="text-danger font-weight-bold font40">50K</h1>
                            <p class="text-light mb-1">product</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="row">
                        <div class="col-5 text-right text-light border-right py-3">
                            <div class="m-auto"><i class="ti-face-smile icon-xl"></i></div>
                        </div>
                        <div class="col-7 text-left py-3">
                            <h1 class="text-danger font-weight-bold font40">200K</h1>
                            <p class="text-light mb-1">orders</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="row">
                        <div class="col-5 text-right text-light border-right py-3">
                            <div class="m-auto"><i class="ti-heart-broken icon-xl"></i></div>
                        </div>
                        <div class="col-7 text-left py-3">
                            <h1 class="text-danger font-weight-bold font40">2k</h1>
                            <p class="text-light mb-1">costumer satisfaction</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="service">
        <div class="container">
            <h2 class="mb-5 pb-4"><span class="text-danger">My</span> Services</h2>
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="card mb-5">
                       <div class="card-header has-icon">
                            <i class="ti-vector text-danger" aria-hidden="true"></i>
                        </div>
                        <div class="card-body px-4 py-3">
                            <h5 class="mb-3 card-title text-dark">Ullam</h5>
                            <P class="subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam commodi provident, dolores reiciendis enim pariatur error optio, tempora ex, nihil nesciunt! In praesentium sunt commodi, unde ipsam ex veritatis laboriosam dolor asperiores suscipit blanditiis, dignissimos quos nesciunt nulla aperiam officia.</P>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="card mb-5">
                       <div class="card-header has-icon">
                            <i class="ti-write text-danger" aria-hidden="true"></i>
                        </div>
                        <div class="card-body px-4 py-3">
                            <h5 class="mb-3 card-title text-dark">Asperiores</h5>
                            <P class="subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam commodi provident, dolores reiciendis enim pariatur error optio, tempora ex, nihil nesciunt! In praesentium sunt commodi, unde ipsam ex veritatis laboriosam dolor asperiores suscipit blanditiis, dignissimos quos nesciunt nulla aperiam officia.</P>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="card mb-5">
                       <div class="card-header has-icon">
                            <i class="ti-package text-danger" aria-hidden="true"></i>
                        </div>
                        <div class="card-body px-4 py-3">
                            <h5 class="mb-3 card-title text-dark">Tempora</h5>
                            <P class="subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam commodi provident, dolores reiciendis enim pariatur error optio, tempora ex, nihil nesciunt! In praesentium sunt commodi, unde ipsam ex veritatis laboriosam dolor asperiores suscipit blanditiis, dignissimos quos nesciunt nulla aperiam officia.</P>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="card mb-5">
                       <div class="card-header has-icon">
                            <i class="ti-map-alt text-danger" aria-hidden="true"></i>
                        </div>
                        <div class="card-body px-4 py-3">
                            <h5 class="mb-3 card-title text-dark">Provident</h5>
                            <P class="subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam commodi provident, dolores reiciendis enim pariatur error optio, tempora ex, nihil nesciunt! In praesentium sunt commodi, unde ipsam ex veritatis laboriosam dolor asperiores suscipit blanditiis, dignissimos quos nesciunt nulla aperiam officia.</P>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="card mb-5">
                       <div class="card-header has-icon">
                            <i class="ti-bar-chart text-danger" aria-hidden="true"></i>
                        </div>
                        <div class="card-body px-4 py-3">
                            <h5 class="mb-3 card-title text-dark">Consectetur</h5>
                            <P class="subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam commodi provident, dolores reiciendis enim pariatur error optio, tempora ex, nihil nesciunt! In praesentium sunt commodi, unde ipsam ex veritatis laboriosam dolor asperiores suscipit blanditiis, dignissimos quos nesciunt nulla aperiam officia.</P>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="card mb-5">
                       <div class="card-header has-icon">
                            <i class="ti-support text-danger" aria-hidden="true"></i>
                        </div>
                        <div class="card-body px-4 py-3">
                            <h5 class="mb-3 card-title text-dark">Veritatis</h5>
                            <P class="subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam commodi provident, dolores reiciendis enim pariatur error optio, tempora ex, nihil nesciunt! In praesentium sunt commodi, unde ipsam ex veritatis laboriosam dolor asperiores suscipit blanditiis, dignissimos quos nesciunt nulla aperiam officia.</P>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section bg-custom-gray" id="price">
        <div class="container">
            <h1 class="mb-5"><span class="text-danger">Packs</span> Pricing</h1>
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-3">
                    <div class="price-card text-center mb-4">
                        <h3 class="price-card-title">Free</h3>
                        <div class="price-card-cost">
                            <sup class="ti-money"></sup>
                            <span class="num">0</span>
                            <span class="date">MO</span>
                        </div>
                        <ul class="list">
                            <li class="list-item">5 <span class="text-muted">Trial</span></li>
                            <li class="list-item">1 <span class="text-muted">Car</span></li>
                            <li class="list-item"><span class="text-muted">No Domain</span></li>
                            <li class="list-item">1 <span class="text-muted">User</span></li>
                        </ul>
                        <button class="btn btn-primary btn-rounded w-lg">Order</button>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="price-card text-center mb-4">
                        <h3 class="price-card-title">Basic</h3>
                        <div class="price-card-cost">
                            <sup class="ti-money"></sup>
                            <span class="num">10</span>
                            <span class="date">MO</span>
                        </div>
                        <ul class="list">
                            <li class="list-item">5 <span class="text-muted">Trial</span></li>
                            <li class="list-item">1 <span class="text-muted">Car</span></li>
                            <li class="list-item">1<span class="text-muted">Domain</span></li>
                            <li class="list-item">5 <span class="text-muted">User</span></li>
                        </ul>
                        <button class="btn btn-primary btn-rounded w-lg">Order</button>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="price-card text-center price-card-requried mb-4">
                        <h3 class="price-card-title">Exclusive</h3>
                        <div class="price-card-cost">
                            <sup class="ti-money"></sup>
                            <span class="num">25</span>
                            <span class="date">MO</span>
                        </div>
                        <ul class="list">
                            <li class="list-item">15 <span class="text-muted">Trial</span></li>
                            <li class="list-item">1+1 <span class="text-muted">Car</span></li>
                            <li class="list-item">5<span class="text-muted"> Domain</span></li>
                            <li class="list-item">8<span class="text-muted">User</span></li>
                        </ul>
                        <button class="btn btn-primary btn-rounded w-lg">Order</button>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="price-card text-center mb-4">
                        <h3 class="price-card-title">Pro</h3>
                        <div class="price-card-cost">
                            <sup class="ti-money"></sup>
                            <span class="num">99</span>
                            <span class="date">MO</span>
                        </div>
                        <ul class="list">
                            <li class="list-item">15+5 <span class="text-muted">Trial</span></li>
                            <li class="list-item">2 <span class="text-muted">Car</span></li>
                            <li class="list-item">10<span class="text-muted"> Domain</span></li>
                            <li class="list-item">Unlimite<span class="text-muted">User</span></li>
                        </ul>
                        <button class="btn btn-primary btn-rounded w-lg">Order</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section bg-dark py-5">
        <div class="container text-center">
            <h2 class="text-light mb-5 font-weight-normal">Feel Free For Chat</h2>
            <button class="btn bg-primary w-lg" >DM me</button>
        </div>
    </section>

    <!-- Portfolio Section -->
    <!-- <section class="section bg-custom-gray" id="portfolio">
        <div class="container">
            <h1 class="mb-5"><span class="text-danger">My</span> Portfolio</h1>
            <div class="portfolio">
                <div class="filters">
                    <a href="#" data-filter=".new" class="active">
                        New
                    </a>
                    <a href="#" data-filter=".advertising">
                        Advertising
                    </a>
                    <a href="#" data-filter=".branding">
                        Branding
                    </a>
                    <a href="#" data-filter=".web">
                        Web
                    </a>
                </div>
                <div class="portfolio-container"> 
                    <div class="col-md-6 col-lg-4 web new">
                        <div class="portfolio-item">
                            <img src="assets/imgs/web-1.jpg" class="img-fluid" alt="Download free bootstrap 4 admin dashboard, free boootstrap 4 templates">
                            <div class="content-holder">
                                <a class="img-popup" href="assets/imgs/web-1.jpg"></a>
                                <div class="text-holder">
                                    <h6 class="title">WEB</h6>
                                    <p class="subtitle">Expedita corporis doloremque velit in totam!</p>
                                </div>
                            </div>   
                        </div>             
                    </div>
                    <div class="col-md-6 col-lg-4 web new">
                        <div class="portfolio-item">
                            <img src="assets/imgs/web-2.jpg" class="img-fluid" alt="Download free bootstrap 4 admin dashboard, free boootstrap 4 templates">
                            <div class="content-holder">
                                <a class="img-popup" href="assets/imgs/web-2.jpg"></a>
                                <div class="text-holder">
                                    <h6 class="title">WEB</h6>
                                    <p class="subtitle">Expedita corporis doloremque velit in totam!</p>
                                </div>
                            </div> 
                        </div>                         
                    </div>
                    <div class="col-md-6 col-lg-4 advertising new">
                        <div class="portfolio-item">
                            <img src="assets/imgs/advertising-2.jpg" class="img-fluid" alt="Download free bootstrap 4 admin dashboard, free boootstrap 4 templates">                         
                            <div class="content-holder">
                                <a class="img-popup" href="assets/imgs/advertising-2.jpg"></a>
                                <div class="text-holder">
                                    <h6 class="title">ADVERSTISING</h6>
                                    <p class="subtitle">Expedita corporis doloremque velit in totam!</p>
                                </div>
                            </div>    
                        </div>              
                    </div> 
                    <div class="col-md-6 col-lg-4 web">
                        <div class="portfolio-item">
                            <img src="assets/imgs/web-4.jpg" class="img-fluid" alt="Download free bootstrap 4 admin dashboard, free boootstrap 4 templates">
                            <div class="content-holder">
                                <a class="img-popup" href="assets/imgs/web-4.jpg"></a>
                                <div class="text-holder">
                                    <h6 class="title">WEB</h6>
                                    <p class="subtitle">Expedita corporis doloremque velit in totam!</p>
                                </div>
                            </div>
                        </div>                                                     
                    </div>

                    <div class="col-md-6 col-lg-4 advertising"> 
                        <div class="portfolio-item">
                            <img src="assets/imgs/advertising-1.jpg" class="img-fluid" alt="Download free bootstrap 4 admin dashboard, free boootstrap 4 templates">                               
                            <div class="content-holder">
                                <a class="img-popup" href="assets/imgs/advertising-1.jpg"></a>
                                <div class="text-holder">
                                    <h6 class="title">ADVERSITING</h6>
                                    <p class="subtitle">Expedita corporis doloremque velit in totam!</p>
                                </div>
                            </div>
                        </div>                                                       
                    </div> 
                    <div class="col-md-6 col-lg-4 web new">
                        <div class="portfolio-item">
                            <img src="assets/imgs/web-3.jpg" class="img-fluid" alt="Download free bootstrap 4 admin dashboard, free boootstrap 4 templates">  
                           <div class="content-holder">
                                <a class="img-popup" href="assets/imgs/web-3.jpg"></a>
                                <div class="text-holder">
                                    <h6 class="title">WEB</h6>
                                    <p class="subtitle">Expedita corporis doloremque velit in totam!</p>
                                </div>
                            </div>
                        </div>                                                     
                    </div>
                    <div class="col-md-6 col-lg-4 advertising new">
                        <div class="portfolio-item">
                            <img src="assets/imgs/advertising-3.jpg" class="img-fluid" alt="Download free bootstrap 4 admin dashboard, free boootstrap 4 templates">       
                           <div class="content-holder">
                                <a class="img-popup" href="assets/imgs/advertising-3.jpg"></a>
                                <div class="text-holder">
                                    <h6 class="title">ADVERSITING</h6>
                                    <p class="subtitle">Expedita corporis doloremque velit in totam!</p>
                                </div>
                            </div>
                        </div>                                                       
                    </div> 
                    <div class="col-md-6 col-lg-4 advertising new"> 
                        <div class="portfolio-item">
                            <img src="assets/imgs/advertising-4.jpg" class="img-fluid" alt="Download free bootstrap 4 admin dashboard, free boootstrap 4 templates">            
                            <div class="content-holder">
                                <a class="img-popup" href="assets/imgs/advertising-4.jpg"></a>
                                <div class="text-holder">
                                    <h6 class="title">ADVERTISING</h6>
                                    <p class="subtitle">Expedita corporis doloremque velit in totam!</p>
                                </div>
                            </div>
                        </div>
                                
                    </div> 
                    <div class="col-md-6 col-lg-4 branding new">
                        <div class="portfolio-item">
                            <img src="assets/imgs/branding-1.jpg" class="img-fluid" alt="Download free bootstrap 4 admin dashboard, free boootstrap 4 templates">                        
                            <div class="content-holder">
                                <a class="img-popup" href="assets/imgs/branding-1.jpg"></a>
                                <div class="text-holder">
                                    <h6 class="title">BRANDING</h6>
                                    <p class="subtitle">Expedita corporis doloremque velit in totam!</p>
                                </div>
                            </div> 
                        </div>
                    </div> 
                    <div class="col-md-6 col-lg-4 branding">
                        <div class="portfolio-item">
                            <img src="assets/imgs/branding-2.jpg" class="img-fluid" alt="Download free bootstrap 4 admin dashboard, free boootstrap 4 templates">  
                            <div class="content-holder">
                                <a class="img-popup" href="assets/imgs/branding-2.jpg"></a>
                                <div class="text-holder">
                                    <h6 class="title">BRANDING</h6>
                                    <p class="subtitle">Expedita corporis doloremque velit in totam!</p>
                                </div>
                            </div>
                        </div>                                                     
                    </div> 
                    <div class="col-md-6 col-lg-4 branding new">
                        <div class="portfolio-item">
                            <img src="assets/imgs/branding-3.jpg" class="img-fluid" alt="Download free bootstrap 4 admin dashboard, free boootstrap 4 templates">   
                            <div class="content-holder">
                                <a class="img-popup" href="assets/imgs/branding-3.jpg"></a>
                                <div class="text-holder">
                                    <h6 class="title">BRANDING</h6>
                                    <p class="subtitle">Expedita corporis doloremque velit in totam!</p>
                                </div>
                            </div>
                        </div>                                                    
                    </div> 
                    <div class="col-md-6 col-lg-4 branding">
                        <div class="portfolio-item">
                            <img src="assets/imgs/branding-4.jpg" class="img-fluid" alt="Download free bootstrap 4 admin dashboard, free boootstrap 4 templates">                      
                            <div class="content-holder">
                                <a class="img-popup" href="assets/imgs/branding-4.jpg"></a>
                                <div class="text-holder">
                                    <h6 class="title">BRANDING</h6>
                                    <p class="subtitle">Expedita corporis doloremque velit in totam!</p>
                                </div>
                            </div>
                        </div>                                                      
                    </div> 
                    <div class="col-md-6 col-lg-4 branding">
                        <div class="portfolio-item">
                            <img src="assets/imgs/branding-5.jpg" class="img-fluid" alt="Download free bootstrap 4 admin dashboard, free boootstrap 4 templates">          
                            <div class="content-holder">
                                <a class="img-popup" href="assets/imgs/branding-5.jpg"></a>
                                <div class="text-holder">
                                    <h6 class="title">BRANDING</h6>
                                    <p class="subtitle">Expedita corporis doloremque velit in totam!</p>
                                </div>
                            </div>
                        </div>                                                   
                    </div>
                </div> 
            </div>  
        </div>            
    </section>
    End of portfolio section -->

    <section class="section" id="kendaraan">
    <div class="container">
        <h2 class="mb-5">Daftar <span class="text-danger">Kendaraan</span></h2>
        <div class="row">
        @foreach ($kendaraans as $kendaraan)
    <div class="img-holder">
        @if ($kendaraan->jenis_kendaraan == 'mobil sedan')
            <img src="{{ asset('storage/galeri/mobil_sedan.png') }}" alt="Mobil Sedan" class="img-fluid gambar-sama">
        @elseif ($kendaraan->jenis_kendaraan == 'mobil Jeep')
            <img src="{{ asset('storage/galeri/jeep_rubicon.png') }}" alt="Mobil Jeep" class="img-fluid gambar-sama">
        @endif
    </div>

                <div class="content-holder">
                    <h6 class="title">{{ $kendaraan->jenis_kendaraan }}</h6>
                    <p class="post-details">
                        <strong>Plat Nomor:</strong> {{ $kendaraan->plat_nomor }} <br>
                        <strong>Harga Sewa:</strong> Rp {{ number_format($kendaraan->harga_sewa, 0, ',', '.') }}
                    </p>
                    <p>
                        Kendaraan dengan jenis {{ $kendaraan->jenis_kendaraan }} tersedia untuk disewa dengan harga terjangkau.
                    </p>
                    <a href="#" class="read-more">Pesan Sekarang <i class="ti-angle-double-right"></i></a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


    <div class="section profil" id="profil">
        <div id="map" class="map"></div>
        <div class="container text-center">
            <h2 class="text-bold mb-5 font-weight-normal">Tambahkan Profil</h2>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <!-- Form Input Profil -->
                    <form action="{{ route('profils.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan Nama" required>
                        </div>
                        <div class="form-group">
                            <label for="NIM">NIM</label>
                            <input type="text" name="NIM" class="form-control" id="NIM" placeholder="Masukkan NIM" required>
                        </div>
                        <div class="form-group">
                            <label for="prodi">Prodi</label>
                            <input type="text" name="prodi" class="form-control" id="prodi" placeholder="Masukkan Prodi" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" class="form-control" id="alamat" rows="3" placeholder="Masukkan Alamat" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar Profil</label>
                            <input type="file" name="gambar" class="form-control-file" id="gambar" accept="image/*">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Profil</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer py-3">
        <div class="container">
            <p class="small mb-0 text-light">
                &copy; <script>document.write(new Date().getFullYear())</script> Created With <i class="ti-heart text-danger"></i> By <a href="http://devcrud.com" target="_blank"><span class="text-danger" title="Bootstrap 4 Themes and Dashboards">DevCRUD</span></a> 
            </p>
        </div>
    </footer>

	<!-- core  -->
    <script src="assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="assets/vendors/bootstrap/bootstrap.bundle.js"></script>

    <!-- bootstrap 3 affix -->
    <script src="assets/vendors/bootstrap/bootstrap.affix.js"></script>

    <!-- Isotope  -->
    <script src="assets/vendors/isotope/isotope.pkgd.js"></script>
    
    <!-- Google mpas -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtme10pzgKSPeJVJrG1O3tjR6lk98o4w8&callback=initMap"></script>

    <!-- JohnDoe js -->
    <script src="assets/js/johndoe.js"></script>

</body>
</html>