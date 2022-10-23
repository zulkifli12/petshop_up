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
                  <p class="card-title">Data User Petshop</p>
                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <?= $this->session->flashdata('message'); ?>
                        <a href="<?php echo base_url(); ?>user/tambah" class="btn btn-primary mb-3">Tambah Data User</a>
                        <table id="example1" class="display expandable-table" style="width:100%">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Nama Pengguna</th>
                              <th>Email Pengguna</th>
                              <th>Role ID</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($user as $m) : ?>
                            <tr>
                              <td><?= $i; ?></td>
                              <td><?= $m->nama; ?></td>
                              <td><?= $m->email; ?></td>
                              <td><?= $m->role; ?></td>
                              <?php $is_active = $m->is_active;?>
                              <td><?php if ($is_active === '1') : ?>
                                      <label class="badge badge-success">Aktif</label>
                                  <?php else : ?>
                                      <label class="badge badge-danger">Non Aktif</label>
                                  <?php endif; ?></td>
                              <td>
                                <a href="<?=base_url();?>user/active/<?= $m->id; ?>/<?= $m->is_active; ?>" class="badge badge-info">Status</a>
                                <a href="<?=base_url();?>user/edit/<?= $m->id; ?>" class="badge badge-success">Edit</a>
                                <a href="" class="badge badge-danger" data-toggle="modal" data-target="#hapususer<?= $m->id; ?>">Delete</a>
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


        <?php foreach ($user as $m) : ?>
            <!-- Modal Hapus -->
            <div class="modal fade" id="hapususer<?= $m->id; ?>" tabindex="-1" aria-labelledby="hapussubMenuLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="hapussubMenuLabel">Hapus User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url('user/hapus'); ?>" method="POST">
                            <div class="modal-body">
                                <div class="form-group">
                                    <p>Yakin ingin menghapus data User <?php echo $m->nama; ?> </p>
                                    <input type="hidden" name="id" value="<?php echo $m->id; ?>">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Hapus User</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
