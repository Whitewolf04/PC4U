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
							<div class="block summary">
								<h2>Order Summary</h2>
								<div><p class="bold">Amount:</p><p>test</p></div>
							</div>
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

			else if($_SESSION['state'] === 2)
            {
				echo '
					<form id="payment" method="POST" action="paymenthandler.php">
						<div class="block summary">
							<h2>Order Summary</h2>
							<div><p class="bold">Amount:</p><p>test</p></div>
						</div>
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
        ?>
    </body>
</html>