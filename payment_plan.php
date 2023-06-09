<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Plan</title>
    <link rel="stylesheet" href="style.css">

    <!-- Home Buttom -->
    <a href="index.php">
        <button>
            <p>Back</p>
        </button>
    </a>
</head>

<body>


<!-- CSS/HTML Template from https://uiverse.io/Yaya12085/splendid-firefox-37-->

<!-- 99 Bath -->
    <div class="plan">
		<div class="inner">
			<span class="pricing">
				<span>
                    ฿99 <small>/ m</small>
				</span>
			</span>

			<p class="title">1 เดือน</p>
			<p class="info">เหมาะสำหรับผู้ที่ต้องการเรียนรู้เบื้องต้นหรือทดลองใช้ โดยเพียงแค่ 99 บาท ต่อเดือน</p>
			<ul class="features">
				<li>
					<span class="icon">
						<svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
							<path d="M0 0h24v24H0z" fill="none"></path>
							<path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
						</svg>
					</span>
					<span>ยาวนาน <strong>1</strong> เดือน</span>
				</li>
				<li>
					<span class="icon">
						<svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
							<path d="M0 0h24v24H0z" fill="none"></path>
							<path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
						</svg>
					</span>
					<span>เรียนได้<strong>ทุกคอร์ส</strong>แบบไม่อั้น</span>
				</li>
				<li>
					<span class="icon">
						<svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
							<path d="M0 0h24v24H0z" fill="none"></path>
							<path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
						</svg>
					</span>
					<span><strong>ใบรับรอง</strong>เมื่อจบหลักสูตร</span>
				</li>
			</ul>

            <?php
            $price = 99;
            ?>

            <div class="action">
                    <form name="checkoutForm" class = "action2" action="[table]_payment.php" method="POST">
                        <script type="text/javascript" src="https://cdn.omise.co/omise.js"
                            data-key="pkey_test_5vt2n0f3ln1h9uzrxa1"
                            data-frame-label="GoodlearnGoodlife"
                            data-button-label="Choose plan"
                            data-submit-label="ชำระเงิน"
                            data-location="no"
                            data-amount="<?php echo $price;?>00"
                            data-currency="thb">
                        </script>
                        <input type="hidden" name="price" value="<?php echo $price;?>">
                    </form>
                        <p class="button">Choose plan</p>
                </div>
		</div>
	</div>

<!-- 499 Bath -->
    <div class="plan">
		<div class="inner">
			<span class="pricing">
				<span>
					฿499 <small>/ 6m</small>
				</span>
			</span>

			<p class="title">6 เดือน</p>
			<p class="info">เหมาะสำหรับผู้ที่ต้องการเรียนรู้อย่างต่อเนื่อง โดยเพียงแค่ 499 บาท ต่อทุกๆ 6 เดือน</p>
			<ul class="features">
				<li>
					<span class="icon">
						<svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
							<path d="M0 0h24v24H0z" fill="none"></path>
							<path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
						</svg>
					</span>
					<span>ยาวนาน <strong>6</strong> เดือน</span>
				</li>
				<li>
					<span class="icon">
						<svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
							<path d="M0 0h24v24H0z" fill="none"></path>
							<path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
						</svg>
					</span>
					<span>เรียนได้<strong>ทุกคอร์ส</strong>แบบไม่อั้น</span>
				</li>
				<li>
					<span class="icon">
						<svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
							<path d="M0 0h24v24H0z" fill="none"></path>
							<path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
						</svg>
					</span>
					<span><strong>ใบรับรอง</strong>เมื่อจบหลักสูตร</span>
				</li>
			</ul>
            <?php
            $price = 499;
            ?>
			<div class="action">
                <form name="checkoutForm" class="action2" action="[table]_payment.php" method="POST">
                    <script type="text/javascript" src="https://cdn.omise.co/omise.js"
                        data-key="pkey_test_5vt2n0f3ln1h9uzrxa1"
                        data-frame-label="GoodlearnGoodlife"
                        data-button-label="Choose plan"
                        data-submit-label="ชำระเงิน"
                        data-location="no"
                        data-amount="<?php echo $price;?>00"
                        data-currency="thb">
                    </script>
                    <input type="hidden" name="price" value="<?php echo $price;?>">
                </form>
                    <p class="button">Choose plan</p>
            </div>
		</div>
	</div>

