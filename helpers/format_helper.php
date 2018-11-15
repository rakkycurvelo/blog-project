<?php
/* This page exists to help me on format my text, date and other details on my site using PHP functions to do that so...

 * Format The Date
 */
 //Here, I'll insert a function to give me a friendly date format, showing the date as a day, month and year pattern on my posts

 function formatDate($date){
	return date('F j, Y, g:i a',strtotime($date));
 }

 /*
  */

  //Here, I'll format my blog entries to show only 50 characters when the users visualizes the home page and then the entire post on the "read more" area 
  function shortenText($text, $chars = 50){
	$text = $text." ";
	$text = substr($text, 0, $chars);
	$text = substr($text, 0, strrpos($text,' '));
	$text = $text."...";
	return $text;
  }
