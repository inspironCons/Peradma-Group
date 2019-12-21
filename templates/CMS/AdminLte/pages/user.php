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
                  <a href="<?=set_url('User#tambah');?>" role="button" class="btn btn-block bg-gradient-success btn-lg">Tambah</a>
                </div>
              </div>
              <div class="card-body">
              <table id="user-list" class="table table-bordered table-hover">
                <thead align="center">
                <tr>
                  <th>No</th>
                  <th>Username</th>
                  <th>Dibuat</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td width="5%" align="center">1</td>
                  <td width="30%">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <img alt="Avatar" class="table-avatar" src="<?=get_template_directory(dirname(__FILE__),'')?>../dist/img/avatar.png">
                            <a href="#">Ramdhnz61</a>
                          </li>
                        
                    </ul>
                  </td>
                  <td>28 Januari 2020</td>
                  <td>Online</td>
                  <td width="20%">
                    <a class="btn btn-primary btn-sm" href="#">
                        <i class="fas fa-folder">
                        </i>
                        View
                    </a>
                    <a class="btn btn-info btn-sm" href="#">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Edit
                    </a>
                    <a class="btn btn-danger btn-sm" href="#">
                        <i class="fas fa-trash">
                        </i>
                        Delete
                    </a>
                  </td>
                </tr>
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

  <?php get_template('MY_Footer');?>
