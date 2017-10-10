 (function($) {
	 $('.display-img').click(function() {
		 var current = $('.product .images .main img').attr('src');
		 $('.product .images .main img').attr('src', $(this).attr('src'));
		 $(this).attr('src', current);
	 });
    	// $('.cart').click(function(e) {
	    //       	$('.cart .dropdown-toggle').toggleClass('fa-shopping-cart');
	    //       	$('.cart .dropdown-toggle').toggleClass('fa-times');
    	// });
	 $('.section').mouseover(function(){
    		$(this).children('.categories').show();
    	});
	$('.section').mouseleave(function(){
    		$(this).children('.categories').hide();
    	});
	 $(".clickable").click(function() {
		 window.document.location = $(this).data("href");
	 });

	 /**
	  * todo: impement add to cart functionality
	  * @summary Phillip started this but is handing off to joel
	  */
	 // $('#plus-qty').click(function() {
		//  $('.quantity').val(Number($('.quantity').val()) + 1);
	 // });
	 // $('#minus-qty').click(function() {
		//  if (Number($('.quantity').val()) != 1) {
		// 	 $('.quantity').val(Number($('.quantity').val()) - 1);
		//  };
	 // });
	// $('#plus-qty').click(function(){
	//     	$('.qty').val(Number($('.qty').val())+1);
	//     });

	//     $('#minus-qty').click(function(){
	//     	if (Number($('.qty').val()) != 1) {
	//     		$('.qty').val(Number($('.qty').val())-1);
	//     	};
	//     });
	 $('.plus-cart-qty').click(function() {
		 $(this).prevAll('.qty').val(Number($(this).prevAll('.qty').val()) + 1);
		 var target = '.mycart .product-' + $(this).parent().parent().attr('prod-id') + ' .save';
		 $(target).show();
	 });
	 $('.minus-cart-qty').click(function() {
		 if (Number($(this).prevAll('.qty').val()) != 1) {
			 $(this).prevAll('.qty').val(Number($(this).prevAll('.qty').val()) - 1);
			 var target = '.mycart .product-' + $(this).parent().parent().attr('prod-id') + ' .save';
			 $(target).show();
		 };
	 });

	$('.save').click(function(){
		var target = '.mycart .product-' + $(this).parent().parent().attr('prod-id') + ' .qty';
		var oldqty = Number($(this).parent().parent().attr('qty'));
		var newqty = Number($(target).val());
		$(target).val(newqty-oldqty);
		$(this).parent().parent().find('form').submit();
	});
		    $('#myTabs a').click(function (e) {
  			e.preventDefault()
  			$(this).tab('show')
		});
		    $(".clickable-row , .clickable").click(function() {
        window.document.location = $(this).data("href");
    });

    $('#refresh').click(function(){
    	location.reload();
    });

 });