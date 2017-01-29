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

    function tagFunc(){
        $cont = Database::connect();
        $count = 0;

        for ($i = 24;$i>=0;$i--) {
            $test = $i;
            $sql = "SELECT * FROM reservierung WHERE timestamp BETWEEN CURRENT_TIMESTAMP -INTERVAL $i day_hour and CURRENT_TIMESTAMP - INTERVAL $i-1 day_hour";

            $stmt = $cont->prepare($sql);
            $stmt->execute();
            $total = $stmt->rowCount();

            $array[$count] = $total;
            // echo $array[$count];
            $count++;

        }
        Database::disconnect();
        $jsondaten = json_encode($array);
        return $jsondaten;



    }


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
    Database::disconnect();
    $jsondaten = json_encode($array);
    return $jsondaten;
}


function monatFunc(){
    $cont = Database::connect();
    $count = 0;

    for ($i = 31;$i>=0;$i--) {
        $sql = "SELECT * FROM reservierung WHERE timestamp BETWEEN (CURRENT_DATE-($i)) and CURRENT_DATE-$i+1";

        $stmt = $cont->prepare($sql);
        $stmt->execute();
        $total = $stmt->rowCount();

        $array[$count] = $total;
        // echo $array[$count];
        $count++;

    }
    Database::disconnect();
    $jsondaten = json_encode($array);
    return $jsondaten;



}

    function jahrFunc(){
        $cont = Database::connect();
        $count = 0;

        //$datum= array();
        //$datum = ["Jänner", "Februar", "März", "April", "Mai", "Juni", "Juli", "August", "Septmeber", "Oktober", "November", "Dezember"];


        for ($i = 1;$i<=12;$i++) {
            $sql = "SELECT * FROM reservierung WHERE MONTH(TIMESTAMP) = $i";

            $stmt = $cont->prepare($sql);
            $stmt->execute();
            $total = $stmt->rowCount();

            $array[$count] = $total;
            // echo $array[$count];
            $count++;

        }
        Database::disconnect();
        $jsondaten = json_encode($array);
        return $jsondaten;



    }

    function datumMonat(){

        $cont = Database::connect();
        $count = 0;



        for ($i = 30;$i>=0;$i--) {
            $sql = "SELECT Date(CURRENT_DATE-$i) as 'date' FROM dual";

            $stmt = $cont->prepare($sql);
            $stmt->execute(array());
            while($row = $stmt->fetch()){
                $date = new DateTime($row['date']);
                $array[$count] = $date->format('d.m');
            }
            //$total = $stmt->fetchAll();



            //$array[$count] = $total[0];
            // echo $array[$count];
            $count++;

        }
        Database::disconnect();
        $jsondaten = json_encode($array);
        return $jsondaten;
    }

    function zeitTag(){

        $cont = Database::connect();
        $count = 0;



        for ($i = 24;$i>=0;$i--) {
            $sql = "SELECT CURRENT_TIMESTAMP - INTERVAL $i day_hour as 'time' FROM dual";

            $stmt = $cont->prepare($sql);
            $stmt->execute(array());
            while($row = $stmt->fetch()){
                $date = new DateTime($row['time']);
                $array[$count] = $date->format('H');
            }
            //$total = $stmt->fetchAll();



            //$array[$count] = $total[0];
            // echo $array[$count];
            $count++;

        }
        Database::disconnect();
        $jsondaten = json_encode($array);
        return $jsondaten;
    }

}



?>