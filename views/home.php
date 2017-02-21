<?php

session_start();
if(!isset($_SESSION['username'])){
    header("Location:index.php");
    exit();
}
//session_destroy();

?>

<html>
<head>
    <title></title>
</head>

<body>
    <h1>
        Welcome <?php if(isset($_SESSION['username'])){
                            echo substr($_SESSION['username'], 0, strpos($_SESSION['username'], "@"));
                        }?>
    </h1>

    <a href='logout.php'>Logout</a>
</body>
</html>