<!DOCTYPE html>
<html>
<head>
	<title>2FA Authentication Playground | Initialization</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<link rel="stylesheet" href="/OTP/fa/css/all.min.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Itim&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
	<style type="text/css">
		.btn,.form-control{
			border-radius:0px;
		}
		th{
			font-weight:bold;
		}
		.protect{
			position: var(--protect-css-position);
			width: var(--protect-css-width);
			height: var(--protect-css-height);
			left: var(--protect-css-left);
			top: var(--protect-css-top);
			background: var(--protect-css-background);
		}
		.protectModal{
			--protect-css-position: fixed;
			--protect-css-width: 100%;
			--protect-css-height: 100%;
			--protect-css-left: 0;
			--protect-css-top: 0;
			--protect-css-background: rgba(0,0,0,0.625);
		}
		.protectDiv{
			--protect-css-position: fixed;
			--protect-css-width: 100%;
			--protect-css-height: 100%;
			--protect-css-left: 0;
			--protect-css-top: 0;
			--protect-css-background: rgba(0,0,0,0.9);
		}
		#loading-pop {
			/*display:none;*/
			position:fixed;
			bottom: 10%;
			left:49%;
			padding:15px;
			margin-left: -58px;
			font-size: 18px;
			border-radius: 3px;
			background-color: midnightblue;
			color:gold;
			z-index:999999;
			width: 270px;
			text-align: center;
		}
		.spinner {
			margin: 0;
			width: 70px;
			height: 18px;
			margin: -35px 0 0 -9px;
			position: absolute;
			top: 50%;
			left: 50%;
			text-align: center;
		}
		.load-spin{
			text-align: center;
			vertical-align: middle;
			width: 25px;
			height: 25px;
			background-color: #aa3;
			border-radius: 100%;
			display: inline-block;
			-webkit-animation: bouncedelay 1.4s infinite ease-in-out;
			animation: bouncedelay 1.4s infinite ease-in-out;
			-webkit-animation-fill-mode: both;
			animation-fill-mode: both;
		}
		.spinner>div {
			width: 25px;
			height: 25px;
			background-color: #aa3;
			border-radius: 100%;
			display: inline-block;
			-webkit-animation: bouncedelay 1.4s infinite ease-in-out;
			animation: bouncedelay 1.4s infinite ease-in-out;
			-webkit-animation-fill-mode: both;
			animation-fill-mode: both;
		}
		.spinner .bounce1 {
			-webkit-animation-delay: -.32s;
			animation-delay: -.32s;
		}
		.spinner .bounce2 {
			-webkit-animation-delay: -.16s;
			animation-delay: -.16s;
		}
		@-webkit-keyframes bouncedelay {
			0%, 80%, 100% {
				-webkit-transform: scale(0.0);
			}
			40% {
				-webkit-transform: scale(1.0);
			}
		}
		@keyframes bouncedelay {
			0%, 80%, 100% {
				transform: scale(0.0);
				-webkit-transform: scale(0.0);
			}
			40% {
		 		transform: scale(1.0);
				-webkit-transform: scale(1.0);
			}
		}
		body{
			font-family: Prompt,Kanit;
			background-image: url('/OTP/bg.jpg');
			background-repeat: no-repeat;
			background-size: 100% 100%;
			background-attachment: fixed;
			font-size: 18px;
		}
		.bg-transparentx{
			background-color: rgba(20,20,20,0.5) !important;
			color: white;
		}
		.form-control,.form-control:focus,.form-control:hover,.form-control:disabled,.form-control[readonly]{
			background-color: transparent;
			color: white;
		}
		.container-fluid{
			padding-left: var(--margin-Container-fluid);
			padding-right: var(--margin-Container-fluid);
			margin-top: var(--margin-Container-fluid);
		}
		.form-control::placeholder {
			color: rgba(200,200,200,0.5);
			opacity: 1; /* Firefox */
		}
		.form-control:-ms-input-placeholder { /* Internet Explorer 10-11 */
			color: rgba(200,200,200,0.5);
		}

		.form-control::-ms-input-placeholder { /* Microsoft Edge */
			color: rgba(200,200,200,0.5);
		}
		code{
			color:lightblue;
		}
		h1,h2,h3,h4,h5,h6 > span{
			color: chartreuse;
		}
		:root{
			--border-card-rooted: 0.001px solid #fff;
			--margin-Container-fluid: 24px;
		}
		.card-header{
			border: 0px solid #000;
			border-bottom: var(--border-card-rooted);
		}
		.card-footer{
			border: 0px solid #000;
			border-top: var(--border-card-rooted);
		}
		.card{
			border: 0px solid #fff;
			border-radius: 0px;
		}
		select option {
	    	background: rgba(0,0,0,0.999999);
	    	color: #fff;
	    	border:0px solid #000;
	    	border-radius: 0px;
		}
		select option:not(:checked){
			background: rgba(0,0,0,1);
			color: #fff;
			border:0px solid #000;
			border-radius: 0px;
		}
		select option:checked{
			background: rgba(0,0,0,0.999999);
			color: lightblue;
			border:0px solid #000;
			border-radius: 0px;
		}
		hr{
			background: white;
		}
	</style>
