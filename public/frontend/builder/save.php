<?php

	
	
	
	foreach( $_POST['pages'] as $page=>$content ) {
	
		//$zip->addFromString($page.".html", $_POST['doctype']."\n".stripslashes($content));
		
		//echo $content;
	
	}
	
	//$zip->addFromString("testfilephp.txt" . time(), "#1 This is a test string added as testfilephp.txt.\n");
	//$zip->addFromString("testfilephp2.txt" . time(), "#2 This is a test string added as testfilephp2.txt.\n");
	
	//$zip->close();
	
	
	/*$yourfile = $filename;
	
	$file_name = basename($yourfile);
	
	header("Content-Type: application/zip");
	header("Content-Transfer-Encoding: Binary");
	header("Content-Disposition: attachment; filename=$file_name");
	header("Content-Length: " . filesize($yourfile));
	
	readfile($yourfile);
	
	unlink('website.zip');*/
	
	exit;
?>