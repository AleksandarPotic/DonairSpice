$(window).on('load resize', function () {

	var screenWidth = $(window).width();

	console.log(screenWidth);

	if(screenWidth <= 922){
		document.getElementById("ajfrejm").src = "//lightwidget.com/widgets/7bbdc1f142245528a8a7d0bda76b27db.html";

	}

	if(screenWidth > 922){

		document.getElementById("ajfrejm").src = "//lightwidget.com/widgets/e6a5b8d7aa36505b9137ff494803c952.html";

	}
});