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
                <!-- <tr>
                  <td width="5%" align="center">1</td>
                  <td width='30%'>
                    <ul class='list-inline'>
                        <li class='list-inline-item'>
                            <img alt='Avatar' class='table-avatar' src='<?=get_template_directory(dirname(__FILE__),'')?>../dist/img/avatar.png'>
                            <a href='#'>Ramdhnz61</a>
                          </li>
                        
                    </ul>
                  </td>
                  <td>Administration</td>
                  <td>28 Januari 2020</td>
                  <td align='center'><span class='badge badge-pill badge-success'>Online</span></td>
                  <td width='20%'>
                    <a class='btn btn-primary btn-sm' href='#'><i class='fas fa-folder'></i>View</a>
                    <a class='btn btn-info btn-sm' href='#'><i class='fas fa-pencil-alt'></i>Edit</a>
                    <a class='btn btn-danger btn-sm' href='#'><i class='fas fa-trash'></i>Delete</a>
                  </td>
                </tr> -->
                </tbody>
                
              </table>
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
