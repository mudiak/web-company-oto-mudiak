<?php 
if(isset($_COOKIE['islogin'])) {
  header("location:index.php");
  exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-info">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-6 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <!-- Nested Row within Card Body -->
            <div class="column">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Admin</h1>
                  </div>
                  <form class="user" method="POST">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="username" name="username" aria-describedby="Usernamehelp" placeholder="Enter Your Username">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                    </div>
                   
                    <input type="submit" value="Login" name="login" class="btn btn-primary btn-user btn-block">
                    
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgotpassword.php">Forgot Password?</a>
                  </div>
                  
                </div>
            </div>
        </div>

      </div>

    </div>

  </div>
 

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>
<?php

include 'koneksi.php';

if (isset($_POST['login'])) {
  $uname=(isset($_POST['username'])? $_POST['username']:'');
  $ps=(isset($_POST['password'])? $_POST['password']:'');
  $pswd=md5($ps);
  $q=mysqli_query($koneksi,"SELECT * FROM busagency WHERE username='$uname' AND password='$pswd'");
  $cek=mysqli_fetch_array($q);
  if ($cek) {
    setcookie('user', $cek['username'], time()+(3600 * 24));
    setcookie('nama', $cek['nama_operator'], time()+(3600 * 24));
    setcookie('islogin', true, time()+(3600 * 24));
    setcookie('profil', 'assets/operator/'.$cek['profil'], time()+(3600 * 24));
    header("location:index.php");
    // echo "<script>top.location='index.php'</script>";
  } else {
    echo "<script>alert('Invalid Username or Password')</script>";
  }
}
?>

</html>
