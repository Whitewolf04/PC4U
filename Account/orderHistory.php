<?php
$orderNumber = $orders = $price = "";
$history = array();
/**
 * looks at orders.txt and finds lines containing user's email
 * makes orders into array and then is displayed on table
 */
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
                $entry[$i] = "<td class=\"item\">".$entry[$i]."</td>";
            }
            array_unshift($entry, "<td class=\"order\">Order Number: ".$orderNumber." Price: ".$price."$</td>");
            if(!isset($_SESSION['recentToOldest'])){
                $history = array_merge($history, $entry);
                $_SESSION['recentToOldest'] = true;
            }else{
                if($_SESSION['recentToOldest']){
                    $history = array_merge($history, $entry);
                }else if($_SESSION['recentToOldest'] == false){
                    $history = array_merge($entry, $history);
                }
            }
        }
    }
    fclose($stream);
}
/**
 * Sort order history button from most recent to oldest or from oldest to most recent
 * it does this by toggling a boolean which on refresh decides how the arrays are merged.
 */
if(isset($_POST['sortOrder'])){
    if($_SESSION['recentToOldest']){
        $_SESSION['recentToOldest'] = false;
        header("Location: account.php");
        //echo "true";
    }else{
        $_SESSION['recentToOldest'] = true;
        header("Location: account.php");
        //echo "false";
    }
}
$buttonstring = ($_SESSION['recentToOldest']) ? "Most Recent to Oldest Orders":"Oldest to Most Recent Orders";
?>
<form method="POST">
<input type="submit" name="sortOrder" value="Sort Order History from <?php echo $buttonstring;?>">
</form>
<br>
<table border = 1 class="orderHistory">
<?php
for($i=0; $i<count($history);$i++){
    echo "<tr>".$history[$i]."</tr>";
}
?>
</table>