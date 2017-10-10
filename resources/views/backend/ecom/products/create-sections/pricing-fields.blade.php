<script type='text/javascript'>
    @if(isset($product) && $product->prices->count()>0)
        var price_cnt={{$product->prices->count()+1}};
    @else
        var price_cnt=1;    
    @endif
    function addRowPackage($this,counter) {
            var row = $("<table class='table table-striped table-hover table-bordered product-tabl'>" +
                    "<tr class='spacer invis'>" +
                    "<td colspan='5'>" +
                    "<a href='javasctipt:void(0);' onclick='$(this).closest(\".product-tabl\").remove();' class='close' style='color:red'>&times;</a>" +
                    "</td>" +
                    "</tr>" +
                    "<tr>" +
                    "<td><input type='text' placeholder='Title' class='text-center form-control' name='prices[packages]["+counter+"][title][]' /></td>" +
                    "<td><input type='text' placeholder='Weight' class='text-center form-control' name='prices[packages]["+counter+"][weight][]' value='' /></td>" +
                    "<td><input type='text' placeholder='Length' class='text-center form-control' name='prices[packages]["+counter+"][length][]' /></td>" +
                    "<td><input type='text' placeholder='Width' class='text-center form-control' name='prices[packages]["+counter+"][width][]' /></td>" +
                    "<td><input type='text' placeholder='Height' class='text-center form-control' name='prices[packages]["+counter+"][height][]' value='' /></td>" +
                    "</tr>" +
                    "</tr>");
            $this.parents("table#product-packaging-table").find(".packaging-body").append(row);
        }
    $(window).load(function () {

        $("#addRow").click(function () {
            //            var row = $("<tr>" +
            //                    "<td><input type='text' class='text-center form-control  currency ' name='prices[][price]' data-affixes-stay='false' data-prefix='$ ' data-thousands=',' data-decimal='.' /></td>" +
            //                    "<td><input type='text' class='text-center form-control' name='prices[][quantity]' /></td>" +
            //                    "<td><input type='text' class='text-center form-control' name='prices[][model]' /></td>" +
            //                    "<td><input type='text' class='text-center form-control' name='prices[][sku]' /></td>" +
            //                    "<td><input type='text' class='text-center form-control' name='prices[][upc]' value='636343' /></td>" +
            //                    "</tr><tr><td colspan="5"><input type="text" class="form-control" name="prices[][details]" placeholder="Details:" /></td></tr>");
            var counter = 0;
            var row = $("<table class='table table-striped table-hover table-bordered product-tabl'>" +
                    "<tr class='spacer invis'>" +
                    "<td colspan='7'>" +
                    "<a href='javascript:void(0);' onclick='$(this).closest(\".product-tabl\").remove();' class='close' style='color:red'>&times;</a>" +
                    "</td>" +
                    "</tr>" +
                    "<tr>" +
                    "<td><input type='text' class='text-center form-control' name='prices[model]["+price_cnt+"]' /></td>" +
                    "<td><input type='text' class='text-center form-control' name='prices[price]["+price_cnt+"]' placeholder='0.00' data-affixes-stay='false' data-prefix='$ ' data-thousands=',' data-decimal='.' /></td>" +
                    "<td><input type='text' class='text-center form-control' name='prices[sale_price]["+price_cnt+"]' placeholder='0.00' data-affixes-stay='false' data-prefix='$ ' data-thousands=',' data-decimal='.' /></td>" +
                    "<td><input type='text' class='text-center form-control' name='prices[quantity]["+price_cnt+"]' /></td>" +
                    "<td><input type='text' class='text-center form-control' name='prices[sku]["+price_cnt+"]' /></td>" +
                    "<td><input type='text' class='text-center form-control' name='prices[upc]["+price_cnt+"]' value='636343' /></td>" +
                    "<td>" +
                    "<select class='form-control' name='prices[availability]["+price_cnt+"]'>" +
                    "<option value='' selected='selected'></option>" +
                    "<option value='Available'>Available</option>" +
                    "<option value='InStock'>InStock</option>" +
                    "<option value='OnHold'>OnHold</option>" +
                    "<option value='OnBackorder'>OnBackorder</option>" +
                    "<option value='PreOrders'>PreOrders</option>" +
                    "<option value='PromoActive'>PromoActive</option>" +
                    "<option value='SoldOut'>SoldOut</option>" +
                    "<option value='Discontinued'>Discontinued</option>" +
                    "<option value='Out of stock'>Out of stock</option>" +
                    "</select>" +
                    "</td>" +
                    "</tr>" +
                    '<tr class="alt"><td colspan="2"><input type="text" class="form-control" name="prices[title]['+price_cnt+']" placeholder="Title" /></td>' +
                    '<td colspan="5"><input type="text" class="form-control" name="prices[details]['+price_cnt+']" /></td>' +
                    "</tr>" +
                    ' <tr class="alt">'+
                    '<td colspan="7">'+
                    '<table class="table table-striped table-hover table-bordered" id="product-tier-table">'+
                    '<thead><tr>'+
            @if($tier->count()>0)
            @foreach($tier as $tr)
            '<th>{{$tr->title}} :</th>'+
            @endforeach
            @endif
       '</tr>    </thead><tbody>'+
        @if($tier->count()>0)
        '<tr>'+
            @foreach($tier as $tr)
            
            '<td class="tier-body">'+
              '<input type="text" placeholder="Price" class="text-center form-control" name="prices[tier]['+price_cnt+'][price][]" value="" />'+
                '<input type="hidden" name="prices[tier]['+price_cnt+'][id][]" value="{{$tr->id}}"/>'+
            '</td>'+
            @endforeach
       ' </tr>'+
       
        @endif
    '</tbody></table>'+
                    "</td>" +
                    "</tr>" +
                    '<tr class="alt"><td colspan="7"><table class="table table-striped table-hover table-bordered" id="product-packaging-table">' +
                    '<thead><tr>' +
                    '<th style="width:21%">Title :</th>' +
                    '<th style="width:19%">Weight:</th>' +
                    '<th  style="width:20%">Length:</th>' +
                    '<th style="width:20%">Width:</th>' +
                    '<th>Height:</th>' +
                    '</tr></thead>' +
                    '<tbody><tr class="alt">' +
                    '<td colspan="5" class="packaging-body">' +
                    "<table class='table table-striped table-hover table-bordered product-tabl'>" +
                    "<tr>" +
                    "<td><input type='text' placeholder='Title' class='text-center form-control' name='prices[packages]["+price_cnt+"][title][]' /></td>" +
                    "<td><input type='text' placeholder='Weight' class='text-center form-control' name='prices[packages]["+price_cnt+"][weight][]' value='' /></td>" +
                    "<td><input type='text' placeholder='Length' class='text-center form-control' name='prices[packages]["+price_cnt+"][length][]' /></td>" +
                    "<td><input type='text' placeholder='Width' class='text-center form-control' name='prices[packages]["+price_cnt+"][width][]' /></td>" +
                    "<td><input type='text' placeholder='Height' class='text-center form-control' name='prices[packages]["+price_cnt+"][height][]' value='' /></td>" +
                    "</tr></table>" +
                    '</td>' +
                    '</tr>' +
                    '<tr><td  colspan="5">' +
                    '<button type="button" class="addRowPackage btn default pull-right" onclick="addRowPackage($(this),'+price_cnt+')">' +
                    'Add New Shipping Size <i class="icon-plus"></i>' +
                    '</button></td></tr></tbody>' +
                    '</table><td></tr>');
            $("table#product-pricing-table tbody .pricing-body").append(row);
            $('table#product-pricing-table input.currency').maskMoney();
            price_cnt++;
        });
    });
    $(function () {
        $('table#product-pricing-table input.currency').maskMoney();

    })
