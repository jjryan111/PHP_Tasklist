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
    
    function edit_task(){
        if (isset($_GET['taskid'])) {
            $taskid=htmlspecialchars($_GET['taskid']);
            $result=get_one_task($taskid);
            foreach($result as $row) {
                echo "<label for='textcatid'>Task ID </label>";
                echo "<input type='text' id='texttaskid' name='taskid' value='" . $row[0] . "' readonly='readonly'> <br>";
                echo "<label for='texttaskname'>Task Name: </label>";
                echo "<input type='text' id='texttaskname' name='taskname' value='" . $row[1] . "'> <br>";
                echo "<label for='texttaskdesc'>Description: </label>";
                echo "<input type='text' id='texttaskdesc' name='taskdesc' value='" . $row[2] . "'> <br>";
                echo "<label for='texttaskdate'>Due Date: </label>";
                echo "<input type='text' id='texttaskdate' name='taskdate' value='" . $row[3] . "'> <br>";
                echo "<label for='txtprio'>Priority: </label>";
                echo "<select name='taskprio' value='" . $row[4] . "'>";
                    echo "<option value='1'>1</option>";
                    echo "<option value='2'>2</option>";
                    echo "<option value='3'>3</option>";
                    echo "<option value='4'>4</option>";
                echo "</select>";
                echo "<label for='txtcatid'>Category: </label>";
                echo "<select name='catid' id='txtcatid'  value='" . $row[5] . "'>";
                    generate_category_list();
                echo "</select>";
                echo "<label for='txtstatid'>Status: </label>";
                echo "<select name='statid' id='txtstatid' value='" . $row[6] . "'>";
                    generate_status_list();
                echo "</select>";
            }
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Edit a Task</title>
    </head>
    <body>
        <h1>Edit Task</h1>
        <form method="POST" action="db_edit_task.php">
            <?php
                edit_task();
            ?>
            <input type="submit" value="Change">
        </form>
    </body>
</html>
