<?php
require_once "data_layer.php";
    if($_POST){
        if (isset($_POST['catname'])) {
            $catname = htmlspecialchars($_POST['catname']);
            add_category($catname);
            header("location: cat_index.php");
        }
    }
?>