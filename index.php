<!DOCTYPE html>
<html>
<head>
	<title>PHP SQL Demo</title>
	<style type="text/css">
		body > div {
			width: 70%;
			padding: 1em;
			margin: 1em auto;
			border: 1px solid black;
		}
	</style>
</head>
<body>
	<div>
		<strong>Query-1</strong>
		<div>
			 Employee-Id: <input type="text" id="empid">
			 <button onclick="query('get_by_empid.php', 'empid', 1)">Run query</button>
		</div>
		<div>
			 Last name: <input type="text" id="emplastname">
			 <button onclick="query('get_by_lastname.php', 'emplastname',1)">Run query</button>
		</div>
		<div>
			 Department: <input type="text" id="empdepartment">
			 <button onclick="query('get_by_department.php', 'empdepartment',1)">Run query</button>
		</div>
		<div id="query-1-response"></div>
		<button onclick="clear(1)">Clear Response</button>
	</div>
	<div>
		<strong>Query-2</strong>
		<div>
			 <button onclick="query('get_largest_departments.php', null,2)">Run query</button>
		</div>
		<div id="query-2-response"></div>
		<button onclick="clear(2)">Clear Response</button>
	</div>
	<div>
		<strong>Query-3</strong>
		<div>
			 Department-Id: <input type="text" id="deptid">
			 <button onclick="query('get_elders.php', 'deptid' ,3)">Run query</button>
		</div>
		<div id="query-3-response"></div>
		<button onclick="clear(3)">Clear Response</button>
	</div>
	<div>
		<strong>Query-4</strong>
		<div>
			 <button onclick="query('get_deptwise_payratio.php', null,4)">Run query</button>
		</div>
		<div id="query-4-response"></div>
		<button onclick="clear(4)">Clear Response</button>
	</div>
	<div>
		<strong>Query-5</strong>
		<div>
			 <button onclick="query('get_overall_payratio.php', null,5)">Run query</button>
		</div>
		<div id="query-5-response"></div>
		<button onclick="clear(5)">Clear Response</button>
	</div>
	<script type="text/javascript">
		function query(where, arg, res) {
			clear(res);
	        var xmlhttp = new XMLHttpRequest();
	        xmlhttp.onreadystatechange = function() {
	            if (this.readyState == 4 && this.status == 200) {
	                document.getElementById('query-'+res+'-response').innerHTML = this.responseText;
	            }
	        };
	        if(arg) {
	        	let a = document.getElementById(arg).value;
	        	xmlhttp.open("GET", where+"?q="+a, true);
	        } else {
	        	xmlhttp.open("GET", where, true);
	        }
	        xmlhttp.send();
		}
		function clear(i) {
			document.getElementById('query-'+i+'-response').innerHTML = '';
		}
	</script>
</body>
</html>