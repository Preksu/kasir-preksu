<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login Admin</title>
  
  
  <link rel='stylesheet prefetch' href='<?= base_url();?>assets/font-awesome/css/font-awesome.min.css'>

      <link rel="stylesheet" href="<?= base_url();?>assets/css/form.css">

  
</head>

<body>
  <div class="login-form">
     <h1>Login Admin</h1>
     <form action="<?php echo base_url('login/aksi_login'); ?>" method="post">
       <div class="form-group ">
         <input type="text" class="form-control" placeholder="Username " id="username" name="username">
         <i class="fa fa-user"></i>
       </div>
       <div class="form-group log-status">
         <input type="password" class="form-control" placeholder="Password" id="password" name="password">
         <i class="fa fa-lock"></i>
       </div>
        <span class="alert">Invalid Credentials</span>
       <input type="submit" class="log-btn" value="Login"></input>
     </form>
    
   </div>
  <script src='<?= base_url();?>assets/js/jquery.js'></script>

    <script  src="<?= base_url();?>assets/js/index.js"></script>

</body>
</html>
