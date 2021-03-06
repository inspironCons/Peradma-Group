<?php get_template('MY_Header');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="col-2 float-sm-right">
                  <a class="btn btn-block btn-success btn-lg" href="<?=set_url('User#create');?>">Tambah</a>
                </div>
              </div>
              <div class="card-body">
              <div class="row">
                <div class="col-12 col-md-3">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend float-right">
                      <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                        Filter
                      </button>
                      <ul class="dropdown-menu">
                        <li class="dropdown-item"><a href="<?=set_url('User')?>">Show</a></li>
                        <li class="dropdown-item"><a href="<?=set_url('User#search?filter=all')?>">Show All data</a></li>
                        <li class="dropdown-item"><a href="<?=set_url('User#search?filter=soft')?>">Show Soft Delete Only</a></li>
                       
                      </ul>
                    </div>
                    <input type="text" autocomplete="off" id="search" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <table id="user-list" class="table table-bordered table-hover">
                    <thead align="center">
                    <tr>
                      <th>No</th>
                      <th>Username</th>
                      <th>Level</th>
                      <th>Dibuat</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                    </tbody>
                    
                  </table>
                  <nav aria-label="Page navigation example">
                    <ul id="pagination-user" class="pagination justify-content-end">
                    
                      <!-- <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                      </li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                      </li> -->
                    </ul>
                  </nav>
                  
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- modal -->

  <div class="modal fade" id="paradma-modal-view">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Extra Large Modal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="histori">
            <div class="row">
              <div class="col-12 col-sm-6">
                <div class="info-box bg-light">
                  <div class="info-box-content">
                    <span class="info-box-text text-center text-muted">Total Post</span>
                    <span id="total_post" class="info-box-number text-center text-muted mb-0">2300</span>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6">
                <div id="active" class="info-box">
                  <div class="info-box-content">
                    <span class="info-box-text text-center">Status</span>
                    <span class="status-active info-box-number text-center mb-0">Online</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="aditional-info">
          <div class="row">
              <div class="col-12">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                        src=""
                        alt="User profile picture" />
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <h3 class="text-center">Muhammad Ramdhon</h3>
                <h6 id="role_user" class="text-center text-muted">Administator</h6>
              </div>
            </div>
            
            <div class="row">
              <div class="col-6">
                <div class="card card-success">
                  <div class="card-header">
                    <h3 class="card-title">Profil Info</h3>
                    <!-- /.card-tools -->
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <strong><i class="fas fa-ribbon mr-1"></i>Born</strong><p id="lahir_detail" class="text-muted">Sukabumi, 30 Januari 1997</p><hr>
                    <strong><i class="fas fa-mobile-alt mr-1"></i>Phone Number</strong><p id="nomor_detail" class="text-muted">********2125</p><hr>
                    <strong><i class="fas fa-map-marker-alt mr-1"></i>Location</strong><p id="lokasi_detail" class="text-muted">JOHAR BARU, JAKARTA PUSAT</p><hr>
                    <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong><p id="skill_detail" class="text-muted">HTML,PHP,JAVASCRIPT</p><hr>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <div class="col-6">
                <div class="card card-success">
                  <div class="card-header">
                    <h3 class="card-title">Account Info</h3>
                    <!-- /.card-tools -->
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <strong><i class="fas fa-user-alt mr-1"></i>Username</strong><p id="username_detail" class="text-muted">Ramdhnz61</p><hr>
                    <strong><i class="fas fa-envelope mr-1"></i>email</strong><p id="email_detail" class="text-muted">ramdhnz61@gmail.com</p><hr>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  <div class="modal fade" id="paradma-modal">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Extra Large Modal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" id="form-users" action="">
          <input type="hidden" name="id" id="ID">
            <div class="row">
              <div class="col-12 col-sm-6">
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" name="username" id="username" placeholder="Enter Username">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <div class="input-group">
                  <input type="text" class="form-control" name="password" id="password" placeholder="Enter Password">
                  <div class="input-group-append">
                    <button type="button" class="btn btn-secondary randomPass"><i class="fas fa-key"></i></button>
                  </div>
                </div>
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email">
                </div>
                <div class="form-group">
                  <label for="role">Select Role</label>
                  <select id="role" class="form-control select2" name="role" style="width: 100%;">
                    <option value="1">Administration</option>
                    <option value="2">Editor</option>
                    <option value="3">Author</option>
                    <option value="4">Contributor</option>
                    <option value="5">Subscribe</option>
                    <option value="6">Member</option>
                  </select>
                </div>
              </div>
              <div class="col-12 col-sm-6">
                <div class="form-group">
                  <label for="nama_depan">Nama Depan</label>
                  <input type="text" name="nama_depan" class="form-control" id="nama_depan">
                </div>
                <div class="form-group">
                  <label for="nama_belakang">Nama Belakang</label>
                  <input type="text" name="nama_belakang" class="form-control" id="nama_belakang">
                </div>
                <div class="form-group">
                  <label for="tempat">Tempat</label>
                  <input type="text" name="tempat" class="form-control" id="tempat" placeholder="Enter Tempat Lahir">
                </div>
                <div class="form-group">
                  <label for="tanggal_lahir">Tanggal Lahir</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" name="tanggal_lahir" class="form-control" id="tanggal_lahir" data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy" data-mask>
                  </div>
                </div>
                <div class="form-group">
                  <label for="phone">Handphone</label>
                  <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter Phone Number">
                </div>
                <div class="form-group">
                  <label for="lokasi">Lokasi</label>
                  <input type="text" class="form-control" name="lokasi" id="lokasi" placeholder="Ex . Johar Baru,DKI Jakarta">
                </div>
                <div class="form-group">
                  <label for="skill">Skill</label>
                  <input type="text" class="form-control" name="skill" id="skill" placeholder="Ex . Melukis,Programming">
                </div>

              </div>
            </div>
            </form>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button id="submit-user" type="button" class="btn btn-success">Create</button>

        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>


  <!-- /.modal -->
  <?php get_template('MY_Footer');?>
