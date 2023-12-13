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
</head>

<body>
  <div class=form-container>
    <form method="post" action="{{url('/submit-form'.'/'.$userLogged->id)}}" enctype="multipart/form-data">
    @csrf
    @method('put')
    <table class="table table-bordered">
      <tr>
        <th>First Name</th>
        <td><input type="text" name="w_firstname" value="{{$userLogged->writer->w_firstname ?? $userLogged->writer->w_firstname}}"class="form-control" /></td>
      </tr>
      <tr>
        <th>Phone</th>
        <td><input type="text" name="w_phone" value="{{$userLogged->writer->w_phone ?? $userLogged->writer->w_phone}}"class="form-control"  pattern="^\+\d*" title="Please enter only numbers" required></td>
        </tr>
      <tr>
        <th>Address</th>
        <td><input type="text" name="w_address" value="{{$userLogged->writer->w_address ?? $userLogged->writer->w_address}}" class="form-control" required /></td>
      </tr>
      <tr>
        <th>Post Code</th>
        <td><input type="text" name="w_postcode" value="{{$userLogged->writer->w_postcode ?? $userLogged->writer->w_postcode}}" class="form-control" required/></td>
      </tr>
      <tr>
        <th>Photo</th>
        <td>
          @if($userLogged->writer->w_img)
            <p class="my-2"><img width="80" src="{{asset('/profileimg')}}/{{$userLogged->writer->w_img}}" /></p>
            <input type="hidden" value="{{$userLogged->writer->w_img }}" name="w_img" />
          @endif
          <input type="file" name="w_img" />
        </td>
      </tr>
      <tr>
        <td colspan="2">
        <input type="submit" class="btn btn-primary" />
        </td>
        </tr>
      </table>
    </form>
  </div>
</body>
</html>