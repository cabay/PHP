<?php
session_start();
$str = $_SESSION["name1"];
$timeArray = explode(" ", $str);
$startTime = $timeArray[0];
$str1 = $_SESSION["name3"];
$basePath = "D:\\data\\$str1";
$idx = 0;
$counter = array();

$sty = $_SESSION["name4"];
switch ($sty)
 {
 case "10-1";
   $sty =  "GPS";
   break;
 case "10-S";
   $sty =  "SPEED";
   break;
 case "10-M";
   $sty =  "MILE";
   break;
 case "20-13";
   $sty =  "OIL";
   break;
 case "20-11";
   $sty = "TIME";
   break;
 case "20-2";
   $sty = "TORQUE";
   break;
 case "40-11";
   $sty = "OILLevel";
   break;
 case "10-6";
   $sty = "SWITCH";
   break;
 case "20-10";
   $sty = "FUEL";
  break;
case "20-2";
   $sty = "RPM";
  break; 
case "20-12";
   $sty = "DM1";
  break; 
case "20-35";
   $sty = "CAPACITY";
  break; 
case "30-5";
   $sty = "DRIVERCODE";
  break;   
 }

$outFile = $basePath . "\\xout.csv";

do
{
	$dateArray = explode("-", $startTime);
	$path = $basePath . "\\" . $dateArray[0]."\\".$dateArray[1]."\\".$dateArray[2];
	if (!file_exists($basePath . "\\" . $dateArray[0]."\\".$dateArray[1]))
	{
		$startTime = date("Y-m-d", strtotime($startTime." +1day"));
		continue;
	}
	
	
    if (file_exists($outFile) && !$counter[$outFile]) 
	{
        @unlink ($outFile);
     }
	 $counter[$outFile] = 1;
 
	 $out = fopen($outFile, "ab+");
	// echo $path.'\\'.$sty.".csv"."<br />";
	if (file_exists($path.'\\'.$sty.".csv"))
	{	
	//	echo $path.'\\'.$sty.".csv"."<br />";
		$fp = fopen($path.'\\'.$sty.".csv", 'r') or die("can't open file"); 
		
		$lineNum = 0;
		while ($data = fgetcsv($fp, 1024))
		{

			if ($idx > 0 && $lineNum == 0)
			{
				$lineNum ++;				
				continue;
			}
			
			fputcsv($out, $data, ",");
		}
		$idx ++;
		fclose($fp);
	}
	
	
	$startTime = date("Y-m-d", strtotime($startTime." +1day"));
	fclose($out);
	
} while($startTime <= $_SESSION["name2"]);

header('Content-type: application/csv'); 
header('Content-Disposition: attachment; filename='.$sty.'".csv"'); 
echo file_get_contents($outFile); 

?>


