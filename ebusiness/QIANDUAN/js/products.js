jQuery(function($) {
	
	/*
	| ----------------------------------------------------------------------------------
	| Shopping cart - Remove Row on click Close button
	| ----------------------------------------------------------------------------------
	*/
	$(document).on('click', '.tbl-cart .close', function() {
		$(this).closest('tr').fadeOut(500, function() {
			$(this).remove();
			update_cart_total();
			
			if ( $('.tbl-cart tbody tr:not(.empty-cart)').length == 0 )
			{
				$('.tbl-cart .empty-cart').removeClass('hide');
			}

			
		});
		
	});

	if ( $('.tbl-order tbody tr:not(.empty-cart)').length == 0 ){
				$('.tbl-order .empty-cart').removeClass('hide');
				$('.container .shopcart-total').addClass('hide');
			}

	/*
	| ----------------------------------------------------------------------------------
	| Shopping cart - Fetch Cookie data and display cart items
	| ----------------------------------------------------------------------------------
	*/
	function output_cookie()
	{
		var cookie = $.cookie('cart');
		if ( cookie === undefined ) return;
		cookie = $.parseJSON(cookie);
		
		
		for ( var x in cookie )
		{
			temp = cookie[x].price;
			temp = temp.replace( /^\D+/g, '');
			temp = parseFloat(temp).toFixed(2);
			
			var $new = $('<tr> \
							<td> \
								<a class="entry-thumbnail" href="' + cookie[x].thumbnail + '" data-toggle="lightbox">\
									<img src="' + cookie[x].thumbnail + '" alt="' + cookie[x].title + '" /> \
								</a> \
								<a class="entry-title" id="entry-title-'+x+'" href="' + cookie[x].url + '">' + cookie[x].title + '</a> \
							</td> \
							<td><span class="unit-price">' + cookie[x].price + '</span></td> \
							<td> \
								<div class="qty-btn-group"> \
									<button type="button" class="down"><i class="iconfont-caret-down inline-middle"></i></button> \
									<input name="qty" type="text" value="' + cookie[x].qty + '" /> \
									<button type="button" class="up"><i class="iconfont-caret-up inline-middle"></i></button> \
								</div> \
							</td> \
							<td class="hidden-xs"><strong class="text-bold row-total" id="entry-total-'+x+'"><texteara name="entry-total-'+x+'">¥' + temp + '</texteara></strong></td> \
							<td class="hidden-xs"><button type="button" class="close" aria-hidden="true">×</button></td> \
						</tr>');
			
			$new.appendTo( $('.tbl-cart tbody') );
			$new.find('[data-toggle="lightbox"]').magnificPopup({
				type: 'image'
			});
		}
		
		update_cart_total();
	}
	output_cookie();
	
	
	/*
	| ----------------------------------------------------------------------------------
	| Shopping cart - QTY
	| ----------------------------------------------------------------------------------
	*/
	$('.qty-btn-group button').on('click', function() {
		var $this = $(this),
			$input = $this.siblings('input'),
			val = parseInt($input.val());
		
		val = ( $this.hasClass('up') ) ? ++val : --val;
		if ( isNaN(val) || val < 0 ) val = 0;
		
		$input.val(val);
		
		var $row = $this.closest('tr'),
			unit_price = $row.find('.unit-price').text(),
			row_total = unit_price.replace( /^\D+/g, '') * val;
		
		$row.find('.row-total').text('¥' + row_total.toFixed(2));
		
		update_cart_total();
	});
	
	
	/*
	| ----------------------------------------------------------------------------------
	| Shopping cart - Update Total & Sub Total
	| ----------------------------------------------------------------------------------
	*/
	function update_cart_total()
	{
		var total = 0,
			subtotal = 0;
			
		$('.tbl-cart .row-total').each(function() {
			temp = $(this).text();
			temp = temp.replace( /^\D+/g, '');
			temp = parseFloat(temp);
			
			if ( ! isNaN(temp) )
			{
				total += temp;
			}
		});
			
		$('.tbl-cart .unit-price').each(function() {
			temp = $(this).text();
			temp = temp.replace( /^\D+/g, '');
			temp = parseFloat(temp);
			
			if ( ! isNaN(temp) )
			{
				subtotal += temp;
			}
		});
		
		$('.shopcart-total .cart-subtotal > .pull-right').text('¥' + subtotal.toFixed(2));
		$('.shopcart-total .cart-total > .pull-right').text('¥' + total.toFixed(2));
	}
	
	
	/*
	| ----------------------------------------------------------------------------------
	| Product Single Page - Change Product Preview Image
	| ----------------------------------------------------------------------------------
	*/
	$('.product-preview .thumbs > li > a').on('click', function(e) {
		e.preventDefault();
		var $preview = $('.product-preview .big-image');
		$preview.find('a').attr( 'href', $(this).attr('href') );
		$preview.find('img').attr( 'src', $(this).children().attr('src') );
	});
	
	
	/*
	| ----------------------------------------------------------------------------------
	| Setup Product Grid Layout
	| ----------------------------------------------------------------------------------
	*/
	var $product_layout = $('.products-layout');
	
	function setupProduct() {
		var itemW = 270,
			productW = $product_layout.width();
		
		x = parseInt(productW / itemW);
		var new_itemW = parseInt(productW / x).toString() + 'px';
		if ( x == 1 ) 
		{
			new_itemW = '100%';
		}
		$product_layout.find('.product').each(function() {
			var $this = $(this), added_classes = '';
			
			$this = ( ! $this.parent().hasClass('mix-item') ) ? $this.wrap('<div class="mix-item ' + added_classes + '" />').parent() : $this.parent();
			$this.children().css('visibility', 'visible');
			
			var $lazyLoad = $this.find('.lazyLoad');
			if ( $lazyLoad.length )
			{
				$this.addClass('loading');
			}
			
			$this.css({
				'width': new_itemW
			});
			$this.children().animate({
				opacity: 1,
				visibility: 'visible'
			}, 800, 'easeInQuad');
			
			$lazyLoad.attr( 'src', $lazyLoad.data('src') ).imagesLoaded(function() {
				$lazyLoad.removeAttr('data-src');
				$this.removeClass('loading');
			});
		});
	}
	
	if ( $product_layout.length )
	{
		setupProduct();
		
		$product_layout.imagesLoaded(function() {
			$product_layout.isotope({
				itemSelector: '.mix-item'
			});
		});
		
		$(window).smartresize(function() {
			setupProduct();
		});
	}
	

	$('[data-layout="list"], [data-layout="grid"]').on('click', function(e) {
		e.preventDefault();
		$product_layout.toggleClass('grid').toggleClass('list').isotope('reLayout');
		$(this).closest('ul').find('.active').removeClass('active');
		$(this).addClass('active');
	});
	
	
	/*
	| ----------------------------------------------------------------------------------
	| Isotope Filter - Filter by Category and Brands
	| ----------------------------------------------------------------------------------
	*/
	filterCheckbox( $('#category-list'), 'category' );
	filterCheckbox( $('#brands-list'), 'brand' );
	filterCheckbox( $('#filter-by-color'), 'colors' );
	filterCheckbox( $('#filter-by-size'), 'size' );
	
	function filterCheckbox($container, type)
	{
		$container.find('input[type="checkbox"]').on('change', function() {
			var filters = [];
			$container.find('input[type="checkbox"]:checked').each(function() {
				this_filter = $(this).val();
				if ( filters.indexOf(this_filter) === -1 && this_filter !== undefined )
				{
					filters.push(this_filter);
				}
			});
			
			
			var products = $product_layout.find('.mix-item').filter(function() {
				if ( filters.length == 0 ) return true;
				var $this = $(this),
					filter = $this.find(' > .product').data(type),
					filter_arr;
				
				if ( filter !== undefined )
				{
					filter_arr = filter.split('|');
					for ( var i = 0; i < filter_arr.length; i++ )
					{
						if ( filters.indexOf(filter_arr[i]) !== -1 ) return true;
					}
					return false;
				}
			});
			
			$product_layout.isotope({
				filter: products
			});
		});
	}
	
	
	/*
	| ----------------------------------------------------------------------------------
	| Isotope Filter - Filter by Price
	| ----------------------------------------------------------------------------------
	*/
	function priceSlider(value)
	{
		var products = $product_layout.find('.mix-item').filter(function() {
			var price = $(this).find(' > .product').data('price');
			if ( price === undefined ) return false;
			return ( price >= value[0] && price < value[1] ) ? true : false;
		});
		
		$product_layout.isotope({
			filter: products
		});
	}
	
	
	/*
	| ----------------------------------------------------------------------------------
	| Set input value of filters
	| ----------------------------------------------------------------------------------
	*/
	$('#filter-by-size li > a, #filter-by-color li > a').on('click', function(e) {
		e.preventDefault();
		var $this = $(this);
		$this.toggleClass('active');
		$this.siblings('.filter-checkbox').prop( 'checked', $this.hasClass('active') ).trigger('change');
	});
	
	
	/*
	| ----------------------------------------------------------------------------------
	| Add Helper Classes to Vertical Menu
	| ----------------------------------------------------------------------------------
	*/
	$('.vmenu li').each(function() {
		if ( $(this).find('ul').length )
		{
			$(this).addClass('has-submenu');
		}
	});
	

	/*
	| ----------------------------------------------------------------------------------
	| jQuery Range slider - noUiSlider
	| Git: https://github.com/leongersen/noUiSlider
	| URL: http://refreshless.com/nouislider/
	| ----------------------------------------------------------------------------------
	*/
	$('.range-slider').each(function() {
		var $this = $(this),
			configs = new Array();
		
		configs['min'] = ( $this.data('min') === undefined ) ? 0 : $this.data('min');
		configs['max'] = ( $this.data('max') === undefined ) ? 100 : $this.data('max');
		configs['start'] = ( $this.data('start') === undefined ) ? [configs['min'], configs['max']] : $this.data('start');
		configs['step'] = ( $this.data('step') === undefined ) ? 1 : $this.data('step');
		configs['currency'] = ( $this.data('currency') === undefined ) ? '¥' : $this.data('currency');
		
		$this.noUiSlider({
			range: [configs['min'], configs['max']],
			start: configs['start'],
			step: configs['step'],
			connect: true,
			handles: 2,
			slide: function() {
				var values = $(this).val();
					
				$this.siblings('.range-slider-value').find('> .min').text( configs['currency'] + values[0] );
				$this.siblings('.range-slider-value').find('> .max').text( configs['currency'] + values[1] );
			},
			serialization: {
				to: [ 'min-price', 'max-price' ],
				resolution: 1,
				mark: ","
			},
		}).change(function() { priceSlider( $(this).val() ); });
		
		$this.siblings('.range-slider-value').find('> .min').text( configs['currency'] + $this.val()[0] );
		$this.siblings('.range-slider-value').find('> .max').text( configs['currency'] + $this.val()[1] );
	});

});

