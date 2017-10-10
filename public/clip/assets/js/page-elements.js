var CreatePage = function () {
    function toggleFields() {
        // if($("#haslink > #has-product-link").val())
        //     $("#ifproductlink").show();
        // else
        //     $("#ifproductlink").hide();
    }
    var newPage = function () {


            CKEDITOR.replace('content', {
                "filebrowserBrowseUrl": "{!! url('filemanager/show') !!}"
            });

            $('#meta_keywords, .tags').tagsInput({
                width: 'auto'
            });

            $("input#title").keyup(function(){
                var Text = $(this).val();
                Text = Text.toLowerCase();
                Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
                $("input#slug").val(Text);
            });

            $("input#fb_title").blur(function() {
                $('input#fb_title').val($('input#fb_title').val() + ' on FaceBook.');
            });
            $("input#gp_title").blur(function() {
                $('input#gp_title').val($('input#gp_title').val() + ' on GooglePlus.');
            });
            $("input#tw_title").blur(function() {
                $('input#tw_title').val($('input#tw_title').val() + ' on Twitter. ');
            });


            $("#image").fileinput({
                showUpload:false,
                'overwriteInitial': true,
                previewClass:'headerpreview',
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
                'layoutTemplates': { 'main2': '{preview} {remove} {browse}' },
                'allowedFileExtensions': ["jpg", "png", "gif"]
            });


    };
    return {
        init: function () {
          newPage();
        }
    };
}();
