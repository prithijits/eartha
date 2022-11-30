{{-- @extends('master') --}}
<!DOCTYPE HTML>
<html>
<head>
  <link href="{{('public/assets/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{('public/assets/css/style.css')}}" rel="stylesheet">
</head>
 <body>
  <section id="hero">
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
      <h1>Welcome</h1>
      <h2>Here You Can See Number Of Asteroids Passing Near Earth</h2>
      <form action="{{('data_search')}}" method="post" enctype="multipart/form-data">
        @csrf <!-- {{ csrf_field() }} -->
        <div class="container">
            <div class="row">
              <div class="col-4">
               <input type="date" name="from_date" class="form-control" required>
               <p>From Date</p>
              </div>
              <div class="col-4">
               <input type="date" name="to_date" class="form-control" required>
               <p>To Date</p>
              </div>
              <div class="col-4">
               <button type="submit" class="btn btn-success">Search</button>
             </div>
           </div>
        </div>
     </form>
    </div>
  </section>

  <script src="{{('public/assets/js/main.js')}}"></script>  
</body>


</html>