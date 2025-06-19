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
                        <li class="breadcrumb-item active">Ubah BKD</li>
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

                <?php if ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php endif; ?>
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Ubah Data BKD</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="<?php echo site_url('dosen/bkd/update/' . $bkd->id); ?>" method="post" enctype="multipart/form-data">
                    <div class="card-body">    <?php //print_r($bkd); ?>                    
                        <div class="form-group">
                            <label for="nama_bkd">Nama BKD</label>
                            <input type="text" class="form-control" id="nama_bkd" name="nama_bkd" value="<?php echo $bkd->nama_bkd; ?>" placeholder="Enter Nama BKD">
                        </div>
                        <div class="form-group">
                            <label for="file">File BKD (allowed: pdf,doc,docx,xls,xlsx,ppt,pptx)</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="file" name="file">
                                    <label class="custom-file-label" for="file">No file chosen</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group d-flex">
                            <div class="col-md-4">
                                <label for="tahun_akademik">Masukkan Tahun Akademik</label>
                                <select class="form-control" id="tahun_akademik_id" name="tahun_akademik_id" required>
                                    <?php foreach ($tahun_akademik as $tahun): ?>
                                        <option value="<?php echo $tahun->id; ?>" <?php if ($tahun->id == $bkd->tahun_akademik_id) echo 'selected'; ?>><?php echo $tahun->nama_thnakademik; ?><?php if ($tahun->aktif == 1) echo ' - AKTIF SAAT INI'; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label>Kategori</label>
                                <select class="form-control" id="kategori" name="kategori">
                                    <?php foreach ($kategori as $kat): ?>
                                        <option value="<?php echo $kat->id; ?>" <?php if ($kat->id == $bkd->kategori_id) echo 'selected'; ?>><?php echo $kat->nama_katbkd; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label>Subkategori</label>
                                <select class="form-control" id="subkategori" name="subkategori">
                                    <?php foreach ($subkategori as $subkat): ?>
                                        <option value="<?php echo $subkat->id; ?>" <?php if ($subkat->id == $bkd->subkategori_id) echo 'selected'; ?>><?php echo $subkat->nama_subkatbkd; ?></option>
                                    <?php endforeach; ?>
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
                url: "<?php echo site_url('dosen/tambah_bkd/get_subkategori'); ?>",
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
