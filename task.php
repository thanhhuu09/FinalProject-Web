<?php
    require_once('connection.php');

    function add_task($name, $employee, $deadline, $deadtime, $describ, $file, $process){
        $sql = 'INSERT INTO `task`(`name`, `employee`, `deadline`, `deadtime`, `describ`, `file`, `process`) VALUES (?, ?, ?, ?, ?, ?, ?)';

        $dbCon = get_connection();
        $stm = $dbCon->prepare($sql);
        $stm->bind_param('ssssssi', $name, $employee, $deadline, $deadtime, $describ, $file, $process);

        $stm->execute();
        if ($stm->affected_rows == 1){
            return $stm->insert_id;
        }
        return -1;
    }
?>
