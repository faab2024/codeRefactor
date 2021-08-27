<?php

/**
 *1-read each files of the source codes, the old one and the new one 
 * 
 * 
 **/

//1-read each files of the source codes, the old one and the new one 

//read old file , $file1 ->old source file
$filename1 = "v1.java";
$filename2 = "v2.java";

$file2 = fopen($filename2, "r") or die("Unable to open file!");
$file1 = fopen($filename1, "r") or die("Unable to open file!");

// Output one line until end-of-file
while (!feof($file1)) {

    $linesfile1 = fgets($file1);
    
    $linesfile2 = fgets($file2);
    $stringfil2 =  file_get_contents($filename2);
    $stringfil1 =  file_get_contents($filename1);

    //to avoid scan brackets { }
   // $linesfile1 = extractSyntax($linesfile1);
   // $linesfile2 = extractSyntax($linesfile2);
   
   

$txt = "My car is a dark color";
$file1;
if (!stristr($stringfil2,$linesfile1)){

  echo $linesfile1."is delete in new version"."<br />";

  }
  
  if (!stristr($stringfil1,$linesfile2)){

      echo $linesfile2."is added in new version"."<br />";
  }

    
}




fclose($file1);
fclose($file2);

