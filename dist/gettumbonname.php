<?php
date_default_timezone_set('Asia/Bangkok');
require ("../configuration/database.class.php");
$db = new database();
$db->connect();
$prefix = $db->getPrefix();

$strSQL = sprintf("SELECT Name FROM ".$prefix."tumbon WHERE Tambon = '".$_POST['tumbon']."' and Ampur = '".$_POST['district']."' and Changwat = '40' ");
$result = $db->select($strSQL,false,true);

if($result){
	return $result[0]['Name'];
}else{
	return 'N';
}

$db->disconnect();
?>
