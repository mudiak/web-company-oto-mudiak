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
    
}

?>