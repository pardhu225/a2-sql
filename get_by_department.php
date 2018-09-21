<?php
	$q = ($_GET['q']);

	$con = mysqli_connect('localhost','root','','employees');
	if (!$con) {
	    die('Could not connect: ' . mysqli_error($con));
	}

	$sql="SELECT first_name, last_name, `employees`.emp_no, `dept_emp`.emp_no, dept_no from employees, dept_emp WHERE `employees`.emp_no = `dept_emp`.emp_no and dept_no = '".$q."' limit 25";
	$result = mysqli_query($con,$sql);
	if($con->error) {
		echo $con->error;
	} else {
		echo "<table>
		<tr>
		<th>Emp Id</th>
		<th>First name</th>
		<th>Lastname</th>
		<th>Gender</th>
		<th>Birthdate</th>
		</tr>";
		while($row = mysqli_fetch_array($result)) {
		    echo "<tr>";
		    echo "<td>" . $row['emp_no'] . "</td>";
		    echo "<td>" . $row['first_name'] . "</td>";
		    echo "<td>" . $row['last_name'] . "</td>";
		    echo "<td>" . $row['dept_no'] . "</td>";
		    echo "</tr>";
		}
		echo "</table>";
	}

	mysqli_close($con);
?>