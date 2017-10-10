
<div class="row">
    <div class="col-md-8">
        <!-- Short Description Field -->
        <div class="form-group col-sm-12 col-lg-12">
            {!! Form::label('short_description', 'Short Description:') !!}
            {!! Form::textarea('short_description', null, ['class' => 'form-control', 'rows' => '5']) !!}
        </div>
        <!-- Description Field -->
        <div class="form-group col-sm-12 col-lg-12">
            {!! Form::label('description', 'Description:') !!}
            {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '5']) !!}
        </div>
    </div>
    <div class="col-md-4">
        <!-- Slug Field -->
        <div class="form-group col-md-12">
            {!! Form::label('slug', 'Slug:') !!}
            {!! Form::text('slug', null, ['class' => 'form-control']) !!}
        </div>
        <!-- Category Field -->
        <div class="form-group col-md-12">
            {!! Form::label('category', 'Category:') !!}
            {!! Form::select('category', $categories, null, ['class' => 'form-control', 'value'=>Input::old('category')]) !!}
        </div>
        <!-- Availability Field -->
        <div class="form-group col-md-12">
            {!! Form::label('availability', 'Availability:') !!}
            {!! Form::select('availability', ['Discontinued' => 'Discontinued', 'In Stock' => 'In Stock', 'On Backorder' => 'On Backorder', 'Pre - Orders' => 'Pre - Orders', 'Promo Active' => 'Promo Active', 'Deleted' => 'Deleted'], null, ['class' => 'form-control']) !!}
        </div>
        <!-- Manufacturer Field -->
        <div class="form-group col-md-12">
            {!! Form::label('manufacturer', 'Manufacturer:') !!}
            {!! Form::select('manufacturer', ['The Jeevandeep Company' => 'The Jeevandeep Company'], null, ['class' => 'form-control']) !!}
        </div>
        <!-- Product Line Field -->
        <div class="form-group col-md-12">
            {!! Form::label('product_line', 'Product Line:') !!}
            {!! Form::select('product_line', ['Qnuque' => 'Qnuque', 'Hand Quilting' => 'Hand Quilting', 'Machine Quilting' => 'Machine Quilting', 'TrueCut' => 'TrueCut', 'Accessories' => 'Accessories', 'Frames' => 'Frames', 'Hoops' => 'Hoops', 'Automation Software' => 'Automation Software'], null, ['class' => 'form-control']) !!}
        </div>
        <!-- Status Field -->
        <div class="form-group col-md-12">
            {!! Form::label('status', 'Status:') !!}
            {!! Form::select('status', ['InStock' => 'InStock', 'Available' => 'Available', 'OnHold' => 'OnHold', 'OnBackorder' => 'OnBackorder', 'PreOrders' => 'PreOrders', 'PromoActive' => 'PromoActive', 'SoldOut' => 'SoldOut', 'Discontinued' => 'Discontinued'], null, ['class' => 'form-control']) !!}
        </div>
        <!-- Office Status Field -->
        <div class="form-group col-md-12">
            {!! Form::label('office_status', 'Office Status:') !!}
            {!! Form::select('office_status', ['Draft' => 'Draft', 'Review' => 'Review', 'inDesign' => 'inDesign', 'inProof' => 'inProof', 'inProcess' => 'inProcess', 'Hidden' => 'Hidden', 'Deleted' => 'Deleted', 'Online' => 'Online', 'Offline' => 'Offline', 'Removed' => 'Removed', 'Archived' => 'Archived'], null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>