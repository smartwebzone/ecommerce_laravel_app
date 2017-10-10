var CreateFaq = function () {
    function toggleFields() {
        // if($("#haslink > #has-product-link").val())
        //     $("#ifproductlink").show();
        // else
        //     $("#ifproductlink").hide();
    }
    var newFaq = function () {

        $('#productlinknofollow').bootstrapToggle({
          on: 'Enabled Follow',
          off: 'Disabled'
        });
        $('#toggle-event').change(function() {
          $('#console-event').html('Toggle: ' + $(this).val())
        })
    };
    return {
        init: function () {
          //   newFaq();
        }
    };
}();

