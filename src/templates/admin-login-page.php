<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Signin</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="css/logandsignup.css" rel="stylesheet">
    <style type="text/css">
        #p{
            position: absolute;
            top: 0;
            right: 0;

        }
    </style>
    
  </head>
  <body class="text-center">    

    <form class="form-signin" method="post" action="admin-login.php">
        
        <h1 class="h3 mb-3 font-weight-normal">Log in to Admin Panel</h1>
        <?php displayMessage(); ?>

        <label for="inputEmail" class="sr-only" >Email address</label>
        <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" autocomplete="off" required autofocus>


        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
        
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="admin-submit">Sign in</button>
        <br>
        Not an Admin? <a href="index.php" name="login">Login?</a>
        
    </form>
    

  </body>
</html>
