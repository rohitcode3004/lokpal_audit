(function($){

	$('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
	  if (!$(this).next().hasClass('show')) {
		$(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
	  }
	  var $subMenu = $(this).next(".dropdown-menu");
	  $subMenu.toggleClass('show');

	  $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
		$('.dropdown-submenu .show').removeClass("show");
	  });

	  return false;
	});

})(jQuery);


$('.outside-link').click(function(){
    alert("External website that opens in a new window.");
  });

$('#change-lang').click(function(e){
	e.preventDefault();
	var choose_lang=$('#change-lang').val();
	if(choose_lang=='english'){
		window.location.href='/';
		return true;
	}
	else if(choose_lang=='hindi') {
		window.location.href='./lokpal_hindi';
		return true;
	}
});

$('.size-sm').click(function(e){
	e.preventDefault();
	$('body').css('font-size','12px');
});

$('.size-normal').click(function(e){
	e.preventDefault();
	$('body').removeAttr("style");
});

$('.size-larg').click(function(e){
	e.preventDefault();
	$('body').css('font-size','17px');
});

$('.bg-black').click(function(e){
	e.preventDefault();
	$('body').css('background','#000');
	$('.container_boxed').removeClass('white').addClass('black');
});

$('.bg-normal').click(function(e){
	e.preventDefault();
	$('body').css('background','#b8defb');
	$('.container_boxed').removeClass('black').addClass('white');
});

$("#skip-content").click(function() {
	if(confirm('You want to go main content?')) {
	    $('html, body').animate({
	        scrollTop: $(".start-main-content").offset().top
	    }, 2000);
		return true;

	} else {
		return false;
	}
});


$(document).ready(function(){

	date_time('date_time');

	$(".fancybox").fancybox({
	    openEffect: "none",
	    closeEffect: "none"
	});

	$(".zoom").hover(function(){		
		$(this).addClass('transition');
	}, function(){	    
		$(this).removeClass('transition');
	});


	$('#marquee-vertical').marquee({timing:30});
	new WOW().init();

	var submitIcon = $('.searchbox-icon');
	var inputBox = $('.searchbox-input');
	var searchBox = $('.searchbox');
	var isOpen = false;
	submitIcon.click(function(){
		if(isOpen == false){
			searchBox.addClass('searchbox-open');
			inputBox.focus();
			isOpen = true;
		} else {
			searchBox.removeClass('searchbox-open');
			inputBox.focusout();
			isOpen = false;
		}
	});  
		submitIcon.mouseup(function(){
			return false;
		});
	searchBox.mouseup(function(){
			return false;
		});
	$(document).mouseup(function(){
			if(isOpen == true){
				$('.searchbox-icon').css('display','block');
				submitIcon.click();
			}
		});
		
		var item = '#slider-1 .carousel-item';
		var item_inner = "#slider-1 .carousel-inner";
		classes = GetUnique(item);
		setcss(classes, item, item_inner);

		$(window).scroll(function() {    
			var scroll = $(window).scrollTop();
			if (scroll >= 1) {
				$(".header-part").css("top","0");
				$(".header-part-top").css("top","-30px");
			} else {
				$(".header-part").css("top","30px");
				$(".header-part-top").css("top","0");
			}
			if (scroll >= 50) {
				$(".gototop").css("display","block");
			} else {
				$(".gototop").css("display","none");
			}
		});

		/***************** Video Gallery **********************/
		$('#modal1').on('hidden.bs.modal', function (e) {
		  $('#modal1 iframe').attr("src", $("#modal1 iframe").attr("src"));
		});

		$('#modal6').on('hidden.bs.modal', function (e) {
		  $('#modal6 iframe').attr("src", $("#modal6 iframe").attr("src"));
		});

		$('#modal4').on('hidden.bs.modal', function (e) {
		  $('#modal4 iframe').attr("src", $("#modal4 iframe").attr("src"));
		});
		
});


/********** Running Time JQuery **********/

