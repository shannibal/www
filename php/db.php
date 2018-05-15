<?php

    define("HOST", "localhost");
    define("USER", "root");
    define("PASSWORD", "");
    define("SALT", "Y.NjG}V{9W_|Br&8JGm!4JRQ@3_~,8q1?*%S4br7bQNlDo;Zet0h%pNgj?;_4;O3");


    function construct_pdo() {
        return new PDO("mysql:host=".HOST.";dbname=main", USER, PASSWORD);
    }

    function query($sql) {
        try {
            $conn = construct_pdo();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare($sql); 
            $stmt->execute();
            return $stmt->fetchAll();
        }
        catch(PDOException $e) {
                echo $sql . "<br>" . $e->getMessage() . "<br>";
        }

        $conn = null;
    }

    function create_user($username, $password) {
        $db = construct_PDO();
        $query = $db->query("SELECT * FROM users WHERE username='$username' AND password='".md5($password)."'");
        $result = $query->fetch();

        if ($result) {
            print_r($result);
        } elseif (!$result) {
            echo "error";
        } else {
            echo "failed";
        }
        $db = null;
    }

    function create_set($name, $rep) {
        $db = construct_PDO();
        $stmt = $db->prepare("INSERT INTO sets (name, rep) VALUES (:name, :rep)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':rep', $rep);
        $stmt->execute();
    }

?>