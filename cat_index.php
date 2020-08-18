<?php
require_once "data_layer.php";

function display_table() {
    $result = get_categories();
    foreach($result as $row) {
        echo "<tr>";
        echo "<td>" . $row[0] . "</td>";
        echo "<td>" . $row[1] . "</td>";
        echo "<td><a href='db_delete_cat.php?catid=" . $row[0] . "'>Delete</a> | <a href='edit_category.php?catid="  . $row[0] . "'>Edit</a> </td>";
        echo "</tr>";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Features - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/smoothproducts.css">
        <title> Categories</title>
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
  
  
    </style>
    </head>
    <body>
        <h1>Category List</h1>
        <table id="tbstyle">
            <tr>
                <th>Category ID</th>
                <th>Category Name</th>
            </tr>
           <?php
            display_table();
            ?>
        </table>
        <p><a href="add_cat.php"> New Category</a></p>
        <p><a href="index.html">Home</a></p>
    </body>
</html>