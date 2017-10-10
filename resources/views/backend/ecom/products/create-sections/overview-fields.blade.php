<hr />
<div class="row">
    <div class="form-group col-md-12">
        <!-- Status Field -->
        <div class="form-group col-sm-2">
            {!! Form::label('status', 'Status:') !!}
            {!! Form::select('status', ['' => '','Online' => 'Online', 'Preview' => 'Preview', 'Offline' => 'Offline', 'Removed' => 'Removed', 'Archived' => 'Archived', 'Discontinued' => 'Discontinued'], null, ['class' => 'form-control','value' => old('status')]) !!}
        </div>
        <!-- Manufacturer Field -->
        <div class="form-group col-md-3">
            {!! Form::label('manufacturer', 'Manufacturer:') !!}
            {!! Form::select('manufacturer', ['The Jeevandeep Company' => 'The Jeevandeep Company'], null, ['class' => 'form-control','value' => old('manufacturer')]) !!}
        </div>
        <!-- Office Status Field -->
        <div class="form-group col-md-2">
            {!! Form::label('office_status', 'InOffice Status:') !!}
            {!! Form::select('office_status', ['' => '', 'Live' => 'Live', 'Draft' => 'Draft', 'Review' => 'Review', 'inDesign' => 'inDesign', 'inProof' => 'inProof', 'inProcess' => 'inProcess', 'Hidden' => 'Hidden', 'Deleted' => 'Deleted',  'Offline' => 'Offline', 'Removed' => 'Removed'], null, ['class' => 'form-control','value' => old('office_status')]) !!}
        </div>
        <div class="form-group col-sm-3">
            {!! Form::label('payment_gateway', 'Payment Gateway:') !!}
            {!! Form::select('payment_gateway', ['Paypal JeevandeepCo' => 'Paypal JeevandeepCo', 'Paypal TrueCut' => 'Paypal TrueCut'], null, ['class' => 'form-control','value' => old('payment_gateway')]) !!}
        </div>
        <!-- Category Field -->
        <div class="form-group col-md-2">
            {!! Form::label('category', 'Categories:') !!}
            <select class="form-control" name="categories[]" id="categories" multiple="">
                @foreach($categories as $category)
                <option {{(isset($product) && in_array($category->id,$product->categories->lists('id')->toArray()))?'selected':'' }} value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<hr />