</script>
<div class="row">
    <div class="col-md-12">
        <div class="adv-table editable-table ">
            <div class="clearfix">
                <div class="space15"></div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered" id="product-pricing-table">
                        <thead>
                            <tr>
                                <th>Model:</th>
                                <th>Price:</th>
                                <th>Sale Price:</th>
                                <th>Quantity:</th>
                                <th>SKU:</th>
                                <th>UPC:</th>
                                <th>Availability</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($product) && $product->prices->count()>0)
                            <tr>
                                <td colspan="7" class="pricing-body">
                                    @foreach($product->prices as $i=>$price)

                                    <table class="table table-striped table-hover table-bordered product-tabl">
                                        <tr class="spacer invis">
                                            <td colspan="7">
                                                <a href="javascript:void(0);" onclick="$(this).closest('.product-tabl').remove();" class="close" style="color:red">&times;</a>
                                            </td>
                                        </tr>
                                        <tr class="alt">

                                            <td><input type="hidden" name="prices[id][{{$i}}]" value="{{$price->id}}"/><input type="text" class="text-center form-control" name="prices[model][{{$i}}]" value="{!! $price->model !!}" /></td>
                                            <td><input type="text" class="text-center form-control currency" name="prices[price][{{$i}}]" value="{!! $price->price !!}" data-affixes-stay="false" data-prefix="$ " data-thousands="," data-decimal="." /> </td>
                                            <td><input type="text" class="text-center form-control currency" name="prices[sale_price][{{$i}}]" value="{!! ($price->sale_price)?$price->sale_price:0 !!}" data-affixes-stay="false" data-prefix="$ " data-thousands="," data-decimal="." /> </td>
                                            <td><input type="text" class="text-center form-control" name="prices[quantity][{{$i}}]" maxlength="4" value="{!! $price->quantity !!}" /></td>
                                            <td><input type="text" class="text-center form-control" name="prices[sku][{{$i}}]" value="{!! $price->sku !!}" /></td>
                                            <td><input type="text" class="text-center form-control" name="prices[upc][{{$i}}]" maxlength="12" value="{!! $price->upc !!}" /></td>
                                            <td>{!! Form::select('prices[availability]['.$i.']', ['' => '', 'Available' => 'Available', 'InStock' => 'InStock',  'OnHold' => 'OnHold', 'OnBackorder' => 'OnBackorder', 'PreOrders' => 'PreOrders', 'PromoActive' => 'PromoActive', 'SoldOut' => 'SoldOut', 'Discontinued' => 'Discontinued', 'Out of stock' => 'Out of stock'], $price->availability, ['class' => 'form-control']) !!} </td>
                                        </tr>
                                        <tr class="alt">
                                            <td colspan="2"><input type="text" class="form-control" name="prices[title][{{$i}}]" value="{!! $price->title !!}" placeholder="Title" /></td>
                                            <td colspan="5"><input type="text" class="form-control" name="prices[details][{{$i}}]" value="{!! $price->details !!}" /></td>
                                        </tr>
                                        <tr class="alt">
                                            <td colspan="7">
                                                @include('backend.ecom.products.partials.pricetier')
                                            </td>
                                        </tr>
                                        <tr class="alt">
                                            <td colspan="7">
                                                @include('backend.ecom.products.partials.pricepackage')
                                            </td>
                                        </tr>
                                    </table>


                                    @endforeach
                                </td>
                            </tr>
                            @else
                            <?php $i=0;?>
                            <tr>
                                <td colspan="7" class="pricing-body">
                                    <table class="table table-striped table-hover table-bordered product-tabl">
                                        <tr class="alt">
                                            <td><input type="text" class="text-center form-control" name="prices[model][{{$i}}]" value="" /></td>
                                            <td><input type="text" class="text-center form-control currency" name="prices[price][{{$i}}]" placeholder="$0.00" data-affixes-stay="false" data-prefix="$ " data-thousands="," data-decimal="." /></td>
                                            <td><input type="text" class="text-center form-control currency" name="prices[sale_price][{{$i}}]" placeholder="$0.00" data-affixes-stay="false" data-prefix="$ " data-thousands="," data-decimal="." /></td>
                                            <td><input type="text" class="text-center form-control" name="prices[quantity][{{$i}}]" maxlength="4" /></td>
                                            <td><input type="text" class="text-center form-control" name="prices[sku][{{$i}}]" value="" /></td>
                                            <td><input type="text" class="text-center form-control" name="prices[upc][{{$i}}]" maxlength="12" value="636343" /></td>
                                            <td>
                                                {!! Form::select("prices[availability][$i]",
                                                [
                                                '' => '',
                                                'Available' => 'Available',
                                                'InStock' => 'InStock',
                                                'OnHold' => 'OnHold',
                                                'OnBackorder' => 'OnBackorder',
                                                'PreOrders' => 'PreOrders',
                                                'PromoActive' => 'PromoActive',
                                                'SoldOut' => 'SoldOut',
                                                'Discontinued' => 'Discontinued',
                                                'Out of stock' => 'Out of stock'
                                                ], null, ['class' => 'form-control'])
                                                !!}
                                            </td>
                                        </tr>
                                        <tr class="alt">
                                            <td colspan="2"><input type="text" class="form-control" name="prices[title][{{$i}}]" value="" placeholder="Title" /></td>
                                            <td colspan="5"><input type="text" class="form-control" name="prices[details][{{$i}}]" value="" /></td>
                                        </tr>
                                        <tr class="alt">
                                            <td colspan="7">
                                                @include('backend.ecom.products.partials.pricepackage')
                                            </td>
                                        </tr>
                                        <tr class="spacer invis">
                                            <td colspan="7"></td>
                                        </tr>
                                    </table>
                                </td></tr>

                            @endif
                        </tbody>
                    </table>
                </div>
                <button type="button" id="addRow" class="btn default">
                    Add New Variation<i class="icon-plus"></i>
                </button>
            </div>
        </div>
    </div>
</div>
