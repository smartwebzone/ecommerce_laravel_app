var FrontUserProfile = function() {



	var runFrontUser = function() {

		$('#is_published').bootstrapToggle();
		$('#is_active').bootstrapToggle();
		$('input#email').val('test@test.com');
		$('input#password').val('test@test.com');

		$('input#display_name,input#first_name,input#last_name').blur(function() {
			$('input#display_name').val($('input#first_name').val() + " " + $('input#last_name').val());
		});

	};
	var runPulsate = function() {
		$('.pulsate').pulsate({
			color: '#C43C35', // set the color of the pulse
			reach: 20, // how far the pulse goes in px
			speed: 1000, // how long one pulse takes in ms
			pause: 0, // how long the pause between pulses is in ms
			glow: true, // if the glow should be shown too
			repeat: 3, // will repeat forever if true, if given a number will repeat for that many times
			onHover: false // if true only pulsate if user hovers over the element
		});
	};
	//function to initiate fileinput
	var runFileInput = function() {
		$("#avatar").fileinput({
			overwriteInitial: true,
			maxFileSize: 2000,
			showClose: false,
			showUpload: false,
			showCaption: false,
			browseLabel: '',
			removeLabel: '',
			browseIcon: '<i class="fa fa-pencil"></i>',
			removeIcon: '<i class="fa fa-times"></i>',
			removeClass: 'btn btn-bricky btn-sm',
			browseClass: 'btn btn-teal btn-sm',
			removeTitle: 'Cancel or reset changes',
			elErrorContainer: '#kv-avatar-errors',
			msgErrorClass: 'alert alert-block alert-danger',
			defaultPreviewContent: '<img src="http://www.placehold.it/160x160/EFEFEF/AAAAAA?text=no+image" alt="Your Avatar" >',
			layoutTemplates: {
				main2: '{preview} {browse} {remove}'
			},
			allowedFileExtensions: ["jpg", "png", "gif"]
		});
		$("#photo").fileinput({
			overwriteInitial: true,
			maxFileSize: 2000,
			showClose: false,
			showUpload: false,
			showCaption: false,
			browseLabel: '',
			removeLabel: '',
			browseIcon: '<i class="fa fa-pencil"></i>',
			removeIcon: '<i class="fa fa-times"></i>',
			removeClass: 'btn btn-bricky btn-sm',
			browseClass: 'btn btn-teal btn-sm',
			removeTitle: 'Cancel or reset changes',
			elErrorContainer: '#kv-avatar-errors',
			msgErrorClass: 'alert alert-block alert-danger',
			defaultPreviewContent: '<img src="http://www.placehold.it/160x160/EFEFEF/AAAAAA?text=no+image" alt="Your Avatar" >',
			layoutTemplates: {
				main2: '{preview} {browse} {remove}'
			},
			allowedFileExtensions: ["jpg", "png", "gif"]
		});

		$("#avatar-2").fileinput({
			overwriteInitial: true,
			maxFileSize: 2000,
			showClose: false,
			showCaption: false,
			removeLabel: 'Remove',
			browseLabel: 'Select',
			removeClass: 'btn btn-light-grey',
			browseClass: 'btn btn-light-grey',
			browseIcon: '',
			removeIcon: '',
			removeTitle: 'Cancel or reset changes',
			elErrorContainer: '#kv-avatar-errors-2',
			msgErrorClass: 'alert alert-block alert-danger',
			defaultPreviewContent: '<img src="http://www.placehold.it/160x160/EFEFEF/AAAAAA?text=no+image" alt="Your Avatar" >',
			layoutTemplates: {
				main2: '{preview} {browse} {remove}'
			},
			allowedFileExtensions: ["jpg", "png", "gif"]
		});
	};

	var runMaskInput = function() {
		$.mask.definitions['~'] = '[+-]';
		$('.input-mask-date').mask('99/99/9999');
		$('.input-mask-phone').mask('(999) 999-9999');
		$('.input-mask-eyescript').mask('~9.99 ~9.99 999');
		$(".input-mask-product").mask("a*-999-a999", {
			placeholder: " ",
			completed: function() {
				alert("You typed the following: " + this.val());
			}
		});
	};



	return {

		init: function() {
			runPulsate();
			runFileInput();
			runFrontUser();
			runMaskInput();
			// toProperCase();

		}
	};
}();
