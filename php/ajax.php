<?php
    $a=array (
        '0' => array (
            'id' => 1,
            'title' => "Title 1",
            'parent_id' => 'NULL',
            'depth' => 0
        )
    );
    require_once('db.php');
    function setup_cycle() {
        try {
            $conn = construct_pdo();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("
                SELECT macro_cycle.id as macro_id, meso_cycle.id as meso_id FROM macro_cycle
                LEFT JOIN meso_cycle
                ON macro_cycle.id=meso_cycle.cycle_id;
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
    //foreach ($cycle as $key => $value) {
    //    echo json_encode($value);
    //}
    // echo json_encode(setup_cycle());
    //echo json_encode(
    //    array('success'=>true, 'message'=>'new')
    //);
?>