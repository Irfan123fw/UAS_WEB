<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fontss/icomoon/style.css">

    <link rel="stylesheet" href="csss/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="csss/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="csss/style.css">

    <title>Login </title>
  </head>
  <body>
  

  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('imagess/bg_1.jpg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <h3 class="text-center">Login</h3>
            <form action="proseslogin.php" method="post">
              <div class="form-group first">
                <label for="username">Username</label>
                <input type="text" class="form-control" placeholder="username" id="username" name="username">
              </div>
              <div class="form-group last mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Your Password" id="password" name="password">
              </div>
              <!-- <div class="form-group last mb-3">
              <select class="form-control" name="level" id="level">
          <option> -- Pilih Salah Satu --</option>
          <option value="admin"> admin</option>
          <option value="anggota"> anggota</option>
        </select>
              </div> -->
              
              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                  <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>
                <span class="ml-auto"><a href="index.php" class="forgot-pass">Kembali</a></span> 
              </div>

              <input type="submit" value="Log In" class="btn btn-block btn-info">

            </form>
          </div>
        </div>
      </div>
    </div>

    
  </div>
    
    

    <script src="jss/jquery-3.3.1.min.js"></script>
    <script src="jss/popper.min.js"></script>
    <script src="jss/bootstrap.min.js"></script>
    <script src="jss/main.js"></script>
  </body>
</html>