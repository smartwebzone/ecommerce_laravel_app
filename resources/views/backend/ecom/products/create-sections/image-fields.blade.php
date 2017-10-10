<div class="col-md-12">
    <div class="row col-md-12" style="top-margin:10%;"></div>
    <div class="row">
        <br/> <br/> <br/>
        @if(!empty($product->thumbnail))
        <h3>Current Image</h3>
        <span class="fileupload-preview"> <img itemprop="image" src="{!! url('/uploads/products/'.$product->thumbnail) !!}" class="img-responsive" alt="Image"> </span>
        @endif
        <div class="form-group">
            <div class="col-md-8">
                {!! Form::label('thumbnail', trans('product.primary-photo')) !!}
                <input id="thumbnail" name="thumbnail" type="file" class="file input-preview">
            </div>
        </div>
    </div>
    <div class="line"></div>
    {{--<br style="clear:both" />--}}
    <div class="row">
        <div class="col-md-12">
            <br/> <br/> <br/>
            <button id="add_album_image" class="btn btn-danger" type="button"><i class="fa fa-plus"></i> Add Photo</button>
            <br/> <br/> <br/>
        </div>
    </div>
    {{--<br style="clear:both" />--}}
    <div id="additional-images" class="additional">

    </div>
    @if(!empty($product->photos))
    <h3>Current Additional Photo</h3>
    @foreach($product->photos as $photo)
    <div style="display: inline-block;border: 1px solid;margin: 2px" class="fileupload-preview additional-photo text-right"> 
        <a href="javasctipt:void(0);" onclick="$(this).closest('.additional-photo').remove();" class="btn" style="color:red;font-size: 21px">×</a>
        <img itemprop="image" src="{!! url('uploads/products/album/'.$photo->photo_src) !!}" class="img-responsive" alt="Image"> 
        <input type="hidden" name="albumid[]" value="{{$photo->id}}">
    </div>
    @endforeach
    @endif
    <br style="clear:both"/>
    <div class="row">
        <div class="col-sm-12">
            <!-- start: TEXT FIELDS PANEL -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-external-link-square"></i>
                    Videos Section
                    <div class="panel-tools">
                        <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a>
                        <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-wrench"></i> </a>
                        <a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh"></i></a>
                        <a class="btn btn-xs btn-link panel-expand" href="#"><i class="fa fa-resize-full"></i></a>
                        <a class="btn btn-xs btn-link panel-close" href="#"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="panel-body">
                    @include('backend.ecom.products.partials.videos')
                </div>
            </div>
            <!-- end: TEXT FIELDS PANEL -->
        </div>
    </div>
</div>

@if($app->environment('local'))
<script>
    if (window.console && window.console.log) {
        console.log("%c IMAGE-FIELDS.blade.php", 'background: #222; color:yellow', "loaded");
    }
</script>
@endif