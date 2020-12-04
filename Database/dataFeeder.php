<?php
    $myfile = fopen("products.txt", "a");
    $content = "";
    fwrite($myfile, $content);
    fclose($myfile);
    echo "Data is written successfully, DO NOT run the page again!";
?>