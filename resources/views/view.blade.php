<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="{{asset('css/article.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/blog/footer.css')}}">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md navigation-clean">
        <div class="container"><a class="navbar-brand" href="{{url('blog')}}">Andika Blog</a><button class="navbar-toggler"
                data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span
                    class="navbar-toggler-icon"></span></button>
        </div>
    </nav>
    <div class="article-clean mt-5 mb-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-8 offset-lg-1 offset-xl-2">
                    <div class="intro">
                        <h1 class="text-center">Your Wonderful Article Title</h1>
                        <p class="text-center"><span class="by">by</span> <a href="#">Author Name</a> | <span class="date">Sept
                                8th, 2016 </span></p>
                    </div>
                    <div class="text">
                        <p>Sed lobortis mi. Suspendisse vel placerat ligula. <span style="text-decoration: underline;">Vivamus</span>
                            ac sem lac. Ut vehicula rhoncus elementum. Etiam quis tristique lectus. Aliquam in arcu
                            eget velit pulvinar dictum vel in
                            justo. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
                            Curae.</p>
                        <p>Praesent sed lobortis mi. Suspendisse vel placerat ligula. Vivamus ac lacus. <strong>Ut
                                vehicula rhoncus</strong> elementum. Etiam quis tristique lectus. Aliquam in arcu eget
                            velit <em>pulvinar dict</em> vel in justo. Vestibulum
                            ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.</p>
                        <h2>Aliquam In Arcu </h2>
                        <p>Suspendisse vel placerat ligula. Vivamus ac sem lac. Ut vehicula rhoncus elementum. Etiam
                            quis tristique lectus. Aliquam in arcu eget velit pulvinar dictum vel in justo. Vestibulum
                            ante ipsum primis in faucibus orci luctus et ultrices
                            posuere cubilia Curae.</p>
                        <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.
                            Suspendisse vel placerat ligula. Vivamus ac sem lac. Ut vehicula rhoncus elementum. Etiam
                            quis tristique lectus. Aliquam in arcu eget velit
                            pulvinar dictum vel in justo.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-clean">
            <footer>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-sm-4 col-md-3 item">
                            <h3>Services</h3>
                            <ul>
                                <li><a href="#">Web design</a></li>
                                <li><a href="#">Development</a></li>
                                <li><a href="#">Hosting</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-4 col-md-3 item">
                            <h3>About</h3>
                            <ul>
                                <li><a href="#">Company</a></li>
                                <li><a href="#">Team</a></li>
                                <li><a href="#">Legacy</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-4 col-md-3 item">
                            <h3>Careers</h3>
                            <ul>
                                <li><a href="#">Job openings</a></li>
                                <li><a href="#">Employee success</a></li>
                                <li><a href="#">Benefits</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-3 item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i
                                    class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a
                                href="#"><i class="icon ion-social-instagram"></i></a>
                            <p class="copyright">Company Name © 2017</p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
</body>

</html>