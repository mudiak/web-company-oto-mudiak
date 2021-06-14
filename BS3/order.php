<?php
include 'koneksi.php';

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
                    <a class="navbar-brand" href="#">Order</a>

                   


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
            $sql = mysqli_query($conn,"select * from orders");

        ?>
        <div class="table-responsive">
                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                  <thead class="bg-info text-white">
                  <tr>
                      <th>Id Bus</th>
                      <th>Nama Pelanggan</th>
                      <th>Nomor Bangku</th>
                      <th>Total Price</th>
                      
                    </tr>
                  </thead>
                 
                  <tbody>
                  <?php
                        while($data = mysqli_fetch_array($sql)){

                  ?>
                      <tr>
                      <td><?=$data['id_bus']?></td>
                      <td><?=$data['id_customer']?></td>
                      <td><?=$data['seat_number']?></td>
                      <td><?=$data['total_price']?></td>
                      </tr>

                      <?php
                        }
                      ?>
                  </tbody>
                </table>
              </div>
                </div>
<!-- <div class="content">
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
    <div class="form-group">
        <label>Username:</label>
        <input type="text" name="username" class="form-control" placeholder="Masukan Username" required />

    </div>
    <div class="form-group">
        <label>Nama Perusahaan:</label>
        <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required/>

    </div>
    <div class="form-group">
        <label>Alamat:</label>
        <textarea name="alamat" class="form-control" rows="5"placeholder="Masukan Alamat" required></textarea>

    </div>
    <div class="form-group">
        <label>Email:</label>
        <input type="email" name="email" class="form-control" placeholder="Masukan Email" required/>
    </div>
    <div class="form-group">
        <label>No HP:</label>
        <input type="text" name="no_hp" class="form-control" placeholder="Masukan No HP" required/>
    </div>

    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</div>
    </div> -->

  