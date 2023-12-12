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
    <form action="{{url('/submit-updatepost-form/' . $post->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    {{ method_field('PUT') }}
    <table class="table table-bordered">
      <tr>
        <th>Caption</th>
        <td><input type="text" name="p_Caption" value="{{$post->p_Caption ?? $post->p_Caption}}"class="form-control" /></td>
      </tr>
      <tr>
        <th>Image</th>
        <td>
            <p class="my-2"><img width="80" src="{{asset('posts')}}/{{$post->post_img}}" /></p>
            <input type="hidden" value="{{$post->post_img}}" name="post_img" />
            <input type="file" name="post_img" />
        </td>
      </tr>
      <tr>
        <td colspan="2">
        <button type="submit"> Submit</button>
        </td>
        </tr>
      </table>
    </form>
  </div>
</body>
</html>