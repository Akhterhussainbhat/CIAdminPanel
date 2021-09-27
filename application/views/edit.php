<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>inserdata</title>
  </head>
  <body>
  <div style="padding:7%; background:grey">

  <div class="border" style="padding:3%">

  <form action="<?php echo base_url().'user/edit/'.$user['id'];?>" method="POST" enctype="multipart/form-data" > 
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" value="<?php echo set_value('username',$user['username']);?>" name="username" placeholder="Username">
    <?php echo form_error('username');?>
  </div>
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" value="<?php echo set_value('email',$user['email']);?>" name="email" placeholder="Enter email">
    <?php echo form_error('email');?>
  </div>
  <div class="form-group">
    <label for="phone">Phone Number</label>
    <input type="number" class="form-control" name="phone" value="<?php echo set_value('phone',$user['phone']);?>" id="phone" placeholder="phone">
    <?php echo form_error('phone');?>
  </div>
  <span style="font-size: 15px;">Gender :</span>
<input type="radio" name="gender" id="male" <?php if($user['gender']=="male"){ echo "checked";}?>  value="male" />
<label for="male">Male</label>
<input type="radio" name="gender" <?php  if($user['gender']=="female"){ echo "checked";}?> id="female" value="female" />
<label for="female">Female</label><br>
<label class="label1">Games: </label>
<br>
<?php 
$check=$user['game'];
$arr= explode(",",$check);
?>
<input type="checkbox" <?php if(in_array("Cricket",$arr)){echo "checked";}?> name="game[]" value="Cricket"> 
<span id="cricket">Cricket</span>
<br>
<input type="checkbox" <?php if(in_array("FootBall",$arr)){echo "checked";}?> name="game[]" value="FootBall">
<span id="football">FootBall</span>
<br>
<input type="checkbox" <?php if(in_array("VolleyBall",$arr)){echo "checked";}?> name="game[]" value="VolleyBall">
<span id="volleyball">VolleyBall</span><br>
<input type='file' name='image' value="<?php echo $user['image'];?>" ><br>
<img  src="<?php echo base_url().'/upload/'.$user['image'];?>" height="100px" width="100px" />
  <button type="submit" style="float:right;font-size:50px" name="submit" class="btn btn-primary btn-lg">Update</button>
</form>
</div>
</div>
</body>
</html>