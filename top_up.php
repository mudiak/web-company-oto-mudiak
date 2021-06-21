
<?php
include 'koneksi.php';
$aksi =isset($_GET['aksi']) ? $_GET['aksi'] : 'list';


if($page=='topup' && $aksi=='list'){
?>


<div class="content">
<h3>Top Up</h3>            
            <hr>

        <div class="card">

			<div class="card-header bg-success text-white ">
			</div>
			<div class="card-body">
            <div class="row">
            <div class="col-md-4 center-block">
                    <video autoplay="true" class="" align="center" id="previewtopup" width="100%"></video>
            </div>
            <div class="col-md-6">
                <div class="column">
                <form action="aksi_bus.php?page=topup&aksi=topup" method="post">
                    <div class="container">
                    <label class="text-info font-weight-bold" for="">Nama :</label>
                    </div>
                    <div class="container">
                    <input type="text" name="nama" id="namatopup" class="form-control col-md-5" readonly>
                    </div>
                    <div class="container">
                    <label class="text-info font-weight-bold" for="">Username :</label>
                    </div>
                    <div class="container">
                    <input type="text" name="username" id="usernametopup" class="form-control" readonly>
                    </div>
                    <div class="container">
                    <label class="text-info font-weight-bold" for="">Jumlah Top Up :</label>
                    </div>
                    <div class="container">
                    <input type="text" id="topup" class="form-control col-md-5" readonly>
                    <input type="hidden" name="wallet" id="topupinput"  >
                    </div>
                    <hr>
                    <input type="submit" name="topup" id="" value="Top Up" class="btn btn-warning">
                </div>
                </form>
            </div>
            </div>
		</div>
		</div>
        </div>
<?php

}elseif($page=='topup' & $aksi=='success'){
    if(isset($_GET['nama']) & isset($_GET['username']) & isset($_GET['topup'])){
?>
<div class="content">
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
<!-- / -->
<a href="?page=topup" class="text-success btn"><h2>Back Top Up</h2></a>         
            <hr>

        <div class="card">

			<div class="card-header bg-success text-white ">
			</div>
			<div class="card-body">
            <div class="row">
            <div class="col-md-4">
            <div class="column">
                    <div class="container">
                    <label class="text-info font-weight-bold" for="">Nama :</label>
                    </div>
                    <div class="container">
                    <label for="" class="text-success font-weight-bold "><?=$_GET['nama']?></label>
                    </div>
                    <div class="container">
                    <label class="text-info font-weight-bold" for="">Username :</label>
                    </div>
                    <div class="container">
                    <label for="" class="text-success font-weight-bold "><?=$_GET['username']?></label>

                    </div>
                    <div class="container">
                    <label class="text-info font-weight-bold" for="">Jumlah Top Up :</label>
                    </div>
                    <div class="container">
                    <label for="" class="text-success font-weight-bold ">Rp. <?=number_format($_GET['topup'],0,',','.')?></label>

                    </div>
                   
               
            </div>
            </div>                
            <div class="col-xl-8 center">
                <h2>Berhasil Top Up</h2>
<lottie-player src="https://assets3.lottiefiles.com/packages/lf20_pqdnvhfb.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
            </div>       
            </div>         
            </div>
                
            </div>
		</div>
		</div>
        </div>
<?php
    }else{


        ?>
<div class="content">
<lottie-player src="https://assets5.lottiefiles.com/private_files/lf30_fi8yfbmc.json"  background="transparent"  speed="1"  style="width: 100%; height: 100%;"  loop  autoplay></lottie-player>
</div>
        <?php
    }

    ?>
    

        <?php
}
?>
