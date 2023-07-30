<?php session_start();

include 'connect.php';
if(isset($_POST['login']))
{
    $name=$_POST['name'];
    $password=$_POST['password'];


    $name=mysqli_real_escape_string($con,$name);
    $password=mysqli_real_escape_string($con,$password);

    $sql=" select * from `admin` where name='$name' and password='$password'";
   
    $result=mysqli_query($con,$sql);
    $counter=mysqli_num_rows($result);
    if($counter==0)
    {
        echo "<script type='text/javascript'>alert('Inavalid Username or Password')</script>";
    }
    else
    {
        $_SESSION['name']=$name;
        echo" <script>document.location='display.php'</script>";
    }
   
    
}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <title>crud operation</title>
    <link href="assets/styles.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
   
 <form class="form-signin" method="post">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputname">name</label>
      <input name="name" type="text" id="inputname" class="form-control" placeholder="name" required autofocus>
      <label for="inputPassword" >Password</label>
      <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <button name="login" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>
    <!-- <form method="post">

            <div class="form-group">
                <label>User</label>
                <input type="text"  class="row align-items-center" name="name" autocomplete="off">

            </div>
    
            <div class="form-group">
                <label>Password</label>
                <input type="text"  class="row align-items-center" name="password" autocomplete="off">

            </div>

            <button class="btn btn-success" type="submit" name="login">Login</button>

        </form> -->
    </div>


</body>

</html>