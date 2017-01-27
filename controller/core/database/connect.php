<?php
$connect_error = 'Sorry, we\'re experiencing connection probelms.';
mysql_connect('localhost','root','')or die($connect_error);
mysql_select_db('reservierung') or die($connect_error);


?>