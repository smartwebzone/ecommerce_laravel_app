<hr>
<div class="col-md-12">
    <div class="row options">
        <div class="form-group col-md-12">
            <h3><label for="options">{{trans('product.productoptions')}} : </label></h3> <button type="button" id="add_product_option" class="btn btn-primary">Add Option </button>
            <hr>
            <div class="options-group row">
                @if(isset($product) && $product->options->count()>0)
                <?php $options_counter = 0; ?>
                @foreach($product->options as $key=>$options)

                <div class="option op-index form-group col-md-3" op-index="{{$options_counter}}" style="margin-bottom:15px">
                     <a href="javasctipt:void(0)">  <i class="fa fa-arrow-left" onclick="left($(this))"></i></a>
                        <a href="javasctipt:void(0)"><i class="fa fa-arrow-right" onclick="right($(this))"></i></a>
                    <div class="input-group">                       
                        <span class="input-group-addon" id="sizing-addon2">Option</span>
                        <input type="text" class="form-control" value="{{$options->name}}" name="options[{{$options_counter}}][name]">
                        <input type="hidden" value="{{$key}}" class="order" name="options[{{$options_counter}}][order]">
                        <input type="hidden" value="{{$options->id}}" name="options[{{$options_counter}}][id]">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-danger remove-option" aria-label="Delete">
                                <i class="fa fa-trash-o " aria-hidden="true"></i>
                            </button>
                            <button type="button" id="add_product_value" class="btn btn-primary">
                                <i class="fa fa-plus-square" aria-hidden="true"></i>
                            </button>
                        </span>
                    </div>
                    <div id="values">
                        @if($options->values->count()>0)
                        <?php $values_counter = 0; ?>
                        @foreach($options->values as $ke=>$values)                        
                        <div class="col-md-10 col-md-offset-2 option-value">
                            <div>
                            <a href="javasctipt:void(0)">  <i class="fa fa-arrow-up" onclick="up($(this))"></i></a>
                            <a href="javasctipt:void(0)"><i class="fa fa-arrow-down" onclick="down($(this))"></i></a>
                            </div>
                            <div class="input-group">
                                <input type="hidden" value="{{$ke}}" class="order" name="options[{{$options_counter}}][values][order][]">
                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-arrow-right fa-lg" aria-hidden="true"></i></span>
                            <input value="{{$values->value}}" type="text" class="form-control" name="options[{{$options_counter}}][values][name][]">
                            <input type="hidden" value="{{$values->id}}" name="options[{{$options_counter}}][values][id][]">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-danger remove-value" aria-label="Delete"><i class="fa fa-times fa-lg"></i></button>
                            </span>
                            </div>
                        </div>
                        <?php $values_counter++; ?>
                        @endforeach
                        @endif
                    </div>
                </div>
                <?php $options_counter++; ?>
                @endforeach
                @else
                {{-- 	<div class="option form-group col-md-3 " op-index="' + options_counter + '" style="margin-bottom:15px"> <div class="input-group "> <span class="input-group-addon" id="sizing-addon2">Option</span> <input type="text" class="form-control" name="options[' + options_counter + '][name]"> <span class="input-group-btn"> <button type="button" class="btn btn-danger remove-option" aria-label="Delete"> <i class="fa fa-trash-o " aria-hidden="true"></i> </button> <button type="button" id="add_product_value" class="btn btn-primary"> <i class="fa fa-plus-square" aria-hidden="true"></i> </button> </span> </div> <div id="values"> </div> </div>  --}}@endif
            </div>

        </div>
    </div>
    <div style="clear:both"></div>
</div>
<script>
    function left($this) {
       // alert($this.parents('div.option').find('.order').val());
       if(parseInt($this.parents('div.option').find('.order').val())>0){
            $this.parents('div.option').find('.order').val($this.parents('div.option').find('.order').val()-1);
            $this.parents('div.option').prev('div.option').find('.order').val(parseInt($this.parents('div.option').prev('div.option').find('.order').val())+1);
        }
        $this.parents('div.option').insertBefore($this.parents('div.option').prev('div.option'));
        
    }
    function right($this) {
        if(parseInt($this.parents('div.option').find('.order').val())<($('div.option').length-1)){
            $this.parents('div.option').find('.order').val(parseInt($this.parents('div.option').find('.order').val())+1);
            $this.parents('div.option').next('div.option').find('.order').val($this.parents('div.option').next('div.option').find('.order').val()-1);
        }
        $this.parents('div.option').insertAfter($this.parents('div.option').next('div.option'));
    }
    function up($this) {
       // alert($this.parents('div.option').find('.order').val());
       if(parseInt($this.parents('div.option-value').find('.order').val())>0){
            $this.parents('div.option-value').find('.order').val($this.parents('div.option-value').find('.order').val()-1);
            $this.parents('div.option-value').prev('div.option-value').find('.order').val(parseInt($this.parents('div.option-value').prev('div.option-value').find('.order').val())+1);
        }
        $this.parents('div.option-value').insertBefore($this.parents('div.option-value').prev('div.option-value'));
        
    }
    function down($this) {
        if(parseInt($this.parents('div.option-value').find('.order').val())<($this.parents('div.option').find('div.option-value').length-1)){
            $this.parents('div.option-value').find('.order').val(parseInt($this.parents('div.option-value').find('.order').val())+1);
            $this.parents('div.option-value').next('div.option-value').find('.order').val($this.parents('div.option-value').next('div.option-value').find('.order').val()-1);
        }
        $this.parents('div.option-value').insertAfter($this.parents('div.option-value').next('div.option-value'));
    }
</script>
@if($app->environment('local'))
<script> if (window.console && window.console.log) {
        console.log("%c productoptions.blade.php", 'background: #222; color: yellow', "loaded");
    }
</script>
@endif
