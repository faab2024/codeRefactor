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

    //to avoid scan brackets { }
    $linesfile1 = extractSyntax($linesfile1);
    $linesfile2 = extractSyntax($linesfile2);
   
   

    
   if ($linesfile1 !=null && $linesfile1 ==null) {

         echo $filename1. "    " . $linesfile1 . "   is deleted in the new version  " . "<br/><br>";
   } elseif ($linesfile1 ==null && $linesfile1 !=null) {
          echo $filename1. "    " . $linesfile2 . "     is added in the new version  " . "<br/><br>";
   }else{
         echo $filename1 . "    " . $linesfile1 . "mapped to " . $filename2 . "    " . $linesfile2 . "<br/><br>";
   }
}



fclose($file1);
fclose($file2);

function extractSyntax($linesfile)
{
    //read and extract class name from first line of code
    //$className=strchr($linesfile,'class');

    //remove whitespaces
    $linesfile = trim("$linesfile");
  


    //remove brackets 
    $linesfile = str_replace("{", " ", $linesfile);
    
    //remove brackets 
   $linesfile = str_replace("}", " ", $linesfile);

   //igonre comments
   $comments = strchr($linesfile, "//");
   
   if($linesfile == $comments){
       $linesfile= " ";
   }else{
       $linesfile =$linesfile;
   }
   
    

    return $linesfile;
    
        
}
/*
function extractSyntax($linesfile)
{
    //remove whitespaces
    $linesfile1trimed = trim("$linesfile");
    //$linesfile2trimed = trim($linesfile2);


    //remove brackets 
    $pureCodelinesfile1 = str_replace("{", " ", $linesfile1trimed);
    //$pureCodelinesfile2 = str_replace("{", " ", $linesfile2trimed);
    //remove brackets 
    $pureCodelinesfile1 = str_replace("}", " ", $pureCodelinesfile1);
    //$pureCodelinesfile2 = str_replace("}", " ", $pureCodelinesfile2);

    return $pureCodelinesfile1;
    //return $pureCodelinesfile2;
        
}
*/
