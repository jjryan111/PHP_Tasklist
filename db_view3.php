<?php
require_once "data_layer.php";
function display_report(){

    if($_POST){
        if (isset($_POST['repdate'])) {
            $date = htmlspecialchars($_POST['repdate']);
            $result = get_view3($date);
            $total = 0;
            foreach($result as $row) {
                echo "<tr>";
                echo "<td>" . $row[0] . "</td>";
                echo "<td>" . $row[1] . "</td>";
                echo "</tr>";
                $total += $row[1];
            }
            echo "<h3> Total Tasks Completed Over Interval: </h3>";
            
            echo "<h4> " . $total . "</h4>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Tasks</title>
         <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Features - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/smoothproducts.css">
    <style>
    
#tbstyle {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#tbstyle td, #tbstyle th {
  border: 1px solid #ddd;
  padding: 8px;
}

#tbstyle tr:nth-child(even){background-color: #f2f2f2;}

#tbstyle tr:hover {background-color: #ddd;}

#tbstyle th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #3d5a80;
  color: white;
}
.btnstyle {
  padding-top: 6px;
  padding-bottom: 6px;
  text-align: center;
  background-color: #3d5a80;
  color: white;
  font-weight:bold;
  margin:6px;
  margin-left:140px;
  border-color:gray;
}
  
    </style>
    </head>
    <body>
        <h1>Tasklist</h1>
           <a href="https://csi3450bestgroup.000webhostapp.com/db_index.php"><button class="btnstyle">Main View</button></a>
        <a href="https://csi3450bestgroup.000webhostapp.com/db_view2.php"><button class="btnstyle">Due Today</button></a>
        <a href="https://csi3450bestgroup.000webhostapp.com/db_view2b.php"><button class="btnstyle">Due Tomorrow</button></a>
        <a href="https://csi3450bestgroup.000webhostapp.com/db_view2c.php"><button class="btnstyle">Due This Week</button></a>
        <table id="tbstyle">
            <tr>
                <th>Date</th>
                <th>Tasks Completed</th>
            </tr>
           <?php
            display_report();
            ?>
        </table>
        <div class="block-heading"><a href="index.html">Home</a></div>
    </body>
</html>