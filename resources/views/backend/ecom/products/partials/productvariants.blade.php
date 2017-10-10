<div class="col-md-12">
    <div class="form-group">
        <h3>{!! Form::label('variants', trans('product.variants'), array('class' => 'control-label')) !!}</h3>
        <hr>
        <div class="panel-content">

            <table class="table productVariants" id="variantstable">
                <thead>
                    <tr>
                        <th></th>
                        <th>{{trans('product.attribute_name')}}</th>
                        <th>{{trans('product.product_attribute_value')}}</th>
                        <th>{{trans('product.options')}}</th>
                    </tr>
                </thead>
                <tbody id="InputsWrapper">
                    @if(isset($product) && $product->variants->count()>0)
                    @foreach($product->variants as $variants)
                    <tr><input type="hidden"  value="{{$variants->id}}" name="attribute_id[]">
                <td>
                    <a href="javasctipt:void(0)">  <i class="fa fa-arrow-up" onclick="upv($(this))"></i></a>
                    <a href="javasctipt:void(0)"><i class="fa fa-arrow-down" onclick="downv($(this))"></i></a>
                </td>
                <td><input type="text" id="attribute_name" class="form-control" value="{{$variants->attribute_name}}" name="attribute_name[]"></td>
                <td><input type="text" id="attribute_value" class="form-control" value="{{$variants->product_attribute_value}}" name="product_attribute_value[]"></td>
                <td><a data-target="#modal-basic" data-toggle="modal" class="delete removeclass" href="javascript:void(0)">
                        <i class="fa fa-times fa-2x text-danger"></i>
                    </a> </td>
                </tr>
                @endforeach
                @else
                {{-- <tr> <td><input type="text" class="form-control" value="" name="attribute_name[]"></td> <td><input type="text" class="form-control" value="" name="product_attribute_value[]"></td> <td><a data-target="#modal-basic" data-toggle="modal"class="delete removeclass" href="javascript:void(0)"> <i class="fa fa-fw fa-times text-danger"></i> </a> </td> </tr> --}}
                @endif
                </tbody>
            </table>
            <a id="AddMoreFileBox" href="#">
                <button class="btn btn-sm btn-primary" type="button">
                    <i class="fa fa-plus"></i> {{trans('product.add_variation')}}
                </button>
            </a>
        </div>
    </div>

    <script>
        function upv($this) {
            $this.parents('tr').insertBefore($this.parents('tr').prev('tr'));
        }
        function downv($this) {
            $this.parents('tr').insertAfter($this.parents('tr').next('tr'));
        }
        $(document).ready(function () {


            $("#InputsWrapper").on("click", ".removeclass", function (e) { //user click on remove text
                
                @if (!isset($product))
                        if (x > 1) {
                            $(this).parent().parent().remove(); //remove text box
                                x--; //decrement textbox
                        }
                @else
                        $(this).parent().parent().remove(); //remove text box
                             x--; //decrement textbox
                @endif

                        return false;
            })

        });
    </script>
</div>
<hr>
<div style="clear:both"></div>
@if($app->environment('local'))
<script> if (window.console && window.console.log) {
        console.log("%c ProductVariants.blade.php", 'background: #222; color: yellow', "loaded");
    }
</script>
@endif