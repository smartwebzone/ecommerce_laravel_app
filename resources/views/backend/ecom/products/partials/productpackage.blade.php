<script type='text/javascript'>
    $(window).load(function () {

        $("#addRowPackage").click(function () {
            var counter = 0;
            var row = $("<table class='table table-striped table-hover table-bordered product-tabl'>" +
                    "<tr class='spacer invis'>" +
                    "<td colspan='5'>" +
                    "<a href='javasctipt:void(0);' onclick='$(this).closest(\".product-tabl\").remove();' class='close' style='color:red'>&times;</a>" +
                    "</td>" +
                    "</tr>" +
                    "<tr>" +
                    "<td><input type='text' placeholder='Title' class='text-center form-control' name='packages[title][]' /></td>" +
                    "<td><input type='text' placeholder='Weight' class='text-center form-control' name='packages[weight][]' value='' /></td>" +
                    "<td><input type='text' placeholder='Length' class='text-center form-control' name='packages[length][]' /></td>" +
                    "<td><input type='text' placeholder='Width' class='text-center form-control' name='packages[width][]' /></td>" +
                    "<td><input type='text' placeholder='Height' class='text-center form-control' name='packages[height][]' value='' /></td>" +
                    "</tr>" +
                    "</tr>");
            $("table#product-packaging-table tbody .packaging-body").append(row);
        });
    });
</script>
<div class="row">
    <div class="col-md-12">
        <div class="adv-table editable-table ">
            <div class="clearfix">
                <div class="space15"></div>
                <div class="table-responsive">
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
                            @if(isset($product) && $product->packages->count()>0)
                            <tr>
                                <td colspan="5" class="packaging-body">
                                    @foreach($product->packages as $package)

                                    <table class="table table-striped table-hover table-bordered product-tabl">
                                        <tr class="spacer invis">
                                            <td colspan="6">
                                                <a href="javasctipt:void(0);" onclick="$(this).closest('.product-tabl').remove();" class="close" style="color:red">&times;</a>
                                            </td>
                                        </tr>
                                        <tr class="alt">
                                        <input type="hidden" name="packages[id][]" value="{{$package->id}}"/>

                                        <td><input type="text" placeholder="Title" class="text-center form-control" name="packages[title][]" value="{!! $package->title !!}" /></td>

                                        <td><input type="text" placeholder="Weight" class="text-center form-control" name="packages[weight][]" value="{!! $package->weight !!}" /></td>
                                        <td><input type="text" placeholder="Length" class="text-center form-control" name="packages[length][]" value="{!! $package->length !!}" /></td>
                                        <td><input type="text" placeholder="Width" class="text-center form-control" name="packages[width][]" value="{!! $package->width !!}" data-affixes-stay="false" data-prefix="$ " data-thousands="," data-decimal="." /> </td>

                                        <td><input type="text" placeholder="Height" class="text-center form-control" name="packages[height][]" value="{!! $package->height !!}" /></td>

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
                                    <td><input type="text" placeholder="Title" class="text-center form-control" name="packages[title][]" value="" /></td>
                                    <td><input type="text" placeholder="Weight" class="text-center form-control " name="packages[weight][]" value="" /></td>
                                    <td><input type="text" placeholder="Length" class="text-center form-control" name="packages[length][]" value="" /></td>
                                    <td><input type="text" placeholder="Width" class="text-center form-control" name="packages[width][]" value="" /></td>

                                    <td><input type="text" placeholder="Height" class="text-center form-control" name="packages[height][]" value="" /></td>

                                </tr>
                            </table>
                        </td>
                    </tr>
                    @endif
                    </tbody>
                    </table>
                </div>
                <button type="button" id="addRowPackage" class="btn default">
                    Add New <i class="icon-plus"></i>
                </button>
            </div>
        </div>
    </div>
</div>
