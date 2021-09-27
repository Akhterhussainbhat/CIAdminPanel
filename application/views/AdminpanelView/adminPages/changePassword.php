<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/fontawesome-free/css/all.min.css';?>">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css'?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/adminlte.min.css'?>">
  <style>
  .error{
    color:red;
  }
  </style>
</head>
<div class="content-wrapper">
<section class="content-header">
      <div class="container-fluid">
<body class="hold-transition login-page">
<?php if($this->session->flashdata('message')) { ?>
            <div class="alert alert-danger">
                <?php echo $this->session->flashdata('message')?>
            </div>
        <?php } ?>
        <center>
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Change your Password of your profile in</b>AdminPanel</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">change your password</p>

      <form action="<?php echo base_url().'Admincon/Admincontroller/changepassword';?>" method="post">
        <div class="input-group mb-3">
          <input type="text" name="oldpassword" class="form-control" placeholder="Enter Old Password">
          <?php echo form_error('oldpassword'); ?>
          <div class="input-group-append">
            <div class="input-group-text">
            <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="newpassword" class="form-control" placeholder="Enter New Password">
          <?php echo form_error('password', '<div class="error">', '</div>'); ?>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="confirmpassword" class="form-control" placeholder="Confirm your Password">
          <?php echo form_error('confirmpassword'); ?>
          <div class="input-group-append">
            <div class="input-group-text">
            <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box --></center>
</div>
</section>
</div>

<!-- jQuery -->
<script src="http://localhost/CodeIg/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="http://localhost/CodeIg/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="http://localhost/CodeIg/assets/dist/js/adminlte.min.js"></script>
</body>
</html>
<?php
  $this->load->view('AdminpanelView/includes/footer');
  ?>