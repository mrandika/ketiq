<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <style>
        .bg-1 { 
            background: url(image/poster.jpg);
            position: relative;
            background-size: cover;
            overflow: hidden;
            background-color: #0080ff;
            color: #ffffff;
        }
        .nomargin {
            margin: 0%;
        }
        .card-img-top { 
            width: 50%; 
            object-fit: cover; 
        }
        .black-text {
            color: black;
        }
        .bg {
            opacity: 50%;
        }
    </style>

    <title>Muhammad Rizki Andika</title>
</head>

<body>
    <!-- Jumbotron -->
    <div class="jumbotron bg-1 jumbotron-fluid nomargin">
        <div class="img-jumbotron container text-center">
            <img class="rounded-circle img-fluid bg" src="{{asset('image/profile.jpg')}}" width="325" height="325">
            <h1 class="display-4 black-text">Muhammad Rizki Andika</h1>
            <p class="lead black-text">I'm a Mobile App, and Web developer.</p>
            <i class="fas fa-code fa-3x black-text"></i>
        </div>
    </div>

    <!-- Navigation Bar -->
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">My Portofolio</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Mobile Development -->
    <h1 class="text-center mt-5">What Device I Worked On ?</h1>
    <div class="row mt-5 mb-5 text-center justify-content-center">
        <div class="col-md-5">
            <i class="fas fa-mobile fa-5x"></i>
            <h2 class="mt-2">iOS</h2>
            <div class="container">
                <p class="text-justify">Saya adalah Developer Aplikasi iOS, dan saya berpengalaman sejak 2016. Aplikasi
                    yang sudah dibuat diantaranya menggunakan Objective-C dan Swift 3 dan 4. Aplikasi yang dibuat
                    semuanya menggunakan metode Storyboard untuk User Interfacenya.</p>
            </div>
            <a class="btn btn-outline-primary btn-md" href="#">
                <i class="fas fa-cogs fa-lg"></i> Make Your iOS App...
            </a>
        </div>
        <div class="col-md-5">
            <i class="fas fa-mobile fa-5x"></i>
            <h2 class="mt-2">Android</h2>
            <div class="container">
                <p class="text-justify">Saya adalah Developer Aplikasi Android, dan saya berpengalaman sejak 2016.
                    Aplikasi yang sudah dibuat beberapa diantaranya sudah menggunakan Kotlin. Tetatpi, masih banyak
                    aplikasi yang saya buat masih menggunakan Java sebagai Backend-nya.</p>
            </div>
            <a class="btn btn-outline-primary btn-md" href="#">
                <i class="fas fa-cogs fa-lg"></i> Make Your Android App...
            </a>
        </div>
    </div>
    <hr class="my-5">

    <!-- Web Development -->
    <div class="container text-center mt-5">
        <i class="fab fa-safari fa-5x mb-3"></i>
        <h1>I do Web Development Too !</h1>
        <div class="row text-center justify-content-center mb-5">
            <div class="col-md-10">
                <p>
                    <code>HTML | CSS + Bootstrap | PHP + Laravel | JavaScript | Kotlin</code>
                </p>
                <p class="text-justify">Saya adalah Web Developer, saya belum terlalu pengalaman dalam pembuatan
                    aplikasi berbasis web yang melibatkan backend yang kompleks. Di web, saya lebih tertarik dengan
                    Tampilan atau User Interface. So, don't judge me if my code is broke :P LoL!</p>
            </div>
        </div>
    </div>
    <hr class="my-5">

    <!-- Bio -->
    <div class="container text-center mt-5">
        <i class="fas fa-user-circle fa-5x mb-3"></i>
        <h1>A Little Backstory</h1>
        <div class="row text-center justify-content-center mt-3">
            <div class="col-md-10">
                <p class="text-justify">Halo! Nama saya Muhammad Rizki Andika. Saya adalah siswa di SMK Taruna Bhakti
                    Depok. Saya adalah siswa kelas 11 di jurusan Rekayasa Perangkat Lunak. Saya lahir di Jakarta, 22
                    Juni 2002. Umur saya sekarang adalah 16 tahun. Saya tertarik dengan jurusan Rekayasa Perangkat
                    Lunak sejak saya masih duduk di sekolah menengah pertama. Saat itu, saya masih mencoba mengoding
                    menggunakan HTML dengan Notepad++.</p>
                <div class="row mt-5">
                    <div class="col-md-4">
                        <img class="img-fluid" src="{{asset('image/sd.png')}}" width="150" height="150">
                    </div>
                    <div class="col-md-8 text-left">
                        <h3>Sekolah Dasar - Jakarta 20 Pagi</h3>
                        <p>200x - 200x</p>
                        <p>Saya masuk SD lupa tahun berapa, di SD pecicilan bat ampe alis kena gagang pintu jadi bopeng
                            begini dah :( sad.
                            Di SD saya ga pinter pinter amat, bobrok iya dah. Di SD juga saya paling males sama
                            pelajaran MTK
                        </p>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-4">
                        <img class="img-fluid" src="{{asset('image/smp.jpg')}}" width="150" height="150">
                    </div>
                    <div class="col-md-8 text-left">
                        <h3>Sekolah Menengah Pertama - Bojonggede 02</h3>
                        <p>200x - 200x</p>
                        <p>Saya masuk SMP tahun 2016-an. Di SMP saya dibilang paling pinter pelajaran Bahasa ama TIK.
                            Belum berubah juga, saya paling males sama pelajaran MTK. Di SMP, saya alhamdulillah lumayan
                            berkembang daripada di SD, bobrok :(</p>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-4">
                        <img class="img-fluid" src="{{asset('image/tb.jpg')}}" width="150" height="150">
                    </div>
                    <div class="col-md-8 text-left">
                        <h3>SMK Taruna Bhakti - Depok</h3>
                        <p>2017 - 2020</p>
                        <p>Pas baru masuk, saya anaknya pendiem gak pecicilan. (karena ga tau siapa-siapa), saya
                            ("lumayan") rajin setelah masuk SMK. Gatau kenapa :/ wkwk. Saya banyak mengikuti kegiatan
                            tentang Jurusan saya.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr class="my-5">

    <!-- Work -->
    <div class="container text-center mt-5">
        <i class="fas fa-chalkboard-teacher fa-5x mb-3"></i>
        <h1>My Apps</h1>
        <div class="card-deck mt-3">
            <div class="card">
                <img class="card-img-top img-fluid mx-auto text-center mt-3" src="https://mrandika.github.io/img/icon-tembak.png"
                    alt="Tembak!">
                <div class="card-body">
                    <h5 class="card-title">Tembak!</h5>
                    <span class="badge badge-pill badge-warning">HTML5</span>
                    <p class="card-text">Permainan menembak meteor dengan pesawat luar angkasa mu!</p>
                    <a class="btn btn-outline-primary btn-md" href="https://mrandika.github.io/game/tembak">
                        <i class="fas fa-play"></i> Play
                    </a>
                    <p class="card-text"><small class="text-muted">Last updated about a year ago</small></p>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top img-fluid mx-auto text-center mt-3" src="https://mrandika.github.io/img/icon-cocok.png"
                    alt="Cocok!">
                <div class="card-body">
                    <h5 class="card-title">Cocok!</h5>
                    <span class="badge badge-pill badge-warning">HTML5</span>
                    <p class="card-text">Permainan mencocokan kartu dengan kartu yang lainnya.</p>
                    <a class="btn btn-outline-primary btn-md" href="https://mrandika.github.io/game/cocok">
                        <i class="fas fa-play"></i> Play
                    </a>
                    <p class="card-text"><small class="text-muted">Last updated about a year ago</small></p>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top img-fluid mx-auto text-center mt-3" src="https://mrandika.github.io/img/icon-tebak.png"
                    alt="Tebak!">
                <div class="card-body">
                    <h5 class="card-title">Tebak!</h5>
                    <span class="badge badge-pill badge-warning">HTML5</span>
                    <p class="card-text">Permainan menebak buah, for kids under 5! just kidding.</p>
                    <a class="btn btn-outline-primary btn-md" href="https://mrandika.github.io/game/tebak">
                        <i class="fas fa-play"></i> Play
                    </a>
                    <p class="card-text"><small class="text-muted">Last updated about a year ago</small></p>
                </div>
            </div>
        </div>
        <div class="card-deck mt-3 mb-5">
            <div class="card">
                <img class="card-img-top img-fluid mx-auto text-center mt-3" src="https://raw.githubusercontent.com/mrandika/classroom-android/master/Classroom/app/src/main/res/playstore-icon.png"
                    alt="Classroom">
                <div class="card-body">
                    <h5 class="card-title">Classroom</h5>
                    <span class="badge badge-pill badge-warning">Android</span>
                    <span class="badge badge-pill badge-info">Beta</span>
                    <p class="card-text">Aplikasi pengelola kelas dengan mudah, dan cepat. Pembaruan dari KelasKU.</p>
                    <a class="btn btn-outline-primary btn-md" href="https://github.com/mrandika/classroom-android/releases">
                        <i class="fas fa-arrow-down"></i> Download
                    </a>
                    <p class="card-text"><small class="text-muted">Last updated about 3 months ago</small></p>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top img-fluid mx-auto text-center mt-3" src="https://mrandika.github.io/img/icon-soon.png"
                    alt="Coming Soon">
                <div class="card-body">
                    <h5 class="card-title">Coming Soon</h5>
                    <span class="badge badge-pill badge-warning">:P</span>
                    <p class="card-text">Believe me, wonderful app is coming very soon than you expected !</p>
                    <p class="card-text"><small class="text-muted">Last updated about - ago</small></p>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top img-fluid mx-auto text-center mt-3" src="https://mrandika.github.io/img/icon-soon.png"
                    alt="Coming Soon">
                <div class="card-body">
                    <h5 class="card-title">Coming Soon</h5>
                    <span class="badge badge-pill badge-warning">:P</span>
                    <p class="card-text">Believe me, wonderful app is coming very soon than you expected !</p>
                    <p class="card-text"><small class="text-muted">Last updated about - ago</small></p>
                </div>
            </div>
        </div>

        <footer class="page-footer font-small blue pt-4">
            <div class="container-fluid text-center text-md-left">
                <div class="row">
                    <div class="col-md-6 mt-md-0 mt-3">
                        <h5 class="text-uppercase">Be In Touch</h5>
                        <div class="input-group mt-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-envelope"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Email" value="mrizkiandika226@gmail.com"
                                aria-describedby="inputGroupPrepend2" disabled>
                        </div>
                        <div class="input-group mt-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fab fa-twitter"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Twitter" value="RizkiAndika22"
                                aria-describedby="inputGroupPrepend2" disabled>
                        </div>
                        <div class="input-group mt-3 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fab fa-whatsapp"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Whatsapp" value="087788141384"
                                aria-describedby="inputGroupPrepend2" disabled>
                        </div>
                    </div>
                    <hr class="clearfix w-100 d-md-none pb-3">
                    <div class="col-md-6 mb-md-0 mb-3 text-right">
                        <h5 class="text-uppercase">External References</h5>
                        <ul class="list-unstyled">
                            <li>
                                <a href="#">Apple</a>
                            </li>
                            <li>
                                <a href="#">Google</a>
                            </li>
                            <li>
                                <a href="#">Udemy</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright text-center py-3">© 2018 Copyright:
                <a href="https://github.com/mrandika"> Muhammad Rizki Andika</a>
            </div>
        </footer>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-3.3.1.slim.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
</body>

</html>