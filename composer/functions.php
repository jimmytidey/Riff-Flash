<?
function structure_list($folder_name, $type) {
	// open this directory 
	$myDirectory = opendir($folder_name);
	$dirArray = '';
	// get each entry
	while($entryName = readdir($myDirectory)) {
		if ((substr($entryName, 0, 1) != ".") && $entryName !='recycle_bin' && $entryName !='list.json' && $entryName !='project_info' && $entryName !='bank_option_info'  && filetype($folder_name."/".$entryName) == $type) {
			$dirArray[] = $entryName;	
		}
	}
	closedir($myDirectory);
	return ($dirArray); 
}


function write_json($file_location, $json) {
	$fp = fopen($file_location, 'w');
	fwrite($fp, $json);
	fclose($fp);
}


function read_json($file_location) {
	$data = file_get_contents($file_location); 
	//$return = json_decode($data, true); 
	return($data);
}

function db_connect() { 
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = 'root';

    $conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');

    $dbname = 'rifff';
    mysql_select_db($dbname);
}


?>