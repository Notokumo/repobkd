<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Tahun Akademik</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Tahun Akademik</li>
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
                            <h3 class="card-title">Tambah Tahun Akademik</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">                        
                            <form action="<?php echo site_url('adminnya/thn_akademik/edit/' . $thn_akademik->id); ?>" method="POST">
                                <div class="form-group">
                                    <label for="tahun">Nama Tahun Akademik</label>
                                    <input type="text" class="form-control" id="tahun" name="tahun" value="<?php echo set_value('tahun', $thn_akademik->nama_thnakademik); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="aktif">Aktif</label>
                                    <select class="form-control" id="aktif" name="aktif" required>
                                        <option value="1" <?php echo set_select('aktif', '1', $thn_akademik->aktif == '1'); ?>>Ya</option>
                                        <option value="0" <?php echo set_select('aktif', '0', $thn_akademik->aktif == '0'); ?>>Tidak</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Tahun Akademik</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tahun Akademik</th>
                                        <th>status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($thn_akademiks as $item): ?>
                                    <tr>
                                        <td><?php echo $item->id; ?></td>
                                        <td><?php echo $item->nama_thnakademik; ?></td>
                                        <td><?php echo $item->aktif; ?></td>
                                        <td>
                                            <a href="<?php echo site_url('adminnya/thn_akademik/edit/' . $item->id); ?>" class="btn btn-warning">Edit</a>
                                            <a href="<?php echo site_url('adminnya/thn_akademik/delete/' . $item->id); ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                                            <?php
                                                if ($item->aktif == 0) {
                                                    echo '<a href="' . site_url('adminnya/thn_akademik/aktif/' . $item->id) . '" class="btn btn-success">Aktifkan</a>';
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
