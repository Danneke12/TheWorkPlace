<?php require_once '../session.php' ?>
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
    <link rel="stylesheet" href="../../css/formulier.css">
    <script src="../../js/jquery.js"></script>
    <script src="../../js/bootstrap.js"></script>
    <?php require_once '../../php/functions.php'?>
    <title>PRE - Nieuw</title>
</head>
<body>
<div class="container">
    <div class="logged">
        <span class="welkom">Welkom <?php  $login_session; ?></span> | <span class="loguit"><a class="logout" href="../logout.php">log uit</a></span>
    </div>
    <a href="../panel.php"><img src="../../images/logo.png" class="left_side"></a>
     <h1 class="right_side_admin" style="font-size: 40px;">Nieuwe Pre Install</h1>
    <form action="nieuwe_pre_2.php" method="post">
                <div id="viewer">
                    <div id="textbar">
                        <div id='klant_info' class='row'>
                             <h2>Klant Gegevens</h2>
                             <div class='klant_info_1 col-md-6' id="per" >
                                 <p>Klant naam:</p> <input type="text" name="klant_naam"><br>
                                 <p>Klant contact:</p> <input type="text" name="klant_contact"><br>
                                 <p>Klant telefoon:</p> <input type="text" name="klant_telefoon"><br>
                             </div>
                             <div class='klant_info_2 col-md-6' id="per2">
                                 <p>Ticket nummer:</p> <input type="text"><br>
                                 <p>Datum uitlevering:</p> <input type="date"><br>
                                 <p>Datum binnenkomst:</p> <input type="date"><br>
                             </div>
                        </div>

                        <div id='pre_info' class='row'>
                             <h2>Pre-Install informatie</h2>
                             <div class='col-md-4' id="os">
                                 <p>Operating System:</p>
                                 <input type="radio" name="OS" value="Windows 7 64x"> Windows 7 64x <br>
                                 <input type="radio" name="OS" value="Windows 8.1 64x"> Windows 8.1 64x <br>
                                 <p></p><input type="radio" name="OS" value="Windows 10 64x"> Windows 10 64x <br>
                                 <p>Extra Informatie:</p>
                                 <textarea name="EXI" id="EXI" cols="5" rows="2"></textarea>
                             </div>
                             <div class='col-md-4' id="soft">
                                 <p>Software:</p>
                             </div>
                            <div class="col-md-4" id="softer">
                                <div class="soft_links">
                                    <input type="radio" name="S1"> Enable RDP <br>
                                    <input type="radio" name="S2"> Disable UAC <br>
                                    <input type="radio" name="S3"> Office 2013 Office 365 <br>
                                    <input type="radio" name="S4"> Office 2013 Home&Business <br>
                                    <input type="radio" name="S5"> Office 2013 ProPlus<br>
                                    <input type="radio" name="S6"> Office 2013 Visio <br>
                                    <input type="radio" name="S7"> Office 2016 Home&Business <br>
                                </div>
                                <div class="soft_rechts">
                                    <input type="radio" name="S8"> Office 2016 Office 365 <br>
                                    <input type="radio" name="S9"> Office 2016 Proffesional <br>
                                    <input type="radio" name="S10"> AEM Agent <br>
                                    <input type="radio" name="S11"> ESET Endpoint Security <br>
                                    <input type="radio" name="S12"> Ninite <br>
                                    <input type="radio" name="S13"> HP Softpaq Download manager <br>
                                </div>
                            </div>
                        </div>
                        <div id='checklist' class='row'>
                             <h2>Informatie</h2>
                             <div class='checklist_opschuiven'>
                                 <p>Aangemaakt door: </p> <?php $login_session;?>
                             </div>
                    </div>
                </div>
            </div>
    </form>
</body>
</html>
