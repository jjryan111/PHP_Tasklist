<?php
require_once "data_layer.php";

function display_table() {
    $result = get_tasks();
    foreach($result as $row) {
        echo "<tr>";
        echo "<td>" . $row[0] . "</td>";
        echo "<td>" . $row[1] . "</td>";
        echo "<td>" . $row[2] . "</td>";
        echo "<td>" . $row[3] . "</td>";
        echo "<td>" . $row[4] . "</td>";
        echo "<td>" . $row[5] . "</td>";
        echo "<td>" . $row[6] . "</td>";
        echo "<td><a href='db_mark_done.php?taskid=" . $row[0] . "'>Mark Task Complete</a> | <a href='db_delete_task.php?taskid=" . $row[0] . "'>Delete</a> | <a href='edit_task.php?taskid="  . $row[0] . "'>Edit</a> </td>";
        echo "</tr>";
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
        <a href="https://csi3450bestgroup.000webhostapp.com/db_index.php"><button class="btnstyle">All Tasks</button></a>
        <a href="https://csi3450bestgroup.000webhostapp.com/db_view1.php"><button class="btnstyle">View 1</button></a>
        <a href="https://csi3450bestgroup.000webhostapp.com/db_view2.php"><button class="btnstyle">View 2</button></a>
        <a href="https://csi3450bestgroup.000webhostapp.com/view3_form.php"><button class="btnstyle">View 3</button></a>
        <table id="tbstyle">
            <tr>
                <th>Task ID</th>
                <th>Task Name</th>
                <th>Task Description</th>
                <th>Task Due Date</th>
                <th>Priority</th>
                <th>Task Category</th>
                <th>Task Status</th>
            </tr>
           <?php
            display_table();
            ?>
        </table>
        <p><a href="add_task.php"> New Task</a></p>
        <div class="block-heading"><a href="index.html">Home</a></div>
    </body>
</html>