<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>PC4U</title>
    <link rel="stylesheet" type="text/css" href="Newsletter.css" />
    <script type="text/javascript" src="Newsletter.js"></script>
</head>

<body>
    <?php require_once "../Menu/nav.php" ?>

    <h1 id="banner">Newsletter</h1>

    <!--List of newly released products-->
    <table class="item-table">
        <tr>
            <td>
                <h2>AMD Radeon RX 6900 XT Graphics</h2>
            </td>
        </tr>
        <tr>
            <td>
                <p class="item-desc">The AMD Radeon™ RX 6900 XT graphics card, powered by AMD RDNA™ 2 architecture,
                    featuring 80 powerful enhanced Compute Units, 128 MB of all new AMD Infinity
                    Cache and 16GB of dedicated GDDR6 memory, is engineered to deliver ultra-high
                    frame rates and serious 4K resolution gaming.</p>
                <a target="_blank" href="https://www.amd.com/en/products/graphics/amd-radeon-rx-6900-xt"> See product
                    details</a>
            </td>
            <td rowspan="3">
                <a target="_blank"
                    href="https://www.amd.com/system/files/styles/992px/private/2020-10/579976-radeon-rx-6000xt-left-angle-1260x709_0.png?itok=RUfGBx_T">
                    <img id="img1" onmouseover="overImage(this)" onmouseout="outImage(this)"
                        src="https://www.amd.com/system/files/styles/992px/private/2020-10/579976-radeon-rx-6000xt-left-angle-1260x709_0.png?itok=RUfGBx_T"
                        alt="Image of AMD Radeon RX 6900 XT Graphics" />
                </a>
            </td>
        </tr>
    </table>
    <table class="item-table">
        <tr>
            <td>
                <h2>Ryzen™ 5 5600X Desktop Processors</h2>
            </td>
        </tr>
        <tr>
            <td>
                <p class="item-desc">Encode faster. Render faster. Iterate faster2. Create more, faster with AMD Ryzen™
                    processors.</p>
                <a target="_blank" href=https://www.amd.com/en/products/cpu/amd-ryzen-5-5600x>See product details</a>

            </td>
            <td rowspan="3">
                <a target="_blank"
                    href="https://www.amd.com/system/files/styles/992px/private/2020-09/616656-amd-ryzen-5-5000-series-PIB-fan-1260x709.png?itok=g0FNgeyd">
                    <img id="img2" onmouseover="overImage(this)" onmouseout="outImage(this)"
                        src="https://www.amd.com/system/files/styles/992px/private/2020-09/616656-amd-ryzen-5-5000-series-PIB-fan-1260x709.png?itok=g0FNgeyd"
                        alt="Image of fRyzen™ 5 5600X Desktop Processors" />
                </a>
            </td>
        </tr>
    </table>
    <table class="item-table">
        <tr>
            <td>
                <h2>ROG SWIFT PG35VQ</h2>
            </td>
        </tr>
        <tr>
            <td>
                <p class="item-desc">
                    ROG Swift PG35VQ Ultra-Wide HDR Gaming Monitor – 35” 21:9 (3440 x 1440),
                    FALD 512 Zones, Peak Brightness 1000nits, Overclockable 200Hz, 2ms, G-SYNC Ultimate,
                    DisplayHDR1000 ™, Quantum-dot, Smart Fan Control, Aura Sync, Hi-fi-grade ESS Amplifier.
                </p>
                <a target="_blank" href=https://rog.asus.com/ca-en/Monitors/Above-34-Inches/ROG-SWIFT-PG35VQ-Model>See
                    product details</a>

            </td>
            <td rowspan="3">
                <a target="_blank"
                    href="https://dlcdnwebimgs.asus.com/gain/7EFC8E77-ED9D-4837-81F2-42124966C557/w717/h525">
                    <img id="img3" onmouseover="overImage(this)" onmouseout="outImage(this)"
                        src="https://dlcdnwebimgs.asus.com/gain/7EFC8E77-ED9D-4837-81F2-42124966C557/w717/h525"
                        alt="Image of ROG Swift PG35VQ Ultra-Wide HDR Gaming Monitor" />
                </a>
            </td>
        </tr>
    </table>
    <br><br><br>
    <div class="main-div-subs">
        <button type="button" id="button-subs-open" onclick="openSubs()">Subscribe</button>
        <div align="center" id="pop-subscribe">
            <h3>Be the first to know about newly released products</h3>
            <form class="form-container">
                <input placeholder="Enter your email address"><br><br>
                <button type="submit" id="button-subs">Subscribe</button><br>
            </form>
            <button type="button" id="button-close" onclick="closeSubs()">&#9932;</button>
        </div>
    </div>
</body>

</html>