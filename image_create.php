<?php
	//$img = imageCreate(500, 300);
	//$img = imageCreateTrueColor(500, 300);
	$img = imageCreateFromPNG("test.png");
	imageAntiAlias($img, true);
	
	
	
	$red = imageColorAllocate($img, 255, 0, 0);
	/*
	$blue = imageColorAllocate($img, 0, 0, 255);
	$green = imageColorAllocate($img, 0, 255, 0);
	$white = imageColorAllocate($img,255,255, 255);
	$grey = imageColorAllocate($img,195,195, 195);
	$black = imageColorAllocate($img,0,0, 0);
	imageFilledRectangle
($img, 0, 0, 500, 300, $white);
	imageLine($img, 20, 20, 80, 280, $red);
	imageRectangle($img, 20, 20, 80, 280, $blue);
	*/
	imageFilledRectangle($img, 100, 100, 200, 200, $red);
	/*
	$points = array(0,0,100,200,300,200);
	imagePolygon($img, $points, 3, $green);
	imageFilledPolygon($img, $points, 3, $blue);
	
	imageEllipse($img, 200, 150, 300, 200, $grey);
	imageArc($img, 300, 150, 300, 200, 0, 70, $red);
	imageFilledArc($img, 200, 100, 300, 200, 0, 40, $red, IMG_ARC_NOFILL | IMG_ARC_EDGED);
	
	imageString
($img, 5, 200, 120, "Hello!", $green);
	imageTtfText($img, 30, 10, 100, 150, $black, "arial.ttf", "privet!");
	*/
	header("Content-Type: image/jpg");
	imageJPEG($img, "", 90);
	
?>