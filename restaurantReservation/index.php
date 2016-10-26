<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title> - Table Reservation - </title>
</head>

<body>
    <div id ="setup">
        <div class="restaurant">
            <?php
                require_once ('connect.php');

            $display = "SELECT * FROM tables";
            $show_data = mysqli_query($conn, $display) or die ("query error");

            foreach($show_data as $table)
            {
                if($table['isReserved']=='no')
                {
                    echo "<img height='100px' width='150px' data-number='" . $table['number'] ."' class='tables' src='tableRes.png'/>";
                }
                else
                {
                    echo "<img data-number='invalid' class='tables taken' src='tableRes.png' />";
                }
            }
            ?>
        </div>
    </div>
    <div>
        <input type="text" id="output" name="table">
    </div>
    <div>
        <form action="reserve.php" method="post">
        Table:<input type="text" id="output"><br/>
        From:<input type="text"><br/>
        To:<input type="text"><br/>

        </form>
    </div>


<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>

<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js" ></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->

<!-- Latest compiled and minified JavaScript -->
<script src="http://getbootstrap.com/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script src="js/add.js" type="application/javascript"></script>
</body>
</html>