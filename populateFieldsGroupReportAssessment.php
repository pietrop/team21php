<?php
		mysql_connect("localhost", "root", "root") or
		    die("Could not connect: " . mysql_error());
		mysql_select_db("team21");

		$result = mysql_query("SELECT groupID FROM `groups` WHERE 1");

		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		    echo("ID: %s ". $row["groupID"]);
		}

		mysql_free_result($result);
?>