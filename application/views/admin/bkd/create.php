<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data BKD</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <h1>Tambah Data BKD</h1>
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>
        <?php echo form_open_multipart('adminnya/bkd/store'); ?>
        <div class="form-group">
            <label for="dosen_id">Dosen ID</label>
            <input type="text" class="form-control" id="dosen_id" name="dosen_id" required>
        </div>
        <div class="form-group">
            <label for="tahun_akademik_id">Tahun Akademik</label>
            <select class="form-control" id="tahun_akademik_id" name="tahun_akademik_id" required>
                <?php foreach ($tahun_akademik as $tahun): ?>
                    <option value="<?php echo $tahun->id; ?>"><?php echo $tahun->tahun; ?><?php if ($tahun->aktif == 1) echo ' - Aktif'; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="kategori_id">Kategori</label>
            <select class="form-control" id="kategori_id" name="kategori_id" required>
                <option value="">Pilih Kategori</option>
                <?php foreach ($kategori as $kat): ?>
                    <option value="<?php echo $kat->id; ?>"><?php echo $kat->nama; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="subkategori_id">Subkategori</label>
            <select class="form-control" id="subkategori_id" name="subkategori_id" required>
                <option value="">Pilih Subkategori</option>
            </select>
        </div>
        <div class="form-group">
            <label for="nama_bkd">Nama BKD</label>
            <input type="text" class="form-control" id="nama_bkd" name="nama_bkd" required>
        </div>
        <div class="form-group">
            <label for="file_path">File</label>
            <input type="file" class="form-control" id="file_path" name="file_path" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?php echo site_url('adminnya/bkd'); ?>" class="btn btn-secondary">Kembali</a>
        <?php echo form_close(); ?>
    </div>

    <script>
        $(document).ready(function() {
            $('#kategori_id').change(function() {
                var kategori_id = $(this).val();
                $.ajax({
                    url: "<?php echo site_url('adminnya/bkd/get_subkategori'); ?>",
                    type: "GET",
                    data: { kategori_id: kategori_id },
                    dataType: "json",
                    success: function(data) {
                        $('#subkategori_id').empty();
                        $('#subkategori_id').append('<option value="">Pilih Subkategori</option>');
                        $.each(data, function(index, item) {
                            $('#subkategori_id').append('<option value="' + item.id + '">' + item.nama + '</option>');
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>
