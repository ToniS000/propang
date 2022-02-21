<?= $this->extend('layout/templates'); ?>

<?= $this->Section('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Profile</h1>


  <!-- Content Row -->
  <div class="row">
    <!-- Donut Chart -->
    <div class="col-xl-4 col-lg-5">
      <div class="card shadow mb-4">

        <!-- Card Body -->
        <div class="card-body">
          <div class="text-center">
            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4 img-profile" style="width: 25rem;" src="/img/undraw_posting_photo.svg" alt="...">
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-8 col-lg-7">

      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
        </div>
        <div class="card-body">
          <form class="user form-horizontal" action="/profile" method="post">
            <div class="form-group">
              <div class="row">
                <div class="col-4 text-lg-right">
                  <label for="" class="text-lg">Nama</label>
                </div>
                <div class="col-5">
                  <input type="text" class="form-control" name="email" value="<?= $user['name']; ?>">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-4 text-lg-right">
                  <label for="" class="text-lg">Email</label>
                </div>
                <div class="col-5">
                  <input type="text" class="form-control" name="email" value="<?= $user['email']; ?>" readonly>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-4 text-lg-right">
                  <label for="" class="text-lg">Role</label>
                </div>
                <div class="col-5">
                  <input type="text" class="form-control" name="email" value="<?= ($user['id_role'] == 1 ? 'Admin' : 'Member'); ?>">
                </div>
              </div>
            </div>

            <a href="#" class="btn btn-info btn-icon-split">
              <span class="icon text-white-50">
                <i class="fas fa-info-circle"></i>
              </span>
              <span class="text">Update Profile</span>
            </a>
          </form>
        </div>
      </div>
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Update Password</h6>
        </div>
        <div class="card-body">
          <form class="user form-horizontal" action="/profile" method="post">
            <div class="form-group">
              <div class="row">
                <div class="col-4 text-lg-right">
                  <label for="" class="text-lg">Password</label>
                </div>
                <div class="col-5">
                  <input type="text" class="form-control" name="password">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-4 text-lg-right">
                  <label for="" class="text-lg">New Password</label>
                </div>
                <div class="col-5">
                  <input type="text" class="form-control" name="password1">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-4 text-lg-right">
                  <label for="" class="text-lg">Confirm Password</label>
                </div>
                <div class="col-5">
                  <input type="text" class="form-control" name="password2">
                </div>
              </div>
            </div>
            <a href="#" class="btn btn-info btn-icon-split">
              <span class="icon text-white-50">
                <i class="fas fa-info-circle"></i>
              </span>
              <span class="text">Update Password</span>
            </a>
          </form>
        </div>
      </div>
    </div>


  </div>

</div>
<!-- /.container-fluid -->

<?= $this->endSection(); ?>