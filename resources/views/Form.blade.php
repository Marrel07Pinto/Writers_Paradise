<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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

<form action="{{ route('writer.submit-form') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="formcontainer">
 <label for="fname"><b>First Name</b></label>
 <input type="text" placeholder="Enter First Name" name="w_firstname" required>

 <label for="phone"><b>Phone</b></label>
 <input type="tel" placeholder="Enter Phone Number" name="w_phone" required>

 <label for="address"><b>Address</b></label>
 <input type="text" placeholder="Enter Address" name="w_address" required>

 <label for="postcode"><b>Postcode</b></label>
 <input type="text" placeholder="Enter Postcode" name="w_postcode" required>

 <label for="postcode"><b>Profile Picture</b></label>
 <input type="file" name="w_img" required>

 <input type="submit" value="Submit">
</div>

</body>
</html>