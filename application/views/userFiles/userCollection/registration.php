<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: white;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
  border: 1px black solid
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
.error{
    color:red;
}
</style>
</head>
<body>

<div style="padding: 1% 30%">
<?php if($this->session->flashdata('message')) { ?>
            <div class="alert alert-danger" >
                <?php echo $this->session->flashdata('message')?>
            </div>
        <?php } ?>
        <?php if($this->session->flashdata('messagesucces')) { ?>
            <div class="alert alert-success" >
                <?php echo $this->session->flashdata('messagesucces')?>
            </div>
        <?php } ?>
<form action="<?php echo base_url().'UserFile/userSite/registration';?>" method="post">
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    <label for="username"><b>Email</b></label>
    <input type="text" placeholder="Enter your Name" value="<?php echo set_value('username');?>" name="username" id="username" >
    <?php echo form_error('username', '<div class="error">', '</div>'); ?>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" value="<?php echo set_value('email');?>" name="email" id="email" >
    <?php echo form_error('email', '<div class="error">', '</div>'); ?>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="password" >
    <?php echo form_error('password', '<div class="error">', '</div>'); ?>

    <label for="confrimpassword"><b>Repeat Password</b></label>
    <input type="password" placeholder="confirm Password" name="confirmpassword" id="confirmpassword">
    <?php echo form_error('confirmpassword', '<div class="error">', '</div>'); ?>
    <hr>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <button type="submit" name="submit" class="registerbtn">Register</button>
  </div>
  
  <div class="container signin">
    <p>Already have an account? <a href="<?php echo base_url()?>UserFile/usersite/login">Sign in</a>.</p>
  </div>
</form>
</div>
</body>
</html>
