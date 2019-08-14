<?php
$path = './files';
traverse_dir($path);

function display_files($dir, $files){
	echo sprintf("<h2>%s</h2>",$dir);
	if(count($files)>0){
		echo '<ul>';
		foreach ($files as $file){
			echo sprintf("<li>%s</li>",$file);
			//readfile($file);
			$fileArr = split("\/",$file);
			//echo "$fileArr[2]";
			echo '<a href="$fileArr[2]">$fileArr[2]</a>';
		}
		echo '</ul>';
	}
}

function traverse_dir($path){
	$dh = opendir($path);
	$files = array();
	$dirs = array();
	while($e = readdir($dh)){
		if($e != '.' && $e != '..'){
			//check if its a directory
			$f = $path.'/'.$e;
			if(is_dir($f)){
				$dirs[] = $f;
			}
			else if (is_file($f)){
				$files[] = $f;
			}
		}
	}
	closedir($dh);
	//display current directory and its files
	display_files($path, $files);
	
	//recursively traverse subdirectories
	foreach ($dirs as $dir){
		traverse_dir($dir);
	}
}