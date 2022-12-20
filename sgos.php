<?php
    require_once __DIR__."/classes/dbclass.php";
    $sql = new dbclass();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <title>SG-OS</title>
        
        <!--MetaTags -> Immer Benutzen-->
        <meta content="IE=edge" http-equiv="X-UA-Compatible" />
        <meta name="viewport" content="width=device-width,initial-scale=1"  />
  
        <!--MetaTags-->
        <link rel="stylesheet" type="text/css" href="./css/styles.css" />
        <!--<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> -->
    </head>
    <body id="main-background">

        <!--<header class="header"></header>-->
        <div class="container border">
            
            <div class="row border">
                <div class="content">
                    <p class="fast-blink center-things"> ░▒▓ Scapegoats™ OS ©1969 Fuck you ▓▒░</p>
                </div>
            </div>
            <div class="row border">
                <div class="left-content border">
                    <p class="typewriter"><a href="./sgos.php?site=devices">Device Overview</a></p>
                    <p class="typewriter"><a href="./sgos.php?site=controls">Controls</a></p>
                    <p class="typewriter"><a href="./sgos.php?site=mdatabase">Members</a></p>
                    <p class="typewriter"><a href="./sgos.php?site=wiki">Database</a></p>
                    <p class="typewriter"><a href="./sgos.php?site=options">Options</a></p>
                    <p class="typewriter"><a href="./sgos.php?site=hexdump">Hexdump</a></p>
                    <p class="typewriter"><a href="./sgos.php?site=pwgen&pw=0">░▓⑈ↇ░█▜▧▓▗◧↋▓░⑛░</a></p>
                    <p class="typewriter"><a href="./sgos.php?site=err">▧↋▗▓◧⑛▓░░A3D3 D331 </a></p>
                    <p class="typewriter"><a href="./sgos.php?site=err">57FF FFBA A19C FFFF </a></p>
                    <p class="typewriter"><a href="./sgos.php?site=err">0000 A000 F000 0000 </a></p>
                </div>  
                <div class="right-content border">
                    <?php
                        if(isset($_GET["site"])){
                            if($_GET["site"] == "devices"){
                                echo "<p class='typewriter'>Devices/</p>";
                                include __DIR__ . "/php/devices.php";
                            }    
                            if($_GET["site"] == "pwgen"){
                                echo "<p class='typewriter'>Encry░▜▓▗/</p>";
                                include __DIR__ . "/php/pwgen.php";
                            } 
                            if($_GET["site"] == "mdatabase"){
                                echo "<p class='typewriter'> >Database/Member;</p>";
                                include __DIR__ . "/php/mdatabase.php";
                            }  
                            if($_GET["site"] == "wiki"){
                                echo "<p class='typewriter'> >Database/Mis&%?%</p>";
                                include __DIR__ . "/php/wiki.php";
                            }                             
                        }else{
                            echo "<p class='typewriter'> Scapegoats forever, forever Scapegoats </p>";
                        }
                        
                    ?>
                    
                </div>
            </div>          
        </div>                   
    </body>    
</html>