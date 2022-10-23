
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Dashboard <?= $user['nama']; ?></h3>
                </div>
                <?= $this->session->flashdata('message'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card tale-bg">
                <div class="card-people mt-auto">
                  <div class="col-md-4">
                      <img src="<?= base_url(); ?>assets/images/<?= $user['image']; ?>" class="card-img"><br><br>
                      <a href="<?php echo base_url(); ?>toko/edit_data/<?= $user['id']; ?>" class="btn btn-primary btn-md">Update Data User</a>
                  </div>
                  <br>
                  <!-- <img src="<?=base_url();?>assets/skydash/images/dashboard/people.svg" alt="people"> -->
                  <div class="weather-info">
                    <div class="d-flex">
                      <div>
                            <span class="card-text user-info-title font-weight-bold mb-0 text-primary">Nama</span>
                            <p class="card-text mb-0" ><?= $user['nama']; ?></p>
                            <br>
                            <span class="card-text user-info-title font-weight-bold mb-0 text-primary">Email</span>
                            <p class="card-text mb-0"><?= $user['email']; ?></p>
                            <br>
                            <p class="card-text"><small class="text-muted">Last Update <?= date('d F Y', $user['date_created']); ?></small></p>
                            <br><br><br>
                            <a href="<?php echo base_url(); ?>toko/edit_data_toko/<?= $user['id_toko']; ?>" class="btn btn-primary btn-md">Update Data Toko</a>
                      </div>
                      <div class="ml-4">
                        <span class="card-text user-info-title font-weight-bold mb-0 text-primary">Role</span>
                        <p class="card-text mb-0"><?= $user['role']; ?></p>
                        <br>
                        <span class="card-text user-info-title font-weight-bold mb-0 text-primary">Status</span><br>
                        <?php $status = $user['is_active'];?>
                        <?php if ($status === '1') : ?>
                          <label class="badge badge-success">Aktif</label>
                        <?php else : ?>
                          <label class="badge badge-danger">Non Aktif</label>
                        <?php endif; ?>
                        <!-- <p class="card-text mb-0">1401011111980002</p> -->
                        <br>

                      </div>
                      <div class="ml-5">

                        <!-- <p class="card-text mb-0">1401011111980002</p> -->
                        <br>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin transparent">
              <!-- <div class="row"> -->
                <!-- <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="mb-4">Data User</p>
                      <p class="fs-30 mb-2"><?= $dtuser['total']; ?></p>
                    </div>
                  </div>
                </div> -->
                <!-- <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <p class="mb-4">Data Penjualan</p>
                      <p class="fs-30 mb-2">61344</p>
                      <p>22.00% (30 days)</p>
                    </div>
                  </div>
                </div> -->
              <!-- </div> -->
              <!-- <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                      <p class="mb-4">Data Produk</p>
                      <p class="fs-30 mb-2">34040</p>
                      <p>2.00% (30 days)</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <p class="mb-4">Data Stok</p>
                      <p class="fs-30 mb-2">47033</p>
                      <p>0.22% (30 days)</p>
                    </div>
                  </div>
                </div>
              </div> -->
            </div>
          </div>

          <div class="row">

          </div>

        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
