<?php
require_once "data_layer.php";
if (isset($_GET['catid'])) {
    $catid=htmlspecialchars($_GET['catid']);
    delete_cat($catid);
    header("location: cat_index.php");
}
?>