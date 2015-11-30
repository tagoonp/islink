<?php
date_default_timezone_set('Asia/Bangkok');
require ("../configuration/database-source.class.php");
$db = new databasesource();
$db->connect();

//$strSQL = sprintf("SELECT MAX(numrow) FROM as numrow, Aampur, TUMBON FROM isdata54 WHERE APLACE = '%s' and ADATE between '2011-01-01' and '2011-12-31' group by Aampur, TUMBON  ",mysql_real_escape_string('40'));
$strSQL = "SELECT MAX(counted) FROM ( SELECT COUNT(*) AS counted FROM isdata54 WHERE APLACE = '40' and ADATE between '2011-01-01' and '2011-12-31' GROUP BY Aampur, TUMBON ) AS counts";
$result = $db->select($strSQL,false,true);

$return = '';

for($i=0;$i<count($result);$i++){
  //RSet array of max numrow
  $return[$i]['counts'] = $result[$i]['MAX(counted)'];

}

echo json_encode($return);
$db->disconnect();
?>
