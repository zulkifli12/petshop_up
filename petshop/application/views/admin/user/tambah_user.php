
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Form Tambah Data</h4>
                  <p class="card-description">
                    Tambah Data User
                  </p>
                  <form class="forms-sample" action="<?=base_url();?>user/tambah_aksi" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Nama</label>
                      <input type="text" name="nama" class="form-control" id="exampleInputUsername1" placeholder="Username">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email</label>
                      <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" name="sandi" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Role</label>
                      <select name="role" id="exampleFormControlSelect2" class="form-control form-control-lg">
                          <option value="">Select Role</option>
                          <?php foreach ($role as $m) : ?>
                              <option value="<?= $m->id_role; ?>"><?= $m->role; ?></option>
                          <?php endforeach; ?>
                      </select>
                    </div>
                    <!-- <div class="form-check form-check-flat form-check-primary">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input">
                        Remember me
                      </label>
                    </div> -->
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a class="btn btn-light" href="<?php echo base_url(); ?>user" role="button">Back</a>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
