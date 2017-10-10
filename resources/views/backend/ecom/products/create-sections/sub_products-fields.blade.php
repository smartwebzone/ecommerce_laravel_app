<script type='text/javascript'>
    $(window).load(function () {
        $("#addRowSP").click(function () {
            $('.sub_product_tr').each(function (i, obj) {
                $sub = $(this).attr('data-sub');
                if ($('.sub_secti_' + $sub).hasClass('hide')) {
                    $('.sub_secti_' + $sub).removeClass('hide');
                    return false;
                }
//                if ($(this).hasClass('hide')) {
//                    $(this).removeClass('hide');
//                    return false;
//                }
            });
        });
        $(".closeTR").click(function () {
            $sub = $(this).closest('.sub_product_tr').attr('data-sub');
            console.log($sub);
            $('.sub_secti_' + $sub).find('select,input,textarea').val('');
            $('.sub_secti_' + $sub).find('.currentImage').remove();
            $('.sub_secti_' + $sub).addClass('hide');
            // $(this).closest('.sub_product_tr').find('select,input').val('');
            // $(this).closest('.sub_product_tr').addClass('hide');
        });
    });
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
                                <th width="30%">Product</th>
                                <th width="40%">Display Label</th>
                                <th width="15%">Quantity</th>
                                <th width="10%">Optional</th>
                                <th width="5%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($product)) {
                                $total_sub_products = $product->ProductSubProducts()->count();
                            } else {
                                $total_sub_products = 0;
                            }
                            for ($i = 0; $i < 10; $i++) {
                                $row_check_sp = max(0, $total_sub_products - 1);
                                ?>
                                <tr id="sub_product_row_{{$i}}"  data-sub="{{$i}}" class="sub_product_tr sub_secti_{{$i}} {{($i > $row_check_sp ? 'hide' : '')}}">
                                    <td>
                                        @if(isset($product) && $product->ProductSubProducts->count()>0)
                                        <input type="hidden" name="sub_products[id][]" value="{{@$product->ProductSubProducts()->get()[$i]->id}}"/>
                                        @endif
                                        <select class="form-control sub_products_dd" name="sub_products[sub_product_id][]">
                                            <option value="">Select Product</option>
                                            @foreach($sub_products as $row)
                                            @if(isset($product) && $product->ProductSubProducts->count()>0)
                                            <option {{(@$product->ProductSubProducts()->get()[$i]->sub_product_id == $row->id ? 'selected=selected' : '')}} value="{{ $row->id }}">{{ $row->name }}</option>
                                            @else
                                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        @if(isset($product) && $product->ProductSubProducts->count()>0)
                                        <input type="text" class="form-control" name="sub_products[label][]" value="{{@$product->ProductSubProducts()->get()[$i]->label}}"/>
                                        @else
                                        <input type="text" class="form-control" name="sub_products[label][]" value=""/>
                                        @endif
                                    </td>
                                    <td>
                                        @if(isset($product) && $product->ProductSubProducts->count()>0)
                                        <input type="text" class="form-control" name="sub_products[quantity][]" maxlength="4" value="{{@$product->ProductSubProducts()->get()[$i]->quantity}}"/>
                                        @else
                                        <input type="text" class="form-control" name="sub_products[quantity][]" maxlength="4" value=""/>
                                        @endif
                                    </td>
                                    <td>
                                        @if(isset($product) && $product->ProductSubProducts->count()>0)
                                        <select class="form-control" name="sub_products[optional][]">
                                            <option <?= (@$product->ProductSubProducts()->get()[$i]->optional) ? "selected='selected'" : ""; ?> value="1">Yes</option>
                                            <option <?= (!@$product->ProductSubProducts()->get()[$i]->optional) ? "selected='selected'" : ""; ?> value="0">No</option>
                                        </select>
                                        @else
                                        <select class="form-control" name="sub_products[optional][]">
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                        @endif
                                    </td>
                                    <td class="text-center" rowspan="2">
                                        <a class="close closeTR" style="color:red;float:none;">&times;</a>
                                    </td>
                                </tr>
                                <tr class="sub_product_tr {{($i > $row_check_sp ? 'hide' : '')}} sub_secti_{{$i}}" data-sub="{{$i}}">
                                    <td colspan="2">
                                        {!! Form::label('details', 'Description:') !!}
                                        @if(isset($product) && $product->ProductSubProducts->count()>0)
                                        <textarea class="form-control" name="sub_products[details][]">{!! @$product->ProductSubProducts()->get()[$i]->details !!}</textarea>
                                        @else
                                        <textarea class="form-control" name="sub_products[details][]"></textarea>
                                        @endif
                                    </td>
                                    <td colspan="2">
                                        <div class="col-md-10">
                                            @if(isset($product) && $product->ProductSubProducts->count()>0 && !empty(@$product->ProductSubProducts()->get()[$i]->thumbnail))
                                            <div class="currentImage">
                                            <h3>Current Image</h3>
                                            <span class="fileupload-preview"> <img itemprop="image" src="{!! url('/uploads/products/sub/'.@$product->ProductSubProducts()->get()[$i]->thumbnail) !!}" class="img-responsive" alt="Image"> </span><br>
                                            </div>
                                            @endif
                                            <input id="thumbnail" name="sub_products[thumbnail][]" type="file" class="file input-preview">
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <button type="button" id="addRowSP" class="btn default">
                    Add New <i class="icon-plus"></i>
                </button>
            </div>
        </div>
    </div>
</div>