</head>
<body>
<div class="container-fluid" id="app">
	<section>
		<h1 style="text-align: left; float: left;"><span class="font-weight-bolder">Application Playground</span></h1>
		<h1 style="text-align: right; float: right; display: inline;"><span class="font-weight-bolder text-right"><span title="Two Factor Authentication">2FA</span> Authentication</h1>
		<hr style="clear: both;" />
		<div class="card bg-transparentx">
			<div class="card-header"><span title="Two Factor Authentication">2FA</span> Authentication Playground</div>
			<div class="card-body">
				<div class="row">
					<div class="col-3">
						<label for="otp_length_selector">OTP Length (Default: 6)</label>
						<select id="otp_length_selector" class="form-control" name="otp_length_selector">
							<option value="6" selected="">6</option>
							<option value="8">8</option>
						</select>
					</div>
					<div class="col-9">
						<label for="SecretKey">Secret key<small>(Your secret key will auto tranform to hash string before use.)</small></label>
						<input type="text" name="SecretKey" value="J5XTK4ZVGYZUCZSVJRSUKVKOJF5HKTTX" id="SecretKey" class="form-control" placeholder="SecretKey">
					</div>
					<div style="margin-top: 10px;" class="col-3">
						<div id="qrCodePlace">
							<img src="https://fakeimg.pl/1000x1000/fff,128/000,255/?retina=1&text=QRCODE%20HERE" width="100%" height="100%">
						</div>
						<div style="margin-top: 10px;" class="card">
							<div class="card-body bg-success">Current OTP: <span id="current_otp">Loading...</span></div>
						</div>
					</div>
					<div style="margin-top: 10px;" class="col-9">
						<label for="username">Username</label>
						<input type="text" name="username" value="@JohnDoe" id="username" class="form-control" placeholder="Username e.g.(John.doe@myLovelyPet.com,@myLovelyPet,myLovelyPet)">
						<label for="Issuer">Issuer</label>
						<input type="text" name="Issuer" id="Issuer" value="myLovelyPet" class="form-control" placeholder="Issuer e.g.(Facebook,Google)">
						<hr>
						<div class="row">
							<div class="col-6">
								<label for="otpCode">OTP Code</label>
							</div>
							<div class="col-6"></div>
							<div class="col-8" style="margin-top: -5px;">
								<div class="input-group mb-3">
							  		<input type="text" name="otpCode" id="otpCode" class="form-control otpInput" placeholder="OTP Code" aria-label="OTP Code" aria-describedby="otp-addon">
							  		<div class="input-group-append">
							   		 	<span class="input-group-text otpDisplay font-weight-bolder" style="display:none;font-size: 20px;" id="otp-addon2"><i class="far fa-check"></i>
							  		</div>
								</div>
							</div>
							<div class="col-4" style="margin-top: -5px;"><button class="btn btn-danger clear-btn btn-block">
								<i class="fal fa-trash-alt"></i> Clear</button></div>
						</div>
						<table style="margin-top: 10px;" class="table-OTP table table-striped table-borderless table-hover table-primary">
							<thead>
								<tr>
									<th>#</th>
									<th>OTP CODE</th>
									<th>Is Verify?</th>
									<th>validation ts</th>
									<th>current ts</th>
									<th>New than last?</th>
								</tr>
							</thead>
							<tbody id="tableListOTP">
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="card-footer">Copyright &copy; Nawin 2021-Present | <a href="https://github.com/Voronenko/PHPOTP">Github Reference</a> | Google Authenticator | Authy | Any Authentication Application</div>
		</div>
	</section>
</div>
<!-- Script Section -->
<div style="display: none;" class="protectModal protect">

</div>
<div class="protectDiv protect">
</div>
<div id="loading-pop">
	<div class="row">
		<div class="col-2">
			<div class="load-spin">
    		</div>
		</div>
		<div class="col-10">
			<span class="text">Loading... Please Wait</span>
		</div>
	</div>
