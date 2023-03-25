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
    <title>Document</title>
</head>

<body>
    <header>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="information" style="padding: 50px 0px 0px 0px;">
                <img class="IMAGESORCE" src="1.jpg" alt="Bridge Image">
                <div class="bg">
                    <div style="margin-left :3%;margin-top:-6.5%">
                        <p><b class="bfont">Name :</b><input type="text" id="Bridge-name" class="name" name="name" required autofocus placeholder="Enter Bridge name" /></p>
                    </div>

                    <!-- <div style="margin-left :3%;">
                        <p style=" width: 45%;"><b class="bfont">Location :</b><input type="text" id="Bridge-location" class="location" required autofocus name="location" placeholder="Enter the location of the bridge" /></p>
                    </div> -->

                    <!-- <div style="margin-left :3%;">
                        <div class="form-state">
                            <p style="width: 45%;"><b class="bfont">State : </b><select name="state" id="STATE" required style="width: 40%; height: 25px; border-radius: 7px; font-size: 19px;margin-left: 28px;">
                                    <option value="state">--Select--</option>  
                                    <option value="Gujrat">Gujrat</option>
                                </select></p>
                            <div class="form-district">
                                <p style="width: 45%;"><b class="bfont">District : </b><select name="district" id="DISTRICT" required style="width: 40%; height: 25px; border-radius: 7px; font-size: 19px;margin-left: 8px;">
                                        <option value="District">--Select--</option>  
                                        <option value="Gujrat">Junagadh</option>
                                    </select></p> -->
<!-- 
                            </div>
                            <button style="font-size: 15px; margin-left: 365px; padding: 4px 12px; border-radius: 10px;margin-top: 38px;">Submit</button>
                        </div> -->
                        </div>
                            <button style="font-size: 15px; margin-left: 365px; padding: 4px 12px; border-radius: 10px;margin-top: 38px;">Submit</button>
                        </div>
                        <div style="margin-left: 48%;margin-top: -568px; position: fixed;">
                            <div class="vl"></div>
                        </div>

                        <!-- <div style="margin-left: 52%;margin-top: -550px;">
                            <div class="form-taluka-city">
                                <p><b class="bfont">Taluka : </b>
                                    <select name="taluka" id="TALUKA" required style="width: 40%; height: 25px; border-radius: 7px; font-size: 19px;margin-left: 87px;">
                                        <option value="taluka">--Select--</option>
                                        <option value="Junagadh">Junagadh</option>
                                        <option value="Vanthali">Vanthali</option>
                                        <option value="Manavadar">Manavadar</option>
                                        <option value="Kesode">Kesode</option>
                                        <option value="Mangrol">Mangrol</option>
                                        <option value="Mendarda">Mendarda</option>
                                        <option value="Maliya Hatina">Maliya Hatina</option>
                                        <option value="Bhesan">Bhesan</option>
                                        <option value="	Visavadar"> Visavadar</option>
                                    </select>
                                </p> -->
                                <p><b class="bfont">price :</b><input type="text" id="City-name" class="city" name="price" required autofocus placeholder="price" /></p>
                            </div>
                            <div class="form-height-width">
                                <p><b class="bfont">description :</b><input type="text" name="description" id="height" class="height" required autofocus placeholder="description" /></p>
                                <p><b class="bfont">item :</b><input type="text" name="item" id="width" class="width" required autofocus placeholder="item" /></p>
                            </div>
                            </p>

                            <!-- <div class="form-Year-of-cons">
                                <p><b class="bfont">Year of <br>Construction :</b><input style="height: 28px;width: 40%;border-radius: 8px; margin-left: 43px;" type="month" id="Bridge-construction" name="year_of_construction" class="form-yoc" required placeholder="Enter year of Construction" /></p>
                            </div> -->

                            <!-- <div class="form-agency">
                                <p><b class="bfont">Name of Agency : </b><input type="text" id="Agency-name" class="agency" name="agency" required autofocus placeholder="Enter name of the agency" /></p>
                            </div>

                            <div class="form-grant">
                                <p><b class="bfont">Grant approved <br>for bridge (Crore) :</b><input type="number" id="Bridge-grant" class="grant" name="grant_amount" required placeholder="Enter grand approved for bridge " /></p>
                            </div> -->

                            <!-- <div class="form-material">
                                <p><b class="bfont">Material : </b><input type="text" id="material" class="material" name="materials" required autofocus placeholder="Enter materials used in construction of bridge" /></p>
                            </div>
                            <div class="form-dos">
                                <p><b class="bfont">Date of Start :</b><input type="date" id="Bridge-start" style="height: 28px;width: 40%;border-radius: 8px; margin-left: 43px;" name="date_of_start" class="Dos" required placeholder="Strat date" /></p>
                            </div> -->
                            <!-- <div class="form-doi">
                                <p><b class="bfont">Date of <br>inogration : </b><input type="date" id="Bridge-start" style="height: 28px;width: 40%;border-radius: 8px; margin-left: 58px;" name="date_of_invogration" class="Dos" required placeholder="Strat date" /></p>
                            </div> -->
                            <div class="form-outline mb-4 ml">
                                <label class="form-label" style="height: 10px;">
                                    <h2>Upload image : </h2>
                                </label>
                                <input type="file" name="image" id="Bridge-image-up" class="form-control form-control-lg inf1" style=" height:10px;" required />
                            </div>
                            <!-- <button style="font-size: 15px; margin-left: 25px; padding: 4px 12px; border-radius: 10px;margin-top: 0px;">Edit</button> -->
                        </div>

                    </div>
                </div>

            </div>
        </form>
    </header>
</body>
<!-- <script src="length.js"></script> -->

</html>