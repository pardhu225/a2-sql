<?php
	$con = mysqli_connect('localhost','root','','employees');
	if (!$con) {
	    die('Could not connect: ' . mysqli_error($con));
	}

	$sql="SELECT SUM(`salaries`.salary) as ssm,`employees`.gender FROM salaries
	INNER JOIN employees ON `salaries`.emp_no=`employees`.emp_no GROUP BY gender ORDER BY ssm DESC";
	$result = mysqli_query($con,$sql);
	echo $con->error;
	echo "<table>
	<tr>
	<th>Total slaary</th>
	<th>Gender</th>
	</tr>";
	while($row = mysqli_fetch_array($result)) {
	    echo "<tr>";
	    echo "<td>" . $row['ssm'] . "</td>";
	    echo "<td>" . $row['gender'] . "</td>";
	    echo "</tr>";
	}
	echo "</table>";
	mysqli_close($con);
?>