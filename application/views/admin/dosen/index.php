<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Dosen</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Dosen</li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>                
                    <?php if ($this->session->flashdata('success')): ?>
                        <div class="alert alert-success">
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Dosen</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">                        
                            <form action="<?php echo site_url('adminnya/dosen/add'); ?>" method="POST">
                                <div class="form-group">
                                    <label for="nama">Nama Dosen</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Dosen" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email Dosen</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email Dosen" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password Dosen</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password Dosen" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Dosen</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Dosen</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($dosens as $item): ?>
                                    <tr>
                                        <td><?php echo $item->id; ?></td>
                                        <td><?php echo $item->nama_dosen; ?></td>
                                        <td><?php echo $item->email; ?></td>
                                        <td>
                                            <?php 
                                                if ($item->status == 1) {
                                                    echo '<span class="badge bg-success">Aktif</span>';
                                                } else {
                                                    echo '<span class="badge bg-danger">Non-Aktif</span>';
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo site_url('adminnya/dosen/edit/' . $item->id); ?>" class="btn btn-warning">Edit</a>
                                            <a href="<?php echo site_url('adminnya/bkd/dosen/' . $item->id); ?>" class="btn btn-primary">Lihat BKD</a>
                                            <?php 
                                                if ($item->status == 1) {
                                                    echo '<a href="' . site_url('adminnya/dosen/nonaktif/' . $item->id) . '" class="btn btn-danger" onclick="return confirm(\'Apakah Anda yakin ingin Non-Aktifkan data ini?\')">Non-Aktifkan</a>';
                                                } else {
                                                    echo '<a href="' . site_url('adminnya/dosen/aktif/' . $item->id) . '" class="btn btn-success" onclick="return confirm(\'Apakah Anda yakin ingin Aktifkan data ini?\')">Aktifkan</a>';
                                                }
                                            ?>                                            
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
