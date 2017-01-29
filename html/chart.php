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




    <script>

        <?php $new = new datenbeschaffung()        ?>
        function ansichtAendern(wie) {

            if (wie == 1) {
                //var ansicht = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23];
                var ansicht = <?php echo $new->zeitTag();?>;
                var daten = <?php echo $new->tagFunc();?>;
            }
            else if (wie == 2){
                var ansicht = ["6 Tagen", "5 Tagen", "4 Tagen", "Vor 3 Tagen", "Vor 2 Tagen", "Vorgestern", "Gestern"];
                var daten = <?php echo $new->wocheFunc();?>;

            }
            else if (wie==3){
                var ansicht = <?php echo $new->datumMonat();?>;
                //var ansicht = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25 ,26 ,27, 28,29,30,31];
                var daten = <?php echo $new->monatFunc();?>;
            }
            else{
                var ansicht = ["Jänner", "Februar", "März", "April", "Mai", "Juni", "Juli", "August", "Septmeber", "Oktober", "November", "Dezember"];
                var daten = <?php echo $new->jahrFunc();?>;
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


</div>

</body>
</html>