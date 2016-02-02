<?php
//add how much old is request
session_start();
$area = $_GET['area'];

$mysqli = new mysqli('localhost','root','redhat@11111p', 'bluenethack');
	if ($mysqli->connect_errno) {
    	echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		return 1;
	}
	if (!isset($_SESSION['user_id'])) {  
		header('Location: index.php');
	}
/* 

SELECT * FROM service_request  LEFT JOIN sr_area ON service_request.id=sr_area.sr_id 
LEFT JOIN area ON sr_area.id=area.id where area.name = 'chakkarpur' AND status = 'open'

SELECT *
FROM service_request where area = '".$area."' AND status = 'open'
LEFT JOIN sr_area
ON service_request.id=sr_area.sr_id LEFT JOIN area ON sr_area.id=area.id
*/

$sql = "SELECT service_request.id as id, requirements, gender, timings, expected_salary, area, date, remarks, status  FROM service_request  LEFT JOIN sr_area ON service_request.id=sr_area.sr_id 
LEFT JOIN area ON sr_area.id=area.id where  status = 'open'";

if(isset($area) )
	$sql .= " AND area.name = '".$area."'";

$result = $mysqli->query($sql);



$html = " 
<p><b>".ucfirst($area)."</b> Open Request for <b>".date("Y-m-d H:i:s")."</b></p>
 " ;
/*
`id`, `name`, `mobile`, `requirements`, `gender`, `timings`, `expected_salary`, `address`,
 `area`, `remarks`, `date`, `status`, `match_name`, `match_mobile`, `match2_name`, `match2_mobile`, `last_updated

*/
while($row = $result->fetch_assoc()) {
        $html .= "
<table border=\"1\" style=\"width:100%;	border: 1px solid black; 	border-collapse: collapse;\">
  <colgroup>
        <col width=\"5%\"><col width=\"5%\">
        <col width=\"5%\"><col width=\"5%\">
        <col width=\"5%\"><col width=\"5%\">
        <col width=\"5%\"><col width=\"5%\">
        <col width=\"5%\"><col width=\"5%\">
        <col width=\"5%\"><col width=\"5%\">
        <col width=\"5%\"><col width=\"5%\">
        <col width=\"5%\"><col width=\"5%\">
        <col width=\"5%\"><col width=\"5%\">
        <col width=\"5%\"><col width=\"5%\">
        <col width=\"5%\"><col width=\"5%\">
        
    </colgroup>
        <tr>
    <td>".$row['id']."</td>
    <td>".$row['requirements']."</td>
    <td>".$row['gender']."</td>
    <td>".$row['timings']."</td>
    <td>".$row['expected_salary']."</td>
    <td>".$row['area']."</td>
    <td>".date_format(date_create($row['date']), 'd/m/y')."</td>
    <td>".intval((strtotime(date("Y-m-d H:i:s")) - strtotime('2015-11-30 13:53:2'))/(60*60*24))." days old</td>
    
  </tr>
  <tr><td colspan=20>".$row['remarks']."</td></tr>
  <tr>
    <td colspan=20>. </td>
    
    
  </tr>

  </table><br/>
  ";
    }

$html .= "</table>";
//==============================================================

include("./library/mpdf60/mpdf.php");
$mpdf=new mPDF('c'); 

$mpdf->WriteHTML($html);
$mpdf->Output();
exit;

//==============================================================
//==============================================================
//==============================================================





?>
