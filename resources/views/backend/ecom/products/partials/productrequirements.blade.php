<div class="form-group">
    <div class="form-group col-md-12">
        {!! Form::label('requirements_heading', 'Product Req. Heading') !!}
        {!! Form::text('requirements_heading', (@$product['requirements_heading'] ? @$product['requirements_heading'] : 'Product Requirements'), ['class' => 'form-control']) !!}
    </div>
    <div class="panel-content">
        <table id="requirements-table" class="table">
            <thead>
                <tr>
                    <th class="col-md-6">{{trans('product.requirement')}}</th>
                    <th class="col-md-4">{{trans('product.requirement-value')}}</th>
                    <th class="col-md-1">{{trans('product.options')}}</th>
                </tr>
            </thead>
            <tbody id="RequirementInputsWrapper">
                @if(isset($product) && $product->requirements->count()>0)
                @foreach($product->requirements as $key=>$requirement)
                <tr><input type="hidden"  value="{{$requirement->id}}" name="requirement_id[]">
            <td class="col-md-6"><input type="text" class="form-control" value="{{$requirement->requirement}}" name="requirement[]"></td>
            <td class="col-md-4">{!! Form::text('requirement_value[]', $requirement->requirement_value, ['class' => 'form-control']) !!}</td>
            <td class="col-md-1"><a data-target="#modal-basic" data-toggle="modal" class="delete removeclass" href="javascript:void(0)"> <i class="fa fa-fw fa-times text-danger"></i> </a> </td>
            </tr>
            @endforeach
            @else

            {{-- <tr> --}}
            {{-- <td class="col-md-6"> --}}
            {{-- {!! Form::text('requirements[][\'requirement\']', null, ['class' => 'form-control', 'value' => Input::old('requirement')]) !!} --}}
            {{-- <input type="text" class="form-control" value="" name="requirement[]"> --}}
            {{-- </td> --}}
            {{-- <td class="col-md-1">{!! Form::checkbox('requirements[][\'useicon\']', 1, true) !!}</td> --}}
            {{-- <td class="col-md-4">{!! Form::text('requirements[][\'icon\']', 'icon-caret-right', ['class' => 'form-control', 'value' => Input::old('icon')]) !!}</td> --}}
            {{-- <td class="col-md-1"><a data-target="#modal-basic" data-toggle="modal" class="delete removeclass" href="javascript:void(0)"> <i class="fa fa-fw fa-times text-danger"></i> </a> </td> --}}
            {{-- </tr> --}}

            @endif
            </tbody>
        </table>
        <a id="AddMoreRequirementBox" href="javascript:void(0);">
            <button class="btn btn-sm btn-primary" type="button"><i class="fa fa-plus"></i> {{trans('product.requirement')}} </button>
        </a>
    </div>
</div>
<script>
    (function($){
    $("#RequirementInputsWrapper").on("click", ".removeclass", function (e) {
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
    })(jQuery);</script>


@if($app->environment('local'))
<script> if (window.console && window.console.log) {
    console.log("%c productrequirements.blade.php", 'background: #222; color: yellow', "loaded");
    }
</script>
@endif
