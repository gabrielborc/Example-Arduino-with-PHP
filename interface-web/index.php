<?php

$comand = $_GET["comand"] ?? '';

function ligarDesligarLed($comando)
{
    $port = "COM4";
    $fp = fopen($port, 'w');
    fwrite($fp, $comando);
    fclose($fp);
}

if ($comand == 'l') {
    ligarDesligarLed($comand);
} elseif ($comand == 'd') {
    ligarDesligarLed($comand);
} 

?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Ligar LED com Arduino</title>

    <style>
        .painel {
            position: relative;
            margin: auto;
            text-align: center;
            padding: 20px;
            width: 50%;
            border-radius: 5px; 
            background-color: rgb(31, 31, 32);
        }

        .parafuso {
            width: 30px;
            position: absolute;
        }

        .p1 {
            left: 5px;
            top: 5px;
        }

        .p2 {
            right: 5px;
            top: 5px;
        }

        .p3 {
            left: 5px;
            bottom: 5px;
        }

        .p4 {
            right: 5px;
            bottom: 5px;
        }

        .panel-lcd {
            width: 70%;
            margin-bottom: 25px;
        }

        .led {
            width: 35px;
            vertical-align: middle;
            padding-right: 20px;
        }

        .btn {
            display: inline-block;
            padding: 15px 25px;
            font-size: 24px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            outline: none;
            color: #fff;
            background-color: rgb(75, 77, 78);
            border: none;
            border-radius: 15px;
            box-shadow: 0 9px #999;
        }
        .btn:hover {background-color: rgb(50, 52, 53);}
        .btn:active {
            background-color: rgb(50, 52, 53);
            box-shadow: 0 5px #666;
            transform: translateY(4px);
        }
          
        .btn-on {background-color: #4CAF50;}
        .btn-on:hover {background-color: #3e8e41} 
        .btn-on:active {
            background-color: #3e8e41;
            box-shadow: 0 5px #666;
            transform: translateY(4px);
        }

        .btn-off {background-color: rgb(175, 76, 76);}
        .btn-off:hover {background-color: #8e3e3e} 
        .btn-off:active {
            background-color: #8e3e3e;
            box-shadow: 0 5px #666;
            transform: translateY(4px);
        }
    </style>
</head>
<body>

    <div class="painel">
        <img class="parafuso p1" src="img/parafuso.png">
        <img class="parafuso p2" src="img/parafuso.png"> 
        <img class="parafuso p3" src="img/parafuso.png"> 
        <img class="parafuso p4" src="img/parafuso.png">
        <img class="panel-lcd " src="img/painel-lcd.png"> 
        <form>
            <img class="led" id="ledRed" src="img/led-red-off.png">
            <input type="hidden" name="comand" value="l">
            <input type="submit" class="btn btn-on" value="Ligado" onclick="ligarDesligarLed('l')">
            <input type="submit" class="btn btn-off" value="Desligado" onclick="ligarDesligarLed('d')">
        </form>
    </div>    
</body>
</html>

<script>
    var queryString = window.location.search.slice(1);
    
    if (queryString.length > 0) {
        var ledRed = document.getElementById("ledRed");

        if (queryString.split('=')[1] == 'l') {
            ledRed.src = 'img/led-red-on.png';
        } else if (queryString.split('=')[1] == 'd'){
            ledRed.src = 'img/led-red-off.png';
        }
    }      

    function ligarDesligarLed(comando) {
        document.getElementsByName('comand')[0].value = comando;            
    }
</script>