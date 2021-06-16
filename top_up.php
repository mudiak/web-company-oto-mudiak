
<?php
include 'koneksi.php';

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
                    <video class="" align="center" id="previewtopup" width="100%"></video>
            </div>
            <div class="col-md-6">
                <div class="column">
                    <div class="container">
                    <label class="text-info font-weight-bold" for="">Nama :</label>
                    </div>
                    <div class="container">
                    <input type="text" id="namatopup" class="form-control col-md-5" readonly>
                    </div>
                    <div class="container">
                    <label class="text-info font-weight-bold" for="">Username :</label>
                    </div>
                    <div class="container">
                    <input type="text" id="usernametopup" class="form-control" readonly>
                    </div>
                    <div class="container">
                    <label class="text-info font-weight-bold" for="">Jumlah Top Up :</label>
                    </div>
                    <div class="container">
                    <input type="text" id="topup" class="form-control col-md-5" readonly>
                    <input type="hidden" id="topupinput"  >
                    </div>
                    <hr>
                    <input type="submit" name="topup" id="" value="Top Up" class="btn btn-warning">
                </div>
            </div>
            </div>
		</div>
		</div>
        </div>
