var PagesUserProfile = function () {

      // var toProperCase = function() {
      //       var words = this.split(' ');
      //       var results = [];
      //       for (var i = 0; i < words.length; i++) {
      //           var letter = words[i].charAt(0).toUpperCase();
      //           results.push(letter + words[i].slice(1));
      //       }
      //       return results.join(' ');

      //   }
 (function($){
  $.fn.toTitleCase = function(){
    return $(this).each(function(){

    var ignore = "and,the,in,with,an,or,at,of,a,to,for".split(",");

    var theTitle = $(this).text();
    var split = theTitle.split(" ");
    for (var x = 0; x < split.length; x++){
      if (x > 0){
        if (ignore.indexOf(split[x].toLowerCase()) < 0){
          split[x] = split[x].replace(/\w\S*/g, function(txt){
            return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
          })
        };
      } else {
        split[x] = split[x].replace(/\w\S*/g, function(txt){
          return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
        })
      }
    }
    title = split.join(" ");
    $(this).text(title);
  });
  };
})(jQuery);






	$('#is_published').bootstrapToggle();
	$('#is_active').bootstrapToggle();
	$('input#email').val('test@test.com');
	$('input#password').val('test@test.com');

	$('input#display_name,input#first_name,input#last_name').blur(function() {
	    	$('input#display_name').val($('input#first_name').val() + " " + $('input#last_name').val());
	});


	var runPulsate = function () {
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
	var runFileInput = function () {
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
			layoutTemplates: { main2: '{preview} {browse} {remove}' },
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
			layoutTemplates: { main2: '{preview} {browse} {remove}' },
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
			layoutTemplates: { main2: '{preview} {browse} {remove}' },
			allowedFileExtensions: ["jpg", "png", "gif"]
		});
	};




















	return {

		init: function () {
			runPulsate();
			runFileInput();
                        	// toProperCase();

		}
	};
}();

