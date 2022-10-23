
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Form Edit Data</h4>
                  <p class="card-description">
                    Edit Data User
                  </p>
                  <form class="forms-sample" action="<?=base_url();?>toko/edit_aksi" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Nama</label>
                      <input type="text" name="nama" value="<?php echo $hasil->nama; ?>" class="form-control" id="exampleInputUsername1" placeholder="Username">
                      <input type="hidden" name="id" value="<?php echo $hasil->id ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Inisial</label>
                      <input type="text" name="inisial" value="<?php echo $hasil->inisial; ?>" class="form-control" id="exampleInputUsername1" placeholder="Username" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email</label>
                      <input type="email" name="email" value="<?php echo $hasil->email; ?>" class="form-control" id="exampleInputEmail1" placeholder="Email" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Password</label>
                      <p class="card-description">
                        Password Anda Sekarang <code>(<?php echo $hasil->ket_pass; ?>)</code> Rubahlah Password Jika Dibutuhkan!!
                      </p>
                      <input type="password" name="password" class="form-control" id="exampleInputUsername1" placeholder="New Password">
                    </div>
                    <div class="form-group">
                        <label for="barcode">Profil</label>
                        <?php
                    echo "<div class='mb-2'><img height='100px' src=" . base_url() . "assets/images/" . $hasil->image . "></div>";
                    ?>
                        <input type="file" name="fotopost" class="form-control" placeholder="Profil">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Role</label>
                      <input type="text" name="role" value="<?php echo $hasil->role; ?>" class="form-control" id="exampleInputEmail1" placeholder="Email" readonly>
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
