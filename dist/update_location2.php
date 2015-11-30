<?php
date_default_timezone_set('Asia/Bangkok');
require ("../configuration/database.class.php");
$db = new database();
$db->connect();
$prefix = $db->getPrefix();

$strSQL = sprintf("UPDATE ".$prefix."ampur SET Ampur_lat = '".$_POST['lat']."', Ampur_lng = '".$_POST['lng']."' WHERE Ampur = '".$_POST['ampur']."' and Changwat = '40' ");
$result = $db->update($strSQL);

// print "Y";
print $strSQL;

$db->disconnect();
?>
