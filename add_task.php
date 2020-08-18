<?php
    require_once "data_layer.php";
    function generate_category_list(){
        $result=get_categories();
        foreach($result as $row) {
            echo "<option value=" . $row[0] . ">" . $row[1] . " " . $row[2] . "</option>";
        }
    }
    
    function generate_status_list(){
        $result=get_statuses();
        foreach($result as $row) {
            echo "<option value=" . $row[0] . ">" . $row[1] . " " . $row[2] . "</option>";
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Add a Task</title>
    </head>
    <body>
        <h1>Add Task</h1>
        <form method="POST" action="db_add_task.php">
            <label for="texttaskname">Task Name: </label>
            <input type="text" id="texttaskname" name="taskname"> <br>
            <label for="texttaskdesc">Description: </label>
            <input type="text" id="texttaskdesc" name="taskdesc"> <br>
            <label for="texttaskdate">Due Date: </label>
            <input type="text" id="texttaskdate" name="taskdate"> <br>
            <label for="txtprio">Priority: </label>
            <select name="taskprio">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            <label for="txtcatid">Category: </label>
           <select name="catid" id="txtcatid">
               <?php
                    generate_category_list();
               ?>
           </select>
           <label for="txtstatid">Status: </label>
            <select name="statid" id="txtstatid">
               <?php
                    generate_status_list();
               ?>
           </select>

            <input type="submit" value="Add">
        </form>
    </body>
</html>