<?php
require_once "data_layer.php";
if (isset($_GET['taskid'])) {
    $taskid=htmlspecialchars($_GET['taskid']);
    mark_done($taskid);
    header("location: db_view1.php");
}
?>