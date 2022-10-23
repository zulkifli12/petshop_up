<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?=$title;?></title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?=base_url();?>assets/skydash/vendors/feather/feather.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/skydash/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/skydash/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?=base_url();?>assets/skydash/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?=base_url();?>assets/skydash/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="<?=base_url();?>assets/skydash/images/logo.svg" alt="logo">
              </div>
              <h4>Registrasi Akun Petshop</h4>
              <h6 class="font-weight-light">Register</h6>
              <form class="pt-3" action="<?=base_url();?>auth/register" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <input type="text" name="nama" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email">
                </div>
                <div class="form-group">
                  <select name="role" id="exampleFormControlSelect2" class="form-control form-control-lg">
                      <option value="">Select Role</option>
                      <?php foreach ($role as $m) : ?>
                          <option value="<?= $m->id_role; ?>"><?= $m->role; ?></option>
                      <?php endforeach; ?>
                  </select>
                  <!-- <select class="form-control form-control-lg" id="exampleFormControlSelect2">
                    <option>Country</option>
                    <option>United States of America</option>
                    <option>United Kingdom</option>
                    <option>India</option>
                    <option>Germany</option>
                    <option>Argentina</option>
                  </select> -->
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="mb-4">
                  <!-- <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      I agree to all Terms & Conditions
                    </label>
                  </div> -->
                </div>
                <div class="mt-3">
                  <button type="submit" value="kirim" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">REGISTER</button>
                  <!-- <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="../../index.html">REGISTER</a> -->
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Sudah Punya Akun? <a href="<?=base_url('auth');?>" class="text-primary">Login</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?=base_url();?>assets/skydash/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?=base_url();?>assets/skydash/js/off-canvas.js"></script>
  <script src="<?=base_url();?>assets/skydash/js/hoverable-collapse.js"></script>
  <script src="<?=base_url();?>assets/skydash/js/template.js"></script>
  <script src="<?=base_url();?>assets/skydash/js/settings.js"></script>
  <script src="<?=base_url();?>assets/skydash/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
