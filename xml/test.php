<?php
/*
	$str = <<<LABEL
	<html>
		<head>
			<title>
			</title>
		</head>
		<body>
			<p>Это
				<a href="#">мой
				</a>
				сайт
			</p>
		</body>
	</html>
LABEL;

	$sxml = simplexml_load_file("catalog.xml");
	
	$attrs = $sxml->book[0]->title->attributes();
	var_dump($attrs);
	
	echo $sxml->book[0]->title["aaa"]
	
	$sxml = simplexml_load_string($str);
	echo strip_tags($sxml->body[0]->p->asXML());
	*/
	$sxml = simplexml_load_file("catalog.xml");
	$titles = $sxml->xPath("/catalog/book/title[@id>3 and @id<6]");
	//$titles = $sxml->xPath("/catalog/book/title");
	echo "<pre>";
	var_dump($titles);
	echo "<pre>";
?>