//新建xhr，获取数据
var request;
if(window.XMLHttpRequest){
request = new XMLHttpRequest();//IE7+,FireFox,Chrome,Opera,Safari...
}else{
request = new ActiveXobject("Microsoft.XMLHTTP");//IE6,IE5
}
var postData = $('#entry-title-0').html();
    $.ajax({
        type:'post',
        url:"http://localhost/business/order.php",
        dataType:'json',
        //data:{cmd:'coordinates'},
        async:false,
        success:function(data){
            postData = data;
        }
});

// request.open("GET", "http://dev.lanbaoo.com/api/weather/forecast?lat=0&lng=0&city&cityId=CN101270101");
// request.send();
// request.onreadystatechange = function() {
// 	if (request.readyState===4) {
// 		if (request.status===200) { 
// 			var jsonData = JSON.parse(request.responseText);
// 			document.getElementById("top").innerHTML=jsonData.shareTips;
// 			document.getElementById("apparentTmp").innerHTML=jsonData.current.apparentTmp+"°";
// 			document.getElementById("iconUrl").src=jsonData.current.iconUrl;
// 			document.getElementById("condTxt").innerHTML=jsonData.current.condTxt;
// 			document.getElementById("windDir").innerHTML=jsonData.current.windDir;
// 		    document.getElementById("phaseUrl").src=jsonData.forecastDaily[0].phaseUrl;
//             document.getElementById("tideName").innerHTML=jsonData.forecastDaily[0].tideName;
// 			document.getElementById("phaseName").innerHTML=jsonData.forecastDaily[0].phaseName;

