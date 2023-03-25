<?php

session_start();
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
include 'db.php';
if (isset($_POST['log_in'])) {

    // $target ="img/".basename($_FILES['image']['name']); 

    $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);

    // $password = '$_POST[password]';

// Validate password strength
$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);
$specialChars = preg_match('@[^\w]@', $password);

if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
    ?><script> alert("Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.")</script><?php
}else{
    // echo 'Strong password.';
}

    $hash_password = password_hash($password, PASSWORD_BCRYPT);
    $hash_cpassword = password_hash($cpassword, PASSWORD_BCRYPT);

    $emailquery = "select * from sgp1 where email='$email'";
    $query = mysqli_query($conn, $emailquery);
    $emailcount = mysqli_num_rows($query);

    if ($emailcount > 0) {
        ?><script>alert("Email already exists")</script><?php
    } 
    else if ($password === $cpassword) {

            $sql = "INSERT INTO `sgp1`(`user_name`, `email`, `password`) VALUES ('$user_name','$email','$hash_password')";

            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "your entry has benn submited succesfully";
            } else {
                echo "your entry has not submited" . mysqli_error($conn);
            }
        } 
    else {
            ?><script>alert("password are not matching")</script><?php
        }
    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>loginpageassignment1</title>
    <link rel="stylesheet" href="newlogin_2.css">
    <link rel="stylesheet" href="Example4.css">
    <link rel="stylesheet" href="about.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

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
                <div class="box3">
                    <div class="formbox">
                        <img class="logo_main" style="border-radius: 50%;" src="Images/logo_2.jpg" alt="not load">
                        <h1>Mr & Mrs</h1>
                        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);  ?>" name="loginform" onsubmit="return validateForm()" method="POST" enctype="multipart/form-data">
                            <div class="field input-field">
                                <input type="text" placeholder="Username" name="user_name" required autofocus> <br>
                                <br>
                            </div>
                            <div class="field input-field">
                                <input type="email" placeholder="Email" name="email" required> <br>
                                <br>
                            </div>
                            <div class="field input-field">
                                <input type="password" name="password" placeholder="Password" class="password">
                            </div>
                            <div class="field input-field">
                                <input type="password" name="cpassword" placeholder="Confirm password" class="password">
                                <i class='bx bx-hide eye-icon'></i>
                            </div>
                            <br>
                            <div class="inputbox"> <input type="submit" value="Register" name="log_in"> </div>
                        </form>
                    </div>


                    <div class="form-link">
                        <span>Already have an account? <a href="Loginpage_login.php" class="login-link">Login</a></span>
                    </div>
                </div>
            </section>
        </section>
    </div>
    <script src="store.js"></script>
</body>

</html>