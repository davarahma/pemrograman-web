<?php
class Users
{
    private $conn;
    private $table = "users";

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    // CREATE
    public function create($username, $email, $asal, $password)
    {
        $sql = "INSERT INTO $this->table (username, email, asal, password) 
                VALUES ('$username', '$email', '$asal', '$password')";

        if ($this->conn->query($sql)) {
            echo "Data berhasil ditambahkan <br>";
        } else {
            echo "Error: " . $this->conn->error;
        }
    }

    public function login($username, $password){

        $sql = "SELECT * FROM " . $this->table . " WHERE username = '" . 
        $username . "' AND password = '" .
        $password ."'";

        $result = $this->conn->query($sql);
        
        if($result->num_rows == 0) 
            return false;
                
        return true;
    

   

    }
    public function getAllUsers()
    {
        $sql = "SELECT * FROM $this->table";
        $result = $this->conn->query($sql);
        
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return null;
        }


    
}


    public function hapus($id){
        $sql = "DELETE FROM $this->table WHERE id = " . $id;
        $result = $this->conn->query($sql);

        return $result;
    }
    public function ambilUserDariId($id){
        $sql = "SELECT * FROM $this->table WHERE id = " . $id;
        $result = $this->conn->query($sql);
        return $result->fetch_assoc();
    }

    public function update($id, $username, $email, $asal, $password){
    $sql = "UPDATE $this->table SET username='" . $username . "', email='" . $email . "', asal='" . $asal . "', password='" . $password . "' WHERE id=" . $id;
    $this->conn->query($sql);
    }
    
}






?>