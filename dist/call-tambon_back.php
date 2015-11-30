<?php
require ("../configuration/database.class.php");
$db = new database();
$db->connect();
$prefix = $db->getPrefix();

$province = $_GET['province'];
$district = $_GET['district'];
$host = $db->getHostname();
$username = $db->getUsername();
$password = $db->getPassword();
$dbname = $db->getDbname();


$objConnect = mysql_connect($host,$username,$password) or die(mysql_error());
$objDB = mysql_select_db($dbname);
mysql_query("SET NAMES UTF8");
// $strSQL = "SELECT * FROM customer WHERE 1 AND CountryCode = '".$_POST["keyword"]."' ";
$strSQL = "SELECT * FROM ".$prefix."tumbon WHERE Ampur = '".$district."' and Changwat = '".$province."' order by Name";
$objQuery = mysql_query($strSQL) or die (mysql_error());
$intNumField = mysql_num_fields($objQuery);
$resultArray = array();
while($obResult = mysql_fetch_array($objQuery))
{
		$arrCol = array();
		for($i=0;$i<$intNumField;$i++)
		{
			$arrCol[mysql_field_name($objQuery,$i)] = $obResult[$i];
		}
		array_push($resultArray,$arrCol);
}

mysql_close($objConnect);

echo json_encode($resultArray);


// $strSQL = sprintf("SELECT * FROM ".$prefix."tumbon WHERE Ampur = '%s' and Changwat = '%s' order by Name" ,mysql_real_escape_string($district), mysql_real_escape_string($province));
// $strSQL = sprintf("SELECT * FROM ".$prefix."tumbon WHERE Changwat = '%s' order by Name" ,mysql_real_escape_string('40'));
// $strSQL = "SELECT * FROM ".$prefix."tumbon WHERE Changwat = '40'";
// $result = $db->select($strSQL,false,true);
//
// 	$return = '';
// 	for($i=0;$i<count($result);$i++){
// 		$return[$i]['Tambon'] = $result[$i]['Tambon'];
//     $vname = $result[$i]['Name'];
// 		$return[$i]['Name'] = iconv("tis-620","utf-8", $vname);
//     // $result[$i]['Name'];
// 	}
//
//   // $data = iconv("tis-620","utf-8", $return);
// 	echo json_encode($return);
//   // echo json_encode($strSQL);
// 	$db->disconnect();
?>
