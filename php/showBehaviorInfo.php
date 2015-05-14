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
$query = "select TERMINAL_ID,CLCT_DATE,OVER_SPEED_NUM,SPEED_UP_NUM,SPEED_DOWN_NUM,OVER_IDLE_NUM,COASTING_NUM,GREEN_ZONE_TIME *interval '1 sec' from \"T_O_DAY_INFO\" where terminal_id = '".$_POST['terminalId']."' and clct_date >= '$starttime' and clct_date <= '$endtime' ";



$result = pg_query($query) or die('Query failed: ' . pg_last_error());

?>
<table class="gridtable" width="800" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
  <th>终端号</th>
  <th>时间</th>
  <th>超速次数</th>
  <th>急加速次数</th>
  <th>急减速次数</th>
  <th>过怠次数</th>
  <th>空挡滑行次数</th>
  <th>转速绿区内时长</th>
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