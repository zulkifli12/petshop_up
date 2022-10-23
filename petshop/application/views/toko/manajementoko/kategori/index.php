<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">


        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title">Data Kategori Petshop</p>
            <div class="row">
              <div class="col-12">
                <div class="table-responsive">
                  <?= $this->session->flashdata('message'); ?>
                  <a href="<?php echo base_url(); ?>toko/tambah_kategori" class="btn btn-primary mb-3">Tambah Data Kategori</a>
                  <table id="example1" class="display expandable-table" style="width:100%">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1; ?>
                      <?php foreach ($kategori as $m) : ?>
                      <tr>
                        <td><?= $i; ?></td>
                        <td><?= $m->nama_kategori; ?></td>
                        <?php $status = $m->status;?>
                        <td><?php if ($status === '1') : ?>
                                <label class="badge badge-success">Publish</label>
                            <?php else : ?>
                                <label class="badge badge-danger">Non Publish</label>
                            <?php endif; ?></td>
                        <td>
                          <a href="<?=base_url();?>toko/publish_kategori/<?= $m->id_kategori; ?>/<?= $m->status; ?>" class="badge badge-info">Status</a>
                          <a href="<?=base_url();?>toko/edit_kategori/<?= $m->id_kategori; ?>" class="badge badge-success">Edit</a>
                          <a href="" class="badge badge-danger" data-toggle="modal" data-target="#hapuskategori<?= $m->id_kategori; ?>">Delete</a>
                        </td>
                      </tr>
                      <?php $i++; ?>
                  <?php endforeach; ?>
                    </tbody>
                </table>
                </div>
              </div>
            </div>
            </div>
          </div>


        </div>
      </div>
  </div>


  <?php foreach ($kategori as $m) : ?>
      <!-- Modal Hapus -->
      <div class="modal fade" id="hapuskategori<?= $m->id_kategori; ?>" tabindex="-1" aria-labelledby="hapussubMenuLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="hapussubMenuLabel">Hapus Data Produk</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <form action="<?= base_url('toko/hapus_kategori'); ?>" method="POST">
                      <div class="modal-body">
                          <div class="form-group">
                              <p>Yakin ingin menghapus data Kategori <?php echo $m->nama_kategori; ?> </p>
                              <input type="hidden" name="id" value="<?php echo $m->id_kategori; ?>">
                          </div>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-danger">Hapus Data Kategori</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  <?php endforeach; ?>
