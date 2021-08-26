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

echo "<hr>";

// Output one line until end-of-file
while (!feof($file1)) {

    $linesfile1 = fgets($file1);
    $linesfile2 = fgets($file2);

    //to avoid scan brackets { }
    $codeslinesfile1 = str_replace("{", " ", $linesfile1);
    $codeslinesfile2 = str_replace("{", " ", $linesfile2);


    if ($codeslinesfile1 !== $codeslinesfile2) {

        echo $filename1 . "." . $linesfile1 . "mapped and changed to " . $filename2 . "." . $linesfile2 . "<br/><br>";
    } else {
        echo $filename1 . "." . $linesfile1 . "mapped to " . $filename2 . "." . $linesfile2 . "<br/><br>";
    }
}



fclose($file1);
fclose($file2);

/*
function extractSyntax($linesfile1, $linesfile2)
{
    //remove whitespaces
    $linesfile1trimed = trim($linesfile1);
    $linesfile2trimed = trim($linesfile2);


    //remove brackets 
    $pureCodelinesfile1 = str_replace("{", " ", $linesfile1trimed);
    $pureCodelinesfile2 = str_replace("{", " ", $linesfile2trimed);
    //remove brackets 
    $pureCodelinesfile1 = str_replace("}", " ", $pureCodelinesfile1);
    $pureCodelinesfile2 = str_replace("}", " ", $pureCodelinesfile2);


        
}
*/
