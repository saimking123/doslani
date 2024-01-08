<?php
include("connection.php");
include("head_foot.php");

if(isset($_POST['categorybtn']))
{
    $name= $_POST["category_name"];
    $filename = $_FILES["category_image"]["name"];
    $tmpname = $_FILES["category_image"]["tmp_name"];
    $location = "../categroyimage/";
    $saveimg = $location . $filename;
    if (move_uploaded_file($tmpname, $saveimg)) {
        $insertquery = "INSERT INTO category(category_name,category_image)Values('".$name."','".$saveimg."')";

        // var_dump($insertquery);

        $insertqueryconnect = mysqli_query($conn, $insertquery);
    }
    if($insertqueryconnect)
    {
        echo "Record has been inserted";
    }
    else{
        echo "data not inserted";
    }
}
?>
<br><br><br><br>

  <h2>Category insert</h2>
    <form method="POST" style="margin-bottom:8rem" enctype="multipart/form-data">

        <input type="text" placeholder="Enter yout category" name="category_name" class="form-control" >
        <br>
        <input type="file" placeholder="Enter category image" name="category_image" class="form-control" >
        <br>
        <button type="submit" name="categorybtn" style="background-color:blue;color:white">Add Category</button>

    </form>
