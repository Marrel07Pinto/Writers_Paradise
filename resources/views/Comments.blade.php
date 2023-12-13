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

        <div class="section-title">
          <h2>Some photos from <span>Our Restaurant</span></h2>
          <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
        </div>
        
<section class="gallery_image" >
            <h><b>Writer:</b> {{$post->writer->w_firstname}}</h>
            <div class="grid-container">
                <figure class="grid-item">
                <img src="{{ asset('posts').'/'.$post->post_img }}" alt="">
                    <figcaption><b>Caption:</b>{{ $post->p_Caption }}</figcaption>
                </figure>   
            </div>
          
            <!-- --------save comment--------------------->
            @if(Auth::check())
<div id="comments">
    <h2>Comments<span class="badge bg-dark">{{ count($post->comments) }}</span></h2>
    @if($post->comments)
        @foreach($post->comments as $comment)
        <div class="blockquote">
            <p class="mb-0">{{$comment->c_messages}}</p>
            <p></p>
            <footer class="blockquote-footer">{{$comment->writer->w_firstname}}<br></footer>

            @if(Auth::id() == $comment->writer->user_id)
            <p class="mb-0">
                <a href="#" class="btn btn-success edit-comment-btn" data-comment-id="{{$comment->id}}">Edit</a>
            </p>
            <form class="edit-comment-form d-none" id="editCommentForm-{{ $comment->id }}" data-comment-id="{{ $comment->id }}">
                @csrf
                @method('PUT')
                <p></p>
                <textarea name="edited_comment" style="background-color: white; color: black" class="btn btn-success form-control">{{$comment->c_messages}}</textarea>
                <p></p>
                <button type="submit" class="btn btn-success mt-2">Update</button>
            </form>
            @endif
        </div>
        <hr>
        @endforeach
    @endif
</div>
<div class="comment-form" id="commentForm">
        <h class="card-header">Add Comment</h>
        <form method="post" action="{{ route('save.comment', ['slug' => Str::slug($post->p_Caption), 'id' => $post->id]) }}">
            @csrf
            <input type="text" name="comment" class="comment-input" id="commentInput" placeholder="Add a comment...">
            <button type="submit" class="comment-button">Submit</button>
        </form>
      </div>
      @endauth
</section> 

<!-- Your existing form for adding comments -->

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Attach event listeners to all edit-comment forms
    // document.querySelectorAll('.edit-comment-form').forEach(function (form) {
    //     form.addEventListener('submit', function (event) {
    //         event.preventDefault();
            document.querySelectorAll('.edit-comment-form').forEach(function (form) {
    form.addEventListener('submit', function (event) {
        event.preventDefault();
        console.log('Update form submitted');

            // Get the form data
            const formData = new FormData(this);

            // Use Axios for the AJAX request
            console.log("URL:", "{{ route('update.comment', ['id' => '__COMMENT_ID__']) }}".replace('__COMMENT_ID__', this.getAttribute('data-comment-id')));
            axios.put("{{ route('update.comment', ['id' => '__COMMENT_ID__']) }}".replace('__COMMENT_ID__', this.getAttribute('data-comment-id')), formData)
                .then(response => {
                    // Handle success (if needed)
                    console.log(response.data);
                    // Reload the page or update the comment section as needed
                    location.reload();
                })
                .catch(error => {
                    // Handle error (if needed)
                    console.error(error);
                });
        });
    });

    // Show/hide edit-comment forms based on button click
    document.querySelectorAll('.edit-comment-btn').forEach(function (button) {
        button.addEventListener('click', function () {
            // Get the associated form ID
            var formId = 'editCommentForm-' + this.getAttribute('data-comment-id');
            // Toggle the visibility of the form
            document.getElementById(formId).classList.toggle('d-none');
        });
    });
});
</script>







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