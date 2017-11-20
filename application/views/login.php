<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login Admin</title>
  
  
  <link rel='stylesheet prefetch' href='<?= base_url();?>assets/font-awesome/css/font-awesome.min.css'>

      <link rel="stylesheet" href="<?= base_url();?>assets/css/bootstrap.min.css">
       <link rel="stylesheet" href="<?= base_url();?>assets/css/style.css">

  
</head>

<body style="background-color: #e54747;">
  <div class="login-form">
     <h1 class="lora" >Login Preksu</h1>
     <form action="<?php echo base_url('login/aksi_login'); ?>" method="post">
       <div class="form-group ">
         <input type="text" class="form-control" placeholder="Username " id="username" name="username">
       </div>
       <div class="form-group">
         <input type="password" class="form-control" placeholder="Password" id="password" name="password">
       </div>
       <input style="width: 100%;" type="submit" class="btn btn-danger" value="Login"></input>
     </form>
    
   </div>
  <script src='<?= base_url();?>assets/js/jquery.js'></script>

    <script  src="<?= base_url();?>assets/js/index.js"></script>

</body>
</html>
