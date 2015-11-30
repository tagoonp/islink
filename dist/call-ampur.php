<?php
require ("../configuration/database.class.php");
$db = new database();
$db->connect();
$prefix = $db->getPrefix();
$host = $db->getHostname();
$username = $db->getUsername();
$password = $db->getPassword();
$dbname = $db->getDbname();

//Get service area id
$servicearea = $_GET['servicearea'];

$objConnect = mysql_connect($host,$username,$password) or die(mysql_error());
$objDB = mysql_select_db($dbname);
mysql_query("SET NAMES UTF8");

$strSQL = "SELECT a.Name as apname FROM ".$prefix."ampur a inner join ".$prefix."changwat b on a.Changwat = b.Changwat
inner join ".$prefix."servicearea_detail c on b.Changwat = c.sad_changwat
inner join ".$prefix."servicearea d on c.sad_sa_id = d.sa_id
WHERE b.Changwat_status = 'Yes' and d.sa_status = 'Yes' order by a.Name";

if($servicearea != ''){
	$strSQL = "SELECT a.Name as apname, a.Ampur as apid FROM ".$prefix."ampur a inner join ".$prefix."changwat b on a.Changwat = b.Changwat
	inner join ".$prefix."servicearea_detail c on b.Changwat = c.sad_changwat
	inner join ".$prefix."servicearea d on c.sad_sa_id = d.sa_id
	WHERE b.Changwat_status = 'Yes' and d.sa_status = 'Yes' and d.sa_id = '".$servicearea."' order by a.Name";
}

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
// echo json_encode($strSQL);
?>
