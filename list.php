<?php
include 'koneksi.php';

$page=$_GET['page'];
$aksi =isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
if($page=='list' && $aksi=='list'){
?>
		
       
		<div class="content">
			<a href="?page=list&aksi=add" class="btn btn-primary ">Tambah Jadwal Bus</a>
            
            <hr>

        <div class="card">

			<div class="card-header bg-success text-white ">
			</div>
			<div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
    
						<tr>
                        <th>Kode Bus</th>
                        <th>Plat Nomor Bus</th>
                      <th>Tanggal </th>
                      <th>Waktu Keberangkatan</th>
                      <th>Waktu Sampai</th>
                      <th>Asal</th>
                      <th>Tujuan</th>
                      <th>Harga</th>
                      <th>Aksi</th>
						</tr>
				
					<tbody>
					</tbody>

                    <?php
                    $sql = mysqli_query($conn,"select * from busdetails where id_busagency= 'B01'");
                        while($data = mysqli_fetch_array($sql)){

                  ?>
                      <tr>
                      <td><?=$data['id_bus']?></td>
                      <td><?=$data['plat']?></td>
                      <td><?=$data['tgl']?></td>
                      <td><?=$data['time']?></td>
                      <td><?=$data['time_finish']?></td>
                      <td><?=$data['start_address']?></td>
                      <td><?=$data['destination_address']?></td>
                      <td><?="Rp. ".number_format($data['price'],0,',','.')?></td>
                      <td>
                      <a href="?page=list&aksi=edit&id=<?=$data['id_bus']?>" class="text-info"><i class="fas fa-edit"></i></a>|
                      <a href="aksi_bus.php?page=list&aksi=delete&id=<?=$data['id_bus']?>" class="text-danger" onclick="return confirm('Yakin akan menghapus data? ')"><i class="fas fa-trash "></i></a>
                      
                      </td>
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