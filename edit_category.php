<?php
    require_once "data_layer.php";
    
    function edit_cat(){
        if (isset($_GET['catid'])) {
            $catid=htmlspecialchars($_GET['catid']);
            $result=get_one_category($catid);
            foreach($result as $row) {
                echo "<label for='textcatid'>Category ID </label>";
                echo "<input type='text' id='textcatid' name='catid' value='" . $row[0] . "' readonly='readonly'> <br>";
                echo "<label for='textcatname'>Category Name: </label>";
                echo "<input type='text' id='textcatname' name='catname' value='" . $row[1] . "'> <br>";
            }
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Edit a Category</title>
    </head>
    <body>
        <h1>Edit Category</h1>
        <form method="POST" action="db_edit_cat.php">
            <?php
                edit_cat();
            ?>
            <input type="submit" value="Change">
        </form>
    </body>
</html>