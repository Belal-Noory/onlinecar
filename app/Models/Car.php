<?php

class Car
{
    // Database class
    private $conn;

    public function __construct()
    {
        $this->conn = new Connection();
    }

    public function addCar($params)
    {
        $query = "INSERT INTO cardetails(name,model,color,catagory,details,price,sold,ownername,ownernumber) VALUES(?,?,?,?,?,?,?,?,?)";
        $result = $this->conn->Query($query, $params, true);
        return $result;
    }

    public function getCar($car)
    {
        $query = "SELECT * FROM cardetails WHERE id = ?";
        $result = $this->conn->Query($query, [$car]);
        return $result;
    }

    public function addCarPic($carID,$img)
    {
        $query = "INSERT INTO carpic(carID,img) VALUES(?,?)";
        $result = $this->conn->Query($query, [$carID,$img], false);
        return $result;
    }

    // Get customer balance
    public function getCarPics($car)
    {
        $query = "SELECT * FROM carpic WHERE carID = ?";
        $result = $this->conn->Query($query,[$car]);
        return $result;
    }

    public function updateCar($params)
    {
        // $query = "UPDATE chartofaccount SET account_name = ?,account_number = ?,currency = ?, note = ? WHERE chartofaccount_id = ?";
        // $result = $this->conn->Query($query, $params);
        // return $result->rowCount();
    }

    // Get customer balance
    public function getAllCars()
    {
        $query = "SELECT * FROM cardetails";
        $result = $this->conn->Query($query);
        return $result;
    }

}
