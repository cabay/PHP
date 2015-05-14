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
$starttime = date("Ymd", strtotime($_POST['starttime']));
$endtime = date("Ymd", strtotime($_POST['endtime']));

$conn = pg_connect("host=172.16.6.78 port=5432 dbname=officialTest user=postgres password=postgres")
    or die('Could not connect: ' . pg_last_error());
	
$query = "select tid,time,speed_0, speed_0_10, speed_10_20, speed_20_30,speed_30_40, speed_40_50, speed_50_60, speed_60_70, speed_70_80, speed_80_90, speed_90_100, speed_100_110, speed_110, speed_sum from \"B_SPEED_D\" where tid = '".$_POST['terminalId']."' and time >= '$starttime' and time <= '$endtime' ";
$result = pg_query($query) or die('Query failed: ' . pg_last_error());
?>


<table class="gridtable" width="800" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
  <th>终端号</th>
  <th>时间</th>
  <th>0</th>
  <th>0_10</th>
  <th>10_20</th>
  <th>20_30</th>
  <th>30_40</th>
  <th>40_50</th>
  <th>50_60</th>
  <th>60_70</th>
  <th>70_80</th>
  <th>80_90</th>
  <th>90_100</th>
  <th>100_110</th>
  <th>>110</th>
  <th>sum</th>
  </tr>

<?php
while ($line = pg_fetch_assoc($result))

 {
	 
	// print_r($line);
	 
  foreach ($line as $col_key => $col_value)
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