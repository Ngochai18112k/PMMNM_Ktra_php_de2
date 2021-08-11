<?php 
    session_start();
    if (!isset($_SESSION['account']))
        header('Location: .\src\services\auth\login.php');
    else 
        header('Location: .\src\services\employee\employee.php');
?>