//             //根据天数插入日期
//             var  a = document.getElementById("weekend");
// 	        var a_childs = a.childNodes; 
// 	        //alert(childs[0].nodeName); 
// 	        if ( a_childs.length > 0) {
// 	        	for (var i = childs.length - 1; i >= 0 ; i--) {
// 		      	    a.removeChild(childs[i]); 
// 		        };  	    
// 	        };
// 	    	var a_data = jsonData.forecastDaily;
// 		    for (var i = 0; i < a_data.length; i++) {
// 		    	var date = new Date(a_data[i].weatherDate);
// 		    	var month = date.getMonth() + 1;
// 		    	var day = date.getDate();
// 		    	if (month < 10) {month = '0' + month;};
// 		    	if (day < 10) {day = '0' + day;};
// 		        $('div#weekend').append('<ul id='+i+' onclick="show(this)"><li class="triangle-down"></li><li><p>'+a_data[i].weekDay+'</p></li><li><p id="0-weekDay"> '+month+'-'+day+'</p></li><li><p id='+i+'-tmpMax></p></li><li><p id='+i+'-tmpMin></p></li></ul>');
// 		    }
//             $('div#weekend').append('<img src="images/icon_sun_0@2x.png" style="margin-left:4rem;"><P id="sunrise"></P><img width="30rem" src="images/icon_sun_1@2x.png" style="margin-left:6rem;"><p id="sunset"></p>');
	        
