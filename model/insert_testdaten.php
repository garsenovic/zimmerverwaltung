<?php
/**
 * Created by PhpStorm.
 * User: Simon
 * Date: 27.01.2017
 * Time: 12:39
 */

require 'database.php';

$cont = Database::connect();
// set the PDO error mode to exception
$cont->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "INSERT INTO rooms (cat, price, name, capacity ) values('EZ', 120.30, 'Gletscherblick', 1)";
$q = $cont->prepare($sql);
$q->execute();
$sql = "INSERT INTO rooms (cat, price, name, capacity ) values('EZ', 99.00, 'Alpenrose', 1)";
$q = $cont->prepare($sql);
$q->execute();
$sql = "INSERT INTO rooms (cat, price, name, capacity ) values('DZ', 220.00, 'Am Ufer', 2)";
$q = $cont->prepare($sql);
$q->execute();
$sql = "INSERT INTO rooms (cat, price, name, capacity ) values('DZ', 180.30, 'Am See',2)";
$q = $cont->prepare($sql);
$q->execute();

$sql = "INSERT INTO reservierung (start_date, end_date, persons, prename, lastname, email, wunsch, timestamp ) values('2017-02-10', '2017-02-14', 2, 'Simon', 'Matt', 'simmatt@tsn.at', 'Keine Wuensche', CURRENT_TIMESTAMP )" ;
$q = $cont->prepare($sql);
$q->execute();

$sql = "INSERT INTO reservierung (start_date, end_date, persons, prename, lastname, email, wunsch, timestamp ) values('2017-02-11', '2017-02-18', 1, 'Dominik', 'Neuner', 'dneuner@tsn.at', 'Großen TV', CURRENT_TIMESTAMP )" ;
$q = $cont->prepare($sql);
$q->execute();

$sql = "INSERT INTO reservierung (start_date, end_date, persons, prename, lastname, email, wunsch, timestamp ) values('2017-02-8', '2017-02-12', 2, 'Gregor', 'Arsenovic', 'garsenovic@tsn.at', 'Minibar', CURRENT_TIMESTAMP )" ;
$q = $cont->prepare($sql);
$q->execute();

$sql = "INSERT INTO users (name, pw) values('admin', 'admin')";
$q = $cont->prepare($sql);
$q->execute();

Database::disconnect();

?>