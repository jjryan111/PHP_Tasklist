<?php
require_once "data_layer.php";
    if($_POST){
        if (isset($_POST['catid']) && isset($_POST['catname'])) {
            $catid = htmlspecialchars($_POST['catid']);
            $catname = htmlspecialchars($_POST['catname']);
            edit_category($catid, $catname);
            header("location: cat_index.php");
        }
    }
?>