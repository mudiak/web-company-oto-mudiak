<?php 
 include "koneksi.php" ;
?>
<div class="main-panel">
		<nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">List Bus</a>

                   


                </div>
               
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                       
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                       
                        <li>
                            <a href="#">
                                <p>Log out</p>
                            </a>
                        </li>
						<li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="content">
        <?php
            $sql = mysqli_query($conn,"select * from busdetails");

        ?>
        <div class="table-responsive">
                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                  <thead class="bg-info text-white">
                  <tr>
                      <th>Kode Bus</th>
                      <th>Kode Agen Bus</th>
                      <th>Tanggal Keberangkatan</th>
                      <th>Waktu Keberangkatan</th>
                      <th>Waktu Sampai</th>
                      <th>Asal</th>
                      <th>Tujuan</th>
                      <th>Harga</th>

                    </tr>
                  </thead>
                 
                  <tbody>
                  <?php
                        while($data = mysqli_fetch_array($sql)){

                  ?>
                      <tr>
                      <td><?=$data['id_bus']?></td>
                      <td><?=$data['id_busagency']?></td>
                      <td><?=$data['tgl']?></td>
                      <td><?=$data['time']?></td>
                      <td><?=$data['time_finish']?></td>
                      <td><?=$data['start_address']?></td>
                      <td><?=$data['destination_address']?></td>
                      <td><?=$data['price']?></td>
                      </tr>

                      <?php
                        }
                      ?>
                  </tbody>
                </table>
              </div>
                </div>
<!-- 
    <div class="main-panel">
		<nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">List Bus</a>



                    
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                       
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                       
                        <li>
                            <a href="#">
                                <p>Log out</p>
                            </a>
                        </li>
						<li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

   -->