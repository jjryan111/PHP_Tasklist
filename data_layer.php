<?php
// Change username and password to your MySQL account username and password
$server = "localhost";
$userName = "id14590068_admin";
$pass = "q-j5ij>w6cAquB|@";
$db = "id14590068_csi3450best";

function get_connection(){
    global $server, $userName, $pass, $db;
    $con=mysqli_connect($server,$userName,$pass,$db);
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        die();
        }
    return $con;
}

function get_tasks(){
    $con = get_connection();
    $result = mysqli_query($con,"SELECT task_id, task_name, description, DATE_FORMAT(due_date, '%m/%d/%Y') AS task_date, priority, cat_name, status_desc FROM task LEFT JOIN category ON task.category_id = category.category_id INNER JOIN status ON task.status_id = status.status_id ORDER BY priority, due_date; ");
    $data = array();
    while($row = mysqli_fetch_array($result)) {
        $temp = array();
        array_push($temp, $row['task_id']);
        array_push($temp, $row['task_name']);
        array_push($temp, $row['description']);
        array_push($temp, $row['task_date']);
        array_push($temp, $row['priority']);
        array_push($temp, $row['cat_name']);
        array_push($temp, $row['status_desc']);
        array_push($data, $temp);
    }
    mysqli_close($con);
    return $data;
}

function get_categories(){
    $con = get_connection();
    $result = mysqli_query($con,"SELECT category_id, cat_name FROM category; ");
    $data = array();
    while($row = mysqli_fetch_array($result)) {
        $temp = array();
        array_push($temp, $row['category_id']);
        array_push($temp, $row['cat_name']);
        array_push($data, $temp);
    }
    mysqli_close($con);
    return $data;
}

function get_one_category($arg_catid){
    $con = get_connection();
    $stmt = mysqli_prepare($con, "SELECT category_id, cat_name FROM category WHERE category_id=?; ");
    mysqli_stmt_bind_param($stmt, "i", $arg_catid);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $data = array();
    while($row = mysqli_fetch_array($result)){
    $temp = array();
        array_push($temp, $row['category_id']);
        array_push($temp, $row['cat_name']);
        array_push($data, $temp);
    }
    mysqli_close($con);
    return $data;
}

function get_one_task($arg_taskid){
    $con = get_connection();
    $stmt = mysqli_prepare($con, "SELECT task_id, task_name, description, DATE_FORMAT(due_date, '%m/%d/%Y') AS due_date, priority, category_id, status_id FROM task WHERE task_id =?");
    mysqli_stmt_bind_param($stmt, "i", $arg_taskid);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $data = array();
    while($row = mysqli_fetch_array($result)){
    $temp = array();
        array_push($temp, $row['task_id']);
        array_push($temp, $row['task_name']);
        array_push($temp, $row['description']);
        array_push($temp, $row['due_date']);
        array_push($temp, $row['priority']);
        array_push($temp, $row['category_id']);
        array_push($temp, $row['status_id']);
        array_push($data, $temp);
    }
    mysqli_close($con);
    return $data;
}

function get_statuses(){
    $con = get_connection();
    $result = mysqli_query($con,"SELECT status_id, status_desc FROM status; ");
    $data = array();
    while($row = mysqli_fetch_array($result)) {
        $temp = array();
        array_push($temp, $row['status_id']);
        array_push($temp, $row['status_desc']);
        array_push($data, $temp);
    }
    mysqli_close($con);
    return $data;
}

function add_task_data($arg_taskname, $arg_taskdesc, $arg_taskdate, $arg_taskprio, $arg_catid, $arg_statid) {
        $con = get_connection();
        $date = date('Y-m-d', strtotime($arg_taskdate)); 
        $stmt = mysqli_prepare($con, "INSERT INTO task (task_name, description, due_date, priority, category_id, status_id) VALUES (?,?,?,?,?,?); ");
        mysqli_stmt_bind_param($stmt, "ssssii", $arg_taskname, $arg_taskdesc, $date, $arg_taskprio, $arg_catid, $arg_statid);
        mysqli_stmt_execute($stmt);
        mysqli_close($con); 
    }
    
function add_category($arg_catname) {
    $con = get_connection();
    $stmt = mysqli_prepare($con, "INSERT INTO category (cat_name) VALUES (?); ");
    mysqli_stmt_bind_param($stmt, "s", $arg_catname);
    mysqli_stmt_execute($stmt);
    mysqli_close($con); 
}

function delete_task($arg_taskid){
    $con = get_connection();
        $stmt = mysqli_prepare($con, "DELETE FROM task WHERE task_id=?; ");
        mysqli_stmt_bind_param($stmt, "i", $arg_taskid);
        mysqli_stmt_execute($stmt);
        mysqli_close($con); 
}

function delete_cat($arg_catid){
    $con = get_connection();
    $stmt = mysqli_prepare($con, "UPDATE task SET category_id=NULL WHERE category_id=?; ");
    mysqli_stmt_bind_param($stmt, "i", $arg_catid);
    mysqli_stmt_execute($stmt);
    $stmt = mysqli_prepare($con, "DELETE FROM category WHERE category_id=?; ");
    mysqli_stmt_bind_param($stmt, "i", $arg_catid);
    mysqli_stmt_execute($stmt);
    mysqli_close($con); 
}

