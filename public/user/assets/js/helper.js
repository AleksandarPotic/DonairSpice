
//==============HELPER SKRIPTE BY MATIJA======================
	function openLogin(){
		$(".john-cena").css("display","block");
		$(".camo").css("display","none");
		if($(window).width()<601){
			$("#content").css("cssText", "max-height: 89% !important;");
		}
		else{
			$("#content").css("cssText", "max-height: 80% !important;");
		}
		$("#content").css("cssText", "border: none !important;");
		document.getElementById("tab-1").checked = "true";
		document.getElementById("tab-2").checked = "false";
		$("svg").css('display','flex');
	}

	function openSignUp(){
		
		$(".john-cena").css("display","block");
		$(".camo").css("display","none");
		if($(window).width()<601){
			$("#content").css("cssText", "max-height: 89% !important;");
		}
		else{
			$("#content").css("cssText", "max-height: 80% !important;");
		}
		$("#content").css("cssText", "max-height: 62% !important;");
		$("#content").css("cssText", "border: none !important;");
		document.getElementById("tab-2").checked = "true";
		document.getElementById("tab-1").checked = "false";
		$("svg").css('display','flex');
	}

	function openShop(){
		$(".john-cena").css("display","none");
		$(".camo").css("display","none");
		document.getElementById("tab-3").checked = "false";
		if($(window).width()<601){
			$("#content").css("cssText", "max-height: 93% !important;");
		}
		else{
			$("#content").css("cssText", "max-height: 87.9% !important;");
		}
		$("svg").css('display','none');
	}

	function clickImage(data){
		$(data).css('background','rgba(211,167,19,0.6)');
		$(data).siblings().css( "background-color", "transparent");
		var value = $(data).attr("alt");
		if(value==5){
			$("#price").text("PRICE: $ 29.99")
		}
		else{
			$("#price").text("PRICE: $ 59.99")
		}
		$("#five-or-ten").val(value);
	}

	function scrollIt(section){
	
	var sve = "";

	if($(window).width()>992){
		sve = "#" + section + "";
		$('html, body').animate({
	    scrollTop: $(sve).offset().top - 116
		}, 1300);
	}
	else{
		sve = "#" + section + "";
		$('html, body').animate({
	    scrollTop: $(sve).offset().top - 96
		}, 1300);
	}
}



//=================10AcityMedia 2018.============================

//======================Marko i Matija=============================
