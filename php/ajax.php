<?php
    require_once('db.php');
    function setup_cycle() {
        try {
            $conn = construct_pdo();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("
                SELECT macro_cycle.id as macro_id, meso.id as meso_id, meso.cycle_name as meso_name, micro.id as micro_id FROM macro_cycle
                LEFT JOIN meso_cycle as meso ON meso.cycle_id=macro_cycle.id
                LEFT JOIN micro_cycle as micro ON micro.cycle_id=meso.id
            "); 
            $stmt->execute();
            return $stmt->fetchAll();
            }
        catch(PDOException $e)
            {
                echo $sql . "<br>" . $e->getMessage() . "<br>";
            }

        $conn = null;
    }

    $cycle = setup_cycle();
    // $cycle['success'] = true;
    echo json_encode($cycle);
?>