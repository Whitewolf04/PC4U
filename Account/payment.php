<!DOCTYPE html>

<html lang="en">
    <head>
        <title> PC4U </title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="../Menu/sign.css" />
        <script type="text/javascript" src="payment.js"></script>
    </head>
    <body>
        <?php
			session_start();

			$_SESSION['redirect'] = "../Account/payment.php";

			if(!isset($_SESSION['form']) || $_SESSION['form'] !== "PAYMENT")
            {
                $_SESSION['form'] = "PAYMENT";
				unset($_SESSION['state']);
				unset($_SESSION['email']);
                unset($_SESSION['subject']);
				unset($_SESSION['body']);
				unset($_SESSION['CCnum']);
				unset($_SESSION['CCname']);
				unset($_SESSION['CCmm']);
				unset($_SESSION['CCyy']);
				unset($_SESSION['CCvv']);
				unset($_SESSION['billingaddressl1']);
				unset($_SESSION['billingaddressl2']);
				unset($_SESSION['billingphone']);
				unset($_SESSION['billingpostalcode']);
				unset($_SESSION['billingcity']);
				unset($_SESSION['billingprovince']);
				unset($_SESSION['shippingaddressl1']);
				unset($_SESSION['shippingaddressl2']);
				unset($_SESSION['shippingphone']);
				unset($_SESSION['shippingpostalcode']);
				unset($_SESSION['shippingcity']);
				unset($_SESSION['shippingprovince']);
			}
			
			if(!isset($_SESSION['state']) || $_SESSION['state'] === 1)
			{
				if(isset($_SESSION['signedin']))
				{
					$_SESSION['state'] = 2;
					header("Location: ../Account/payment.php");
					exit;
				} else {
					$_SESSION['state'] = 1;
					echo '
						<form id="payment" method="POST" action="paymenthandler.php">
							<div class="block">
								<h2>Order Confirmation</h2>
								<p class="info">You must either provide your email address or sign in.</p>

								<label>Email Address</label>
                                <input type="text" id="email" name="email" value="'.(isset($_SESSION['email']) ? $_SESSION['email'] : "").'" />
                                <p class="condition" id="emailCondition">Enter a valid email address.</p>
			
								<div class="flex">
									<div><a href="../Account/cart.php">CANCEL</a> | <a href="../Menu/signin.php">SIGN IN</a></div>
									<button type="button" id="nextButton">NEXT</button>
								</div>
							</div>
						</form>
					';
				}
			}

			else if($_SESSION['state'] === 2 || $_SESSION['state'] === 4)
            {
				$_SESSION['state'] = 2;
				echo '
					<form id="payment" method="POST" action="paymenthandler.php">
						<div class="block">
							<h2>Credit Card</h2>

							<div class="inputline">
								<div>
									<label>Credit Card Number</label>
									<input type="text" id="CCnum" name="CCnum" value="'.(isset($_SESSION['CCnum']) ? $_SESSION['CCnum'] : "").'" placeholder="1234 1234 1234 1234" maxlength="16" />
								</div>
								<div>
									<label>Full Name</label>
									<input type="text" id="CCname" name="CCname" value="'.(isset($_SESSION['CCname']) ? $_SESSION['CCname'] : "").'" placeholder="First Last" />
								</div>
							</div>

							<div class="flexline">
								<div>
									<label>Expiry Date</label>
									<div class="inputline">
										<input type="text" id="CCmm" name="CCmm" value="'.(isset($_SESSION['CCmm']) ? $_SESSION['CCmm'] : "").'" placeholder="MM" maxlength="2" />
										<input type="text" id="CCyy" name="CCyy" value="'.(isset($_SESSION['CCyy']) ? $_SESSION['CCyy'] : "").'" placeholder="YY" maxlength="2" />
									</div>
								</div>
								<div>
									<label>CVV</label>
									<input type="password" id="CCvv" name="CCvv" value="'.(isset($_SESSION['CCvv']) ? $_SESSION['CCvv'] : "").'" placeholder="123" maxlength="3" />
								</div>
							</div>
		
							<div class="flex">
								<div><a href="../Account/cart.php">CANCEL</a></div>
								<button type="button" id="nextButton">NEXT</button>
							</div>
						</div>
					</form>
				';
			}

			else if($_SESSION['state'] === 3 || $_SESSION['state'] === 5)
            {
				$_SESSION['state'] = 4;
				echo '
					<form id="payment" method="POST" action="paymenthandler.php">
						<div class="block">
							<h2>Billing Address</h2>

							<label>Address Line 1</label>
							<input type="text" id="addressl1" name="billingaddressl1" value="'.(isset($_SESSION['billingaddressl1']) ? $_SESSION['billingaddressl1'] : "").'" placeholder="1234 Street Name" />
							
							<div class="inputline">
								<div>
									<label>Address Line 2</label>
									<input type="text" id="addressl2" name="billingaddressl2" value="'.(isset($_SESSION['billingaddressl2']) ? $_SESSION['billingaddressl2'] : "").'" placeholder="Apartment, Building, Suite (optional)" />
								</div>
								<div>
									<label>Phone Number</label>
									<input type="text" id="phone" name="billingphone" value="'.(isset($_SESSION['billingphone']) ? $_SESSION['billingphone'] : "").'" placeholder="123 456 7890" maxlength="10" />
								</div>
							</div>

							<div class="inputline">
								<div>
									<label>Postal Code</label>
									<input type="text" id="postalcode" name="billingpostalcode" value="'.(isset($_SESSION['billingpostalcode']) ? $_SESSION['billingpostalcode'] : "").'" placeholder="ABC123" maxlength="6" />
								</div>
								<div>
									<label>City</label>
									<input type="text" id="city" name="billingcity" value="'.(isset($_SESSION['billingcity']) ? $_SESSION['billingcity'] : "").'" placeholder="City" />
								</div>
								<div>
									<label>Province</label>
									<select id="province" name="billingprovince">
										<option value="" disabled hidden'.(isset($_SESSION['billingprovince']) ? "" : " selected").'>Select</option>
										<option value="QC"'.(isset($_SESSION['billingprovince']) && $_SESSION['billingprovince'] === "QC" ? " selected" : "").'>Quebec</option>
									</select>
								</div>
							</div>

							<div><input type="checkbox" id="sameaddress" name="sameaddress" value="true"'.(isset($_SESSION['sameaddress']) ? " checked" : "").'><label>Shipping address is the same.</label></div>

							<div class="flex">
								<div><a href="../Account/payment.php">BACK</a></div>
								<button type="button" id="nextButton">NEXT</button>
							</div>
						</div>
					</form>
				';
			}

			else if($_SESSION['state'] === 6)
			{
				$_SESSION['state'] = 5;
				echo '
					<form id="payment" method="POST" action="paymenthandler.php">
						<div class="block">
							<h2>Shipping Address</h2>

							<label>Address Line 1</label>
							<input type="text" id="addressl1" name="shippingaddressl1" value="'.(isset($_SESSION['shippingaddressl1']) ? $_SESSION['shippingaddressl1'] : "").'" placeholder="1234 Street Name" />
							
							<div class="inputline">
								<div>
									<label>Address Line 2</label>
									<input type="text" id="addressl2" name="shippingaddressl2" value="'.(isset($_SESSION['shippingaddressl2']) ? $_SESSION['shippingaddressl2'] : "").'" placeholder="Apartment, Building, Suite (optional)" />
								</div>
								<div>
									<label>Phone Number</label>
									<input type="text" id="phone" name="shippingphone" value="'.(isset($_SESSION['shippingphone']) ? $_SESSION['shippingphone'] : "").'" placeholder="123 456 7890" maxlength="10" />
								</div>
							</div>

							<div class="inputline">
								<div>
									<label>Postal Code</label>
									<input type="text" id="postalcode" name="shippingpostalcode" value="'.(isset($_SESSION['shippingpostalcode']) ? $_SESSION['shippingpostalcode'] : "").'" placeholder="ABC123" maxlength="6" />
								</div>
								<div>
									<label>City</label>
									<input type="text" id="city" name="shippingcity" value="'.(isset($_SESSION['shippingcity']) ? $_SESSION['shippingcity'] : "").'" placeholder="City" />
								</div>
								<div>
									<label>Province</label>
									<select id="province" name="shippingprovince">
										<option value="" disabled hidden'.(isset($_SESSION['shippingprovince']) ? "" : " selected").'>Select</option>
										<option value="QC"'.(isset($_SESSION['shippingprovince']) && $_SESSION['shippingprovince'] === "QC" ? " selected" : "").'>Quebec</option>
									</select>
								</div>
							</div>

							<div class="flex">
								<div><a href="../Account/payment.php">BACK</a></div>
								<button type="button" id="nextButton">NEXT</button>
							</div>
						</div>
					</form>
				';
			}

			else if($_SESSION['state'] === 7)
			{
				if(isset($_SESSION['sameaddress']))
				{
					$_SESSION['state'] = 5;
				} else {
					$_SESSION['state'] = 6;
				}
				echo '
					<form id="payment" method="POST" action="paymenthandler.php">
						<div class="block">
							<h2>Order Summary</h2>
							<div class="flex"><p>Amount:</p><p>test</p></div>
							<div class="flex">
								<div><a href="../Account/payment.php">BACK</a></div>
								<button type="button" id="nextButton">PLACE ORDER</button>
							</div>
						</div>
					</form>
				';
			}
        ?>
    </body>
</html>