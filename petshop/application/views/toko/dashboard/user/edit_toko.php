
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Form Edit Data</h4>
                  <p class="card-description">
                    Edit Data Toko
                  </p>
                  <form class="forms-sample" action="<?=base_url();?>toko/edit_aksi_toko" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Nama Pemilik</label>
                      <input type="text" name="nama_pemilik" value="<?php echo $hasil->nama; ?>" class="form-control" id="exampleInputUsername1" placeholder="Username" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Nama Toko</label>
                      <input type="text" name="nama_toko" value="<?php echo $hasil->nama_toko; ?>" class="form-control" id="exampleInputUsername1" placeholder="Username">
                      <input type="hidden" name="id" value="<?php echo $hasil->id_toko ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Alamat</label>
                      <textarea name="alamat" class="form-control" id="exampleInputUsername1" placeholder="Username"><?php echo $hasil->alamat; ?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">No Telp/HP</label>
                      <input type="number" name="no_telp" value="<?php echo $hasil->no_telp; ?>" class="form-control" id="exampleInputEmail1" placeholder="Email">
                    </div>
                    <!-- <div class="form-check form-check-flat form-check-primary">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input">
                        Remember me
                      </label>
                    </div> -->
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a class="btn btn-light" href="<?php echo base_url(); ?>toko/dashboard" role="button">Back</a>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
