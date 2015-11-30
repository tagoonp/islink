<?php
date_default_timezone_set('Asia/Bangkok');
require ("../configuration/database.class.php");
$db = new database();
$db->connect();
$prefix = $db->getPrefix();

$strSQL = sprintf("UPDATE ".$prefix."tumbon SET Tambon_lat = '".$_POST['lat']."', Tambon_lng = '".$_POST['lng']."' WHERE Ampur = '".$_POST['ampur']."' and Tambon = '".$_POST['tumbon']."' and Changwat = '40' ");
$result = $db->update($strSQL);

// print "Y";
print $strSQL;

$db->disconnect();
?>
