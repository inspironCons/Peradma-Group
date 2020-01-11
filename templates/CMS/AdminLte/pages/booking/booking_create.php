<?php get_template('MY_Header');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Post Book</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=set_url('Dashboard')?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?=set_url('Booking')?>">Booking</a></li>
              <li class="breadcrumb-item active">Post Book</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <form role="form" id="post_book" action="">
            <div class="row">
                <div class="col-md-8">
                    <div class="card ">
                    <div class="card-header">
                        <input class="form-control form-control-lg" type="text" placeholder="Judul Buku">
                    </div>
                    <div class="card-body">
                        <textarea id="post_book_area" placeholder="Enter text ..." style="styles to copy to the iframe"></textarea>
                    </div>
                    </form>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Published</h3>
                                
                            <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-outline-secondary float-right">Simpan Draft</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <ul class="list-group list-group-unbordered">
                                        <li class="list-group-item">
                                            <b>Status</b> <a class="float-right">Draft</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Visibilitas</b> <a class="float-right">Private</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <button type="button" class="btn btn-block btn-lg btn-success">Publish</button>
                            </div>
                        </div>
                    </div>
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Category</h3>
                                
                            <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="card card-success card-outline card-outline-tabs">
                                    <div class="card-header p-0 border-bottom-0">
                                        <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">All Category</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Most User</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content" id="custom-tabs-three-tabContent">
                                            <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                                                <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    Kategori 1
                                                </label>
                                                </div>
                                                <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    Kategori 2
                                                </label>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                                                <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    Kategori 2
                                                </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                               <a href="#" class="form-group" id="btn-add_category">+ add Category</a>
                            </div>
                            <div class="row add_category">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="new_category">
                                    </div>
                                    <div class="form-group">
                                    <select id="role" class="form-control select2" name="role">
                                        <option value="">-Kategori Induk-</option>
                                        <option value="1">Buku</option>
                                        <option value="1">Fantasy</option>
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row add_category">
                                <button id="submit-user" type="button" class="btn btn-block btn-lg btn-success">Add Category</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </form>
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->

  <!-- /.content-wrapper -->

  <!-- modal -->



  <!-- /.modal -->
  <?php get_template('MY_Footer');?>
