var FormElements = function () {
	//function to initiate jquery.inputlimiter
	var runInputLimiter = function () {
		$('.limited').maxlength({
			threshold: 50,
			warningClass: "label label-info",
			limitReachedClass: "label label-warning",
			message: 'used %charsTyped% of %charsTotal% chars.'
		});
	};
	//function to initiate query.autosize
	var runAutosize = function () {
		//$(".autosize").autosize();
		autosize($('.autosize'));
	};
	//function to initiate Select2
	var runSelect2 = function () {
		$(".search-select").select2({
			placeholder: "Select a State",
			allowClear: true
		});
	};
	//function to initiate jquery.maskedinput
	var runMaskInput = function () {
		$.mask.definitions['~'] = '[+-]';
		$('.input-mask-date').mask('99/99/9999');
		$('.input-mask-phone').mask('(999) 999-9999');
		$('.input-mask-eyescript').mask('~9.99 ~9.99 999');
		$(".input-mask-product").mask("a*-999-a999", {
			placeholder: " ",
			completed: function () {
				alert("You typed the following: " + this.val());
			}
		});
	};
	var runMaskMoney = function () {
		$(".currency").maskMoney();
	};
	//function to initiate bootstrap-datepicker
	var runDatePicker = function () {
		$('.date-picker').datepicker({
			autoclose: true,
			container: '#picker-container'
		});
	};
	//function to initiate bootstrap-timepicker
	var runTimePicker = function () {
		$('.time-picker').timepicker();
	};
	//function to initiate daterangepicker
	var runDateRangePicker = function () {
		$('.date-range').daterangepicker();
		$('.date-time-range').daterangepicker({
			timePicker: true,
			timePickerIncrement: 30,
			locale: {
				format: 'MM/DD/YYYY h:mm A'
			}
		});
	};
	//function to initiate bootstrap-colorpicker
	var runColorPicker = function () {
		$('.color-picker').colorpicker({
			format: 'hex'
		});
		$('.color-picker-rgba').colorpicker({
			format: 'rgba'
		});
		$('.colorpicker-component').colorpicker();
	};
	//function to initiate jquery.tagsinput
   var runTagsInput = function () {
		$('#tags_1').tagsInput({
			width: 'auto'
		});
		$('#meta_keywords').tagsInput({
			width: 'auto'
		});
		$('input[name="meta_keywords"]').tagsInput({
			width: 'auto'
		});
	}
	//function to initiate summernote
	var runSummerNote = function () {
		$('.summernote').summernote({
			height: 300,
			tabsize: 2
		});
	};
	//function to initiate ckeditor
	var runCKEditor = function () {
		CKEDITOR.disableAutoInline = true;
		$('textarea.ckeditor').ckeditor();
	};
	//function to initiate fileinput
	var runFileInput = function () {
		$("#input-simple").fileinput();
		$("#input-preview").fileinput();
		var btnCust = '<button type="button" class="btn btn-default" title="Add picture tags" ' +
		'onclick="alert(\'Call your custom code here.\')">' +
		'<i class="glyphicon glyphicon-tag"></i>' +
		'</button>';
		$("#avatar").fileinput({
			overwriteInitial: true,
			maxFileSize: 2000,
			showClose: false,
			showCaption: false,
			browseLabel: '',
			removeLabel: '',
			browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
			removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
			removeTitle: 'Cancel or reset changes',
			elErrorContainer: '#kv-avatar-errors',
			msgErrorClass: 'alert alert-block alert-danger',
			defaultPreviewContent: '<img src="http://www.placehold.it/160x160/EFEFEF/AAAAAA?text=no+image" alt="Your Avatar" >',
			layoutTemplates: { main2: '{preview} {remove} {browse}' },
			allowedFileExtensions: ["jpg", "png", "gif"]
		});

	var runContentCounters = function () {
		var text_max = 160;
		var title_max = 65;
		window.onload = function () {
			$('#count_message').html(text_max + ' characters remaining');
			$('#meta_description').keyup(function() {
				var text_length = $('#meta_description').val().length;
				var text_remaining = text_max - text_length;
				$('#count_message').html(text_remaining + ' characters remaining');
			});
			$('#count_title').html(title_max + ' characters remaining');
			$('#meta_title').keyup(function() {
				var text_length = $('#meta_title').val().length;
				var text_remaining = title_max - text_length;
				$('#count_title').html(text_remaining + ' characters remaining');
			});


			$('#gp_title_message').html(title_max + ' characters remaining');
			$('#gp_title').keyup(function() {
				var text_length = $('#gp_title').val().length;
				var text_remaining =title_max - text_length;
				$('#gp_title_message').html(text_remaining + ' characters remaining');
			});
			$('#fb_title_message').html(title_max + ' characters remaining');
			$('#fb_title').keyup(function() {
				var text_length = $('#fb_title').val().length;
				var text_remaining = title_max - text_length;
				$('#fb_title_message').html(text_remaining + ' characters remaining');
			});

			CKEDITOR.replace('content', {
				"filebrowserBrowseUrl": "{!! url('filemanager/show') !!}"
			});
			CKEDITOR.replace('excerpt', {
				"filebrowserBrowseUrl": "{!! url('filemanager/show') !!}"
			});
		};
	};

	// function toTitleCase(str)
	// {
	//     return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
	// }

	$('input#slug').attr('disabled', 'disabled');

	};

	// var runtoTitleCase = function () {

		String.prototype.toTitleCase = function() {
		  var i, j, str, lowers, uppers;
		  str = this.replace(/([^\W_]+[^\s-]*) */g, function(txt) {
		    return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
		  });

		  // Certain minor words should be left lowercase unless
		  // they are the first or last words in the string
		  lowers = ['A', 'An', 'The', 'And', 'But', 'Or', 'For', 'Nor', 'As', 'At',
		  'By', 'For', 'From', 'In', 'Into', 'Near', 'Of', 'On', 'Onto', 'To', 'With'];
		  for (i = 0, j = lowers.length; i < j; i++)
		    str = str.replace(new RegExp('\\s' + lowers[i] + '\\s', 'g'),
		      function(txt) {
		        return txt.toLowerCase();
		      });

		  // Certain words such as initialisms or acronyms should be left uppercase
		  uppers = ['Id', 'Tv'];
		  for (i = 0, j = uppers.length; i < j; i++)
		    str = str.replace(new RegExp('\\b' + uppers[i] + '\\b', 'g'),
		      uppers[i].toUpperCase());

		  return str;
		};

		function titleCase(str) {
		  return str.split(' ').map(function(val){
		    return val.charAt(0).toUpperCase() + val.substr(1).toLowerCase();
		  }).join(' ');
		}
	// }

	return {
		//main function to initiate template pages
		init: function () {
			runInputLimiter();
			runAutosize();
			runSelect2();
			runMaskInput();
			runMaskMoney();
			runDatePicker();
			runTimePicker();
			runDateRangePicker();
			runColorPicker();
			runTagsInput();
			runSummerNote();
			runCKEditor();
			runFileInput();
			runContentCounters();
			// runtoTitleCase();
		}
	};
}();