<!-- 899 Bath -->
    <div class="plan">
		<div class="inner">
			<span class="pricing">
				<span>
					฿899 <small>/ 12m</small>
				</span>
			</span>

			<p class="title">12 เดือน</p>
			<p class="info">เหมาะสำหรับผู้ที่ต้องการเรียนรู้อย่างต่อเนื่องเป็นเวลานาน โดยเพียงแค่ 899 บาท ต่อปี</p>
			<ul class="features">
				<li>
					<span class="icon">
						<svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
							<path d="M0 0h24v24H0z" fill="none"></path>
							<path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
						</svg>
					</span>
					<span>ยาวนาน <strong>12</strong> เดือน</span>
				</li>
				<li>
					<span class="icon">
						<svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
							<path d="M0 0h24v24H0z" fill="none"></path>
							<path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
						</svg>
					</span>
					<span>เรียนได้<strong>ทุกคอร์ส</strong>แบบไม่อั้น</span>
				</li>
				<li>
					<span class="icon">
						<svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
							<path d="M0 0h24v24H0z" fill="none"></path>
							<path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
						</svg>
					</span>
					<span><strong>ใบรับรอง</strong>เมื่อจบหลักสูตร</span>
				</li>
			</ul>
			<?php
            $price = 899;
            ?>
            <div class="action">
                <form name="checkoutForm" class="action2" action="[table]_payment.php" method="POST">
                    <script type="text/javascript" src="https://cdn.omise.co/omise.js"
                        data-key="pkey_test_5vt2n0f3ln1h9uzrxa1"
                        data-frame-label="GoodlearnGoodlife"
                        data-button-label="Choose plan"
                        data-submit-label="ชำระเงิน"
                        data-location="no"
                        data-amount="<?php echo $price;?>00"
                        data-currency="thb">
                    </script>
                    <input type="hidden" name="price" value="<?php echo 899;?>">
                </form>
                <p class="button">Choose plan</p>
            </div>
		</div>
	</div>

</body>

<style>
.plan {
  position: relative;
  top: 15%;
  left: 20%;
  display: inline-flex;
  flex-wrap: wrap;
  border-radius: 16px;
  box-shadow: 0 30px 30px -25px rgba(0, 38, 255, 0.205);
  padding: 10px;
  background-color: #fff;
  color: #697e91;
  max-width: 300px;
  margin-right: 30px;
}

.plan strong {
  font-weight: 600;
  color: #425275;
}

.plan .inner {
  align-items: center;
  padding: 20px;
  padding-top: 40px;
  background-color: #ecf0ff;
  border-radius: 12px;
  position: relative;
}

.plan .pricing {
  position: absolute;
  top: 0;
  right: 0;
  background-color: #bed6fb;
  border-radius: 99em 0 0 99em;
  display: flex;
  align-items: center;
  padding: 0.625em 0.75em;
  font-size: 1.25rem;
  font-weight: 600;
  color: #425475;
}

.plan .pricing small {
  color: #707a91;
  font-size: 0.75em;
  margin-left: 0.25em;
}

.plan .title {
  font-weight: 600;
  font-size: 1.25rem;
  color: #425675;
}

.plan .title + * {
  margin-top: 0.75rem;
}

.plan .info + * {
  margin-top: 1rem;
}

.plan .features {
  display: flex;
  flex-direction: column;
}

.plan .features li {
  display: flex;
  align-items: center;
  gap: 0.5rem;
}

.plan .features li + * {
  margin-top: 0.75rem;
}

.plan .features .icon {
  background-color: #1FCAC5;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  color: #fff;
  border-radius: 50%;
  width: 20px;
  height: 20px;
}

.plan .features .icon svg {
  width: 14px;
  height: 14px;
}

.plan .features + * {
  margin-top: 1.25rem;
}

.plan .action {
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: end;
}

.plan .action2 {
  opacity: 0;
  border: 0px solid #6558d3;
  background-color: #6558d3;
  position: absolute;
  left: 28%;
  margin-bottom: 2%;
  display: none;  /*--*/
}
.plan .action:hover .action2 {
  /* opacity: 0; */
  display: block; /*--*/
}

.plan .button {
  background-color: #6558d3;
  text-decoration: none;
  border-radius: 6px;
  color: #fff;
  font-weight: 500;
  font-size: 1.125rem;
  text-align: center;
  border: 0;
  outline: 0;
  width: 100%;
  padding: 0.625em 0.75em;
}

.plan .button:hover, .plan .button:focus {
  background-color: #4133B7;
}

button {
  position: absolute;
  left: 1%;
  top: 1%;
  background-color: #FFFFFF;
  border: 1px solid rgb(209,213,219);
  border-radius: .5rem;
  color: #111827;
  font-size: .875rem;
  font-weight: 600;
  line-height: 1.25rem;
  padding: .75rem 1rem;
  text-align: center;
  -webkit-box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
  box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
  cursor: pointer;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  -webkit-user-select: none;
  -ms-touch-action: manipulation;
  touch-action: manipulation;
}

button:hover {
  background-color: #f9fafb;
}

button:focus {
  outline: 2px solid rgba(0,0,0,0.1);
  outline-offset: 2px;
}

button:focus-visible {
  -webkit-box-shadow: none;
  box-shadow: none;
}
</style>