// 	        for (var i = 0; i < 7; i++) {
// 			    document.getElementById(i+"-tmpMax").innerHTML=jsonData.forecastDaily[i].tmpMax+"°";
// 			    document.getElementById(i+"-tmpMin").innerHTML=jsonData.forecastDaily[i].tmpMin+"°";
// 		    }
//             //初始化
// 		    var today = jsonData.forecastDaily[0].forecastHourly;

//             //钓鱼指数
//             var fish_index = jsonData.forecastDaily[0].moonPhase;
//             for (var i = 0; i < fish_index; i++) {
//             	$('span#fish_index').append('<img src="images/icon_star_0@2x.png" />');
//             };
//             if (fish_index == 5) {return;}else{
//             	 for (var i = 0; i < 5 - fish_index; i++) {
//             	$('span#fish_index').append('<img src="images/icon_star_1@2x.png" />');
//                 };
//             }
//             //风向判断
// 	        for (var i = 0; i < today.length; i++) {
// 	        	var wind = today[i].windDeg;
// 	        	var Deg;
// 	        	if (wind == 0 || wind == 360) {Deg = "icon_windDir_4@2x";};
// 	        	if (wind > 0 && wind <90) {Deg = "icon_windDir_5@2x";};
// 	        	if (wind == 90) {var Deg = "icon_windDir_6@2x";};
// 	        	if (wind > 90 && wind < 180) {Deg = "icon_windDir_7@2x";};
// 	        	if (wind == 180) {Deg = "icon_windDir_0@2x";};
// 	        	if (wind > 180 && wind < 270) {Deg = "icon_windDir_1@2x";};
// 	        	if (wind == 270) {Deg =="icon_windDir_2@2x";};
// 	        	if (wind > 270 && wind < 360) {Deg = "icon_windDir_3@2x";};

