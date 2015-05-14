<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php  
header("Content-type:text/html;charset=utf-8");  
?>  
<title>查询结果</title>
<style type="text/css">
table.gridtable {
	font-family: verdana,arial,sans-serif;
	font-size:11px;
	color:#333333;
	border-width: 1px;
	border-color: #666666;
	border-collapse: collapse;
}
table.gridtable th {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #dedede;
}
table.gridtable td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #ffffff;
}
</style>

<?php
 
$terminalId=$_POST[terminalId];
$vinId=$_POST[vinId];
$Search=$_POST[Search];

$conn = pg_connect("host=172.16.6.78 port=5432 dbname=officialTest user=postgres password=postgres")
    or die('Could not connect: ' . pg_last_error());
if($terminalId != null)
$query = "select terminal_id,vin_code,config from \"B_CAR_INFO\" where terminal_id = '".$_POST['terminalId']."'";
if($vinId != null)
$query = "select terminal_id,vin_code,config from \"B_CAR_INFO\" where vin_code = '".$_POST['vinId']."'";

if($Search != null)
$query = "select terminal_id,vin_code,config from \"B_CAR_INFO\" where config like '%".$_POST['Search']."%' limit 15";


$result = pg_query($query) or die('Query failed: ' . pg_last_error());

?>
<table class="gridtable" width="850" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
  <th>终端号</th>
  <th>流水码</th>
  <th>配置</th>
  </tr>

<?php
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC))

 {
  foreach ($line as $col_value)
  {
   echo "<td>$col_value</td>";
  }
  echo "</tr>";
}
echo "</table>";

// 释放结果集
pg_free_result($result);

// 关闭连接
pg_close($conn);

?>