function edit_category($arg_catid, $arg_catname) {
    $con = get_connection();
    $stmt = mysqli_prepare($con, "UPDATE category SET cat_name=? WHERE category_id=?; ");
    mysqli_stmt_bind_param($stmt, "si", $arg_catname, $arg_catid);
    mysqli_stmt_execute($stmt);
    mysqli_close($con); 
}


function edit_task_data($taskid, $taskname, $taskdesc, $taskdate, $taskprio, $catid, $statid) {
    $con = get_connection();
    $date = date('Y-m-d', strtotime($taskdate)); 
    $stmt = mysqli_prepare($con, "UPDATE task SET task_name=?, description=?, due_date=?, priority=?, category_id=?, status_id=? WHERE task_id=?; ");
    mysqli_stmt_bind_param($stmt, "ssssiii", $taskname, $taskdesc, $date, $taskprio, $catid, $statid, $taskid);
    mysqli_stmt_execute($stmt);
    mysqli_close($con); 
}

function mark_done($arg_taskid){
    $con = get_connection();
        $stmt = mysqli_prepare($con, "UPDATE task SET status_id=1 WHERE task_id=?; ");
        mysqli_stmt_bind_param($stmt, "i", $arg_taskid);
        mysqli_stmt_execute($stmt);
        mysqli_close($con); 
}
function get_view1(){
    $con = get_connection();
    $result = mysqli_query($con,"SELECT task_id, task_name, description, DATE_FORMAT(due_date, '%m/%d/%Y') AS task_date, priority, cat_name, status_desc FROM task LEFT JOIN category ON task.category_id = category.category_id INNER JOIN status ON task.status_id = status.status_id WHERE task.status_id <> 1 AND (due_date < CURDATE() OR due_date = CURDATE()) ORDER BY priority; ");
    $data = array();
    while($row = mysqli_fetch_array($result)) {
        $temp = array();
        array_push($temp, $row['task_id']);
        array_push($temp, $row['task_name']);
        array_push($temp, $row['description']);
        array_push($temp, $row['task_date']);
        array_push($temp, $row['priority']);
        array_push($temp, $row['cat_name']);
        array_push($temp, $row['status_desc']);
        array_push($data, $temp);
    }
    mysqli_close($con);
    return $data;
}
function get_view2(){
    $con = get_connection();
    $result = mysqli_query($con,"SELECT task_id, task_name, description, DATE_FORMAT(due_date, '%m/%d/%Y') AS task_date, priority, cat_name, status_desc FROM task LEFT JOIN category ON task.category_id = category.category_id INNER JOIN status ON task.status_id = status.status_id WHERE task.status_id <> 1 AND due_date = CURDATE() ORDER BY priority, due_date; ");
    $data = array();
    while($row = mysqli_fetch_array($result)) {
        $temp = array();
        array_push($temp, $row['task_id']);
        array_push($temp, $row['task_name']);
        array_push($temp, $row['description']);
        array_push($temp, $row['task_date']);
        array_push($temp, $row['priority']);
        array_push($temp, $row['cat_name']);
        array_push($temp, $row['status_desc']);
        array_push($data, $temp);
    }
    mysqli_close($con);
    return $data;
}
function get_view2b(){
    $con = get_connection();
    $result = mysqli_query($con,"SELECT task_id, task_name, description, DATE_FORMAT(due_date, '%m/%d/%Y') AS task_date, priority, cat_name, status_desc FROM task LEFT JOIN category ON task.category_id = category.category_id INNER JOIN status ON task.status_id = status.status_id WHERE task.status_id <> 1 AND ( due_date = CURDATE() + INTERVAL 1 DAY ) ORDER BY priority, due_date; ");
    $data = array();
    while($row = mysqli_fetch_array($result)) {
        $temp = array();
        array_push($temp, $row['task_id']);
        array_push($temp, $row['task_name']);
        array_push($temp, $row['description']);
        array_push($temp, $row['task_date']);
        array_push($temp, $row['priority']);
        array_push($temp, $row['cat_name']);
        array_push($temp, $row['status_desc']);
        array_push($data, $temp);
    }
    mysqli_close($con);
    return $data;
}
function get_view2c(){
    $con = get_connection();
    $result = mysqli_query($con,"SELECT task_id, task_name, description, DATE_FORMAT(due_date, '%m/%d/%Y') AS task_date, priority, cat_name, status_desc FROM task LEFT JOIN category ON task.category_id = category.category_id INNER JOIN status ON task.status_id = status.status_id WHERE task.status_id <> 1 AND (due_date BETWEEN CURDATE() AND (CURDATE() + INTERVAL 7 DAY)) ORDER BY priority, due_date; ");
    $data = array();
    while($row = mysqli_fetch_array($result)) {
        $temp = array();
        array_push($temp, $row['task_id']);
        array_push($temp, $row['task_name']);
        array_push($temp, $row['description']);
        array_push($temp, $row['task_date']);
        array_push($temp, $row['priority']);
        array_push($temp, $row['cat_name']);
        array_push($temp, $row['status_desc']);
        array_push($data, $temp);
    }
    mysqli_close($con);
    return $data;
}

function get_view3($arg_date){
     $con = get_connection();
    $stmt = mysqli_prepare($con, "CALL report_done_by_date(?);");
    mysqli_stmt_bind_param($stmt, "s", $arg_date);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $data = array();
    while($row = mysqli_fetch_array($result)){
        $temp = array();
        array_push($temp, $row['done_date']);
        array_push($temp, $row['count_done']);
        array_push($data, $temp);
    }
    
    mysqli_close($con);
    return $data;
}


?>