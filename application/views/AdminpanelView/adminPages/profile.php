<?php
// $this->load->view('AdminpanelView/includes/header');
?>
 <style>
  .error{
  color:red;
  }
    </style>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="col-md-12">
  <?php if($this->session->userdata('success')){?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('success')?>
            </div>
        <?php } ?>
  </div>
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                      src="<?php echo base_url().'upload/'. $user['image'];?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo $user['username'];?></h3>

                <p class="text-muted text-center"> <?php echo $user['email'];?>
               </p>

                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                  <?php echo $user['education']; ?>
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i>Phone</strong>

                <p class="text-muted">
                <?php echo $user['phone'];?>
                </p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                  <?php echo $user['skills'] ?>
                </p>
</div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Admin Profile</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  
                  </div>
                  <!-- /.tab-pane -->
              
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal" action="<?php echo base_url().'Admincon/Admincontroller/profile';?>" method="POST" id="form" enctype="multipart/form-data">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" name="username"  value="<?php echo set_value('username',$user['username']);?>" class="form-control" id="inputName" placeholder="Name">
                        
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" name="email" value="<?php echo set_value('email',$user['email']);?>" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                          <input type="text" name="phone" value="<?php echo set_value('phone',$user['phone']);?>" class="form-control" id="inputName2" placeholder="Phone">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Education</label>
                        <div class="col-sm-10">
                          <input class="form-control" name="education" value="<?php echo set_value('education',$user['education']);?>" id="inputExperience" placeholder="Education"/>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                        <div class="col-sm-10">
                          <input type="text" name="skills" value="<?php echo set_value('skills',$user['skills']);?>"class="form-control" id="inputSkills" placeholder="Skills">
                        </div>
                      </div>
					  
					   <div class="form-group row">
                        <label for="image" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                          <input  type="file"  id="image" name="image"/><br>
						  <img src="<?php echo base_url().'upload/'. $user['image'];?>" height="70px" width="70px" />

                        </div>
                      </div>
                      
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" name="submitbtn" class="btn btn-primary">UpDate</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->





<?php
  $this->load->view('AdminpanelView/includes/footer');
  ?>