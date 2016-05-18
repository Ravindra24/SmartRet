<?php
    $key=$_GET['key'];
    $array = array();
    $con=mysql_connect("localhost","root","mysql");
    $db=mysql_select_db("inventory",$con);
    $query=mysql_query("select items from items_details where items LIKE '%{$key}%'");
    while($row=mysql_fetch_assoc($query))
    {
      $array[] = $row['items'];
    }
    echo json_encode($array);
?>