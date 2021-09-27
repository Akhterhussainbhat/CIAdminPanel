<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Hello, world!</title>
  </head>
  <body>

  <div class="col-md-12">
  <?php if($this->session->userdata('success')) { ?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('success')?>
            </div>
        <?php } ?>
  </div>
  <div class="border" style="padding:5%">
  <a href="<?php echo base_url().'index.php/user/create'?>" class="btn btn-primary" style="float:right" >Add User</a>

  <h1>User Details</h1>
  <table class="table table-bordered"  >
  <thead class="thead-dark" style="background:black; color:white">
    <tr>
      <th scope="col">id</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Gender</th>
      <th scope="col">Game</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <?php
  $i=1; 
  foreach($users as $user){?>
    <tr>
      <th scope="row"><?php echo $i++;?></th>
      <td><?php echo $user['username'];?></td>
      <td><?php echo $user['email'];?></td>
      <td><?php echo $user['phone'];?></td>
      <td><?php echo $user['gender'];?></td>
      <td><?php echo $user['game'];?></td>
      <td><img src="<?php echo base_url().'upload/'.$user['image'];?> " height="50px"></td>
      <td><a href="<?php echo base_url().'user/edit/'.$user['id'];?>" class="btn btn-primary">Edit</a>
      <a href="<?php echo base_url().'user/delete/'.$user['id'];?>"  onclick="return confirm('are you really want to delete this item');" class="btn btn-danger">Delete</a>
      </td>
    </tr>
   <?php }
   ?>
  
</table> 
</div>
  </body>
</html>