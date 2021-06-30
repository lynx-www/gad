<a class="navbar-brand" href="#">
        <?php
        //Фильтр по алфавиту
        echo"<form method=\"GET\" name=\"letter\" id=\"letter\" enctype=\"application/x-www-form-urlencoded\">";
        foreach (range(chr(0xC0), chr(0xDF)) as $lit) {
        $str =  iconv('CP1251', 'UTF-8', $lit);
        echo "<input name=\"submit\" id=".$str." type=\"submit\" form=\"letter\" value=\"".$str."\" class=\"btn btn-primary btn-sm\">";
        }
        echo "
            <input name=\"submit\" type=\"submit\" form=\"letter\" value=\"Прочее\" style=\"width: 70px;\" class=\"btn btn-primary btn-sm\">
            <input name=\"submit\" type=\"submit\" form=\"letter\" value=\"Все\" style=\"width: 45px;\" class=\"btn btn-primary btn-sm\">
            <input name=\"submit\" type=\"submit\" form=\"letter\" value=\"Добавить\" style=\"width: 70px;\" class=\"btn btn-primary btn-sm\">
        </form>";
        //end фильтр по алфавиту
        ?>
    </a>
<?php 
/*$sql = "SELECT document.number, reestr.date, shets.*, u_passw.famely, u_passw.name AS p_name, u_passw.patron, model.name FROM document, `reestr`, shets,  u_passw, model WHERE reestr.id_shets = shets.id AND document.id = shets.id_shets 
AND u_passw.PERS_ID = reestr.id_staff AND model.id = shets.id_model ORDER BY `document`.`number` ASC"; */
$sql = "SELECT device.name as d_name, manufacturer.name as man_name, model.name as mod_name FROM `model`, manufacturer, device WHERE model.id_manufacturer = manufacturer.id AND device.id = model.id_device  
ORDER BY `d_name` ASC";
$device = new DataBase();
$d = $device->select_sql($sql);
echo "  <table class='table table-sm table-striped table-reflow'>
<thead class='thead'>";
echo "<tr><th>Наименование</th><th>Производитель</th><th>Модель</th></tr></thead>";
foreach($d as $t){
    echo "<tr><td>".$t['d_name'].'</td><td>'.$t['man_name'].'</td><td>'.$t['mod_name'].'</td></tr>';
}

echo "</table>";
?>