// 	            $('div#list').append('<ul><li><p>'+today[i].gap+'</p></li><li><p>'+today[i].tmp+'°</p><p>'+today[i].hum+'%</p></li><li><img src="images/icon_pressure@2x.png"><p>'+today[i].pres+'</p></li><li><img src="images/icon_rainfall@2x.png"><p>'+today[i].pop+'%</p></li><li><img src="images/windDir/'+Deg+'.png"><p>'+today[i].windDir+'</p></li><li><p>'+today[i].windSpd+'km/h</p><p>'+today[i].windSc+'</p></li></ul>');
// 	        }
//             $("#0").children("li[class='triangle-down']").css('display','inline-block');
// 		    $("#0").css('color','rgb(44,165,244)');
//             document.getElementById("sunrise").innerHTML=Data.forecastDaily[0].sunrise;	
// 		    document.getElementById("sunset").innerHTML=Data.forecastDaily[0].sunset;
// 		} else {
// 			alert("发生错误：" + request.status);
// 		}
// 	}
//  }

// var Data;
//     $.ajax({
//         type:'get',
//         url:"http://dev.lanbaoo.com/api/weather/forecast?lat=0&lng=0&city&cityId=CN101270101",
//         dataType:'json',
//         //data:{cmd:'coordinates'},
//         async:false,
//         success:function(data){
//             Data = data;
//         }
// });

// //click事件
// function show(obj) {
// 	    var ID = obj.id;
// 		for (var i = 0; i < 7; i++) {
// 			$("#"+i).children("li[class='triangle-down']").css('display','none');
// 			$("#"+i).css('color','#000');
// 		};
// 		$("#"+ID).children("li[class='triangle-down']").css('display','inline-block');
// 		$("#"+ID).css('color','rgb(44,165,244)');
// 		document.getElementById("sunrise").innerHTML=Data.forecastDaily[ID].sunrise;	
// 		document.getElementById("sunset").innerHTML=Data.forecastDaily[ID].sunset;
// 		document.getElementById("tideName").innerHTML=Data.forecastDaily[ID].tideName;
// 	    document.getElementById("phaseName").innerHTML=Data.forecastDaily[ID].phaseName;
// 	    document.getElementById("phaseUrl").src=Data.forecastDaily[ID].phaseUrl;
	    
// 	    //刷新钓鱼指数
// 	    var fish = document.getElementById("fish_index");
//         var fish_childs = fish.childNodes;  
//         if ( fish_childs.length > 0) {
//         	for (var i = fish_childs.length - 1; i >= 0 ; i--) {
// 	      	    fish.removeChild(fish_childs[i]); 
// 	        };  	    
//         };
//         var fish_index = Data.forecastDaily[ID].moonPhase;
//         for (var i = 0; i < fish_index; i++) {
//         	$('span#fish_index').append('<img src="images/icon_star_0@2x.png" />');
//         };
//         if (fish_index == 5) {return;}else{
//         	 for (var i = 0; i < 5 - fish_index; i++) {
//         	$('span#fish_index').append('<img src="images/icon_star_1@2x.png" />');
//             };
//         }

// 	    //刷新时间列表
//         var b = document.getElementById("list");
//         var b_childs = b.childNodes; 
//         //alert(childs[0].nodeName); 
//         if ( b_childs.length > 0) {
//         	for (var i = b_childs.length - 1; i >= 0 ; i--) {
// 	      	    b.removeChild(b_childs[i]); 
// 	        };  	    
//         };
//     	 var b_data = Data.forecastDaily[ID].forecastHourly;
// 	     //alert(num.length);
// 	     for (var i = 0; i < b_data.length; i++) {
// 	         $('div#list').append('<ul><li><p>'+b_data[i].gap+'</p></li><li><p>'+b_data[i].tmp+'°</p><p>'+b_data[i].hum+'%</p></li><li><img width="26rem" src="images/icon_pressure@2x.png"><p>'+b_data[i].pres+'</p></li><li><img width="30rem" src="images/icon_rainfall@2x.png"><p>'+b_data[i].pop+'%</p></li><li><img width="26rem" src="images/icon_wind_direction@2x.png"><p>'+b_data[i].windDir+'</p></li><li><p>22km/h</p><p>'+b_data[i].windSpd+'级</p></li></ul>');
// 	     }	    
// }