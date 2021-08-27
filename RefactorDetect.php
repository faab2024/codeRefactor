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
    $linesfile1 = extractSyntax($linesfile1);

    $linesfile2 = extractSyntax($linesfile2);

    similar_text($linesfile1, $linesfile2,$per);
    if($linesfile1!=" " && $linesfile2 !=" ") {
    if ($per ==100 ){
       echo $filename1. "    " . $linesfile1 . "     is not changed and mapped to  " .$filename2."  ". $linesfile2." <br/><br>";
    }else if ($per <=100 && $per>50){
        echo $filename1. "    " . $linesfile1 . "    is changed and mapped to  " .$filename2."  ". $linesfile2." <br/><br>";
    }else if ($per <=50){
       if (!stristr($stringfil2,$linesfile1)){
             echo $filename1. "    " . $linesfile1."is deleted in new version"."<br /><br>";

      }
      if(!stristr($stringfil1,$linesfile2)){
            echo $filename2. "    " . $linesfile2."is added in new version"."<br /><br>";
      }


    }  

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
   //class or method scope
   $linesfile = str_replace("public class", " ", $linesfile);

  $linesfile = str_replace("public", " ", $linesfile);

   $linesfile = str_replace("void", " ", $linesfile);


   //igonre comments
   $comments = strchr($linesfile, "//");
   
   if($linesfile == $comments){
       $linesfile= " ";
   }else{
       $linesfile =$linesfile;
   }
   
    

    return $linesfile;
    
        
}
