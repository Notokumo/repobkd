<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>BKD Data</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">BKD Data</li>
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
                                <h3 class="card-title">Filter Data BKD</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <!-- Filters -->
                                <form action="<?php echo site_url('dosen/bkd/filter'); ?>" method="GET">
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label for="academicYear">Masukkan Tahun Akademik</label>
                                        <select class="form-control" id="tahun_akademik_id" name="tahun_akademik_id" required>
                                            <option value="all">Semua Tahun Akademik</option>
                                            <?php foreach ($tahun_akademik as $tahun): ?>
                                                <option value="<?php echo $tahun->id; ?>" <?php if ($tahun->aktif == 1) echo 'selected'; ?>><?php echo $tahun->nama_thnakademik; ?><?php if ($tahun->aktif == 1) echo ' - AKTIF SAAT INI'; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="category">Kategori</label>
                                        <select class="form-control" id="kategori" name="kategori">
                                            <option value="all" selected="selected">Semua Kategori</option>
                                            <?php foreach ($kategori as $kat): ?>
                                                <option value="<?php echo $kat->id; ?>"><?php echo $kat->nama_katbkd; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="subcategory">Subkategori</label>
                                        <select class="form-control" id="subkategori" name="subkategori">
                                            <option value="all" selected="selected">Semua Subkategori</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <button class="btn btn-primary">Filter Data</button>
                                    </div>
                                </div>
                                </form>
                                <!-- /.Filters -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">BKD Data</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                                <!-- Table -->
                                <table id="bkdTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tahun Akademik</th>
                                            <th>Kategori</th>
                                            <th>Subkategori</th>
                                            <th>Nama BKD</th>
                                            <th>Waktu Upload</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($bkd as $item): ?>
                                    <tr>
                                        <td><?php echo $item->id; ?></td>
                                        <td><?php echo $item->tahun; ?></td>
                                        <td><?php echo $item->kategori; ?></td>
                                        <td><?php echo $item->subkategori; ?></td>
                                        <td><?php echo $item->nama_bkd; ?><input type="hidden" id="filename_<?php echo $item->id; ?>" value="<?php echo $item->file_path; ?>"></td>
                                        <td><?php echo date('d/m/Y H:i:s', strtotime($item->waktu_upload)); ?></td>
                                        <td>
                                            <!-- Edit Button -->
                                            <a href="<?php echo site_url('dosen/bkd/edit/' . $item->id); ?>" class="btn btn-block btn-warning btn-sm">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            
                                            <!-- Delete Button -->
                                            <a href="<?php echo site_url('dosen/bkd/delete/' . $item->id); ?>" class="btn btn-block btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            
                                            <!-- Download Button -->
                                            <a href="<?php echo site_url('bkd/' . $item->file_path); ?>" class="btn btn-block btn-primary btn-sm">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            
                                            <!-- Copy Button -->                                            
                                            <button class="btn btn-block btn-success btn-sm" onclick="copyText('filename_<?php echo $item->id; ?>')">
                                                <i class="fas fa-copy"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <!-- /.Table -->
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
                        $('#subkategori').append('<option value="all">Semua Subkategori</option>');
                        $.each(data, function(index, item) {
                            $('#subkategori').append('<option value="' + item.id + '">' + item.nama_subkatbkd + '</option>');
                        });
                    }
                });
            });
        });

        
        function copyText(elementId) {
            // Define the base URL
            const baseURL = '<?php echo site_url('bkd/'); ?>';

            // Retrieve the element by its ID
            const element = document.getElementById(elementId);

            // Check if the element exists
            if (!element) {
                alert('Element not found!');
                return;
            }

            // Get the text from the element
            const textToCopy = element.value || element.textContent || element.innerText;

            // Prepend the base URL to the text
            const fullURL = baseURL + textToCopy;

            // Create a temporary input element to hold the text
            const tempInput = document.createElement('input');
            tempInput.value = fullURL;

            // Append the temporary input to the body
            document.body.appendChild(tempInput);

            // Select the text in the temporary input
            tempInput.select();
            tempInput.setSelectionRange(0, 99999); // For mobile devices

            try {
                // Copy the selected text to the clipboard
                document.execCommand('copy');
                alert('Link copied to clipboard successfully!');
            } catch (err) {
                // Handle any errors that occur during the copy operation
                console.error('Failed to copy link: ', err);
                alert('Failed to copy link. Please try again.');
            } finally {
                // Remove the temporary input element from the body
                document.body.removeChild(tempInput);
            }
        }

    </script>