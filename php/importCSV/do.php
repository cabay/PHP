<?php

header("Content-Type: text/html; charset=utf-8");

$starttime = date("Ymd", strtotime($_POST['starttime']));
$endtime = date("Ymd", strtotime($_POST['endtime']));
$conn = pg_connect("host=172.16.6.78 port=5432 dbname=officialTest user=postgres password=postgres")or die('Could not connect: ' . pg_last_error());

$action = $_GET['action'];
if ($action == 'import') { //导入CSV
	$filename = $_FILES['file']['tmp_name'];
	if (empty ($filename)) {
		echo '请选择要导入的CSV文件！';
		exit;
	}
	$handle = fopen($filename, 'r');
	$result = input_csv($handle); //解析csv
	$len_result = count($result);
	if($len_result==0){
		echo '没有任何数据！';
		exit;
	}
	for ($i = 0; $i < $len_result; $i++) { //循环获取各字段值
		$terminal_id = iconv('gb2312', 'utf-8', $result[$i][0]); //中文转码
		$data_values .= "('$terminal_id'),";
	}
	$data_values = substr($data_values,0,-1); //去掉最后一个逗号
	fclose($handle); //关闭指针
	$drop = pg_query("truncate table \"PG_TEMP\"");//清空数据表数据
	$query = pg_query("insert into \"PG_TEMP\" (vin_code) values $data_values");//批量插入数据表中
	
	if($query){
		echo '数据导入成功，请后退至原页面选择查询时间！';
	}else{
		echo '导入失败，请检查你的文件！';
	}
} elseif ($action=='export') { //导出CSV
    $result = pg_query("select a.terminal_id,b.vin_code,sum(a.MILEAGE),sum(a.OIL_COST) from \"T_O_DAY_INFO\" a,\"PG_TEMP\" b,\"T_T_INFO\" c where b.vin_code = c.vin_code and a.terminal_id = c.terminal_id and a.clct_date >= '$starttime' and a.clct_date <= '$endtime' group by a.terminal_id,b.vin_code");
    $str = "终端号,流水码,里程合计,油耗合计,百公里油耗\n";
    $str = iconv('utf-8','gb2312',$str);
    while($row=pg_fetch_array($result)){
    	$str .= $row[0].",".$row[1].",".$row[2].",".$row[3].",".$row[3]/$row[2]*'100'."\n";
    }
    $filename = date('Ymd').'.csv';
    export_csv($filename,$str);
}


function input_csv($handle) {
	$out = array ();
	$n = 0;
	while ($data = fgetcsv($handle, 10000)) {
		$num = count($data);
		for ($i = 0; $i < $num; $i++) {
			$out[$n][$i] = $data[$i];
		}
		$n++;
	}
	return $out;
}

function export_csv($filename,$data) {
    header("Content-type:text/csv");
    header("Content-Disposition:attachment;filename=".$filename);
    header('Cache-Control:must-revalidate,post-check=0,pre-check=0');
    header('Expires:0');
    header('Pragma:public');
    echo $data;
}
?>
