<?php 
if (!isset($_COOKIE['islogin'])) {
  header("location:login.php");
} else{

  $page=isset($_GET['page'])?$_GET['page']:'home';
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>OTO MUDIAK</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <script type="text/javascript" src="vendor/rupiah.js"></script>
  <script src="vendor/ckeditor/ckeditor/ckeditor.js"></script>
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
  <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
  <style>
 .clickable{
  border:0px solid #ccc;
  cursor:pointer;
  padding-top:12px;
  padding-bottom:12px;
 }
 .down-icon{
	position: fixed;
	width: 50px;
	height: 50px;
	border-radius: 50%;
	background: rgba(192,192,192,0.3);
	bottom: 40px;
	right: 50px;
	text-decoration: none;
	text-align: center;
	line-height: 50px;
	color:#ffffff;
}
.fa-chevron-circle-up{font-size: 30px;line-height: 50px;color:#01daec;}
 </style>
 <script type="text/javascript">
function PreviewImage() {
var oFReader = new FileReader();
oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);
oFReader.onload = function (oFREvent)
 {
    document.getElementById("uploadPreview").src = oFREvent.target.result;
};
};
</script>

 
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
        <i class="fas fa-bus"></i>
        </div>
        <div class="sidebar-brand-text mx-3">OTO MUDIAK</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item <?php if($page=='home') echo 'active'; ?>">
        <a class="nav-link " href="index.php">
        <i class="fas fa-home"></i>
          <span>Dashboard</span></a>
      </li>
      <li class="nav-item <?php if($page=='list') echo 'active'; ?>">
        <a class="nav-link " href="index.php?page=list">
        <i class="fas fa-home"></i>
          <span>List Bus</span></a>
      </li>
      <li class="nav-item <?php if($page=='pemesanan') echo 'active'; ?>">
      <a class="nav-link " href="index.php?page=pemesanan">
          <i class="fas fa-newspaper"></i>
          <span>Pemesanan </span></a>
          
      </li>
      <li class="nav-item <?php if($page=='topup'){ echo 'active'; }else{}?>">
      <a class="nav-link " href="index.php?page=topup">
          <i class="fas fa-wallet"></i>
          <span >Top Up Saldo</span></a>
      </li>

   

     
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

         
          <div class="topbar-divider d-none d-sm-block"></div>
          
          <p><strong>PT <?=$_COOKIE['nama']?></strong></p>
          
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
          
          <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <!-- <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span> -->
                <!-- <img class="img-profile rounded-circle" src=""> -->Log Out
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
               
               
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              
            </li>

           

            <!-- Nav Item - Messages -->
            


            <!-- Nav Item - User Information -->
          

          </ul>

        </nav>
        <!-- End of Topbar -->
        <div class="container-fluid">
        <div id="barcode-picker" style="max-width: 1280px; max-height: 80%;"></div>

<script src="https://unpkg.com/scandit-sdk"></script>
<script>
    console.log('Loading...');
    ScanditSDK.configure("xxx", {
engineLocation: "https://unpkg.com/scandit-sdk/build/"
    }).then(() => {
      console.log('Loaded');
      ScanditSDK.BarcodePicker.create(document.getElementById('barcode-picker'), {
        playSoundOnScan: true,
        vibrateOnScan: true
      }).then(function(barcodePicker) {
        console.log("Ready");
        barcodePicker.applyScanSettings(new ScanditSDK.ScanSettings({
          enabledSymbologies: ["ean8", "ean13", "upca", "upce", "code128", "code39", "code93", "itf", "qr"],
          codeDuplicateFilter: 1000
        }));
        barcodePicker.onScan(function(barcodes) {
          console.log(barcodes);
        });
      });
    });
</script>
        <?php include 'main.php'; ?>


        </div>
        <!-- Begin Page Content -->
       
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin Ingin Keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">??</span>
          </button>
        </div>
        <div class="modal-body">Klik "Logout" Jika Anda Ingin Log out Dari Website ini</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>


  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script>
  $(document).ready(function() {
  $('#dataTable').DataTable();
});
</script>
</div>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">

        <button type="button" name="close" class="close" data-dismiss="modal">&times;</button>
      
        <!-- <h4 class="modal-title">Modal Header</h4> -->
      </div>
      <div class="modal-body">
        <p>Scanner Ticket Customer.</p>
        <div class="row">
      <div class="col-md-6">
                    <video id="preview" width="100%"></video>
      </div>

      <?php
      if($_GET['page'] == 'pemesanan')
      {
      ?>
        <script type="text/javascript">
           let scanner = new Instascan.Scanner({ video: document.getElementById('preview')});
           Instascan.Camera.getCameras().then(function(cameras){
               if(cameras.length > 0 ){
                   scanner.start(cameras[0]);
               } else{
                   alert('No cameras found');
               }

           }).catch(function(e) {
               console.error(e);
           });

           scanner.addListener('scan',function(c){
               document.getElementById('text').value=c;
           });

        </script>

        <?php
      }
        ?>
        <div class="col-md-6">
        <form action="aksi_bus.php?page=tiket&aksi=cektiket" method="post">
         <label>SCAN QR CODE</label>
         <input type="text" name="tiket" id="text" readonyy="" placeholder="scan qrcode" class="form-control">
         <br>
         <input type="submit" name="cek" class="btn btn-primary" value="Cek Ticket">
         </form>

         

        </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</body>
<script>
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
           let scanner = new Instascan.Scanner({ video: document.getElementById('previewtopup')});
           Instascan.Camera.getCameras().then(function(cameras){
               if(cameras.length > 0 ){
                   scanner.start(cameras[0]);
               } else{
                   alert('No cameras found');
               }

           }).catch(function(e) {
               console.error(e);
           });

           scanner.addListener('scan',function(c){
            var myarr = c.split("#");
              var topup = numberWithCommas(myarr[2]);
               document.getElementById('topup').value=topup;
               document.getElementById('topupinput').value=myarr[2];
               document.getElementById('namatopup').value=myarr[1];
               document.getElementById('usernametopup').value=myarr[0];
           });

        </script>

</html>

<?php 
// function namabulan($index) {
//   $namaBln ="nama bulan";
//   switch($index){
//     case 1 : $namaBln = "Januari"; 
//     break; 
//     case 2 : $namaBln = "Februari"; 
//     break; 
//     case 3 : $namaBln = "Maret"; 
//     break; 
//     case 4 : $namaBln = "April"; 
//     break; 
//     case 5 : $namaBln = "Mei"; 
//     break; 
//     case 6 : $namaBln = "Juni"; 
//     break; 
//     case 7 : $namaBln = "Juli"; 
//     break; 
//     case 8 : $namaBln = "Agustus"; 
//     break; 
//     case 9 : $namaBln = "September"; 
//     break; 
//     case 10: $namaBln = "Oktober"; 
//     break; 
//     case 11: $namaBln = "November"; 
//     break; 
//     case 12: $namaBln = "Desember"; 
//     break; 
//   }
//   return $namaBln;
// }
}
?>