<?php
require_once('../model/schedule-model.php');
$id=$_GET['id'];
<<<<<<< Updated upstream
$result=deleteschedule($id); //true or false
=======
$result=deleteschedule($id);
header('location: ../view/schedule.php');
>>>>>>> Stashed changes
?>