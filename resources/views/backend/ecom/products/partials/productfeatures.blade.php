<div class="form-group">
    <div class="form-group col-md-12">
        {!! Form::label('features_heading', 'Features Heading') !!}
        {!! Form::text('features_heading', (@$product['features_heading'] ? @$product['features_heading'] : 'Product Features'), ['class' => 'form-control']) !!}
    </div>
    <div class="panel-content">
        <table id="features-table" class="table">
            <thead>
                <tr>
                    <th class="col-md-6">{{trans('product.feature_name')}}</th>
                    <th class="col-md-1">{{trans('product.useicon')}}</th>
                    <th class="col-md-4">{{trans('product.icon')}}</th>
                    <th class="col-md-1">{{trans('product.options')}}</th>
                </tr>
            </thead>
            <tbody id="FeatureInputsWrapper">
                @if(isset($product) && $product->features->count()>0)
                @foreach($product->features as $features)
                <tr><input type="hidden"  value="{{$features->id}}" name="feature_id[]">
                    <td class="col-md-6"><input type="text" class="form-control" value="{{$features->feature_name}}" name="feature_name[]"></td>
                    <td class="col-md-1">{!! Form::checkbox('feature_useicon[]', $features->useicon, (bool)$features->useicon) !!}</td>
                    <td class="col-md-4">{!! Form::text('feature_icon[]', $features->icon, ['class' => 'form-control']) !!}</td>
                    <td class="col-md-1"><a data-target="#modal-basic" data-toggle="modal" class="delete removeclass" href="javascript:void(0)"> <i class="fa fa-fw fa-times text-danger"></i> </a> </td>
                </tr>
                @endforeach
                @else
                {{-- <tr> --}} {{-- <td class="col-md-6"> --}} {{-- {!! Form::text('features[][\'feature_name\']', null, ['class' => 'form-control', 'value' => Input::old('feature_name')]) !!} --}} {{-- <input type="text" class="form-control" value="" name="feature_name[]"> --}} {{-- </td> --}} {{-- <td class="col-md-1">{!! Form::checkbox('features[][\'useicon\']', 1, true) !!}</td> --}} {{-- <td class="col-md-4">{!! Form::text('features[][\'icon\']', 'icon-caret-right', ['class' => 'form-control', 'value' => Input::old('icon')]) !!}</td> --}} {{-- <td class="col-md-1"><a data-target="#modal-basic" data-toggle="modal" class="delete removeclass" href="javascript:void(0)"> <i class="fa fa-fw fa-times text-danger"></i> </a> </td> --}} {{-- </tr> --}} @endif
            </tbody>
        </table>
        <a id="AddMoreFeatureBox" href="#">
        <button class="btn btn-sm btn-primary" type="button"><i class="fa fa-plus"></i> {{trans('product.add_item')}} </button>
        </a>
    </div>
</div>
<script>
    (function($){
        $("#FeatureInputsWrapper").on("click", ".removeclass", function (e) {
            @if (!isset($product))
            if (x > 1) {
                $(this).parent().parent().remove();
                x--;
            }
            @else
				$(this).parent().parent().remove();
            x--;
            @endif
                    return false;
        });
    })(jQuery);

</script>


@if($app->environment('local'))
    <script> if( window.console && window.console.log ) {
            console.log("%c productfeatures.blade.php", 'background: #222; color: yellow', "loaded");
        }
    </script>
@endif