/*
 * Copyright (c) 2016.  Created by Phillip Madsen
 */

var ShippingMethodsElements = function () {


    var runBoxRepeater = function () {

        jQuery('.ups_boxes .insert').click(function () {
            var $tbody = jQuery('.ups_boxes').find('tbody');
            var size = $tbody.find('tr').size();
            var code = '<tr class="new">\
                <td class="check-column"><input type="checkbox" /></td>\
                <td><input type="text" size="5" name="outer_length[' + size + ']" /></td>\
                <td><input type="text" size="5" name="outer_width[' + size + ']" /></td>\
                <td><input type="text" size="5" name="outer_height[' + size + ']" /></td>\
                <td><input type="text" size="5" name="inner_length[' + size + ']" /></td>\
                <td><input type="text" size="5" name="inner_width[' + size + ']" /></td>\
                <td><input type="text" size="5" name="inner_height[' + size + ']" /></td>\
                <td><input type="text" size="5" name="box_weight[' + size + ']" /></td>\
                <td><input type="text" size="5" name="max_weight[' + size + ']" /></td>\
            </tr>';
            $tbody.append(code);
            return false;
        });

    };

var runPackingMethod = function() {

        $("select#packing_method").on('change', function() {
            if ($(this).val() === 'per_item') {
                $('#ups_packaging, .ups_boxes').parents('tr').hide();
            }
            if ($(this).val() === 'box_packing') {
                $('#ups_packaging, .ups_boxes').parents('tr').show();
            }
        });
        $(ups_enabled).change();
    }

    //var run = function() {};


    return {
        //main function to initiate template pages
        init: function () {
            runBoxRepeater();
            runPackingMethod();
        }
    };
}();
