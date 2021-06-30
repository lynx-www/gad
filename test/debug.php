<?php
//phpinfo();
include('../conf.php');
$srok = "2019-07-25";
$date = "2020-04-25";
$user = new DataBase();

$user->test_end($date, $srok);
/*
$id_srok = $user->return_begin($srok);
$id_date = $user->return_begin($date);
echo $user->count_day($id_srok, $srok, $id_date);
*/
?>