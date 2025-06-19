<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>REPOSITORY BKD </title>

  <?php $this->load->view('/layout/css'); ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <?php $this->load->view('layout/navbar'); ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php
  // Check the user's role and load the appropriate sidebar
  if ($this->session->userdata('role') == 'dosen') {
      $this->load->view('layout/sidebar_dosen');
  } else {
      $this->load->view('layout/sidebar');
  }
  ?>


  <!-- Content Wrapper. Contains page content -->  
  <?php $this->load->view($v); ?>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php $this->load->view('layout/js'); ?>
</body>
</html>
