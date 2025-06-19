<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah BKD</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tambah BKD</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
                <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>                
                <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php endif; ?>
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Input Data BKD</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="<?php echo site_url('adminnya/bkd/tambah'); ?>" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row mb-3">                        
                            <div class="col-md-12 form-group">
                                <label for="nama_bkd">Nama BKD</label>
                                <input type="text" class="form-control" id="nama_bkd" name="nama_bkd" placeholder="Enter Nama BKD">
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="file">File BKD (allowed: pdf,doc,docx,xls,xlsx,ppt,pptx)</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="file" name="file">
                                        <label class="custom-file-label" for="file">No file chosen</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Dosen</label>
                                <select class="form-control" id="dosen" name="dosen">
                                    <option selected="selected">Pilih Dosen</option>
                                    <?php foreach ($dosen as $dsn): ?>
                                        <option value="<?php echo $dsn->id; ?>"><?php echo $dsn->nama_dosen; ?><?php if ($dsn->status == 0) echo ' - TIDAK AKTIF'; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>        
                            <div class="col-md-6 form-group">
                                <label for="tahun_akademik">Masukkan Tahun Akademik</label>
                                <select class="form-control" id="tahun_akademik_id" name="tahun_akademik_id" required>
                                    <?php foreach ($tahun_akademik as $tahun): ?>
                                        <option value="<?php echo $tahun->id; ?>" <?php if ($tahun->aktif == 1) echo 'selected'; ?>><?php echo $tahun->nama_thnakademik; ?><?php if ($tahun->aktif == 1) echo ' - AKTIF SAAT INI'; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>  
                            <div class="col-md-6 form-group">
                                <label>Kategori</label>
                                <select class="form-control" id="kategori" name="kategori">
                                    <option selected="selected">Pilih Kategori</option>
                                    <?php foreach ($kategori as $kat): ?>
                                        <option value="<?php echo $kat->id; ?>"><?php echo $kat->nama_katbkd; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Subkategori</label>
                                <select class="form-control" id="subkategori" name="subkategori">
                                    <option selected="selected">Pilih Subkategori</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
            
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
    $(document).ready(function() {
        $('#kategori').change(function() {
            var kategori = $(this).val();
            $.ajax({
                url: "<?php echo site_url('adminnya/bkd/get_subkategori'); ?>",
                type: "GET",
                data: { kategori: kategori },
                dataType: "json",
                success: function(data) {
                    $('#subkategori').empty();
                    $('#subkategori').append('<option value="">Pilih Subkategori</option>');
                    $.each(data, function(index, item) {
                        $('#subkategori').append('<option value="' + item.id + '">' + item.nama_subkatbkd + '</option>');
                    });
                }
            });
        });
    });
</script>
