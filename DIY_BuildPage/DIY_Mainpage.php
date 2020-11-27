<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>PC4U</title>
        <link rel="stylesheet" type="text/css" href="DIY_Mainpage.css" />
    </head>

    <body>
        <?php session_start(); require_once "../Menu/menu.php" ?>

        <h1 id="banner">PC4U</h1>

        <br/>
        <div id="builds">
            <h2>Pre-Configured Builds depending on price range</h2>
            <table cellspacing="0" id="pricerange">
                <tr>
                    <td id="budget"><a href="Budget.php">Budget</a></td>
                    <td id="mid"><a href="Midrange.php">Mid-Range</a></td>
                    <td id="high"><a href="Highend.php">High-End</a></td>
                </tr>

                <tr>
                    <td id="budgetRange">(< $1000)</td>
                    <td id="midRange">($1000 - $2000)</td>
                    <td id="highRange">(> $2000)</td>
                </tr>
            </table>
            <footer>Note: All prices are in Canadian Dollar, and peripherals are not included</footer>
        </div>
        <br/>

        <div id="news">
            <fieldset>
                <legend>News</legend>
                
            </fieldset>
        </div>
    </body>
</html>