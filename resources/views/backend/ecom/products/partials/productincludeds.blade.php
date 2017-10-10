<div class="form-group">
    <div class="form-group col-md-12">
        {!! Form::label('included_heading', 'Package Includes Heading') !!}
        {!! Form::text('included_heading', (@$product['included_heading'] ? @$product['included_heading'] : 'Package Includes'), ['class' => 'form-control']) !!}
    </div>
    <div class="panel-content">
        <table id="includeds-table" class="table">
            <thead>
                <tr>
                    <th class="col-md-6">Package Includes</th>
                </tr>
            </thead>
            <tbody id="IncludedInputsWrapper">
                @if(isset($product) && $product->includeds->count()>0)
                @foreach($product->includeds as $includeds)
                <tr><input type="hidden"  value="{{$includeds->id}}" name="included_id[]">
                    <td class="col-md-6"><input type="text" class="form-control" value="{{$includeds->included_name}}" name="included_name[]"></td>
                   
                    <td class="col-md-1"><a data-target="#modal-basic" data-toggle="modal" class="delete removeclass" href="javascript:void(0)"> <i class="fa fa-fw fa-times text-danger"></i> </a> </td>
                </tr>
                @endforeach
                @else
                {{-- <tr> --}} {{-- <td class="col-md-6"> --}} {{-- {!! Form::text('includeds[][\'included_name\']', null, ['class' => 'form-control', 'value' => Input::old('included_name')]) !!} --}} {{-- <input type="text" class="form-control" value="" name="included_name[]"> --}} {{-- </td> --}} {{-- <td class="col-md-1">{!! Form::checkbox('includeds[][\'useicon\']', 1, true) !!}</td> --}} {{-- <td class="col-md-4">{!! Form::text('includeds[][\'icon\']', 'icon-caret-right', ['class' => 'form-control', 'value' => Input::old('icon')]) !!}</td> --}} {{-- <td class="col-md-1"><a data-target="#modal-basic" data-toggle="modal" class="delete removeclass" href="javascript:void(0)"> <i class="fa fa-fw fa-times text-danger"></i> </a> </td> --}} {{-- </tr> --}} @endif
            </tbody>
        </table>
        <a id="AddMoreIncludedBox" href="#">
        <button class="btn btn-sm btn-primary" type="button"><i class="fa fa-plus"></i> Add </button>
        </a>
    </div>
</div>
<script>
    (function($){
        $("#IncludedInputsWrapper").on("click", ".removeclass", function (e) {
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
            console.log("%c productincludeds.blade.php", 'background: #222; color: yellow', "loaded");
        }
    </script>
@endif