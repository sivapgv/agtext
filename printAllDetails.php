<?php 
include('template/header.php');
//$userid = $_REQUEST['userid'];
//$users = getSingleData('users',$userid);
$printno = getSqlData("select max(printno) as printno from paavudetails;");
$prtno = $printno[0]["printno"];
?>

<center><h3>Thread Delivery Slip</h3></center>





<?php
$time = strtotime('today');
$select=getSqlData("select a.printno, a.date, b.userid from paavudetails a, paavus b where a.printno != 0 and a.paavuid = b.id group by a.printno");

//$fetch=mysql_fetch_array($select);
?>

<table id="example" border="0">
<thead>
<tr>
<th>S.No</th>
<th>Print no</th>
<th>Date</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
//print_r($fetch);
$i=1;
foreach($select as $key=>$fetch) {
echo "<tr><td>{$i}</td><td>".$fetch["printno"]."</td><td>".date('d-m-Y',$fetch["date"])."</td>
	     <td><a href='printDetails.php?userid=".$fetch["userid"]."&printno=".$fetch["printno"]."'>Print details</a></td></tr>";
$i++;
}
?>
</tbody>
</table>





</body>

</html>