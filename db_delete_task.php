<?php
require_once "data_layer.php";
if (isset($_GET['taskid'])) {
    $taskid=htmlspecialchars($_GET['taskid']);
    delete_task($taskid);
    header("location: db_index.php");
}
?>