<?php
require 'interfaceDatabaseObject.php';

class Customer implements DatabaseObject {

    private $prename;
    private $lastname;
    private $id;
    private $mail;
    private $startDate;
    private $endDate;
    private $description;
    private $pax;


    public function __construct($startDate, $endDate, $description, $pax, $mail, $prename, $lastname)
    {
        $this->prename = $prename;
        $this->mail = $mail;
        $this->pax = $pax;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->description = $description;
        $this->lastname = $lastname;
    }

    public function getList()
    {
        $pdo = Database::connect();
        $sql = 'SELECT * FROM reservierung ORDER BY id DESC';
        $result = $pdo->query($sql);
        $resultArray = $result->fetchAll();

        return $resultArray;
        }


   public function save()
    {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE reservierung  set start_date = ?, end_date = ?, persons = ?, prename = ?, lastname = ?, wunsch = ? email = ? WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($this->startDate,$this->endDate,$this->pax,$this->prename,$this->lastname,$this->description,$this->mail,$this->id));
        Database::disconnect();

    }


    public function get($id)
    {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM reservierung where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $startdate = $data['start_date'];
        $enddate = $data['end_date'];
        $persons = $data['persons'];
        $prename = $data['prename'];
        $lastname = $data['lastname'];
        $description = $data['wunsch'];
        $email = $data['email'];
        return new Customer ($startdate, $enddate, $persons, $prename, $lastname, $description, $email);


    }


    /**
     * Getter for some private attributes
     * @return mixed $property
     */
    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
        return null;
    }

    /**
     * Setter for some private attributes
     * @return mixed $name
     * @return mixed $value
     */
    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }

     /**
      * Creates a new object in the database
      * @return integer ID of the newly created object (lastInsertId)
      */
     public function create()
     {
         $cont = Database::connect();
         $cont->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $sql = "INSERT INTO reservierung (start_date, end_date, persons, prename, lastname, wunsch, email) values(?, ?, ?)";
         $q = $cont->prepare($sql);
         $q->execute(array($this->startDate,$this->endDate,$this->pax,$this->prename,$this->lastname,$this->description,$this->mail));


         return $cont->lastInsertId();
     }

     /**
      * Deletes the object from the database
      * @return boolean true on success
      */
     public function delete()
     {
         $cont = Database::connect();
         $cont->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $sql = "DELETE FROM reservierung  WHERE id = ?";
         $q = $cont->prepare($sql);
         $q->execute(array($this->id));

     }
 }
?>

