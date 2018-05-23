<?php
    require_once('db.php');
    function setup() {
        //setup_user();
        //setup_exercise();
        // setup_cycle();
        // setup_set();
        _setup();
        //setup_meso();
        //setup_micro();
    }

    function _setup() {
        try {
            $conn = construct_pdo();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "
                DROP TABLE `exercise`;
                DROP TABLE `micro_cycle`;
                DROP TABLE `meso_cycle`;
                DROP TABLE `macro_cycle`;
                DROP TABLE `set`;

                CREATE TABLE `exercise` (
                    `id`     INT unsigned NOT NULL AUTO_INCREMENT ,
                    `parent` INT unsigned NOT NULL ,
                    `name`   VARCHAR(45) NOT NULL ,

                PRIMARY KEY (`id`)
                );

                INSERT INTO `exercise` (name, parent) VALUES
                ('squat', 1),
                ('bench', 1),
                ('deadlift', 1);

                CREATE TABLE `micro_cycle` (
                    `id`     INT unsigned NOT NULL AUTO_INCREMENT ,
                    `parent` INT unsigned NOT NULL ,
                    `name`   VARCHAR(45) NOT NULL ,

                PRIMARY KEY (`id`)
                );

                INSERT INTO `micro_cycle` (parent, name) VALUES
                (1, 'Monday'),
                (1, 'Wednesday'),
                (1, 'Friday');

                CREATE TABLE `meso_cycle` (
                    `id` INT unsigned NOT NULL AUTO_INCREMENT,
                    `parent` INT unsigned NOT NULL ,
                    `name`   VARCHAR(45) NOT NULL ,

                PRIMARY KEY (`id`)
                );

                INSERT INTO `meso_cycle` (parent, name) VALUES
                (1, 'Week 1'),
                (1, 'Week 2'),
                (1, 'Week 3');

                CREATE TABLE `macro_cycle` (
                    `id`   INT unsigned NOT NULL AUTO_INCREMENT ,
                    `name` VARCHAR(45) NOT NULL ,

                PRIMARY KEY (`id`)
                );

                INSERT INTO `macro_cycle` (name) VALUES
                ('Month 1'),
                ('Month 2'),
                ('Month 3');

                CREATE TABLE `set` (
                    `id`     INT unsigned NOT NULL AUTO_INCREMENT ,
                    `parent` INT unsigned NOT NULL ,
                    `repetition` INT unsigned NOT NULL ,
                    `percent`   INT unsigned NOT NULL ,
                    `value`   INT unsigned NOT NULL ,

                PRIMARY KEY (`id`)
                );

                INSERT INTO `set` (parent, repetition, percent, value) VALUES
                (1, 7, 70, 100),
                (1, 5, 75, 110),
                (1, 3, 80, 125);
            ";

            $conn->exec($sql);
            }
        catch(PDOException $e)
            {
                echo $sql . "<br>" . $e->getMessage() . "<br>";
            }

        $conn = null;
    }

    function setup_macro() {
        try {
            $conn = construct_pdo();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "
                CREATE TABLE macro_cycle (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    cycle_name VARCHAR(20)
                );
                INSERT INTO `macro_cycle` (cycle_name) VALUES
                ('Month 1'),
                ('Month 2'),
                ('Month 3');
            ";

            $conn->exec($sql);
            }
        catch(PDOException $e)
            {
                echo $sql . "<br>" . $e->getMessage() . "<br>";
            }

        $conn = null;
    }
    function setup_meso() {
        try {
            $conn = construct_pdo();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "
                CREATE TABLE meso_cycle (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
                    cycle_name VARCHAR(20),
                    cycle_id INT(6) UNSIGNED
                );
                INSERT INTO `meso_cycle` (cycle_id, cycle_name) VALUES
                (1, 'Week 1'),
                (1, 'Week 2'),
                (1, 'Week 3');
            ";

            $conn->exec($sql);
            }
        catch(PDOException $e)
            {
                echo $sql . "<br>" . $e->getMessage() . "<br>";
            }

        $conn = null;
    }
    function setup_micro() {
        try {
            $conn = construct_pdo();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "
                CREATE TABLE micro_cycle (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
                    cycle_name VARCHAR(20),
                    cycle_id INT(6) UNSIGNED
                );
                INSERT INTO `micro_cycle` (cycle_id, cycle_name) VALUES
                (1, 'Monday'),
                (1, 'Wednesday'),
                (1, 'Friday');
            ";

            $conn->exec($sql);
            }
        catch(PDOException $e)
            {
                echo $sql . "<br>" . $e->getMessage() . "<br>";
            }

        $conn = null;
    }

    function setup_user() {
        try {
            $conn = construct_pdo();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "
                CREATE TABLE user (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
                    user_name varchar(255) NOT NULL,
                    first_name varchar(255)
                )
            ";

            $conn->exec($sql);
            }
        catch(PDOException $e)
            {
                echo $sql . "<br>" . $e->getMessage() . "<br>";
            }

        $conn = null;
    }

    function setup_exercise() {
        try {
            $conn = construct_pdo();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "
                CREATE TABLE exercise (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
                    name VARCHAR(30) NOT NULL,
                    cycle_id INT(6) UNSIGNED
                );
                INSERT INTO `exercise` (name, cycle_id) VALUES
                ('squat', 1),
                ('bench', 1),
                ('deadlift', 1);
            ";

            $conn->exec($sql);
            }
        catch(PDOException $e)
            {
                echo $sql . "<br>" . $e->getMessage() . "<br>";
            }

        $conn = null;
    }

    function setup_set() {
        try {
            $conn = construct_pdo();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "
                CREATE TABLE sets (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
                    parent_id INT(6) UNSIGNED,
                    exercise_id INT(6) UNSIGNED,
                    number TINYINT UNSIGNED,
                    repetition TINYINT UNSIGNED,
                    percent TINYINT UNSIGNED
                )
            ";

            $conn->exec($sql);
            }
        catch(PDOException $e)
            {
                echo $sql . "<br>" . $e->getMessage() . "<br>";
            }

        $conn = null;
    }

    function setup_cycle() {
        try {
            $conn = construct_pdo();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "
                CREATE TABLE cycle (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
                    parent_id INT(6) UNSIGNED,
                    set_id INT(6) UNSIGNED
                )
            ";

            $conn->exec($sql);
            }
        catch(PDOException $e)
            {
                echo $sql . "<br>" . $e->getMessage() . "<br>";
            }

        $conn = null;
    }
    setup();
?>