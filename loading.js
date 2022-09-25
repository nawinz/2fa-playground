(function(){
	let CountTime = false;
	let timeShowLoading = 0;
	let changeCount = 0;
	let ShowCount = 1;
	let isShow = true;
	const Timeshow = () => {
		if(CountTime == true){
			timeShowLoading++;
			setTimeout(function(){
				Timeshow();
			},100);
		}else{
			timeShowLoading = 0;
		}
	}
	CountTime = true;
	Timeshow();
	const showLoading = (text,spinner,timeFuncHide,timeHide) => {
		CountTime = true;
		if(isShow == true){
			changeCount++;
		}else{
			ShowCount++;
		}
		isShow = true;
		Timeshow();
		if(typeof text != "string"){
			return false;
		}
		if(typeof spinner != "boolean"){
			return false;
		}
		if(typeof timeHide != "number"){
			return false;
		}
		if(typeof timeFuncHide == "number"){
			if(spinner == true){
				$(".spinner").show();
			}else{
				$(".spinner").hide();
			}
			$(".protectDiv").show();
			if(text.length > 30 && !text.startsWith("<")){
				var a = text.slice(0,13);
				var b = text.slice(text.length - 13,text.length);
				var texting = a+"...."+b;
				// console.log(texting);
			}else if(text.startsWith("<")){
				if(text.replace(/<[^>]*>?/gm, '').length > 30){
					console.error("[Error] HTML Format Detected and text is more than 30 charactors.");
					return hideLoading(true);
				}else{
					var texting = text;
				}
			}else{
				var texting = text;
				// console.log(texting);
			}
			$("#loading-pop").children(".row").children(".col-10").children("span.text").empty().append(texting).show("fast").parent().parent().parent().show();
		}else{
			return false;
		}
	}
	const hideLoading = (spinner) => {
		isShow = false;
		console.log("[Round "+ShowCount+"][Changed "+changeCount+" time(s)]Show Loading Screen For "+(timeShowLoading / 10)+" second(s).");
		CountTime = false;
		changeCount = 0;
		$("#loading-pop").fadeOut("slow").children(".row").children(".col-10").children("span.text").fadeOut("fast").empty();
		$(".protectDiv").fadeOut("slow");
		if(spinner == true){
			$(".spinner").hide();
		}else{
			$(".spinner").hide();
		}
	}
	$(window).on('load', function(){
  		hideLoading(true);
	});
})();