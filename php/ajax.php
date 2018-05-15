<?php
    require_once('db.php');

    if ($_GET['func'] == 'get_macro') {
        $macro = query("
            SELECT macro_cycle.id as macro_id, macro_cycle.name as macro_name,
            meso_cycle.id as meso_id, meso_cycle.name as meso_name, 
            micro_cycle.id as micro_id, micro_cycle.name as micro_name
            FROM macro_cycle 
            LEFT JOIN meso_cycle ON meso_cycle.parent = macro_cycle.id 
            LEFT JOIN micro_cycle ON micro_cycle.parent = meso_cycle.id 
        ");
        $array = array_merge();
        echo json_encode($cycle);

    } elseif ($_GET['func'] == 'test') {
        $cycle = query("
            SELECT exercise.id as exercise_id, exercise.name as exercise_name, exercise.parent as cycle_id
            FROM exercise
        "); 
        echo json_encode($cycle);
    }
?>