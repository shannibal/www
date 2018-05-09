<?php
    require_once('db.php');
    function setup_cycle() {
        try {
            $conn = construct_pdo();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("
                SELECT macro_cycle.id as macro_id, macro_cycle.cycle_name as macro_name, meso_cycle.id as meso_id, meso_cycle.cycle_name as meso_name, micro_cycle.id as micro_id  
                FROM macro_cycle
                LEFT JOIN meso_cycle ON meso_cycle.cycle_id = macro_cycle.id
                LEFT JOIN micro_cycle ON micro_cycle.cycle_id = meso_cycle.id
            "); 
            $stmt->execute();
            return $stmt->fetchAll();
        }
        catch(PDOException $e) {
                echo $sql . "<br>" . $e->getMessage() . "<br>";
        }

        $conn = null;
    }

    function exercise() {
        try {
            $conn = construct_pdo();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("
                SELECT exercise.id as exercise_id, exercise.name as exercise_name, exercise.cycle_id as cycle_id
                FROM exercise
            "); 
            $stmt->execute();
            return $stmt->fetchAll();
        }
        catch(PDOException $e) {
                echo $sql . "<br>" . $e->getMessage() . "<br>";
        }

        $conn = null;
    }
    if ($_POST['func'] == 'get_macro') {
        $cycle = setup_cycle();
        // $cycle['success'] = true;
        echo json_encode($cycle);

    } elseif ($_POST['func'] == 'test') {
        $cycle = exercise();
        echo json_encode($cycle);
    }
?>