function date_time(id) {
    date = new Date;
    year = date.getFullYear();
    month = date.getMonth();
    months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'Jully', 'August', 'September', 'October', 'November', 'December');
    d = date.getDate();
    day = date.getDay();
    days = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
    h = date.getHours();
    if(h<10)
    {
            h = "0"+h;
    }
    m = date.getMinutes();
    if(m<10)
    {
            m = "0"+m;
    }
    s = date.getSeconds();
    if(s<10)
    {
            s = "0"+s;
    }
    result = days[day]+', '+months[month]+' '+d+', '+year+' '+h+':'+m+':'+s;
    document.getElementById(id).innerHTML = result;
    setTimeout('date_time("'+id+'");','1000');
    return true;
}

/********** End *****************/

function download_pdf(fl_name){
	event.preventDefault();
	var url='pdfs/'+fl_name+'.pdf', w=1500, h=800;
	var left = (screen.width/2)-(w/2), top = (screen.height/2)-(h/2);
  	ref= window.open(url, 'PDF file', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
	ref.focus();
}

function flip_judge_1() {
    $('.card_judge_1').toggleClass('flipped');
}

function flip_judge_2() {
    $('.card_judge_2').toggleClass('flipped');
}

function buttonUp(){
    var inputVal = $('.searchbox-input').val();
    inputVal = $.trim(inputVal).length;
    if( inputVal !== 0){
        $('.searchbox-icon').css('display','none');
    } else {
        $('.searchbox-input').val('');
        $('.searchbox-icon').css('display','block');
    }
}

function gotoSlide(slidenum){
	$('#slider-1').carousel(Number(slidenum));
}

function GetUnique(e){var l=[],s=temp_c=[],t=["col-md-1","col-md-2","col-md-3","col-md-4","col-md-6","col-md-12","col-sm-1","col-sm-2","col-sm-3","col-sm-4","col-sm-6","col-sm-12","col-lg-1","col-lg-2","col-lg-3","col-lg-4","col-lg-6","col-lg-12","col-xs-1","col-xs-2","col-xs-3","col-xs-4","col-xs-6","col-xs-12","col-xl-1","col-xl-2","col-xl-3","col-xl-4","col-xl-6","col-xl-12"];$(e).each(function(){for(var l=$(e+" > div").attr("class").split(/\s+/),t=0;t<l.length;t++)s.push(l[t])});for(var c=0;c<s.length;c++)temp_c=s[c].split("-"),2==temp_c.length&&(temp_c.push(""),temp_c[2]=temp_c[1],temp_c[1]="xs",s[c]=temp_c.join("-")),-1==$.inArray(s[c],l)&&$.inArray(s[c],t)&&l.push(s[c]);return l}function setcss(e,l,s){for(var t=["","","","","",""],c=d=f=g=0,r=[1200,992,768,567,0],a="",o=[],a=0;a<e.length;a++){var i=e[a].split("-");if(3==i.length){switch(i[1]){case"xl":d=0;break;case"lg":d=1;break;case"md":d=2;break;case"sm":d=3;break;case"xs":d=4}t[d]=i[2]}}for(var n=0;n<t.length;n++)if(""!=t[n]){if(0==c&&(c=12/t[n]),f=12/t[n],g=100/f,a=s+" > .carousel-item.active.carousel-item-right,"+s+" > .carousel-item.carousel-item-next {-webkit-transform: translate3d("+g+"%, 0, 0);transform: translate3d("+g+", 0, 0);left: 0;}"+s+" > .carousel-item.active.carousel-item-left,"+s+" > .carousel-item.carousel-item-prev {-webkit-transform: translate3d(-"+g+"%, 0, 0);transform: translate3d(-"+g+"%, 0, 0);left: 0;}"+s+" > .carousel-item.carousel-item-left, "+s+" > .carousel-item.carousel-item-prev.carousel-item-right, "+s+" > .carousel-item.active {-webkit-transform: translate3d(0, 0, 0);transform: translate3d(0, 0, 0);left: 0;}",f>1){for(k=0;k<f-1;k++)o.push(l+" .cloneditem-"+k);o.length&&(a=a+o.join(",")+"{display: block;}"),o=[]}0!=r[n]&&(a="@media all and (min-width: "+r[n]+"px) and (transform-3d), all and (min-width:"+r[n]+"px) and (-webkit-transform-3d) {"+a+"}"),$("#slider-css").prepend(a)}$(l).each(function(){for(var e=$(this),l=0;l<c-1;l++)(e=e.next()).length||(e=$(this).siblings(":first")),e.children(":first-child").clone().addClass("cloneditem-"+l).appendTo($(this))})}