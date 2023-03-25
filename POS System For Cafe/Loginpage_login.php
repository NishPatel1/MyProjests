<?php

session_start();

include 'db.php';
if (isset($_POST['submit'])) {

    // $email = $_POST['email'];
    // $user_name = $_POST['user_name'];
    $email = $_POST['user_name'];
    $password = $_POST['password'];
    // $item=$_POST['item'];

    $email_search = "select * from sgp1 where user_name = '$email'";

    $query = mysqli_query($conn, $email_search);
    // echo "Hello";
    $email_count = mysqli_num_rows($query);
    // echo " World";

    if ($email_count) {
        // echo "Email count";
        $email_pass = mysqli_fetch_assoc($query);
        $db_pass = $email_pass['password'];
        $_SESSION['user_name'] = $email_pass['user_name'];
        $pass_decode = password_verify($password, $db_pass);
        if ($pass_decode) {
            echo "login done";
            header("Location: Mainpage.php")
            ?>
            <!-- <script>
            location.replace("POSRestu.html");
            </script> -->

            <?php 
            // header('C:\xampp\htdocs\sem 4 sgp\main.php');
        } else {
            // echo "login not done";
        }
    } else
       ?><script>alert("Username/Password not valid")</script><?php
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>loginpageassignment</title>
    <link rel="stylesheet" href="newlogin_2.css">
    <link rel="stylesheet" href="Example4.css">
    <link rel="stylesheet" href="about.css">
    <script src="https://kit.fontawesome.com/2e520399f1.js" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- <style>
        ::-webkit-scrollbar{
            width: 100px;
        }

        ::-webkit-scrollbar-thumb{
            background: green;
        }

        ::-webkit-scrollbar-track{
            background: red;
        }
    </style> -->
</head>

<body>
    <div class="box">
        <section>
            <div class="box1">
            <div class="slideshow">
            <img src="https://images.unsplash.com/photo-1554118811-1e0d58224f24?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8Y2FmZXxlbnwwfHwwfHw%3D&w=1000&q=80" class="slide">
            <img src="https://images.lifestyleasia.com/wp-content/uploads/sites/7/2022/02/24115640/Untitled-design-2022-02-18T123717.280.jpg" class="slide">
            <img src="https://media.istockphoto.com/id/1211547141/photo/modern-restaurant-interior-design.jpg?s=612x612&w=0&k=20&c=CvJmHwNNwfFzVjj1_cX9scwYsl4mnVO8XFPi0LQMTsw=" class="slide">
            <img src="https://upload.wikimedia.org/wikipedia/commons/a/a3/R%C3%B6e_g%C3%A5rd_caf%C3%A9_2.jpg" class="slide">
          </div>
            </div>
            <section class="box2 forms">
                    <div class="box3 signin-box">
                        <div class="formbox">
                            <img class="logo_main" src="Images/logo_2.jpg" alt="not load">
                            <h1>Mr & Mrs</h1>
                            <form  action="" name="loginform" method="POST" enctype="multipart/form-data">
                                <div class="field input-field"> 
                                    <i class="fa-regular fa-user face-icon"></i>
                                    <input type="text" placeholder="Username" name="user_name"  required autofocus> <br>
                                    <br>
                                </div>
                                <div class="field input-field">
                                    <input type="password" name="password" placeholder="Password" class="password">
                                    <i class='bx bx-hide eye-icon'></i>
                                </div>
                                <br>
                                <div class="inputbox"> <input type="submit" value="Log in" name="submit"> </div>
                            </form>
                        </div>
                        
                        <div class="form-link">
                            <span>Don't have an account? <a href="Loginpage_register.php" class="signup-link">Signup</a></span>
                        </div>
                    </div>
            </section>
        </section>
    </div>
    <script src="store.js"></script>
</body>

</html>