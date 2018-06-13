<?php
    require_once('db.php');
    /*
    $array = array(
        "macro" => query("
            SELECT macro_cycle.id as id, macro_cycle.name as name
            FROM macro_cycle
        "),
        "meso" => query("
            SELECT meso_cycle.id as id, meso_cycle.name as name, meso_cycle.parent as parent
            FROM meso_cycle
        "),
        "micro" => query("
            SELECT micro_cycle.id as id, micro_cycle.name as name, micro_cycle.parent as parent
            FROM micro_cycle
        "),
        "exercise" => query("
            SELECT exercise.id as id, exercise.name as name, exercise.parent as parent
            FROM exercise
        "),
        "set" => query("
            SELECT `set`.id as id, `set`.repetition as repetition, `set`.parent as parent, `set`.percent as percent, `set`.value as value
            FROM `set`
        ")
    );
    */
    if ($_GET['func'] == 'macro') { 
        $array = query("
            SELECT macro_cycle.id as id, macro_cycle.name as name
            FROM macro_cycle
        ");
    } elseif ($_GET['func'] == 'meso') {
        $array = query("
            SELECT meso_cycle.id as id, meso_cycle.name as name, meso_cycle.parent as parent
            FROM meso_cycle
        ");
    } elseif ($_GET['func'] == 'exercise') {
        $array = query("
        SELECT exercise.name as exercise_name, exercise.id as exercise_id, exercise.parent as exercise_parent, exercise.pr as exercise_pr,
        `set`.id as set_id, `set`.parent as set_parent, `set`.repetition as set_repetition, `set`.percent as set_percent,  `set`.value as set_value, `set`.exercise as set_exercise
        FROM exercise
        LEFT JOIN `set` ON exercise.id = `set`.exercise;
        ");
    };
    echo json_encode($array);

?>