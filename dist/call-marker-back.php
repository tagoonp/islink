<?php
date_default_timezone_set('Asia/Bangkok');
require ("../configuration/database-source.class.php");
$db = new databasesource();
$db->connect();

$level = $_GET['level'];
$changwat = $_GET['province'];
$ampur = $_GET['ampur'];

// if($level==3){
//   if($ampur==""){
//     $strSQL = sprintf("SELECT count(*) as numrow, Aampur FROM isdata54 WHERE APLACE = '%s' and ADATE between '2011-01-01' and '2011-12-31' group by Aampur ",mysql_real_escape_string($changwat));
//     $result = $db->select($strSQL,false,true);
//   }else{
//     $strSQL = sprintf("SELECT count(*) as numrow, Aampur FROM isdata54 WHERE APLACE = '%s' and ADATE between '2011-01-01' and '2011-12-31' and Aampur = '".$ampur."' group by Aampur ",mysql_real_escape_string($changwat));
//     $result = $db->select($strSQL,false,true);
//   }
// }else if($level==4){
//   $strSQL = sprintf("SELECT count(*) as numrow, Aampur, TUMBON FROM isdata54 WHERE APLACE = '%s' and ADATE between '2011-01-01' and '2011-12-31' group by Aampur, TUMBON ",mysql_real_escape_string('40'));
//   $result = $db->select($strSQL,false,true);
// }else{
//   $strSQL = sprintf("SELECT count(*) as numrow, Aampur, TUMBON FROM isdata54 WHERE APLACE = '%s' and ADATE between '2011-01-01' and '2011-12-31' group by Aampur, TUMBON ",mysql_real_escape_string('40'));
//   $result = $db->select($strSQL,false,true);
// }

$strSQL = sprintf("SELECT count(*) as numrow, Aampur, TUMBON FROM isdata54 WHERE APLACE = '%s' and ADATE between '2011-01-01' and '2011-12-31' group by Aampur, TUMBON ",mysql_real_escape_string('40'));
$result = $db->select($strSQL,false,true);


$return = '';
require ("../configuration/database.class.php");
$cdb = new database();
$cdb->connect();
$prefix = $cdb->getPrefix();

for($i=0;$i<count($result);$i++){

  if($level==3){  //ระดับอำเภอ
    $strSQL = "SELECT Name, Ampur_lat, Ampur_lng FROM ".$prefix."ampur WHERE Ampur = '".$result[$i]['Aampur']."' and Changwat = '40'";
    $resultAmpur = $cdb->select($strSQL,false,true);
    if($resultAmpur){
      $return[$i]['Aampur_num'] = $result[$i]['Aampur'];
      $return[$i]['Aampur'] = $resultAmpur[0]['Name'];
      $return[$i]['LAT'] = $resultAmpur[0]['Ampur_lat'];
      $return[$i]['LNG'] = $resultAmpur[0]['Ampur_lng'];
      $return[$i]['TUMBON_num'] = "";
      $return[$i]['TUMBON'] = "";
    }else{
      $return[$i]['Aampur_num'] = $result[$i]['Aampur'];
      $return[$i]['Aampur'] = "";
      $return[$i]['TUMBON_num'] = "";
      $return[$i]['TUMBON'] = "";
    }

    //Row count result : numrow
    $return[$i]['numrow'] = $result[$i]['numrow'];
  }else if($level==4){
    $strSQL = "SELECT Name, Ampur_lat, Ampur_lng FROM ".$prefix."ampur WHERE Ampur = '".$result[$i]['Aampur']."' and Changwat = '40'";
    $resultAmpur = $cdb->select($strSQL,false,true);
    if($resultAmpur){
      $return[$i]['Aampur_num'] = $result[$i]['Aampur'];
      $return[$i]['Aampur'] = $resultAmpur[0]['Name'];
      $return[$i]['LAT'] = $resultAmpur[0]['Ampur_lat'];
      $return[$i]['LNG'] = $resultAmpur[0]['Ampur_lng'];
    }else{
      $return[$i]['Aampur_num'] = $result[$i]['Aampur'];
      $return[$i]['Aampur'] = "";
    }

    // ถ้า Query ระดับตำบลได้ กำหนด lat/Lng ของตำบล
    $strSQL = "SELECT Name, Tambon_lat, Tambon_lng FROM ".$prefix."tumbon WHERE Ampur = '".$result[$i]['Aampur']."' and Changwat = '40' and Tambon = '".$result[$i]['TUMBON']."'";
    $resultTumbon = $cdb->select($strSQL,false,true);
    if($resultTumbon){
      $return[$i]['TUMBON_num'] = $result[$i]['TUMBON'];
      $return[$i]['TUMBON'] = $resultTumbon[0]['Name'];
      $return[$i]['LAT'] = $resultTumbon[0]['Tambon_lat'];
      $return[$i]['LNG'] = $resultTumbon[0]['Tambon_lng'];
    }else{
      $return[$i]['TUMBON_num'] = $result[$i]['TUMBON'];
      $return[$i]['TUMBON'] = "";
    }

    //Row count result : numrow
    $return[$i]['numrow'] = $result[$i]['numrow'];
  }else{
    $strSQL = "SELECT Name, Ampur_lat, Ampur_lng FROM ".$prefix."ampur WHERE Ampur = '".$result[$i]['Aampur']."' and Changwat = '40'";
    $resultAmpur = $cdb->select($strSQL,false,true);
    if($resultAmpur){
      $return[$i]['Aampur_num'] = $result[$i]['Aampur'];
      $return[$i]['Aampur'] = $resultAmpur[0]['Name'];
      $return[$i]['LAT'] = $resultAmpur[0]['Ampur_lat'];
      $return[$i]['LNG'] = $resultAmpur[0]['Ampur_lng'];
    }else{
      $return[$i]['Aampur_num'] = $result[$i]['Aampur'];
      $return[$i]['Aampur'] = "";
    }

    // ถ้า Query ระดับตำบลได้ กำหนด lat/Lng ของตำบล
    $strSQL = "SELECT Name, Tambon_lat, Tambon_lng FROM ".$prefix."tumbon WHERE Ampur = '".$result[$i]['Aampur']."' and Changwat = '40' and Tambon = '".$result[$i]['TUMBON']."'";
    $resultTumbon = $cdb->select($strSQL,false,true);
    if($resultTumbon){
      $return[$i]['TUMBON_num'] = $result[$i]['TUMBON'];
      $return[$i]['TUMBON'] = $resultTumbon[0]['Name'];
      $return[$i]['LAT'] = $resultTumbon[0]['Tambon_lat'];
      $return[$i]['LNG'] = $resultTumbon[0]['Tambon_lng'];
    }else{
      $return[$i]['TUMBON_num'] = $result[$i]['TUMBON'];
      $return[$i]['TUMBON'] = "";
    }

    //Row count result : numrow
    $return[$i]['numrow'] = $result[$i]['numrow'];
  }
}

	echo json_encode($return);
	$db->disconnect();
?>
