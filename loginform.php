<!DOCTYPE html>
<html>
  <head>
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="css/login.css" />
  </head>

  <body>
    <h2>Login Page</h2>
    <br />
    <?php
  
        
    if(isset($_REQUEST["msg"]) && $_REQUEST["msg"]!=""){	
      echo $_REQUEST["msg"];
    }
    ?>

    <div class="login">
      <form action="loginaction.php" method="POST" id="login">
        <label><b>User Name </b> </label>
        <input type="text" name="uname" id="Uname" placeholder="Username" />
        <br /><br />
        <label><b>Password </b> </label>
        <input type="Password" name="pass" id="Pass" placeholder="Password" />
        <br /><br />
        <input type="submit" name="log" id="log" value="Log In" />
        <br /><br />
      </form>
    </div>
  </body>
</html>
