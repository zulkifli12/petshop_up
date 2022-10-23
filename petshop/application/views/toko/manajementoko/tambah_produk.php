
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Form Tambah Data</h4>
                  <p class="card-description">
                    Tambah Data Produk
                  </p>
                  <form class="forms-sample" action="<?=base_url();?>toko/tambah_aksi_produk" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Nama Produk</label>
                      <input type="text" name="nama" class="form-control" id="exampleInputUsername1" placeholder="Nama Produk">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Harga</label>
                      <input type="number" name="harga" class="form-control" id="exampleInputEmail1" placeholder="Harga">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Stok Produk</label>
                      <input type="number" name="stok" class="form-control" id="exampleInputEmail1" placeholder="Stok Produk">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Deskripsi</label>
                      <textarea name="deskripsi" class="form-control" id="exampleInputPassword1" placeholder="Deskripsi"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Kategori Produk</label>
                      <select name="kategori" id="exampleFormControlSelect2" class="form-control form-control-lg">
                          <option value="">Select Kategori</option>
                          <?php foreach ($kategori as $m) : ?>
                              <option value="<?= $m->id_kategori; ?>"><?= $m->nama_kategori; ?></option>
                          <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group">
                        <label for="barcode">Gambar Produk</label>
                        <input type="file" name="fotopost" class="form-control" placeholder="Gambar Produk">
                    </div>
                    <!-- <div class="form-check form-check-flat form-check-primary">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input">
                        Remember me
                      </label>
                    </div> -->
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a class="btn btn-light" href="<?php echo base_url(); ?>toko/data_produk" role="button">Back</a>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
