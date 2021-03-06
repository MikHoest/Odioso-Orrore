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
    if($_FILES['picture']['name'])
    {
        $imageName = $_FILES['picture']['name'];
        $file = $_FILES['picture']['tmp_name'];
        $imageType = getimagesize($file);
        if($imageType[2] = 1|| $imageType[2] = 2 || $imageType[2] = 3) //img type compared to a php list - page 8 OOP lecture-03-2
        {
            $size = filesize($_FILES['picture']['tmp_name']);
            if($size < MAX_SIZE*1024)
            {
                $prefix = uniqid();
                $picture = $prefix."_".$imageName;
                $newName="../picz/Menupics/".$picture;
                $resobj = new imgResizer();
                $resobj->load($file);

                if($_POST['wSize'] && $_POST['hSize'])
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
        $dailySpecial = trim(htmlspecialchars(mysqli_real_escape_string($connection,$_POST['dailySpecial'])));
        $ingredients = trim(htmlspecialchars(mysqli_real_escape_string($connection,$_POST['ingredients'])));
        $price = trim(htmlspecialchars(mysqli_real_escape_string($connection,$_POST['price'])));
        $today = trim(htmlspecialchars(mysqli_real_escape_string($connection,$_POST['today'])));

        $query = "INSERT INTO dailyspecial (`dailySpecial`, `ingredients`, `price`, `picture`, `today`) VALUES ('$dailySpecial', '$ingredients', '$price', '$picture', '$today')";
        mysqli_query($connection, $query) or die('Error querying database.');
        array_push($upmsg, "The Upload Was a Success!! ");
    }
    else
    {
        array_push($upmsg, "Nothing was selected, SELECT A PICTURE !");
    }
}
?>
<html>
<body>
<?php
foreach ($upmsg as $msg)
{
    echo "<h1>".$msg."<h1>";
}
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
</head>
    <div class="wrapper" style="background-color: #7b7d21; background-image: none; opacity: 0.8;">
    <h4 align="center">Daily Special section</h4>
    <form action="newDailySpecial.php" method="post" enctype="multipart/form-data">
        <input type="text" style="background-color: #ffffff" name="dailySpecial" placeholder="Daily Special" size="30" align="center"><br/>
        <textarea class="nooResize" name="ingredients" style="background-color: #ffffff" cols="30" placeholder= "Ingredients" rows="5" align="right"></textarea><br/>
        <style>
            textarea.nooResize
            {
                resize: none;
            }
        </style>
        <input type="number" style="background-color: #ffffff" name="price" placeholder="Price" size="30" align="left"> DKK.-<br/>
        <select name="today">
            <option value="Mon">Monday</option>
            <option value="Tue">Tuesday</option>
            <option value="Wed">Wednesday</option>
            <option value="Thu">Thursday</option>
            <option value="Fri">Friday</option>
            <option value="Sat">Saturday</option>
            <option value="Sun">Sunday</option>
        </select><br>
        <b>Image: </b> <input type="file" name="picture"> <br>
        <b>Width: ( 512 ) </b> <input type="text" name="wSize"> <br>
        <b>Height: ( 512 )</b> <input type="text" name="hSize"> <br>
        <input type="submit" name="publish" value="Add To DailySpecials!" />
    </form>
</div>
</body>
</html>