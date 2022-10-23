
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Form Tambah Data</h4>
                  <p class="card-description">
                    Tambah Data Kategori
                  </p>
                  <form class="forms-sample" action="<?=base_url();?>toko/tambah_aksi_kategori" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Nama Kategori</label>
                      <input type="text" name="nama" class="form-control" id="exampleInputUsername1" placeholder="Nama Kategori">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a class="btn btn-light" href="<?php echo base_url(); ?>toko/data_kategori" role="button">Back</a>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
