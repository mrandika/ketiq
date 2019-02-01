<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        body {
            font: 20px Montserrat, sans-serif;
            line-height: 1.8;
            color: #f5f6f7;
        }
        p {font-size: 16px;}
        .margin {margin-bottom: 45px;}
        .bg-1 { 
            background: url(/image/poster.jpg);
            position: relative;
            width: 100%;
            height: 100%;
            background-size: cover;
            overflow: hidden;
            background-color: #0080ff; /* Blue */
            color: #ffffff;
        }
        .bg-2 { 
            background-color: #474e5d; /* Dark Blue */
            color: #ffffff;
        }
        .bg-3 { 
            background-color: #ffffff; /* White */
            color: #555555;
        }
        .bg-4 { 
            background-color: #2f2f2f; /* Black Gray */
            color: #fff;
        }
        .container-fluid {
            padding-top: 70px;
            padding-bottom: 70px;
        }
        .navbar {
            padding-top: 15px;
            padding-bottom: 15px;
            border: 0;
            border-radius: 0;
            margin-bottom: 0;
            font-size: 12px;
            letter-spacing: 5px;
        }
        .navbar-nav  li a:hover {
            color: #0080ff !important;
        }
    </style>
    <title>Rizki Andika's Website</title>
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>                        
            </button>
            <a class="navbar-brand" href="#">Andika</a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#who">WHO</a></li>
              <li><a href="#what">WHAT</a></li>
              <li><a href="#where">MY WORKS</a></li>
            </ul>
          </div>
        </div>
      </nav>
    
    <div class="container-fluid bg-1 text-center" id="who">
        <h3 class="margin">Who Am I?</h3>
        <img src="{{asset('image/profile.jpg')}}" class="img-responsive img-circle margin w3-animate-zoom" style="display:inline" alt="Profile" width="250" height="250">
        <h3>I'm an Mobile App Developer</h3>
    </div>
    
    <div class="container-fluid bg-2 text-center" id="what">
        <h3 class="margin">What Am I?</h3>
        <p>Hello! My name is Muhammad Rizki Andika, I'm a student on Taruna Bhakti Vocational High School. Now, I'm on Software Engineering class. To be exact, Software Engineering 2. I'm an iOS and Android App Developer using Swift and Java.</p>
    </div>

    <div class="container-fluid bg-3 text-center" id="where">    
        <h3 class="margin">Some of My Works</h3>
        <div class="row">
            <div class="col-sm-4"> 
                <h3>Tembak!</h3>
                <i>"A space shooter game"</i>
                <p>Permainan menembak meteor dengan pesawat luar angkasa mu!</p>
                <center><a href="game/tembak" target="_blank"><img src="{{asset('image/icon-tembak.png')}}" class="img-responsive margin" style="width:70%" alt="Image"></center></a>
            </div>
            <div class="col-sm-4"> 
                <h3>Cocok!</h3>
                <i>"A card matching game"</i>
                <p>Permainan mencocokan kartu dengan kartu yang lainnya.</p>
                <center><a href="game/cocok" target="_blank"><img src="{{asset('image/icon-cocok.png')}}"" class="img-responsive margin" style="width:70%" alt="Image"></center></a>
            </div>
            <div class="col-sm-4">
                <h3>Tebak!</h3>
                <i>"A fruit quiz game"</i>
                <p>Permainan menebak buah, for kids under 5! just kidding.</p>
                <center><a href="game/tebak" target="_blank"><img src="{{asset('image/icon-tebak.png')}}" class="img-responsive margin" style="width:70%" alt="Image"></center></a>
            </div>
            <div class="col-sm-4">
                <h3>Classroom</h3>
                <i>"A reimagined class management app"</i>
                <p>Aplikasi pengelola kelas dengan mudah, dan cepat. Pembaruan dari KelasKU.</p>
                <center><a href="https://github.com/mrandika/classroom-android/releases"><img src="https://github.com/mrandika/classroom-android/blob/master/Classroom/app/src/main/res/playstore-icon.png?raw=true" class="img-responsive margin" style="width:70%" alt="Image"></center></a>
            </div>
            <div class="col-sm-4">
                <h3>Coming Soon...</h3>
                <i>"A wonderful app coming soon..."</i>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit rerum quis asperiores.</p>
                <center><a href="#"><img src="{{asset('image/icon-soon.png')}}" class="img-responsive margin" style="width:70%" alt="Image"></center></a>
            </div>
            <div class="col-sm-4">
                <h3>Coming Soon...</h3>
                <i>"A wonderful app coming soon..."</i>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit rerum quis asperiores.</p>
                <center><a href="#"><img src="{{asset('image/icon-soon.png')}}" class="img-responsive margin" style="width:70%" alt="Image"></center></a>
            </div>
        </div>
    </div>

    <footer class="container-fluid bg-4 text-center">
        <p>Take a Look at <a href="https://github.com/mrandika">Github</a>.</p>
    </footer>

    <script>
        $('a[href*="#"]')
        .not('[href="#"]')
        .not('[href="#0"]')
        .click(function(event) {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    if (target.length) {
                    event.preventDefault();
                    $('html, body').animate({
                        scrollTop: target.offset().top
                    }, 1000, function() {
                    var $target = $(target);
                    $target.focus();
                    if ($target.is(":focus")) {
                        return false;
                    } else {
                        $target.attr('tabindex','-1');
                        $target.focus();
                    };
                });
            }
        }
    });
    </script>
</body>
</html>