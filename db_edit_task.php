<?php
require_once "data_layer.php";
    if($_POST){
        if (isset($_POST['taskid']) && isset($_POST['taskname']) && isset($_POST['taskdesc']) && isset($_POST['taskdate']) && isset($_POST['taskprio'])&& isset($_POST['catid']) && isset($_POST['statid'])) {
            $taskid = htmlspecialchars($_POST['taskid']);
            $taskname = htmlspecialchars($_POST['taskname']);
            $taskdesc = htmlspecialchars($_POST['taskdesc']);
            $taskdate = htmlspecialchars($_POST['taskdate']);
            $taskprio = htmlspecialchars($_POST['taskprio']);
            $catid = htmlspecialchars($_POST['catid']);
            $statid = htmlspecialchars($_POST['statid']);

            edit_task_data($taskid, $taskname, $taskdesc, $taskdate, $taskprio, $catid, $statid);
            header("location: db_index.php");
        }
    }
?>