<?php
//1.    Read old file and new file and assign to variables.
$filename1 = "v1.java";
$filename2 = "v2.java";
//2.	Open and read file to manipulate 
$file2 = fopen($filename2, "r") or die("Unable to open file!");
$file1 = fopen($filename1, "r") or die("Unable to open file!");

// a.	Open and read the lines of text in the file from top to down
while (!feof($file1)) {

    //pasesed strings of the first file
    $linesfile1 = fgets($file1);
    
    //pasesed strings of the second file
    $linesfile2 = fgets($file2);

    //parse file1 to one varialbe 
    $stringfil1 =  file_get_contents($filename1);

    //parse file2 to one varialbe 
    $stringfil2 =  file_get_contents($filename2);

    

    //5.	To extract pure code and statements we need to write a function to ignore comments, whitespace, and end of statements;
    $linesfile1 = extractSyntax($linesfile1);
    $linesfile2 = extractSyntax($linesfile2);

   //6.	Campare parsed strings and measure the similarity between each line of the string lines.
    similar_text($linesfile1, $linesfile2,$per);
    
    if($linesfile1!=" " && $linesfile2 !=" ") {
    //7.	Based on the similarity percentage that’s returned as a value from similarity finder function we can find and detect the Refactoring codes:
    //a.	If percentage of similarity is 100:
    if ($per ==100 ){
        //i.	Then print both strings lines from both files and print that’s mapped from old to new without change.
       echo $filename1. "    " . $linesfile1 . "     is not changed and mapped to  " .$filename2."  ". $linesfile2." <br/><br>";
    
   //b.	If percentage of similarity is <=100 and > 50:
    }else if ($per <=100 && $per>50){
        //i.	Then print both strings lines from both files and print that’s mapped from old to new with changes.
        echo $filename1. "    " . $linesfile1 . "    is changed and mapped to  " .$filename2."  ". $linesfile2." <br/><br>";
  
    //c.	If percentage of similarity is <=50 or zero :
    }else if ($per <=50){
    // We have to search the parse string  of old file in the new file If not found
       if (!stristr($stringfil2,$linesfile1)){
          // Print the string( the method) that its deleted in the new version file.
             echo $filename1. "    " . $linesfile1."is deleted in new version"."<br /><br>";

      }
      //We have to search the parse string  of new file in the old file 
      if(!stristr($stringfil1,$linesfile2)){
            echo $filename2. "    " . $linesfile2."is added in new version"."<br /><br>";
      }


    }  

    }

   }
//8.	Close the open files 
fclose($file1);
fclose($file2);

//5.	To extract pure code and statements we need to write a function to ignore comments, whitespace, and end of statements;
//$liesfile is parsed string of any file
function extractSyntax($linesfile){
   
    //remove whitespaces
    $linesfile = trim("$linesfile");
  
    //remove brackets 
    $linesfile = str_replace("{", " ", $linesfile);
    
    //remove brackets 
   $linesfile = str_replace("}", " ", $linesfile);
   
   //remove void return type
   $linesfile = str_replace("void", " ", $linesfile);

   //igonre comments
   $comments = strchr($linesfile, "//");
   if($linesfile == $comments){
       $linesfile= " ";
   }else{
       $linesfile =$linesfile;
   }

   //e.	Return the string as the return of the function
    return $linesfile;
     
}
