<table class="table table-striped table-hover table-bordered" id="product-packaging-table">
    <thead>
        <tr>
            <th style="width:21%">Title :</th>
            <th style="width:19%">Weight:</th>

            <th  style="width:20%">Length:</th>
            <th style="width:20%">Width:</th>
            <th>Height:</th>
        </tr>
    </thead>
    <tbody>
        @if(isset($price) && $price->packages->count()>0)
        <tr>
            <td colspan="5" class="packaging-body">
                @foreach($price->packages as $package)
                <table class="table table-striped table-hover table-bordered product-tabl">
                    <tr class="spacer invis">
                        <td colspan="6">
                            <a href="javasctipt:void(0);" onclick="$(this).closest('.product-tabl').remove();" class="close" style="color:red">&times;</a>
                        </td>
                    </tr>
                    <tr class="alt">
                        <td><input type="hidden" name="prices[packages][{{$i}}][id][]" value="{{$package->id}}"/><input type="text" placeholder="Title" class="text-center form-control" name="prices[packages][{{$i}}][title][]" value="{!! $package->title !!}" /></td>

                        <td><input type="text" placeholder="Weight" class="text-center form-control" name="prices[packages][{{$i}}][weight][]" value="{!! $package->weight !!}" /></td>
                        <td><input type="text" placeholder="Length" class="text-center form-control" name="prices[packages][{{$i}}][length][]" value="{!! $package->length !!}" /></td>
                        <td><input type="text" placeholder="Width" class="text-center form-control" name="prices[packages][{{$i}}][width][]" value="{!! $package->width !!}" data-affixes-stay="false" data-prefix="$ " data-thousands="," data-decimal="." /> </td>

                        <td><input type="text" placeholder="Height" class="text-center form-control" name="prices[packages][{{$i}}][height][]" value="{!! $package->height !!}" /></td>

                    </tr>
                    <tr class="spacer invis">
                        <td colspan="6"></td>
                    </tr>

                </table>
                @endforeach
            </td>
        </tr>
        @else
        <tr>
            <td colspan="5" class="packaging-body">
                <table class="table table-striped table-hover table-bordered product-tabl">
                    <tr class="alt">
                        <td><input type="text" placeholder="Title" class="text-center form-control" name="prices[packages][{{$i}}][title][]" value="" /></td>
                        <td><input type="text" placeholder="Weight" class="text-center form-control " name="prices[packages][{{$i}}][weight][]" value="" /></td>
                        <td><input type="text" placeholder="Length" class="text-center form-control" name="prices[packages][{{$i}}][length][]" value="" /></td>
                        <td><input type="text" placeholder="Width" class="text-center form-control" name="prices[packages][{{$i}}][width][]" value="" /></td>

                        <td><input type="text" placeholder="Height" class="text-center form-control" name="prices[packages][{{$i}}][height][]" value="" /></td>

                    </tr>
                </table>
            </td>
        </tr>
        @endif
        <tr>
            <td  colspan="5">
                <button type="button" class="addRowPackage btn default pull-right" onclick="addRowPackage($(this),{{$i}})">
                    Add New Shipping Size <i class="icon-plus"></i>
                </button>
            </td>
        </tr>
    </tbody>
</table>