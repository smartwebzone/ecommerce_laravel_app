@extends('backend/layout/create')
<style>
    label{
        font-weight: bold !important;
    }
</style>
@section('topscripts-off')
<script type="text/javascript">
    (function ($) {
    });
</script>
@endsection

@section('pagetitle')
<div class="row">
    <div class="col-sm-12">

        <!-- start: PAGE TITLE & BREADCRUMB -->
        <ol class="breadcrumb">
            <li><a href="{!! url(getLang() . '/admin') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>    
            <li><a href="{!! url(getLang() . '/admin/product') !!}"><i class="fa fa-shopping-bag"></i> Products</a></li>
            <li class="active">Select Product Items</li>
        </ol>
        <div class="page-header">
            <h1> Select Product Items</h1>
        </div>
        <!-- end: PAGE TITLE & BREADCRUMB -->
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="clip-stats"></i>
                <div class="panel-tools">
                    <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="clearfix"></div>
                        <div class="clearfix"></div>

                        <div class="col-md-12">
                            {!! Form::model($book, ['route' => ['admin.product.book.update', $product->id], 'method' => 'patch', 'files'=>true]) !!}

                            <div class="row book-contents">
                                <div class="form-group col-sm-12">
                                    <div class="form-group col-sm-3">
                                        {!! Form::label('Product Name:') !!}
                                        {{$product->title}}
                                    </div>
                                    <div class="form-group col-sm-3">
                                        {!! Form::label('Company:') !!}
                                        {{$product->company->name}}
                                    </div>
                                    <div class="form-group col-sm-3">
                                        {!! Form::label('Is Taxable:') !!}
                                        {{$product->is_taxable_formatted}}
                                    </div>
                                </div>

                                @foreach($product->books as $key=>$bk)
                                <div class="form-group col-sm-12 books">
                                    <div class="form-group col-sm-9">
                                        {!! Form::label('book', 'Item') !!}

                                        {!! Form::select('book_id[]', $book, $bk->id, array('class' => 'form-control select2 book', 'value'=>Input::old('book_id'),'required' => true)) !!}

                                        @if ($errors->has('book_id'))
                                        <div class="error">{{ $errors->first('book_id') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-sm-1">
                                        {!! Form::label('Quantity', 'QTY') !!}

                                        {!! Form::text('quantity[]', $bk->pivot->quantity, ['class' => 'form-control', 'value' => old('quantity'),'required' => true]) !!}

                                        @if ($errors->has('book_id'))
                                        <div class="error">{{ $errors->first('book_id') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-sm-1">
                                        {!! Form::label(' &nbsp;', ' &nbsp;') !!}
                                        <input type="button" value="+" onclick="clone()" class="form-control btn btn-primary plus">
                                    </div>
                                    <div class="form-group col-sm-1 {{($key)?'':'hide'}}">
                                        {!! Form::label(' &nbsp;', ' &nbsp;') !!}
                                        <input type="button" value="-" onclick="removeclone($(this))" class="minus form-control btn btn-danger pull-right">
                                    </div>
                                </div>
                                @endforeach
                                @if(!$product->books->count())

                                <div class="form-group col-sm-12 books">
                                    <div class="form-group col-sm-9">
                                        {!! Form::label('book', 'Item') !!}

                                        {!! Form::select('book_id[]', $book, null, array('class' => 'form-control select2 book', 'value'=>Input::old('book_id'),'required' => true)) !!}

                                        @if ($errors->has('book_id'))
                                        <div class="error">{{ $errors->first('book_id') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-sm-1">
                                        {!! Form::label('Quantity', 'QTY') !!}

                                        {!! Form::text('quantity[]', 1, ['class' => 'form-control', 'value' => old('quantity'),'required' => true]) !!}

                                        @if ($errors->has('book_id'))
                                        <div class="error">{{ $errors->first('book_id') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-sm-1">
                                        {!! Form::label(' &nbsp;', ' &nbsp;') !!}
                                        <input type="button" value="+" onclick="clone()" class="form-control btn btn-primary plus">
                                    </div>
                                    
                                </div>
                                @endif

                            </div>
                            <div class="form-group col-sm-12" style="margin-bottom:150px;">
                                @if(isset($product) && $product->order()->count() > 0)
                                @else
                                {!! Form::submit('Save', ['class' => 'btn btn-primary','required' => true]) !!}
                                @endif
                                <a class="btn btn-default" href="{{route('admin.product')}}">Back</a>
                            </div>
                            {!! Form::close() !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="hide" id="book-clone">
    <div class="form-group col-sm-12 books">
        <div class="form-group col-sm-9">
            {!! Form::label('book', 'Item') !!}

            {!! Form::select('book_id[]', $book, null, array('class' => 'form-control select2 bookclone', 'value'=>Input::old('book_id'),'required' => true)) !!}

            @if ($errors->has('book_id'))
            <div class="error">{{ $errors->first('book_id') }}</div>
            @endif
        </div>
        <div class="form-group col-sm-1">
            {!! Form::label('Quantity', 'QTY') !!}

            {!! Form::text('quantity[]', 1, ['class' => 'form-control', 'value' => old('quantity'),'required' => true]) !!}

            @if ($errors->has('book_id'))
            <div class="error">{{ $errors->first('book_id') }}</div>
            @endif
        </div>
        <div class="form-group col-sm-1">
            {!! Form::label(' &nbsp;', ' &nbsp;') !!}
            <input type="button" value="+" onclick="clone()" class="form-control btn btn-primary plus">
        </div>
        <div class="form-group col-sm-1">
            {!! Form::label(' &nbsp;', ' &nbsp;') !!}
            <input type="button" value="-" onclick="removeclone($(this))" class="minus form-control btn btn-danger pull-right">
        </div>
    </div>
</div>
@endsection

@section('bottomscripts')
<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<script type="text/javascript">
    function removeclone($this) {
        $this.parents('.books').remove();
    }
    function clone() {
        $(".book-contents").append($("#book-clone").html());
        $('.book-contents').find('.bookclone').select2();
    }
    $(document).ready(function () {
        $('.book').select2();

    });
</script>

<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
@endsection

@section('clipinline')

@endsection