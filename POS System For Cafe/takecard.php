<?php
include "db.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $target ="img/".basename($_FILES['image']['name']); 


$name = $_POST['name'];
$price = $_POST['price'];
$image = $_FILES['image']['name'];
$description = $_POST['description'];
$item = $_POST['item'];


$sql  ="INSERT INTO `cart`(`name`, `price`, `image`, `description`, `item`) VALUES ('$name','$price','$image','$description','$item')";

$result = mysqli_query($conn, $sql);
        if ($result) {
            echo "your entry has benn submited succesfully";
        } else {
            echo "your entry has not submited" . mysqli_error($conn);}
            if(move_uploaded_file($_FILES['image']['tmp_name'],$target))
            {
                echo"your entry has benn submited succesfully";
            }
            else {
                echo "your entry has not submited";
                }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
    <title>takecard</title>
    <link rel="stylesheet" href="takeinfo.css">
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        header {
            width: 100%;
            height: 100vh;
            /*  background-image:linear-gradient(rgba(0,0,0,0.8),rgba(0,0,0,0.2)),
        url("1.jpg"); */
            background-size: cover;
            font-family: sans-serif;
            color: black;
        }
    </style>
</head>
<body>


<form action="" method="post" enctype="multipart/form-data">
                        <div style="margin-left :3%;margin-top:-6.5%">
                        <p><b class="bfont">Name :</b><input type="text" id="Bridge-name" class="name" name="name" required autofocus placeholder="name" /></p>
                    </div>
                    <div style="margin-left :3%;margin-top:-6.5%">
                        <p><b class="bfont">price :</b><input type="text" id="Bridge-name" class="name" name="price" required autofocus placeholder="price" /></p>
                    </div>
                    <div style="margin-left :3%;margin-top:-6.5%">
                        <p><b class="bfont">description :</b><input type="text" id="Bridge-name" class="name" name="description" required autofocus placeholder="description" /></p>
                    </div>
                    <div style="margin-left :3%;margin-top:-6.5%">
                        <p><b class="bfont">item :</b><input type="text" id="Bridge-name" class="name" name="item" required autofocus placeholder="item" /></p>
                    </div>
                    <div class="form-outline mb-4 ml">
                                <label class="form-label" style="height: 10px;">
                                    <h2>Upload image : </h2>
                                </label>
                                <input type="file" name="image" id="Bridge-image-up" class="form-control form-control-lg inf1" style=" height:10px;" required />
                            </div>


</form>
    
</body>
</html>