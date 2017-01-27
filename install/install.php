<?php
require 'database.php';
require 'install_db.php';

Create::connectDB();
Create::checkIfDbExists('reservierung');
Create::closeDB();



try
{
$cont = Database::connect();
    // set the PDO error mode to exception
$cont->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create table

//    -- -----------------------------------------------------
//-- Table `mydb`.`reservierung`
//-- -----------------------------------------------------
$sql = "CREATE TABLE IF NOT EXISTS reservierung` (
`ID` INT NOT NULL AUTO_INCREMENT,
  `start_date` DATE NULL,
  `end_date` DATE NULL,
  `persons` INT NULL,
  `prename` VARCHAR(55) NULL,
  `lastname` VARCHAR(55) NULL,
  `email` VARCHAR(80) NULL,
  `wunsch` TEXT(1024) NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB";


//-- -----------------------------------------------------
//-- Table `mydb`.`rooms`
//-- -----------------------------------------------------
$sql2 = "CREATE TABLE IF NOT EXISTS `rooms` (
`idrooms` INT NOT NULL AUTO_INCREMENT,
  `cat` VARCHAR(45) NULL,
  `price` DECIMAL(6,2) NULL,
  `name` VARCHAR(65) NULL,
  `capacity` INT NULL,
  PRIMARY KEY (`idrooms`))
ENGINE = InnoDB";



    // use exec() because no results are returned
$cont->exec($sql);
    $cont->exec($sql2);
echo "Table customers created successfully";
}

catch
(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}


//$cont = null; nur sinnig wenn include oder require


    header('Location: index.php');
?>