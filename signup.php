<!DOCTYPE html>
<html>
<head>
	<title>Registration </title>
	  <link rel="stylesheet" type="text/css" href="style_login.css">
        <link rel="stylesheet" type="text/css" href="css/mini.css*****">

</head>
<body>
     <form action="signup-check.php" method="post">
     	<h2>Inscription</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

          <label>Name</label>
          <?php if (isset($_GET['name'])) { ?>
               <input type="text" 
                      name="nom" 
                      placeholder="Name"
                      value="<?php echo $_GET['name']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="nom" 
                      placeholder="Name"><br>
          <?php }?>

          <label>User Name</label>
          <?php if (isset($_GET['user_name'])) { ?>
               <input type="text" 
                      name="username" 
                      placeholder="User Name"
                      value="<?php echo $_GET['user_name']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="user_name" 
                      placeholder="User Name"><br>
          <?php }?>


        <label> Email </label>
          <?php if (isset($_GET['e-mail'])) { ?>
            <input type="email"
                   required="required"
                   name="email"
                   placeholder="Taper votre email"
                   autocomplete="off">
               <?php }
                     else{ ?>        
           <input type="text" 
                      name="e-mail" 
                      placeholder="Email"><br>
          <?php }?>


     	<label>Password</label>
     	<input type="password" 
                 name="password" 
                 placeholder="Password"><br>

          <label>Re Password</label>
          <input type="password" 
                 name="re_password" 
                 placeholder="Re_Password"><br>

     	<button type="submit">Sign Up</button>
          <a href="index.php" class="ca">Already have an account?</a>
     </form>


</body>
</html>