<div class="row">
    <div class="col-md-12">
        <!-- Name Field -->
        <div class="form-group col-sm-8">
            {!! Form::label('name', 'Product Name:') !!}
            {!! Form::text('name', null, ['class' => 'form-control','value' => old('name')]) !!}
        </div>
        <!-- Ispromo Field -->
        <div class="form-group col-sm-2">
            {!! Form::label('ispromo', 'Is On Promotion:') !!}
            <label class="checkbox">
                {!! Form::checkbox('ispromo', 1, null,['data-toggle' => 'toggle', 'data-on' => 'Enabled', 'data-off'=>'Disabled', 'data-onstyle' => 'success', 'data-offstyle' => 'danger', 'value'=>Input::old('ispromo') ]) !!}
            </label>
        </div>
        <!-- Is Published Field -->
        <div class="form-group col-sm-2">
            {!! Form::label('is_published', 'Is Published:') !!}
            <label class="checkbox ">
                {!! Form::checkbox('is_published', 1, null,['data-toggle' => 'toggle', 'data-on' => 'Published', 'data-off'=>'NotPublished','data-onstyle' => 'success', 'data-offstyle' => 'danger', 'value'=>Input::old('is_published') ]) !!}
            </label>
        </div>
        <!-- Subtitle Field -->
        <div class="form-group col-sm-8">
            {!! Form::label('subtitle', 'Subtitle:') !!}
            {!! Form::text('subtitle', null, ['class' => 'form-control','value' => old('subtitle')]) !!}
        </div>
        <!-- Is Published Field -->
        <div class="form-group col-sm-2">
            {!! Form::label('combine_shipping', 'Combine Shipping:') !!}
            <label class="checkbox ">
                {!! Form::checkbox('combine_shipping', 1, null,['data-toggle' => 'toggle', 'data-on' => 'Yes', 'data-off'=>'No','data-onstyle' => 'success', 'data-offstyle' => 'danger', 'value'=>Input::old('combine_shipping') ]) !!}
            </label>
        </div>
        <!-- Is Published Field -->
        <div class="form-group col-sm-2">
            {!! Form::label('max_combined', 'Max Combined:') !!}
            <label class="checkbox ">
                {!! Form::text('max_combined', null,['class'=>'form-control', 'value'=>Input::old('combine_shipping') ]) !!}
            </label>
        </div>
       
        <!-- External URL -->
        <div class="form-group col-sm-8">
            {!! Form::label('external_yrl', 'External URL:') !!}
            {!! Form::text('external_url', null, ['class' => 'form-control','value' => old('external_url')]) !!}
        </div>
         <!-- Store In google -->
        <div class="form-group col-sm-2">
            {!! Form::label('store_in_google', 'List on Google Shop:') !!}
            <label class="checkbox ">
                {!! Form::checkbox('store_in_google',1, null,['data-toggle' => 'toggle', 'data-on' => 'Yes', 'data-off'=>'No','data-onstyle' => 'success', 'data-offstyle' => 'danger', 'value'=>Input::old('store_in_google') ]) !!}
            </label>
        </div>

        <div class="clearfix"></div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-8">
            <!-- Description Field -->
            <div class="form-group">
                {!! Form::label('details', 'Short Details:') !!}
                {!! Form::textarea('details', null, ['class' => 'form-control','value' => old('details')]) !!}
            </div>
        </div>
        <div class="col-md-4">
            <div class="col-md-12">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <!-- start: Headings Section PANEL -->
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"> Headings</a>
                            </h4>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="form-group col-md-12">
                                    {!! Form::label('reviews_heading', 'Reviews Heading') !!}
                                    {!! Form::text('reviews_heading', (@$product['reviews_heading'] ? @$product['reviews_heading'] : 'Product Reviews'), ['class' => 'form-control','value' => old('reviews_heading')]) !!}
                                </div>
                                <div class="form-group col-md-12">
                                    {!! Form::label('additional_heading', 'Additional Heading') !!}
                                    {!! Form::text('additional_heading', (@$product['additional_heading'] ? @$product['additional_heading'] : 'Additional Information'), ['class' => 'form-control','value' => old('additional_heading')]) !!}
                                </div>
                                <div class="form-group col-md-12">
                                    {!! Form::label('price_heading', 'Price Heading') !!}
                                    {!! Form::text('price_heading', null, ['class' => 'form-control','value' => old('price_heading')]) !!}
                                </div>
                                {{--<div class="form-group col-md-12">--}}
                                {{--{!! Form::label('requirements_heading', 'Product Req Heading') !!}--}}
                                {{--{!! Form::text('requirements_heading', (@$product['requirements_heading'] ? @$product['requirements_heading'] : 'Product Requirements'), ['class' => 'form-control','value' => old('requirements_heading')])  !!}--}}
                                {{--</div>--}}
                                <div class="form-group col-md-12">
                                    {!! Form::label('waranty_heading', 'Warranty Heading') !!}
                                    {!! Form::text('waranty_heading', (@$product['waranty_heading'] ? @$product['waranty_heading'] : 'Product Waranty Info'), ['class' => 'form-control','value' => old('waranty_heading')]) !!}
                                </div>
                                <div class="form-group col-md-12">
                                    {!! Form::label('support_heading', 'Support Heading') !!}
                                    {!! Form::text('support_heading', (@$product['support_heading'] ? @$product['support_heading'] : 'Product Support'), ['class' => 'form-control','value' => old('support_heading')]) !!}
                                </div>
                                <div class="form-group col-md-12">
                                    {!! Form::label('docs_heading', 'Docs Heading') !!}
                                    {!! Form::text('docs_heading', (@$product['docs_heading'] ? @$product['docs_heading'] : 'Product Documentation'), ['class' => 'form-control','value' => old('docs_heading')]) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end: Headings Section PANEL -->
                    <div class="panel panel-default">
                        <!-- start: Product Features Section PANEL -->
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse2"> Product Features</a>
                            </h4>
                        </div>
                        <div id="collapse2" class="panel-collapse">
                            <div class="panel-body">
                                @include('backend.ecom.products.partials.productfeatures')
                            </div>
                        </div>
                    </div>
                    
                    <div class="panel panel-default">
                        <!-- start: Package Includes Section PANEL -->
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse2"> Package Includes</a>
                            </h4>
                        </div>
                        <div id="collapse2" class="panel-collapse">
                            <div class="panel-body">
                                @include('backend.ecom.products.partials.productincludeds')
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <!-- start: Product Features Section PANEL -->
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse3"> Product Requirements / Notes to Buyer</a>
                            </h4>
                        </div>
                        <div id="collapse3" class="panel-collapse collapse collapse">
                            <div class="panel-body">

                                @include('backend.ecom.products.partials.productrequirements')

                            </div>
                        </div>
                    </div>

                    <!-- end: Headings Section PANEL -->
                     {{--<div class="panel panel-default">--}}
                         {{--start: Product Features Section PANEL --}}
                        {{--<div class="panel-heading">--}}
                            {{--<h4 class="panel-title">--}}
                                {{--<a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Shipping Sizes</a>--}}
                            {{--</h4>--}}
                        {{--</div>--}}
                        {{--<div id="collapse4" class="panel-collapse collapse">--}}
                            {{--<div class="panel-body">--}}

                                 {{--Weight Field --}}
                                {{--<div class="form-group col-md-8">--}}
                                    {{--{!! Form::label('weight', 'Weight:') !!}--}}
                                    {{--{!! Form::text('weight', null, ['class' => 'form-control','placeholder'=>'LBS','value' => old('weight')]) !!}--}}
                                {{--</div>--}}

                                 {{--Length Field --}}
                                {{--<div class="form-group col-md-8">--}}
                                    {{--{!! Form::label('length', 'Length:') !!}--}}
                                    {{--{!! Form::text('length', null, ['class' => 'form-control','placeholder'=>'INCH','value' => old('length')]) !!}--}}
                                {{--</div>--}}

                                 {{--Width Field --}}
                                {{--<div class="form-group col-md-8">--}}
                                    {{--{!! Form::label('width', 'Width:') !!}--}}
                                    {{--{!! Form::text('width', null, ['class' => 'form-control','placeholder'=>'INCH','value' => old('width')]) !!}--}}
                                {{--</div>--}}

                                 {{--Height Field --}}
                                {{--<div class="form-group col-md-8">--}}
                                    {{--{!! Form::label('height', 'Height:') !!}--}}
                                    {{--{!! Form::text('height', null, ['class' => 'form-control','placeholder'=>'INCH','value' => old('height')]) !!}--}}
                                {{--</div>--}}



                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group col-sm-12 col-lg-12">
            {!! Form::label('description', 'Description:') !!}
            {!! Form::textarea('description', null, ['class' => 'form-control','value' => old('description') ]) !!}
        </div>

        <!-- Slug Field -->
        <div class="form-group col-md-4">
            {!! Form::label('slug', 'Slug:') !!}
            {!! Form::text('slug', null, ['class' => 'form-control','value' => old('video_url')]) !!}
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-cogs"></i> Product Alerts
            <div class="panel-tools"> <a class="btn btn-xs btn-link panel-collapse collapse" href="#"> </a> <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-wrench"></i> </a> <a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh"></i> </a> <a class="btn btn-xs btn-link panel-expand" href="#"> <i class="fa fa-resize-full"></i> </a> <a class="btn btn-xs btn-link panel-close" href="#"> <i class="fa fa-times"></i> </a>
            </div>
        </div>
        <div class="panel-body" >
            @include('backend.ecom.products.partials.alerts')
        </div>
    </div>
</div>



<script>
    $(document).ready(function () {

    });
</script>


@if($app->environment('local'))
<script> if (window.console && window.console.log) {
        console.log("%c OVERVIEW-FEILDS.blade.php", 'background: #222; color: yellow', "loaded");
    }
</script>
@endif