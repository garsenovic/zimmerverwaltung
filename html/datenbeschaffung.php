<?php
/**
 * Created by PhpStorm.
 * User: Simon
 * Date: 27.01.2017
 * Time: 17:27
 */

require '../model/database.php';

class datenbeschaffung
{

    public $array = array();




function wocheFunc() {

     $cont = Database::connect();
     $count = 0;

    for ($i = 7;$i>=0;$i--) {
        $sql = "SELECT * FROM reservierung WHERE timestamp BETWEEN (CURRENT_DATE-($i)) and CURRENT_DATE-$i+1";

        $stmt = $cont->prepare($sql);
        $stmt->execute();
        $total = $stmt->rowCount();

        $array[$count] = $total;
       // echo $array[$count];
        $count++;

    }
    $jsondaten = json_encode($array);
    return $jsondaten;
}

}



?>