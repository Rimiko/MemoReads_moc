<?php 
 echo"<td>";
$r=$row["rate"];
for ($j=0; $j>5; $j++) {
	if ($j<$r) {
		echo"&#9733";
	}else{
		echo"&#9734";
	}
}
echo"</td>";

?>