<?php
	$filename = "12.jpg";
	GetImage ( "http://mmbiz.qpic.cn/mmbiz_jpg/NlVvKeOKxUhC2b7cZNvz733rqqenspWGTUjJqyFdNtgDLBwSEsIdtSZ8mnuzQ0Z18ljNzgyJVPQ5xLThYKETicA/0",$filename);

	$size = getimagesize($filename); //获取mime信息 
	$fp=fopen($filename, "rb"); //二进制方式打开文件 
	if ($size && $fp) { 
		header("Content-type: {$size['mime']}"); 
		fpassthru($fp); // 输出至浏览器 
		exit; 
	} else { 
	// error 
	} 
	function GetImage($url, $filename = "") {
		//文件 保存路径 
		ob_start ();
		readfile ( $url );
		$img = ob_get_contents ();
		ob_end_clean ();
		$size = strlen ( $img );
		//文件大小
		$fp2 = @fopen ( $filename, "a" );
		fwrite ( $fp2, $img );
		fclose ( $fp2 );
		return $filename;
}