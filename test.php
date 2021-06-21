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
  <script type="text/javascript" src="instascan.min.js"></script>
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


 
</head>

<body>
<h2>sfdsf</h2>
    <video id="previeww" height="300"></video>
</body>
<script >
let scanner =new Instascan.Scanner({video: document.getElementById('previeww')});
scanner.addListener('scan', function(content){
    alert(content);
});

Instascan.Camera.getCameras().then(function (cameras){
    if(cameras.length > 0){
        scanner.start(cameras[0]);
    }else{
        console.error('No cameras Found');
    }
}).catch(function (e)){
    console.error(e);
});
   


</script>

</html>