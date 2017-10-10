<div class="form-group col-sm-12">
<button class="btn btn-primary " type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">  Layout Options</button>
    <a href="{!! url(getLang() . '/admin/products') !!}" class="btn btn-default">Cancel</a>
    {!! Form::submit('Update Product', ['class' => 'btn btn-success' ]) !!}
    <a target="_blank" href="{!! url(getLang().'/product/' . $product->slug) !!}" class="preview btn btn-default"><i class="fa fa-eye"></i>&nbsp; Preview</a>

</div>
<div style="clear:both"></div>
<div class="collapse" id="collapseExample">
    <div class="well">
        <div class="form-group col-sm-2">
            {!! Form::label('support_tab', 'Docs Tab:') !!}
            <label class="checkbox-inline">
            {!! Form::checkbox('support_tab', 1, null) !!}
            </label>
        </div>
        <div class="form-group col-sm-2">
            {!! Form::label( 'reviews_tab', 'Reviews Tab:') !!}
            <label class="checkbox-inline">
            {!! Form::checkbox( 'reviews_tab', 1, null) !!}
            </label>
        </div>
        <div class="form-group col-sm-2">
            {!! Form::label('docs_tab', 'Docs Tab:') !!}
            <label class="checkbox-inline">
            {!! Form::checkbox('docs_tab', 1, null) !!}
            </label>
        </div>
        <div class="form-group col-sm-2">
            {!! Form::label('warranty_tab', 'Warranty Tab:') !!}
            <label class="checkbox-inline">
            {!! Form::checkbox('warranty_tab', 1, null) !!}
            </label>
        </div>
        <br style="clear:both" />
    </div>
</div>
@if($app->environment('local'))
    <script> if( window.console && window.console.log ) {
            console.log("%c LayoutOptions.blade.php", 'background: #222; color: yellow', "loaded");
        }
    </script>
@endif