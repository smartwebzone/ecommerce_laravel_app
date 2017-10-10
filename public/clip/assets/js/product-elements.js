var ProductElements = function () {


    var runProductMain = function () {

        // $("input#name").blur(function () {
        //   $('input#name').val($('input#name').val());
        // });

        $("input#facebook_title").blur(function () {
            $('input#facebook_title').val($('input#facebook_title').val() + ' on FaceBook.');
        });
        $("input#google_plus_title").blur(function () {
            $('input#google_plus_title').val($('input#google_plus_title').val() + ' on GooglePlus.');
        });
        $("input#twitter_title").blur(function () {
            $('input#twitter_title').val($('input#twitter_title').val() + ' on Twitter. ');
        });

        // $('input#slug').attr('disabled', 'disabled');
        $('#categories').multiselect();

        // $('.sidebar #products').addClass('active-section');

    };

    var runSlugIt = function () {
        $("input#name").keyup(function () {
            var Text = $(this).val();
            Text = Text.toLowerCase();
            Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');
            $("input#slug").val(Text);
        });
    };

    var runAdditionalAlbumImages = function () {

        var size = 0;
        $('#add_album_image').click(function () {
            size++;
            $('.additional').append('<div class="row "><div class="form-group"><div class="col-md-8"><label for="album">Additional Photos:</label>' +
                '<input type="file" id="album" name="album[]" class="file form-control input-preview"> </div></div></div>');
            $(".input-preview").fileinput();
        });
    };

    var runProductOptions = function () {

        var options_counter = $('.option').length - 1;
        var value_counter = $('.option-value').length - 1;

        $('#add_product_option').click(function () {
            options_counter++;
            $('.options-group').append('<div class="option op-index form-group col-md-3" op-index="' + options_counter + '" style="margin-bottom:15px">' +
                
                '<a href="javasctipt:void(0)">  <i class="fa fa-arrow-left" onclick="left($(this))"></i></a>'+
                    '<a href="javasctipt:void(0)"><i class="fa fa-arrow-right" onclick="right($(this))"></i></a>'+
                    '<div class="input-group">' +
                    '<input type="hidden" value="'+options_counter+'" class="order" name="options['+options_counter+'][order]">'+
                '<span class="input-group-addon" id="sizing-addon2">Option</span>' +
                '<input type="text" class="form-control" name="options[' + options_counter + '][name]">' +
                '<span class="input-group-btn">' +
                '<button type="button" class="btn btn-danger remove-option" aria-label="Delete">' +
                '<i class="fa fa-trash-o " aria-hidden="true"></i>' +
                '</button>' +
                '<button type="button" id="add_product_value" class="btn btn-primary">' +
                '<i class="fa fa-plus-square" aria-hidden="true"></i>' +
                '</button>' +
                '</span>' +
                '</div>' +
                '<div id="values"></div>' +
                '</div>');
        });

        $(document).on("click", ".remove-option", function () {
            $(this).parent().parent().parent('.option').remove();
        });

        $(document).on("click", "#add_product_value", function () {
            $(this).parent().parent().parent('.op-index').find('#values')
                .append('<div class="col-md-10 col-md-offset-2 option-value">' +
                    '<div><a href="javasctipt:void(0)">  <i class="fa fa-arrow-up" onclick="up($(this))"></i></a>'+
                    '<a href="javasctipt:void(0)"><i class="fa fa-arrow-down" onclick="down($(this))"></i></a></div>'+
                    '<div class="input-group">'+
                    '<input type="hidden" value="'+value_counter+'" class="order" name="options['+options_counter+'][values][order][]">'+
                    '<span class="input-group-addon" id="sizing-addon2"><i class="fa fa-arrow-right fa-lg" aria-hidden="true"></i></span>' +
                    '<input type="text" class="form-control" name="options[' + $(this).parent().parent().parent('.op-index').attr('op-index') + '][values][name][]">' +
                    '<span class="input-group-btn">' +
                    '<button type="button" class="btn btn-danger remove-value" aria-label="Delete"><i class="fa fa-times fa-lg"></i></button>' +
                    '</span></div></div>');
            value_counter++;
        });
        $(document).on("click", ".remove-value", function () {
            $(this).parents('.option-value').remove();
        });

    };


    var runMeta = function () {
        $('#meta_keywords, .tags').tagsInput({
            width: 'auto'
        });

        $('head').append('<meta itemprop="availability" content="http://schema.org/InStock">');
        $('head').append('<meta itemprop="priceCurrency" content="USD">');

        //  $('head').append('<link rel="publisher" href="https://plus.google.com/+Handquiltingframes">');

    };

    var runProductFileInput = function () {

        $("#thumbnail").fileinput({
            overwriteInitial: true,
            maxFileSize: 2000,
            showClose: false,
            showUpload: false,
            showCaption: false,
            browseLabel: '',
            removeLabel: '',
            browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
            removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
            removeTitle: 'Cancel or reset changes',
            elErrorContainer: '#kv-avatar-errors',
            msgErrorClass: 'alert alert-block alert-danger',
            defaultPreviewContent: '<img src="http://www.placehold.it/160x160/EFEFEF/AAAAAA?text=no+image" alt="Your Avatar" >',
            layoutTemplates: {main2: '{preview} {remove} {browse}'},
            allowedFileExtensions: ["jpg", "png", "gif"]
        });

    };

    var runProductFeatures = function () {

        var MaxInputs = 50;
        var FeatureInputsWrapper = $("#FeatureInputsWrapper");
        var AddButton = $("#AddMoreFeatureBox");
        var x = FeatureInputsWrapper.length;
        var FieldCount = 1;
        var $tbody = jQuery('#features-table').find('tbody');
        var size = $tbody.find('tr').size();

        $(AddButton).click(function (e) {
            if (x <= MaxInputs) {
                FieldCount++;
                $(FeatureInputsWrapper).append('<tr>' +
                    '<td><input type="text" name="feature_name[]" value="" class="form-control"></td>' +
                    '<td><input type="checkbox" name="feature_useicon[]" checked  value="1"/></td>' +
                    '<td><input type="text" name="feature_icon[]" value="icon-caret-right" class="form-control"></td>' +
                    '<td><a href="javascript:void(0)" class="delete removeclass" data-toggle="modal" data-target="#modal-basic"><i class="fa fa-fw fa-times text-danger"></i>' +
                    '</a></td>' +
                    '</tr>');
                x++;
            }
            return false;
        });


    };


    var runProductIncludeds = function () {

        var MaxInputs = 50;
        var IncludedInputsWrapper = $("#IncludedInputsWrapper");
        var AddButton = $("#AddMoreIncludedBox");
        var x = IncludedInputsWrapper.length;
        var FieldCount = 1;
        var $tbody = jQuery('#features-table').find('tbody');
        var size = $tbody.find('tr').size();

        $(AddButton).click(function (e) {
            if (x <= MaxInputs) {
                FieldCount++;
                $(IncludedInputsWrapper).append('<tr>' +
                    '<td class="col-md-6"><input type="text" name="included_name[]" value="" class="form-control"></td>' +
                    '<td class="col-md-1"><a href="javascript:void(0)" class="delete removeclass" data-toggle="modal" data-target="#modal-basic"><i class="fa fa-fw fa-times text-danger"></i>' +
                    '</a></td>' +
                    '</tr>');
                x++;
            }
            return false;
        });


    };


    var runProductRequirements = function() {

        var MaxInputs = 50;
        var RequirementInputsWrapper = $("#RequirementInputsWrapper");
        var AddButton = $("#AddMoreRequirementBox");
        var x = RequirementInputsWrapper.length;
        var FieldCount = 1;
        var $tbody = jQuery('#requirements-table').find('tbody');
        var size = $tbody.find('tr').size();

        $(AddButton).click(function (e) {
            if (x <= MaxInputs) {
                FieldCount++;
                $(RequirementInputsWrapper).append('<tr>' +
                    '<td><input type="text" name="requirement[]" value="" class="form-control"></td>' +
                    '<td><input type="text" name="requirement_value[]" value="" class="form-control"></td>' +
                    '<td><a href="javascript:void(0)" class="delete removeclass" data-toggle="modal" data-target="#modal-basic"><i class="fa fa-fw fa-times text-danger"></i>' +
                    '</a></td>' +
                    '</tr>');
                x++;
            }
            return false;
        });


    };


    var runProductVariants = function () {

        var MaxInputs = 50; //maximum input boxes allowed
        var InputsWrapper = $("#InputsWrapper"); //Input boxes wrapper ID
        var AddButton = $("#AddMoreFileBox"); //Add button ID

        var attname = "Name of Table Attribute";
        var attvalue = Math.random().toString(36).replace(/[^a-z]+/g, '').substr(0, 5);

        var x = InputsWrapper.length; //initlal text box count
        var FieldCount = 1; //to keep track of text box added
        var $tbody = jQuery('#productVariants').find('tbody');
        var size = $tbody.find('tr').size();


        $(AddButton).click(function (e)  //on add input button click
        {
            if (x <= MaxInputs) //max input box allowed
            {
                FieldCount++; //text box added increment
                //add input box
                //' + attname + FieldCount + '
                //' + attvalue + '
                $(InputsWrapper).append('<tr><td><a href="javasctipt:void(0)">  <i class="fa fa-arrow-up" onclick="upv($(this))"></i></a><a href="javasctipt:void(0)"><i class="fa fa-arrow-down" onclick="downv($(this))"></i></a> </td><td><input type="text" id="attribute_name" name="attribute_name[]" value="" class="form-control"></td><td><input type="text" name="product_attribute_value[]" id="attribute_value" value="" class="form-control"></td><td><a href="javascript:void(0)" class="delete removeclass" data-toggle="modal" data-target="#modal-basic"><i class="fa fa-times fa-2x text-danger"></i></a></td></tr>');
                x++; //text box increment
            }
            return false;
        });

    };

    var runContentCounters = function () {
        var text_max = 160;
        var title_max = 65;
        window.onload = function () {
            $('#count_message').html(text_max + ' characters remaining');
            $('#meta_description').keyup(function () {
                var text_length = $('#meta_description').val().length;
                var text_remaining = text_max - text_length;
                $('#count_message').html(text_remaining + ' characters remaining');
            });
            $('#count_title').html(title_max + ' characters remaining');
            $('#meta_title').keyup(function () {
                var text_length = $('#meta_title').val().length;
                var text_remaining = title_max - text_length;
                $('#metaTitle').toTitleCase();
                $('#count_title').html(text_remaining + ' characters remaining');
            });


            $('#gp_title_message').html(title_max + ' characters remaining');
            $('#gp_title').keyup(function () {
                var text_length = $('#gp_title').val().length;
                var text_remaining = title_max - text_length;
                $('#gp_title').toTitleCase();
                $('#gp_title_message').html(text_remaining + ' characters remaining');
            });
            $('#fb_title_message').html(title_max + ' characters remaining');
            $('#fb_title').keyup(function () {
                var text_length = $('#fb_title').val().length;
                var text_remaining = title_max - text_length;
                $('#fb_title').toTitleCase();
                $('#fb_title_message').html(text_remaining + ' characters remaining');
            });


        };
    };


    var runAlerts = function () {
        //  $("select#alerttype").chained("select#alertstyle");
        //  $("select#alerticon").chained("select#alerttype, select#alertstyle");

        $('.repeat').each(function () {
            $(this).repeatable_fields({
                wrapper: '.wrapper',
                container: '.alert-container',
                row: '.row',
                add: '.add',
                remove: '.remove',
                move: '.move',
                template: '.template',
                is_sortable: true,
                before_add: null,
                // after_add: bindEvents(),
                before_remove: null,
                after_remove: null,
                sortable_options: null,
                row_count_placeholder: '({alert-row-count})',
            });

            // $("table-alert" + row_count + " select#alerttype").chained("select#alertstyle");
            // $(this).find($("table-alert" + row_count + " select#alerticon").chained("select#alerttype, select#alertstyle"));
        });

      //  $("table-alert" + row_count + " select#alerttype").chained("select#alertstyle");
      //   jQuery(document).on('keypress', 'select#alerttype, select#alertstyle, select#alerticon', function(){
      //       jQuery(this).change();
      //   });
    };


    var runRepeatingVideos = function () {


        $('.repeat-video').each(function () {
            $(this).repeatable_fields({
                wrapper: '.video-wrapper',
                container: '.video-container',
                row: '.video-row',
                add: '.add-video',
                remove: '.remove-video',
                move: '.move-video',
                template: '.template',
                is_sortable: true,
                before_add: null,
                // after_add: bindEvents(),
                before_remove: null,
                after_remove: null,
                sortable_options: null,
                row_count_placeholder: '({video-row-count})',
            });
        });



    };


    return {

        init: function () {
            runProductMain();
            runProductOptions();
            runAdditionalAlbumImages();
            runProductFeatures();
            runProductIncludeds();
            runProductRequirements();
            runProductVariants();
            runRepeatingVideos();
            runAlerts();
            runSlugIt();
            runMeta();
            runProductFileInput();
        }
    };
}();
