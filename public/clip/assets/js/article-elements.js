var CreateArticle = function () {

    var newArticle = function () {

        // CKEDITOR.config.extraPlugins = 'htmlbuttons';
        // CKEDITOR.config.extraPlugins = 'menubutton';
        // CKEDITOR.config.extraPlugins = 'button';
        // CKEDITOR.config.extraPlugins = 'menu';
        // CKEDITOR.config.extraPlugins = 'autogrow';
        // CKEDITOR.config.extraPlugins = 'loremipsum';

        for (var i in CKEDITOR.instances) {
            CKEDITOR.instances[i].on('content', function() { CKEDITOR.instances[i].updateElement() });
        }
        CKEDITOR.replace('content', {
            "filebrowserBrowseUrl": "/filemanager/show",
            extraPlugins: 'autogrow',
            autoGrow_minHeight: 400,
            autoGrow_maxHeight: 1200,
            autoGrow_bottomSpace: 50,
            removePlugins: 'resize'
        });
        // CKEDITOR.config.extraAllowedContent = {
        //     'div span p a em strong ': {
        //         attributes: ['itemscope', 'itemtype', 'itemprop'],
        //     },
        //     'time': {
        //         attributes: ['itemprop', 'datetime']
        //     }
        //
        // }
        // CKEDITOR.config.height = 500;
        // CKEDITOR.config.width = 'auto';
        // CKEDITOR.config.allowedContent = true;



        $('#meta_keywords, .tags').tagsInput({
            removeWithBackspace: true,
            width: 'auto',
            placeholderColor: 'red'

        });

        $("input#title").keyup(function () {
            var Text = $(this).val();
            Text = Text.toLowerCase();
            Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');
            $("input#slug").val(Text);
        });


        $("input#fb_title").blur(function () {
            $('input#fb_title').val($('input#fb_title').val() + ' on FaceBook.');
        });
        $("input#gp_title").blur(function () {
            $('input#gp_title').val($('input#gp_title').val() + ' on GooglePlus.');
        });
        $("input#tw_title").blur(function () {
            $('input#tw_title').val($('input#tw_title').val() + ' on Twitter. ');
        });


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

            }
        };

        // $('jqueryselector').val($(this).val().toLowerCase());
        // $('jqueryselector').val($(this).val().toUpperCase());
        // $('jqueryselector').addClass('capitalise');


        $("#image").fileinput({
            showUpload: false,
            'overwriteInitial': true,
            previewClass: 'headerpreview',
            'maxFileSize': 2000,
            'showClose': false,
            'showCaption': false,
            'browseLabel': '',
            'removeLabel': '',
            'browseIcon': '<i class="glyphicon glyphicon-folder-open"></i>',
            'removeIcon': '<i class="glyphicon glyphicon-remove"></i>',
            'removeTitle': 'Cancel or reset changes',
            'elErrorContainer': '#kv-avatar-errors',
            'msgErrorClass': 'alert alert-block alert-danger',
            'defaultPreviewContent': '<img src="http://www.placehold.it/350x350/EFEFEF/AAAAAA?text=no+image" alt="Your Avatar" >',
            'layoutTemplates': {'main2': '{preview} {remove} {browse}'},
            'allowedFileExtensions': ["jpg", "png", "gif"]
        });


    };
    return {
        init: function () {
            newArticle();
         //   runContentCounters();
        }
    };
}();
