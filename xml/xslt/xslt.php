<?php
	//Создание объекта XML
	$xml = new DomDocument();
	//Загрузка XML документа
	$xml->load("catalog.xml");
	//$xml->formatOutput = true;
	//$xml->preserveWhiteSpace = false;
	//Создание объекта XSL
	$xsl = new DomDocument();
	//Загрузка XSL документа
	$xsl->load ("catalog.xsl");
	//Создание XSLT парсера
	$pr = new XSLTProcessor();
	//Загрузка XSL объекта
	$pr->importStylesheet($xsl);
	//Парсинг
	$html = $pr->transformToXml($xml);
	echo $html;
?>