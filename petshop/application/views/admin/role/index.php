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
            <p class="card-title">Data Role Petshop</p>
            <div class="row">
              <div class="col-12">
                <div class="table-responsive">
                  <?= $this->session->flashdata('message'); ?>
                  <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahrole">Tambah Data Role</a>
                  <table id="example1" class="display expandable-table" style="width:100%">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1; ?>
                      <?php foreach ($role as $m) : ?>
                      <tr>
                        <td><?= $i; ?></td>
                        <td><?= $m->role; ?></td>
                        <?php $status = $m->status;?>
                        <td><?php if ($status === '1') : ?>
                                <label class="badge badge-success">Aktif</label>
                            <?php else : ?>
                                <label class="badge badge-danger">Non Aktif</label>
                            <?php endif; ?></td>
                        <td>
                          <a href="<?=base_url();?>role/active/<?= $m->id_role; ?>/<?= $m->status; ?>" class="badge badge-info">Status</a>
                        <a href="" class="badge badge-success" data-toggle="modal" data-target="#editrole<?= $m->id_role; ?>">Edit</a>
                          <a href="" class="badge badge-danger" data-toggle="modal" data-target="#hapusrole<?= $m->id_role; ?>">Delete</a>
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

  <div class="modal fade" id="tambahrole" tabindex="-1" aria-labelledby="tambahSubMenuLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="tambahSubMenuLabel">Tambah Role</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action="<?= base_url('role/tambah_aksi'); ?>" method="POST">
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Role</label>
                      <input type="text" name="role" class="form-control" id="exampleInputUsername1" placeholder="Role">
                    </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Add Role</button>
                  </div>
              </form>
          </div>
      </div>
  </div>

  <?php foreach ($role as $m) : ?>
      <!-- Modal Edit -->
      <div class="modal fade" id="editrole<?= $m->id_role; ?>" tabindex="-1" aria-labelledby="editsubMenuLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="editsubMenuLabel">Edit Role</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <form action="<?= base_url('role/edit_aksi'); ?>" method="POST">
                      <div class="modal-body">
                        <div class="form-group">
                          <label for="exampleInputUsername1">Role</label>
                          <input type="text" name="role" class="form-control" value="<?= $m->role; ?>" id="exampleInputUsername1" placeholder="Role">
                        </div>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Edit Role</button>
                      </div>
                      <input type="hidden" readonly value="<?= $m->id_role; ?>" name="id" class="form-control">
                  </form>
              </div>
          </div>
      </div>
  <?php endforeach; ?>

  <?php foreach ($role as $m) : ?>
      <!-- Modal Hapus -->
      <div class="modal fade" id="hapusrole<?= $m->id_role; ?>" tabindex="-1" aria-labelledby="hapussubMenuLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="hapussubMenuLabel">Hapus Role</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <form action="<?= base_url('role/hapus'); ?>" method="POST">
                      <div class="modal-body">
                          <div class="form-group">
                              <p>Yakin ingin menghapus data Role <?php echo $m->role; ?> </p>
                              <input type="hidden" name="id" value="<?php echo $m->id_role; ?>">
                          </div>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-danger">Hapus Role</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  <?php endforeach; ?>
