<?



	# ----------------------------------------------------------------------------------------------------
	# * FILE: /iapp/query_string.php
	# ----------------------------------------------------------------------------------------------------

	# ----------------------------------------------------------------------------------------------------
	# CODE
	# ----------------------------------------------------------------------------------------------------

	foreach ($_GET as $name=>$value) {
		$$name = htmlentities(str_replace("\\", "", $value));
		if ($name != "page") $querystring[] = $name."=".$$name;
	}
	if ($querystring) {
		$query_string = implode("&", $querystring);
	}

?>