<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Export Excel Data BKD</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Excel Data BKD</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <?php if ($this->session->flashdata('success')): ?>
                            <div class="alert alert-success">
                                <?php echo $this->session->flashdata('success'); ?>
                            </div>
                        <?php endif; ?>

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Excel Data BKD</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <!-- Filters -->
                                <form action="<?php echo site_url('adminnya/excel/export'); ?>" method="GET">
                                <div class="row mb-3">
                                    <div class="col-md-6 form-group">
                                        <label for="academicYear">Masukkan Tahun Akademik</label>
                                        <select class="form-control" id="tahun_akademik_id" name="tahun_akademik_id" required>
                                            <option value="all">Semua Tahun Akademik</option>
                                            <?php foreach ($tahun_akademik as $tahun): ?>
                                                <option value="<?php echo $tahun->id; ?>" <?php if ($tahun->aktif == 1) echo 'selected'; ?>><?php echo $tahun->nama_thnakademik; ?><?php if ($tahun->aktif == 1) echo ' - AKTIF SAAT INI'; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="academicYear">Dosen</label>
                                        <select class="form-control" id="dosen" name="dosen" required>
                                            <option value="all">Semua Dosen</option>
                                            <?php foreach ($dosen as $dsn): ?>
                                                <option value="<?php echo $dsn->id; ?>"><?php echo $dsn->nama_dosen; ?><?php if ($dsn->status == 0) echo ' - TIDAK AKTIF'; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="category">Kategori</label>
                                        <select class="form-control" id="kategori" name="kategori">
                                            <option value="all" selected="selected">Semua Kategori</option>
                                            <?php foreach ($kategori as $kat): ?>
                                                <option value="<?php echo $kat->id; ?>"><?php echo $kat->nama_katbkd; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="subcategory">Subkategori</label>
                                        <select class="form-control" id="subkategori" name="subkategori">
                                            <option value="all" selected="selected">Semua Subkategori</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <button class="btn btn-primary">Export Excel</button>
                                    </div>
                                </div>
                                </form>
                                <!-- /.Filters -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->                        
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->