</div>
<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<!-- UserScript - Loader -->
<script type="text/javascript" src="/OTP/loading.js"></script>
<!-- Font Awesome -->
<script type="text/javascript" src="/OTP/fa/js/all.min.js"></script>
<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<!-- UserScript -->
<script async type="text/javascript">
(function(){
	const baseURL = "/OTP/!/";
	const dataQrPlace = "https://fakeimg.pl/1000x1000/fff,128/000,255/?retina=1&text=QRCODE%20HERE";
	const qrPlace = $("#qrCodePlace").children("img");
	const secret = $("input#SecretKey.form-control");
	const username = $("input#username.form-control");
	const otpLength = $("select#otp_length_selector.form-control");
	const otpInput = $("input#otpCode.form-control");
	const Issuer = $("input#Issuer.form-control");
	const clearBtn = $("button.btn.btn-block.clear-btn.btn-danger");
	const currentOtp = $("span#current_otp");
	const otpDisplay = $("span.otpDisplay");
	const otpTable = $("table.table-OTP.table");
	const tableListOTP = $("tbody#tableListOTP");
	const tableStructure = '<tr class="tr-OTP tr_OTP_{OTPCODE}" data-OTP="{OTPCODE}"> \
								<td class="td-id">{ID}</td> \
								<td class="td-otp">{OTPCODE}</td> \
								<td class="td-verify">{ISVERIFY}</td> \
								<td class="td-vt">{VERIFYNOWTS}</td> \
								<td class="td-ct">{CURRENTTS}</td> \
								<td class="td-ntl">{NTL}</td> \
							</tr>';
	let isFilterUse = true;
	let PassedOTP = [];
	let IntervalLatestOTP;
	let IntervalCheckOTPTable;
	let otpList = [];
	let nowTs = 0;
	secret.on("input",function(){
		genQrcode();
	}).on("change",function(){
		genQrcode();
	})
	username.on("input",function(){
		genQrcode();
	}).on("change",function(){
		genQrcode();
	})
	otpLength.on("input",function(){
		genQrcode();
		otpInput.attr("maxlength",otpLength.val());
	}).on("change",function(){
		genQrcode();
		otpInput.attr("maxlength",otpLength.val());
	})
	Issuer.on("input",function(){
		genQrcode();
	}).on("change",function(){
		genQrcode();
	})
	function onlyUnique(value, index, self) {
  		return self.indexOf(value) === index;
	}
	const validText = (charToCheck,_1Char) => {
		if(typeof charToCheck !== "string"){
			console.error("[ERROR] Character must be string.");
			return false;
		}
		if(typeof _1Char !== "string"){
			console.error("[ERROR] Character to check must be string.");
			return false;
		}
		if(_1Char.length !== 1){
			console.error("[ERROR] Character to check must be 1 charactor only.");
			return false;
		}
		let charlist = charToCheck.split('');
		let a = false;
		$.each(charlist,function(k,i){
			if(i === _1Char){
				a = true;
			}
		});
		return a;
	}
	const CouponValidText = (text) =>{
		let a = text.split('');
		let b = [];
		$.each(a,function(k,i){
			if(validText("1234567890",i)){
				b.push(i);
			}
		});
		return b.join('');
	}
	const checkOtp = async() => {
		await otpInput.val(CouponValidText(otpInput.val().replace(" ","")));
	}
	const getVerify = (a) => {
		if(a == true){
			return "<span class='text-success font-weight-bolder' style='font-size:20px;'><i class='far fa-check'></i></span>";
		}else{
			return "<span class='text-danger font-weight-bolder' style='font-size:20px;'><i class='far fa-times'></i></span>";
		}
	}
	const eachAOTP = async() => {
		let b = {};
		// console.log("START eachAOTP=====================");
		await $.each(otpList,function(k,i){
			b[i] = k;
			// console.log("k,i",k,i);
		});
		// console.log(b);
		// console.log("END eachAOTP=====================");
		return await b;
	}
	let validateOn = {};
	clearBtn.on("click",function(){
		validateOn = {};
		otpList = [];
		tableListOTP.empty();
		otpTable.hide();
	});
	const tableListOTPClick = async() => {
		if(secret.val() != "" && otpLength.val() != "" && otpList.length != 0 && otpList.length > 0){
			await $.post({
				url:baseURL+"checklist&l="+otpLength.val(),
				data:{"s":secret.val(),"a":JSON.stringify(otpList)},
				success:function(data){
					let d = JSON.parse(data);
					eachAOTP().then(res=>res).then(function(res){
						$.each(otpList,function(k,i){
							if(typeof validateOn[i] == "undefined"){
								if(d[i]["time"] !== 0){
									validateOn[i] = d[i]["time"];
								}else{
									validateOn[i] = nowTs;
								}
								let a = tableStructure.replace("{OTPCODE}",i);
								a = a.replace("{OTPCODE}",i);
								a = a.replace("{OTPCODE}",i);
								a = a.replace("{ID}",$("tr.tr-OTP").length + 1);
								a = a.replace("{ISVERIFY}",getVerify(d[i]["type"]));
								a = a.replace("{VERIFYNOWTS}",validateOn[i]);
								a = a.replace("{CURRENTTS}",nowTs);
								a = a.replace("{NTL}",getVerify(d[i]["newThanCurrent"]));
								tableListOTP.append(a);
							}else{
								$("tr.tr_OTP_"+i).children("td.td-verify").empty().append(getVerify(d[i]["type"]));
								$("tr.tr_OTP_"+i).children("td.td-ntl").empty().append(getVerify(d[i]["newThanCurrent"]));
								$("tr.tr_OTP_"+i).children("td.td-ct").empty().append(nowTs);
							}
						});
						let aVA = 0;
						$("tr.tr-OTP").each(function(k,i){
							let v = parseInt($(this).children("td.td-vt").text());
							let c = parseInt($(this).children("td.td-ct").text());
							if((c - v) > 3){
								$(this).hide();
							}else{
								aVA++;
								$(this).children("td.td-id").empty().append(aVA);
							}
						});
					});
				}
			})
			// let Structure = tableStructure.replace("{OTPCODE}",)
		}
	}
	const changeOTP = async(ipthis)=>{
		isFilterUse = false;
		if(secret.val() != "" && otpLength.val() != "" && otpInput.val() != ""){
			await checkOtp();
			if(await otpInput.val().length == await otpLength.val()){
				await $.post({
					url:baseURL+"checkOTP&l="+otpLength.val(),
					data:{"s":secret.val(),"o":otpInput.val()},
					success:function(data){
						if(data == "valid"){
							otpDisplay.show().removeClass("text-success text-warning text-danger").addClass("text-success").empty().append("<i class='far fa-check'></i>");
							otpList.unshift(otpInput.val());
							otpList = otpList.filter(onlyUnique);
							setTimeout(function(){
								otpDisplay.hide();
								otpInput.val('');
							},2000);
							if(otpList.length != 0){
								otpTable.show();
								// tableListOTP.empty();
								// tableListOTPClick();
							}
						}else{
							otpDisplay.show().removeClass("text-success text-warning text-danger").addClass("text-danger").empty().append("<i class='far fa-times'></i>");
							setTimeout(function(){
								otpDisplay.hide();
								otpInput.val('');
							},2000);
						}
					}
				})
			}else{
				otpDisplay.show().removeClass("text-success text-warning text-danger").addClass("text-warning").empty().append("<i class='far fa-times'></i>");
			}
		}else{
			if(otpInput.val() == ""){
				otpDisplay.hide();
			}else{
				otpDisplay.show();
			}
		}
	}
	otpInput.on("change",function(){ changeOTP() }).on("input",function(){ changeOTP() });
	const init = async () => {
		otpInput.attr("maxlength",otpLength.val());
		otpTable.hide();
		document.title = "2FA Authentication Playground";
		genQrcode().then(res=>res).then(function(res){

		});
		IntervalCheckOTPTable = setInterval(function(){ tableListOTPClick(); },1000);
		IntervalLatestOTP = setInterval(function(){
			getLatestOTP().then(res=>res).then(function(res){

			});
		},1000);
	}
	const getLatestOTP = async() => {
		if(secret.val() != "" && otpLength != ""){
			await $.post({
				url:baseURL+"getCurrentOTP&l="+otpLength.val(),
				data:{"s":secret.val()},
				success:function(data){
					let aDV = data.split("|");
					let aDat = (aDV[0]+'').padStart(6,'0');
					let bDat = aDat.split('');
					let cDat = bDat.length;
					let dDat = (cDat / 2) + 1;
					let eDat = 1;
					let fDat = "";
					let gDat = "";
					$.each(bDat,function(k,i){
						fDat += i;
						eDat++;
						gDat += i;
						if(eDat == dDat){
							fDat += " ";
						}
					});
					nowTs = aDV[1];
					currentOtp.empty().append(fDat);
					PassedOTP.unshift(gDat);
					PassedOTP = PassedOTP.filter(onlyUnique);
				}
			})
		}
	}
	const genQrcode = async() => {
		qrPlace.attr("src",dataQrPlace);
		if(secret.val() != "" && username.val() != "" && Issuer != "" && otpLength != ""){
			await $.post({
				url:baseURL+"genQrcode&l="+otpLength.val(),
				data:{"u":username.val(),"s":secret.val(),"i":Issuer.val()},
				success:function(data){
					qrPlace.attr("src",atob(data));
				}
			})
		}
	}
	$(document).ready(function(){
		init().then(res=>res).finally(function(res){
			console.log(res);
		});
	});
})();
</script>
</body>
</html>