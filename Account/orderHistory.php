<?php
$orderNumber = $orders = $price = "";
$history = array();
if(file_exists("../Database/orders.txt")){
    $stream = fopen("../Database/orders.txt", "r");
    while(($line = fgets($stream))!==false){
        if(strpos($line, $_SESSION['signedin'])!==false){
            $line = str_replace($_SESSION['signedin']."\t", "", $line);
            $orderNumber = substr($line, 0, strpos($line, "\t"));
            $line = str_replace($orderNumber."\t", "", $line);
            $price = substr($line, 0, strpos($line, "\t"));
            $orders = substr($line, strrpos($line, "\t"), strlen($line)-strrpos($line, "\t"));
            $entry = explode("~", $orders);
            for($i=0; $i<count($entry); $i++){
                $entry[$i] = "<td class=item>".$entry[$i]."</td>";
            }
            array_unshift($entry, "<td class=order>Order Number: ".$orderNumber." Price: ".$price."$</td>");
            $history = array_merge($entry, $history);
        }
    }
    fclose($stream);
}

?>
<table border = 1>
<?php
for($i=0; $i<count($history);$i++){
    echo "<tr>".$history[$i]."</tr>";
}
?>
</table>