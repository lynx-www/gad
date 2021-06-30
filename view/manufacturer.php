<?php 
/*$sql = "SELECT document.number, reestr.date, shets.*, u_passw.famely, u_passw.name AS p_name, u_passw.patron, model.name FROM document, `reestr`, shets,  u_passw, model WHERE reestr.id_shets = shets.id AND document.id = shets.id_shets 
AND u_passw.PERS_ID = reestr.id_staff AND model.id = shets.id_model ORDER BY `document`.`number` ASC"; */
$sql = "SELECT * FROM `manufacturer` ORDER BY `manufacturer`.`name` ASC ";
$device = new DataBase();
$d = $device->select_sql($sql);

foreach($d as $t){
    echo $t['name'].'<br>';
}


?>