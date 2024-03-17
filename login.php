<?php session_start();
  
  if(isset($_POST["btnLogin"])){
      
      $username=$_POST["txtUsername"];
      $password=$_POST["txtPassword"];
      
      $file=file("auth.txt");
      
      foreach($file as $line){
          
          list($_username,$_password)=explode(",",$line);
          
          if(trim($_username)==$username && trim($_password)==$password){
              
             $_SESSION["sname"]=$username;
            
             header("location:demo.php");
              
          }else{
              
              $msg="Username or Password is incorrect!";
          }
          
      }
      
  }

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Bootstrap Customized Login</title>
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
 <div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Login Form</div>
                <div class="card-body">
                    <?php
                       echo isset($msg) ? '<div class="alert alert-danger">' . $msg . '</div>' : '';
                     ?>
                     <form action="#" method="post">
                        <div class="form-group">
                            <label for="txtUsername">Username</label>
                            <input type="text" name="txtUsername" id="txtUsername" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="txtPassword">Password</label>
                            <input type="password" name="txtPassword" id="txtPassword" class="form-control" />
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Log In" name="btnLogin" class="btn btn-primary" />
                        </div>
                     </form>
                </div>
            </div>
        </div>
    </div>
 </div>
<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
