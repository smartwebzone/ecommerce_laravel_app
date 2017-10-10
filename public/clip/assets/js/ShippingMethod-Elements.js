var ShippingMethodsElements = function () {


    var runBoxRepeater = function () {
        jQuery('.ups_boxes .insert').click(function () {
            var $tbody = jQuery('.ups_boxes').find('tbody');
            var size = $tbody.find('tr').size();
            var code = '<tr class="new">\
                <td class="check-column"><input type="checkbox" /></td>\
                <td><input type="text" size="5" name="boxes_outer_length[' + size + ']" /></td>\
                <td><input type="text" size="5" name="boxes_outer_width[' + size + ']" /></td>\
                <td><input type="text" size="5" name="boxes_outer_height[' + size + ']" /></td>\
                <td><input type="text" size="5" name="boxes_inner_length[' + size + ']" /></td>\
                <td><input type="text" size="5" name="boxes_inner_width[' + size + ']" /></td>\
                <td><input type="text" size="5" name="boxes_inner_height[' + size + ']" /></td>\
                <td><input type="text" size="5" name="boxes_box_weight[' + size + ']" /></td>\
                <td><input type="text" size="5" name="boxes_max_weight[' + size + ']" /></td>\
            </tr>';
            $tbody.append(code);
            return false;
        });
    };

    //var run = function() {};


    return {
        //main function to initiate template pages
        init: function () {
            runBoxRepeater();
        }
    };
}();
