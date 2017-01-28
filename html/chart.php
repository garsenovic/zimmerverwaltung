<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <script src="../Chart/Chart.js"></script>
    <meta charset="ISO-8859-1">
    <title>Anzahl Buchungen</title>
</head>
<body>
<?php include ("datenbeschaffung.php"); ?>
<h1 style="text-align:center;">Anzahl Buchungen</h1>
<div id="anzeige" style="margin-left: auto; margin-right: auto; width:500px;">
    <canvas id="myChart" width="200" height="200"> </canvas>
<!--
    <form action="chart.php" method="POST">

        <label>Ansicht
            <select name="Ansicht" size="1">
                <option value="1">Tag</option>
                <option value="2">Woche</option>
                <option value="3">Monat</option>
                <option value="4">Jahr</option>
            </select>
            <input type="submit" value="Anzeigen">
        </label>
    </form>
-->

    <button onclick="ansichtAendern('1')">Tag</button>
    <button onclick="ansichtAendern('2')">Woche</button>
    <button onclick="ansichtAendern('3')">Monat</button>
    <button onclick="ansichtAendern('4')">Jahr</button>

    <div id="unentschlossen">

    </div>


    $new = NEW datenbeschaffung();


    <script>
        <?php $new = new datenbeschaffung()
        ?>
        function ansichtAendern(wie) {

            if (wie == 1) {
                var ansicht = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23];
                var daten = [1,2,3,4];
            }
            else if (wie == 2){
                var ansicht = ["6 Tagen", "5 Tagen", "4 Tagen", "Vor 3 Tagen", "Vor 2 Tagen", "Vorgestern", "Gestern"];
                var daten = <?php echo $new->wocheFunc();?>;

            }
            else if (wie==3){
                var ansicht = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25 ,26 ,27, 28,29,30,31];
            }
            else{
                var ansicht = ["Jänner", "Februar", "März", "April", "Mai", "Juni", "Juli", "August", "Septmeber", "Oktober", "November", "Dezember"];
            };


                var ctx = document.getElementById('myChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ansicht,
                        datasets: [{
                            label: 'Buchungen',
                            data: daten,
                            backgroundColor: "rgba(153,255,51,0.4)"
                        },]
                    }
                });

            }

    </script>
    <?php



    if(isset($_POST['Ansicht'])){
        $a = $_POST['Ansicht'];
        if($a == 1)
        {

        }
        elseif ($a==2){


        }
        elseif ($a==3)
        {

        }
        else{

        }
        //echo $_POST['Ansicht'];

    }


    ?>

<!--
    <canvas id="myChart" width="200" height="200"> </canvas>
</div>
<script language="javascript" type="text/javascript">

    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jänner', 'Februar', 'März', 'April', 'Juni', 'Juli', 'August', 'September', 'Oktober', 'November', 'Dezember'],
            datasets: [{
                label: 'apples',
                data: [12, 19, 3, 17, 6, 3, 7],
                backgroundColor: "rgba(153,255,51,0.4)"
            }, {
                label: 'oranges',
                data: [2, 29, 5, 5, 2, 3, 10],
                backgroundColor: "rgba(255,153,0,0.4)"
            }]
        }
    });


</script>
</body>
</html>

-->
<?php

$data = array();
/*
Select count(*) from reservierung where timestamp between '2017-01-01 00:00:00' and '2017-01-31 23:59';
Select count(*) from reservierung where timestamp between '2017-02-01 00:00:00' and '2017-02-29 23:59';
Select count(*) from reservierung where timestamp between '2017-03-01 00:00:00' and '2017-03-31 23:59';
*/
?>