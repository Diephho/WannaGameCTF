<?php

if (strpos($_SERVER['REQUEST_URI'], '_')) {
	die("no no no");
}

if (isset($_GET['input_data'])) {
	$output = shell_exec("curl --head " . $_POST['input_data']);
	echo $output;
}

show_source(__FILE__);
