<?php
require_once("include/session.php");
require_once("include/connection.php");
require_once("include/functions.php");
include('backend.php');

confirm_logged_in();

spl_autoload_register(function ($class)
{
    include ("".$class.".php");
});
define("MAX_SIZE", "3000");
$upmsg = array();
if(isset($_POST['publish']))
{
    if ($_FILES['picture']['name'])
    {
        $imageName = $_FILES['picture']['name'];
        $file = $_FILES['picture']['tmp_name'];
        $imageType = getimagesize($file);
        if ($imageType[2] = 1 || $imageType[2] = 2 || $imageType[2] = 3)
        {
            $size = filesize($_FILES['picture']['tmp_name']);
            if ($size < MAX_SIZE * 1024)
            {
                $prefix = uniqid();
                $picture = $prefix . "_" . $imageName;
                $newName = "../picz/Menupics/" . $picture;
                $resobj = new imgResizer();
                $resobj->load($file);

                if ($_POST['wSize'] && $_POST['hSize'])
                {
                    $width = $_POST['wSize'];
                    $height = $_POST['hSize'];
                    $resobj->resize($width, $height);
                    array_push($upmsg, "Image resized to $width and $height px");
                }
                elseif ($_POST['wSize'])
                {
                    $width = $_POST['wSize'];
                    $resobj->resizeToWidth($width);
                    array_push($upmsg, "Image resized to $width px");
                }
                elseif ($_POST['hSize'])
                {
                    $height = $_POST['hSize'];
                    $resobj->resizeToHeight($height);
                    array_push($upmsg, "Image resized to $height px");
                }
                elseif ($_POST['sSize'])
                {
                    $scale = $_POST['sSize'];
                    $resobj->scale($scale);
                    array_push($upmsg, "Image resized to scale $scale");
                }
            }
            else
            {
                array_push($upmsg, "Image is to BIG!!! max size 3 mb!!!");
            }
        }
        else
        {
            array_push($upmsg, "Unknown image type!! ");
        }
        $resobj->save($newName);
        $dailySpecial = $_POST['dailySpecial'];
        $ingredients = $_POST['ingredients'];
        $price = $_POST['price'];

        $query = "INSERT INTO dailyspecial (`dailySpecial`, `ingredients`, `price`, `picture`) VALUES ('$dailySpecial', '$ingredients', '$price', $picture)";
        mysqli_query($connection, $query) or die('Error querying database.');
    }
}
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
</head>
<body>
<div class="wrapper" style="background-color: #237d35; background-image: none; opacity: 0.8;">
    <h4 align="center">Daily Special section</h4>
    <form action="newDailySpecial.php" method="post">
        <input type="text" style="background-color: #ffffff" name="dailySpecial" placeholder="Daily Special" size="30" align="center"><br/>
        <textarea class="nooResize" name="ingredients" style="background-color: #ffffff" cols="30" placeholder= "Ingredients" rows="5" align="right"></textarea><br/>
        <style>
            textarea.nooResize
            {
                resize: none;
            }
        </style>
        <input type="number" style="background-color: #ffffff" name="price" placeholder="Price" size="30" align="left"> DKK.-<br/>
        <b>Image: </b> <input type="file" name="image"> <br>
        <b>Width: </b> <input type="text" name="wSize"> <br>
        <b>Height: </b> <input type="text" name="hSize"> <br>
        <input type="submit" name="publish" value="Add To DailySpecials!" />
    </form>
</div>
</body>
</html>
