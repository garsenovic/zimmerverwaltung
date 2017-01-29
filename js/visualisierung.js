<?php include ("datenbeschaffung.php"); ?>
<?php $new = new datenbeschaffung()        ?>

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