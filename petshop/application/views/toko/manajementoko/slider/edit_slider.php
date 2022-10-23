
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Form Edit Data</h4>
                  <p class="card-description">
                    Edit Data Slider
                  </p>
                  <form class="forms-sample" action="<?=base_url();?>toko/edit_aksi_slider" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Nama Slider</label>
                      <input type="text" name="nama" value="<?php echo $hasil->nama_slider; ?>" class="form-control" id="exampleInputUsername1" placeholder="Username">
                      <input type="hidden" name="id" value="<?php echo $hasil->id_slider ?>">
                    </div>
                    <div class="form-group">
                        <label for="barcode">Gambar Slider</label>
                        <?php
                    echo "<div class='mb-2'><img height='100px' src=" . base_url() . "assets/images/slider/" . $hasil->gambar . "></div>";
                    ?>
                        <input type="file" name="fotopost" class="form-control" placeholder="Profil">
                    </div>
                    <!-- <div class="form-check form-check-flat form-check-primary">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input">
                        Remember me
                      </label>
                    </div> -->
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a class="btn btn-light" href="<?php echo base_url(); ?>toko/slider" role="button">Back</a>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
