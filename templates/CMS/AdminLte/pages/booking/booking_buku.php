<?php get_template('MY_Header');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">List Book</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=set_url('Dashboard')?>">Home</a></li>
              <li class="breadcrumb-item active">Book</li>
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
                  <a class="btn btn-block btn-success btn-lg" href="<?=set_url('Booking/create');?>">Tambah</a>
                </div>
              </div>
              <div class="card-body">
              <!-- <div class="row">
                <div class="col-12 col-md-3">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend float-right">
                      <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                        Filter
                      </button>
                      <ul class="dropdown-menu">
                        <li class="dropdown-item"><a href="<?=set_url('Booking#search?keyword=')?>">Show</a></li>
                      </ul>
                    </div>
             
                    <input type="text" autocomplete="off" id="search" class="form-control">
                  </div>
             
                </div>
              </div> -->
              <div class="row">
                <div class="col-12">
                  <table id="user-list" class="table table-bordered table-hover">
                    <thead align="center">
                    <tr>
                      <th>No</th>
                      <th>Buku</th>
                      <th>Tanggal Publish</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td width='5%' align='center' class="text-center-position">1</td>
                            <td width='55%' class="frame-book" >
                                <div class="media">
                                    <div class="media-left">
                                        <img class="media-object-list" src="<?=get_assets('CMS','cover_buku1.jpg')?>" alt="" />
                                    </div>
                                    <div class="media-body">
                                        <span class='badge badge-pill badge-secondary'>Draft</span>
                                        <h3 class="media-heading">Sebuah Seni Untuk Bersikap Bodo Amat</h3>
                                        <div>
                                          <em><i class="fas fa-qrcode"></i> Kode : <strong>123456</strong></em>
                                        </div>
                                        <div>
                                          <em><i class="fas fa-book"></i> Stok : <strong>4</strong></em>
                                        </div>
                                        <div class="progress progress-sm progress-width">
                                            <div class="progress-bar bg-success" role="progressbar" aria-volumenow="60" aria-volumemin="0" aria-volumemax="100" style="width: 60%"></div>
                                            <div class="progress-bar bg-danger" role="progressbar" aria-volumenow="40" aria-volumemin="0" aria-volumemax="100" style="width: 40%"></div>
                                        </div>
                                        <small>
                                            6 dari 10 buku sudah di pinjam
                                        </small>
                                    </div>
                                </div>
                            </td>
                            <td width='20%' align='center' class="text-center-position">Kamis, 30 Januari 2020</td>
                            <td width='20%' align='center' class="text-center-position">
                                <a class='btn btn-primary btn-sm button-table' href='#'><i class='fas fa-book-reader'></i>Detail</a>
                                <a class='btn btn-danger btn-sm button-table' href='#'><i class='fas fa-book-reader'></i>Hapus</a>
                            </td>
                        </tr>
                    </tbody>
                    
                  </table>
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



  <!-- /.modal -->
  <?php get_template('MY_Footer');?>
