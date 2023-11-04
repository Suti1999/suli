<?php

class Database {
    
    private $db = null;
    public $error = false;

    public function __construct($host, $username, $pass, $db) {
        try {
            $this->db = new mysqli($host, $username, $pass, $db);
            $this->db->set_charset("utf8");
        } catch (Exception $exc) {
            $this->error = true;
            echo '<p>Az adatbázis nem elérhető!</p>';
            exit();
        }
    }
    
    public function login($name, $pass) {
        //-- jelezzük a végrehajtandó SQL parancsot
        $stmt = $this->db->prepare('SELECT * FROM users WHERE users.username LIKE ?;');
        //-- elküldjük a végrehajtáshoz szükséges adatokat
        $stmt->bind_param("s", $name);

        if ($stmt->execute()) {
            //-- sikeres végrehajtás után lekérjük az adatokat
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            if ($pass == $row['password']) {
                //-- felhasználónév és jelszó helyes
                $_SESSION['user'] = $row;
                $_SESSION['login'] = true;
            } else {
                $_SESSION['username'] = '';
                $_SESSION['login'] = false;
            }
            // Free result set
            $result->free_result();
            header("Location:index.php");
        }
        return false;
    }
    
     public function register($emailcim, $username, $password) {
        //$password = password_hash($pass, PASSWORD_ARGON2I);
            $stmt = $this->db->prepare("INSERT INTO `users`(`emailcim`, `username`, `password`) VALUES (?,?,?)");
            $stmt->bind_param("sss", $emailcim, $username, $password);

        try {
            if ($stmt->execute()) {
                //echo $stmt->affected_rows();
                $_SESSION['login'] = true;
                //header("Location: index.php");
            } else {
                $_SESSION['login'] = false;
                echo '<p>Rögzítés sikertelen!</p>';
            }
        } catch (Exception $exc) {
            $this->error = true;
        }
    }
    
    public function osszesTermek() {
        $result = $this->db->query("SELECT * FROM `termek`");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function getKivalasztottTermek($id) {
        $result = $this->db->query("SELECT * FROM `termek` WHERE termekid=" . $id);
        return $result->fetch_assoc();
    }
    
    public function setKivalasztottTermek($termekid, $termek_neve, $marka, $kepernyomeret, $felbontas, $kijelzo_felbontas, $Smart, $Hangteljesitmeny, $WIFI, $Bluetooth, $Ar, $Garancia) {
        $stmt = $this->db->prepare("UPDATE `termek` SET `termek_neve`= ?,`marka`= ?,`kepernyomeret`= ?,`felbontas`= ?,`kijelzo_felbontas`= ?,`Smart`= ?,`Hangteljesitmeny`= ?, `WIFI`= ?, `Bluetooth`= ?, `Ar`= ?, `Garancia`= ? WHERE termekid= ?");
        $stmt->bind_param('isssssssssss', $termekid, $termek_neve, $marka, $kepernyomeret, $felbontas, $kijelzo_felbontas, $Smart, $Hangteljesitmeny, $WIFI, $Bluetooth, $Ar, $Garancia);
        return $stmt->execute();
    }
    
        public function getMarka() {
        $result = $this->db->query("SELECT DISTINCT `marka` FROM `termek`;");
        return $result->fetch_all();
    }
}


   
