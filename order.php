<?php
include 'koneksi.php';

$page=$_GET['page'];
$aksi =isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
if($page=='pemesanan' && $aksi=='list'){

?>
		
       
		<div class="content">

            <h2>Pemesanan Tiket</h2>
            <hr>
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Scan Barcode</button>
<hr>
        <div class="card">

			<div class="card-header bg-success text-white ">
			</div>
			<div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered " id="" width="100%" cellspacing="0">
    
						<tr>
                        <th>Kode Pesanan</th>
                        <th>Nama Customer</th>
                        <th>Kode Bus</th>
                        <th>Plat Nomor Bus</th>
                        <th>Seat</th>
                      <th>Tanggal </th>
                      <th width="75">Waktu Keberangkatan</th>
                      <th>Waktu Sampai</th>
                      <th>Asal</th>
                      <th>Tujuan</th>
                      <th>Harga</th>
						</tr>
				
					<tbody>
					</tbody>

                    <?php
                    if(isset($_GET['kode'])){
                        $list= explode('#', $_GET['kode']);
                        
                        $sql = mysqli_query($conn,"SELECT orders.idorder as kodepesanan,
                        customers.name as name, 
                        orders.id_bus as kodebus, 
                        busdetails.plat as plat, 
                        busdetails.tgl as tgl, 
                        busdetails.time as berangkat, 
                        busdetails.time_finish as sampai, 
                        busdetails.start_address as asal, 
                        busdetails.destination_address as tujuan, 
                        orders.total_price as harga, 
                        orders.seat_number as seat 
                        FROM orders,customers,busdetails
                         WHERE orders.id_customer = customers.id_customer
                          AND orders.id_bus = busdetails.id_bus and orders.idorder = '$list[0]'");
                    }else{
                        $sql = mysqli_query($conn,"SELECT orders.idorder as kodepesanan,
                        customers.name as name, 
                        orders.id_bus as kodebus, 
                        busdetails.plat as plat, 
                        busdetails.tgl as tgl, 
                        busdetails.time as berangkat, 
                        busdetails.time_finish as sampai, 
                        busdetails.start_address as asal, 
                        busdetails.destination_address as tujuan, 
                        orders.total_price as harga, 
                        orders.seat_number as seat 
                        FROM orders,customers,busdetails
                         WHERE orders.id_customer = customers.id_customer
                          AND orders.id_bus = busdetails.id_bus AND orders.id_bus LIKE '$_COOKIE[idagency]%'");
                    }
                    
                        while($data = mysqli_fetch_array($sql)){

                  ?>
                      <tr>
                      <td><?=$data['kodepesanan']?></td>
                      <td><?=$data['name']?></td>
                      <td><?=$data['kodebus']?></td>
                      <td><?=$data['plat']?></td>
                      <td><?=$data['seat']?></td>
                      <td><?=$data['tgl']?></td>
                      <td><?=$data['berangkat']?></td>
                      <td><?=$data['sampai']?></td>
                      <td><?=$data['asal']?></td>
                      <td><?=$data['tujuan']?></td>
                      <td><?="Rp. ".number_format($data['harga'],0,',','.')?></td>
                      </tr>

                      <?php
                        }
                      ?>
	</table>
    </div>
		</div>
		</div>
        </div>


        

<?php
}elseif($page=='list' && $aksi=='add'){
    ?>
      
<div class="content">
<form action="aksi_bus.php?page=list&aksi=add" method="post">
    <div class="form-group">
        <label>ID Bus:</label>
        <input type="text" name="idbus"  class="form-control" placeholder="Masukan ID BUS" required />

    </div>
    <div class="form-group">
        <label>Plat Nomor:</label>
        <input type="text" name="plat"  class="form-control" placeholder="Masukan Plat Nomor" required/>

    </div>
   
    <div class="form-group col-xl-5">
        <label>Tanggal Keberangkatan:</label>
        <input type="date" name="tgl"  class="form-control" placeholder="Masukan Email" required/>
    </div>
    <div class="form-group">
        <label>Waktu Keberangkatan:</label>
        <input type="time" name="waktuberangkatg"  class="form-control" placeholder="Masukan Waktu Keberangkatan" required/>
    </div>
    <div class="form-group">
        <label>Waktu Sampai:</label>
        <input type="text" name="waktusampai"  class="form-control" placeholder="Masukan Waktu Sampai" required/>
    </div>
    <div class="form-group">
        <label>Asal :</label>
        <input type="text" name="asal"  class="form-control" placeholder="Masukan Asal" required/>
    </div>
    <div class="form-group">
        <label>Tujuan :</label>
        <input type="text" name="tujuan"  class="form-control" placeholder="Masukan Tujuan" required/>
    </div>
    <div class="form-group">
        <label>Harga :</label>
        <input type="number" name="harga" class="form-control" placeholder="Masukan Harga" required/>
    </div>

    <input type="submit" name="submit" class="btn btn-primary" value="Input">
</div>

    <?php
}elseif($page=='list'&& $aksi='edit'){
$id = $_GET['id'];

$sql = mysqli_query($conn,"SELECT * FROM `busdetails`  where id_bus='$id'");
$databus = mysqli_fetch_array($sql);
?>

<div class="content">
<form action="aksi_bus.php?page=list&aksi=edit" method="post">
<div class="form-group">
        <label>ID Bus:</label>
        <input type="text" name="idbus" value="<?=$databus['id_bus']?>"  class="form-control" placeholder="Masukan ID BUS" readonly />

    </div>
    <div class="form-group">
        <label>Plat Nomor:</label>
        <input type="text" name="plat"  value="<?=$databus['plat']?>" class="form-control" placeholder="Masukan Plat Nomor" required/>

    </div>
   
    <div class="form-group col-xl-5">
        <label>Tanggal Keberangkatan:</label>
        <input type="date" name="tgl" value="<?=$databus['tgl']?>" class="form-control" placeholder="Masukan Email" required/>
    </div>
    <div class="form-group">
        <label>Waktu Keberangkatan:</label>
        <input type="time" name="waktuberangkatg" value="<?=$databus['time']?>" class="form-control" placeholder="Masukan Waktu Keberangkatan" required/>
    </div>
    <div class="form-group">
        <label>Waktu Sampai:</label>
        <input type="text" name="waktusampai" value="<?=$databus['time_finish']?>" class="form-control" placeholder="Masukan Waktu Sampai" required/>
    </div>
    <div class="form-group">
        <label>Asal :</label>
        <input type="text" name="asal"value="<?=$databus['start_address']?>"  class="form-control" placeholder="Masukan Asal" required/>
    </div>
    <div class="form-group">
        <label>Tujuan :</label>
        <input type="text" name="tujuan" value="<?=$databus['destination_address']?>"class="form-control" placeholder="Masukan Tujuan" required/>
    </div>
    <div class="form-group">
        <label>Harga :</label>
        <input type="number" name="harga" value="<?=$databus['price']?>" class="form-control" placeholder="Masukan Harga" required/>
    </div>

    <input type="submit" name="submit" class="btn btn-primary" value="Input">

  

 </form>
</div>


<?php
}
?>