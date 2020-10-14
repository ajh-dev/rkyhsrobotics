<?php
session_start();
if (isset($_POST['submit'])) {
  $user = $_POST['user'];
  $pass = $_POST['pass'];

  $DB_SERVER = 'localhost';
  $DB_USERNAME = 'root';
  $DB_PASSWORD = '';
  $DB_NAME = 'robotics';
 

  $conn =  mysqli_connect($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

  if (mysqli_connect_error()) {
    echo '<div class="alert alert-danger">
      <strong>Login Failed</strong> 
      Please try again. If this is a recurring issue please contact Adam or Maya
    </div>';
    $conn->close();
  } else {
    $get_username = "SELECT username FROM users WHERE username = '$user'";
    $username_check = mysqli_query($conn, $get_username);
    if(mysqli_num_rows($username_check) == 0)
    {
      echo '<div class="alert alert-danger">
        <strong>Login Failed</strong> 
        Please check that your username is spelled correctly
      </div>';
      $conn->close();
    }else{
      $get_pass = "SELECT pass FROM users WHERE username = '$user'";
      $pass_check = mysqli_query($conn, $get_pass);
      if($pass_check == $pass){
        $_SESSION['loggedin'] = TRUE;
        echo '<div class="alert alert-success">
          <strong>Login Successful</strong> 
        </div>';
      }else{
        echo '<div class="alert alert-danger">
        <strong>Login Failed</strong> 
        Incorrect Information
      </div>';
      }
    }
  }
}
 ?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="main.css">
</head>
<body style = 'overflow-x: hidden;'>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <img src="img/roboticsLogo.png" width="150">
              </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="toolbox.php">Toolbox</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Meeting Signup</a>
                </li>
              </ul>
              <button type="button" class="ml-auto btn btn-light" data-toggle="modal" data-target="#exampleModalCenter">
                Sign In
              </button>
          </nav>
    </header>
    <div class = "container-fluid h-50 border-bottom border-dark" style = 'background-color: rgba(255, 166, 0, 0.781); padding: 0px;'>
        <div class = 'row pt-5 w-100 justify-content-center'>
            <h1 class = 'display-2 text-center text-white font-weight-light'>Rkyhs Robotics</h1>
        </div>
        <div class = 'row pt-5 w-100 justify-content-center'>
            <h1 class = 'display-4 text-white font-weight-light'>2020-2021</h1>
        </div>
        <div class = 'row pt-5 w-100 justify-content-center'>
            <button type="button" class="btn btn-lg mr-1 text-white font-weight-light" style = "background-color: rgb(78, 155, 255);">Meeting Signup</button>
            <button type="button" class="btn btn-lg ml-1 text-white font-weight-light" style = "background-color: rgb(78, 155, 255);">Toolbox</button>
        </div>
    </div>
    <div class = 'row h-50'>
        <div class = 'container col-lg-6' style = 'background-color: rgb(152, 206, 250);'>
            <div class = 'row justify-content-center'>
                <h1 class = 'display-3' style = 'color: rgb(228, 156, 1)'>Our Team</h1>
            </div>
            <div class = 'row justify-content-center'>
                <h4 class = 'text-center' style = 'color: rgb(228, 156, 1)'>Teacher - Mrs. Roth<br>
                    Maya Stein<br>
                    Adam Hollander<br>
                    Shira Elisha<br>
                    Roey Novick<br>
                    Ben Lando<br>
                    Jack Helprin<br>
                    Dylan</h4>
            </div>
        </div>
        <div class = 'container col-lg-6' style = 'background-color: rgb(211, 211, 211);'>
            <div class = 'row justify-content-center'>
                <h1 class = 'display-3' style = 'color: rgb(228, 156, 1)'>About Us</h1>
            </div>
            <div class = 'row justify-content-center'>
                <h4 class = 'font-weight-light text-center' style = 'color: rgb(228, 156, 1)'>The Rae Kushner Yeshiva High School Robotics Team is a group of students dedicated to learning about robotics through hands-on experiences and competitions.</h4>
            </div>
            <div class = 'row justify-content-center'>
                <img class = "border border-warning" src = 'img/about_us.jpg'></img>
            </div>
        </div>
    </div>
    <footer>
        <div class = 'container-fluid' style = 'background-color: white'>
            <h1 class = 'display-4 text-center text-warning font-weight-light'>Contact Us!</h1>
            <p class = 'text-center text-warning font-weight-light' style = 'font-size: large;'>Email: rkyhsrobotics@gmail.com</p>
        </div>
    </footer>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Sign In Here:</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method = 'post'>
                <label for="user">Username</label>
                <input type="text" id="user" name="user" class="form-control" placeholder="Enter username">
                <label for="pass">Password</label>
                <input type="password" id="pass" name="pass" class="form-control" placeholder="Password">
                <button type="submit" id="submit" name="submit" class="submit btn btn-warning">Submit</button>
              </form>
              <script type="text/javascript">
              function form_submit() {
                document.getElementById("search_form").submit();
              }    
              </script>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>
</html>
