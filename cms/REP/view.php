<?php require_once 'session.php' ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/bootstrap-theme.css">
    <link rel="stylesheet" href="../../css/custom.css">
    <script src="../../js/jquery.js"></script>
    <script src="../../js/bootstrap.js"></script>
    <?php require_once '../php/functions.php'?>
    <title>PRE - Install</title>
</head>
<body>
<div class="container">
    <div class="logged">
        <span class="welkom">Welkom <?php echo $login_session; ?></span> | <span class="loguit"><a class="logout" href="../logout.php">log uit</a></span>
    </div>
    <a href="../panel.php"><img src="../../images/logo.png" class="left_side"></a>
    <span><?php info()?></span>
    <div id="viewer">
        <div id="textbar">
            <?php view_pre(); ?>
        </div>
    </div>
</div>
</body>
</html>
