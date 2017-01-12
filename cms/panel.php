<?php
   include('session.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap-theme.css">
    <link rel="stylesheet" href="../css/custom.css">
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>
    <?php require_once '../php/functions.php'?>
    <title>Admin Magazine</title>
</head>
<body>
<div class="container">
    <div class="logged">
        <span class="welkom">Welkom <?php echo $login_session; ?></span> | <span class="loguit"><a class="logout" href="logout.php">log uit</a></span>
    </div>
    <img src="../images/logo.png" class="left_side">
    <h1 class="right_side_admin">Werkbank</h1>
    <div class="search">
        <div class="input-group">

            <input type="text" name="search_text" id="search_text" placeholder="Zoek op Product naam of Beschrijving" class="form-control borderkill" width="50px" />
            <span class="input-group-addon menu-andersom"><b><a href="PRE/nieuwe_pre.php" class="white">Nieuw item</a></b></span>
            <script>
                $(document).ready(function(){
                    $('#search_text').keyup(function(){
                        var txt = $(this).val();
                        if(txt != '')
                        {
                            $.ajax({
                                url:"fetch.php",
                                method:"post",
                                data:{search:txt},
                                dataType:"text",
                                success:function(data)
                                {
                                    $('#result').html(data);
                                }
                            });
                        }
                        else
                        {
                            $('#result').html('');
                        }
                    });
                });
            </script>
        </div>
    </div>

    <table class="table table-striped">
        <thead class="menu">
        <tr>
            <th>Klant</th>
            <th>Type</th>
            <th>Ticket nummer</th>
            <th>Status</th>
            <th>Werkbank</th>
        </tr>
        </thead>
        <div id="result"></div>
        <tbody>
        <?php werkbank_table(); ?>
        </tbody>
    </table>
</div>
</body>
</html>
