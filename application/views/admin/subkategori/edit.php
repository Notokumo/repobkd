<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Subkategori</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Subkategori</li>
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
                            <h3 class="card-title">Ubah Sub Kategori</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">                        
                            <form action="<?php echo site_url('adminnya/subkategori/edit/' . $subkategori->id); ?>" method="POST">
                                <div class="form-group">
                                    <label for="subkategori">Nama Sub Kategori</label>
                                    <input type="text" class="form-control" id="subkategori" name="subkategori" value="<?php echo $subkategori->nama_subkatbkd; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="kategori_id">Kategori</label>
                                    <select class="form-control" id="kategori_id" name="kategori_id" required>
                                        <option value="">Pilih Kategori</option>
                                        <?php foreach ($kategori as $kat): ?>
                                            <option value="<?php echo $kat->id; ?>" <?php echo ($kat->id == $subkategori->kategori_id) ? 'selected' : ''; ?>><?php echo $kat->nama_katbkd; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Ubah</button>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Subkategori</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($subkategoris as $sub): ?>
                                    <tr>
                                        <td><?php echo $sub->id; ?></td>
                                        <td><?php echo $sub->nama_subkatbkd; ?></td>
                                        <td><?php echo $sub->kategori_nama; ?></td>
                                        <td>
                                            <a href="<?php echo site_url('adminnya/subkategori/edit/' . $sub->id); ?>" class="btn btn-warning">Edit</a>
                                            <a href="<?php echo site_url('adminnya/subkategori/delete/' . $sub->id); ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus subkategori ini?')">Hapus</a>
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

