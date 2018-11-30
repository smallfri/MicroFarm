<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Farm House</title>
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
		<style>
			body {
				font-family: 'Montserrat', sans-serif;
			}
			h2 {
				color:#000;
				font-size: 20px;
				text-align: center;
			}
			h4 {
				color: #333333 !important;
				margin-left: 23px !important;
			}
			table {
				border-collapse: collapse;
				width: 100%;
				text-align: center;
				margin:0px auto 20px auto;
				<!-- border: 1px solid #ddd; -->
				display: table;
			}

			th, td {
				text-align: center;
				padding: 10px 20px;
				font-size: 15px;
			}

			tr:nth-child(odd){background-color: #f2f2f2}

			th {
				background-color: #F47224;
				color: white;
			}
			
			p {
				margin:0px; 
				text-align:center; 
				font-size:15px;
			}
			.btn_mail {
				background-color: #F47224;
				border-radius: 5px;
				color: #ffffff;
				padding: 10px;
				text-decoration: none;
			}
			table img {
				width: 80%;
			}
			img.brand_icon {
				width: 75px;
			}
			.footer a {
				text-align: center;
				color: #F47224;
				text-decoration: none;
			}
			.footer {
				text-align: center;
			}
			.footer p {
				margin-bottom: 10px;
			}
			tr.image-line {
				background: transparent;
				border: none !important;
			}

			tr.image-line td {
				padding: 0;
			}

			tr.image-line td img {
				width: 100%;
			}
			 .top-4 img {
				margin-top:-4px;
			 }
			 .bottom-4 img{
				margin-bottom:-4px;
			 }
			table.tbl_order {
				width: 80%;
			}
			td.item_tbl {
				padding: 25px 0px !important;
				background: #ededed;
			}
			th.head_tbl {
				font-size: 20px;
				padding: 15px 0px;
			}
			.tbl_order th {
				background-color: #EDEDED;
				color: #000;
				border-bottom: 1px dashed #d3d3d3;
			}
			table.tbl_order td {
				padding: 10px 10px;
			}
			tr.order-head td:first-child {
				text-align: left;
				font-weight: bold;
			}
			tr.detail_item {
				background: #f7f7f7;
			}

			tr.detail_item tr th {
				border-bottom: 1px dashed #ededed;
				background: transparent;
			}
			tr.detail_item tr {
				background: none;
			}
			td.top-4 {
				top: -5px;
				position: relative;
			}
			.wrap_table {
				text-align: left;
				width: 80%;
				margin: 0 auto;
			}
			.wrap_table h4 {
				margin: 10px 0px 20px !important;
			}

			.wrap_table p {
				line-height: 23px;
				text-align: left;
			}
			
			@media only screen and (max-width: 850px) {
				body {
					width: 100% !important;
				}
				td.top-4 {
					top: -10px;
				}
			 }
			 @media only screen and (max-width: 610px) {
				.wrap_table {
					text-align: left;
					width: 90%;
					margin: 0 auto;
				}
			 }
		</style>	</head>
	<body style="margin:30px auto; width:850px;">
		<div style="background:#000; padding:20px; text-align:center;">
			<img src="{{url('/frontend/images/logo.png')}}" alt="logo"  style="width: 75px;"/>
		</div>
		
		<div style="align:center; border:1px solid #ccc; padding-top:30px; padding-bottom:40px">
			<h2 style="margin-bottom: 35px;font-size: 25px;color:#000;font-size: 20px;text-align: center;">Contact Us Inquiry</h2>
			<table class="item_detail">
				<tr class="image-line">
					<td colspan="3"  class="bottom-4">
						<img src="{{url('/frontend/images/top.jpg')}}" style="width: 100%;">
					</td>
				</tr>
				<tr class="image-line" style="background: transparent;
				border: none !important;">
					<td colspan="6" class="item_tbl">
						<table class="tbl_order">
							<div class="wrap_table">
								<h4 style="color: #333333 !important;margin-left: 23px !important;"><b>Hello, admin</b></h4>

									<tr style="text-align:center">
										<td>Name:</td>
										<td>{{$contact->name}}</a></td>					
									</tr>
									<tr style="text-align:center">
										<td>Email:</td>
										<td>{{$contact->email}}</a></td>					
									</tr>
									<tr style="text-align:center">
										<td>Phone:</td>
										<td>{{$contact->phone}}</a></td>					
									</tr>
									<tr style="text-align:center">
										<td>Subject:</td>
										<td>{{$contact->subject}}</a></td>					
									</tr>
								<p style="text-align: left;margin-left: 23px !important;font-size:15px;">Thanks,</p>
								<p style="line-height: 23px;text-align: left;margin-left: 23px !important; text-align:center; font-size:15px;"><b>The Farm House Team</b></p>
							</div>
						</table>
					</td>
				</tr>
				<tr class="image-line">
					<td colspan="6"  class="top-4">
						<img src="{{url('/frontend/images/bottom.jpg')}}"  style="width: 100%;">
					</td>
				</tr>
			</table>
			
			<h4 style="margin-top: 35px;"></h4>
			
		</div>
		<div class="footer" style="background:#333333; color:#ffffff; padding:10px;">
			<!-- <p>Copyright © 2017 All rights reserved</p> -->
			
		</div>
	</body>
</html>