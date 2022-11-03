<?php

function uploadFile(){
    $file = $_FILES['contenu'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];

    $fileExt = explode('.', $fileName);
    //print_r($fileExt);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('xls','docx','doc','png','jpg','pdf','txt');

    // open File
    // $path = '../textFiles/allowedExtentions.txt';
    // $myFile = fopen($path,"r") or die("Unable to open file!");    

    // convert txtFile to array
    // if($myFile){
    //     $allowed =  explode("\n", file_get_contents($path));;
    //     fclose($myFile);
    // }
    

    if (in_array($fileActualExt, $allowed)) {

        $fileNameNew = uniqid('',true). '.' . $fileActualExt;
        $fileDesti = "uploads/" . $fileNameNew;
        move_uploaded_file($fileTmpName, $fileDesti);
    }
    return $fileDesti;
}
