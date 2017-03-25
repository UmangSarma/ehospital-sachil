<?php
$host = "localhost";
$user = "root";
$pass = "";
$db_name="crud";

$con = new mysqli($host,$user,$pass,$db_name);

function formateDate($date){
    return date('g:i a',strtotime($date));
}



?>