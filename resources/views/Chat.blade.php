<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Writers_Paradise</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/assets/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Delicious
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/delicious-free-restaurant-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
 

  <!-- ======= Header ======= -->
  <section id="dashboardbackground">
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <div class="logo me-auto">
        <h1><a href="index.html">Writers Paradise</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>


      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="Home">Home</a></li>
          <li><a class="nav-link scrollto" href="Ebooks">E-Books</a></li>
          <li><a class="nav-link scrollto" href="Chat">Chat</a></li>
          <li><a class="nav-link scrollto" href="Cart">Cart</a></li>
          <li><a class="nav-link scrollto" href="{{url('/mpost')}}">Manage post</a></li>
          <li><a class="nav-link scrollto" href="Wprofile">Profile</a></li>
          <!-- <li><a class="nav-link scrollto" href="#contact">Contact</a></li> -->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="{{url('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="book-a-table-btn scrollto" href="{{url('logout')}}">Logout</a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
      </form>

    </div>
  </header>
</section><!-- End Header -->


        <div class="section-title">
          <h2>"Embracing Connection:<span>The Transformative Power of Chat</span></h2>
          <p>Communication is the cornerstone of connection and understanding in our world. In the realm of chat and digital communication, we find a remarkable avenue for fostering positive connections</p>
        </div>

 @foreach($posts as $post)
 @if($post->id % 2 != 0)
<section id="gallery" class="gallery">
      <div class="container-fluid"> 
          <div class="col-lg-4">
            <div class="gallery-item">
            <a class="nav-link scrollto" href="{{ url('/user-posts/'.$post->writer_id) }}">
            <p> <b>Writer:</b>{{ $post->Writer->w_firstname}}</p>
              <a href="{{ asset('posts').'/'.$post->post_img }}" class="gallery-lightbox">
                <img src="{{ asset('posts').'/'.$post->post_img }}" alt="" class="img-fluid">
                <div class="comments">
                
                <a class="nav-link scrollto" href="{{ route('Chat.comments', ['id' => $post->id]) }}">
                <p> <b>Caption:</b>{{ $post->p_Caption }}</p>
                
                 </a>
               
              </a> 
            </div>
          </div>
</section>
@else
<section id="gallery2" class="gallery2">
            <div class="container-fluid2">
            <a class="nav-link scrollto" href="{{ url('/user-posts/'.$post->writer_id) }}">
            <p> <b>Writer:</b>{{ $post->Writer->w_firstname}}</p> 
                <div class="col-lg-4">
                    <div class="gallery-item2">
                        <a href="{{ asset('posts').'/'.$post->post_img }}" class="gallery-lightbox">
                            <img src="{{ asset('posts').'/'.$post->post_img }}" alt="" class="img-fluid" >
                            <div class="comments">
                              
                              <a class="nav-link scrollto" href="{{ route('Chat.comments', ['id' => $post->id]) }}">
                             <b>Caption:</b>{{ $post->p_Caption }} 
                             
                           
                            </div>
                        </a>
                    </div>
                </div>
            </div>       
</section>
@endif
@endforeach

<div class="container mt-2">
@if ($errors->any())
    @foreach($errors->all() as $error)
      <div class="alert alert-danger" role="alert">
        {{$error}}
      </div>
    @endforeach
@endif
</div>

{{$posts->links()}}
<section id="contact" class="contact">
<form method="POST" action="{{ route('Chat.store') }}" enctype="multipart/form-data" class="">        
        @csrf
        <div class="row">
            <div class="col-md-5 form-group">
                <input type="text" name="p_Caption" class="form-control" id="caption" placeholder="Post Caption" >
            </div>
            <div class="col-md-6 form-group">
                <input type="file" name="p_image" required>
                <button type="submit">Post</button>
            </div>
        </div>
    </form>
</section>
 


 



   

   
  
           
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
    <h3>Book</h3>
    <p>“I look at books as being a form of activism. Sometimes they’ll show us a side of the world that we might not have known about.”— Angie Thomas </p>
      <div class="social-links">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
      <div class="copyright">
        &copy; Copyright <strong><span>Delicious</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/delicious-free-restaurant-bootstrap-theme/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/assets/js/main.js"></script>

</body>

</html>