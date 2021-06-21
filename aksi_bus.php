<?php
$page=$_GET['page'];
$aksi = $_GET['aksi'];
include 'koneksi.php';

if($page=='list' & $aksi=='add'){
    $idbus =$_POST['idbus'];
    $plat =$_POST['plat'];
    $tgl =$_POST['tgl'];
    $waktuberangkat =$_POST['waktuberangkatg'];
    $waktusampai =$_POST['waktusampai'];
    $asal =$_POST['asal'];
    $tujuan =$_POST['tujuan'];
    $harga =$_POST['harga'];
    $idbusagency =substr($idbus,0,3);

    $sql = mysqli_query($conn,"INSERT INTO 
    `busdetails` (`id_bus`, `id_busagency`, `plat`, `time`, `tgl`, `time_finish`, `start_address`, `destination_address`, `price`) 
    VALUES ('$idbus', 
    '$idbusagency', '$plat',
     '$waktuberangkat', '$tgl',
      '$waktusampai', '$asal',
       '$tujuan', '$harga');");

       if($sql){
        header('location:index.php?page=list');
       }

}elseif($page=='list' & $aksi=='edit'){
    $idbus =$_POST['idbus'];
    $plat =$_POST['plat'];
    $tgl =$_POST['tgl'];
    $waktuberangkat =$_POST['waktuberangkatg'];
    $waktusampai =$_POST['waktusampai'];
    $asal =$_POST['asal'];
    $tujuan =$_POST['tujuan'];
    $harga =$_POST['harga'];

    $sql = mysqli_query($conn,"UPDATE `busdetails` 
    SET `plat` = '$plat',
    `tgl` = '$tgl',
     `time` = '$waktuberangkat', 
     `time_finish` = '$waktusampai ', 
     `start_address` = '$asal',
     `destination_address` = '$tujuan', 
     `price` = '$harga' 
     WHERE `busdetails`.`id_bus` = '$idbus';");

       if($sql){
        header('location:index.php?page=list');
       }

}elseif($page=='list' & $aksi=='delete'){
    $id = $_GET['id'];
    mysqli_query($conn,"delete from busdetails where id_bus='$id'");
    header('location:index.php?page=list');

}elseif($page=='tiket' & $aksi=='cektiket'){
    header('location:index.php?page=pemesanan&kode='.$_POST['tiket']);
    
}elseif($page=='topup' & $aksi=='topup'){
    $username = $_POST['username'];
    $walletinput = $_POST['wallet'];
    $nama = $_POST['nama'];

    $sqawal = mysqli_query($conn,"select emoney from busagency where id_busagency='$_COOKIE[idagency]'");

    $dataawal = mysqli_fetch_array($sqawal);
    $emoney = (int)$dataawal['emoney'];

    

if($emoney < $walletinput){
    header('location:index.php?page=topup&aksi=gagal');  

}else{
    $sqlambilwallet = mysqli_query($conn,"select * from customers where id_customer='$username'");
    $datawallet = mysqli_fetch_array($sqlambilwallet);
    $wallet = $datawallet['wallet'];
    $totalwallet = $wallet + $walletinput;
    mysqli_query($conn,"UPDATE `customers` 
    SET `wallet` = '$totalwallet' 
    WHERE `customers`.`id_customer` = '$username';");
    $totalemoney = $emoney - $walletinput;

   mysqli_query($conn,"UPDATE `busagency` SET `emoney` ='$totalemoney' 
   WHERE `busagency`.`id_busagency` = '$_COOKIE[idagency]'");


    header('location:index.php?page=topup&aksi=success&nama='.$nama.'&username='.$username.'&topup='.$walletinput);  
}
   
}

?>