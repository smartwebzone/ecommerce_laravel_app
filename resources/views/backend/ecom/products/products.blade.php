@extends('backend/layout/clip')

@section('topscripts')
<script type="text/javascript">
    (function ($) {

        $(".publish").bind("click", function (e) {
            var id = $(this).attr('id');
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{!! url(getLang() . '/admin/product/" + id + "/toggle-publish/') !!}",
                headers: {
                    'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                },
                success: function (response) {
                    // if (response['result'] == 'success') {
                    //     var imagePath = (response['changed'] == 1) ? "{!! asset('/assets/images/publish.png')!!}" : "{!!url('/')!!}/assets/images/not_publish.png";
                    //     $("#publish-image-" + id).attr('src', imagePath);
                    // }
                },
                error: function () {
                    alert("error");
                }
            })
        });
    })(jQuery);
</script>
@endsection


@section('pagetitle')
<div class="row">
    <div class="col-sm-12">
        <!-- start: PAGE TITLE & BREADCRUMB -->
        <ol class="breadcrumb">
            <li><a href="{!! url(getLang() . '/admin') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Product</li>
        </ol>
        <div class="page-header">
            <h1> Products <small> | Control Panel</small> </h1>
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
                Panel Data
                <div class="panel-tools">
                    <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a>
                    <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-wrench"></i> </a>
                    <a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh"></i> </a>
                    <a class="btn btn-xs btn-link panel-close" href="#"> <i class="fa fa-times"></i> </a>
                </div>
            </div>
            <div class="panel-body">
                @include('flash::message')
                <div class="space12">
                    <div class="btn-group btn-group-lg">
                        <a class="btn btn-default active" href="javascript:void(0)"> Products </a>
                        <a class="btn btn-default hidden-xs" href="{!!  route('admin.product.create') !!}"><i class="fa fa-plus"></i> Add Product</a>
                        {{--         <a target="_blank" class="btn btn-default" href="">
                        Add Category
                        </a> --}}
                    </div>
                </div>
                <div class="widget search col-md-12">
                    <form role="form" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" autocomplete="off" placeholder="Search" name="keyword" value="{{@$keyword}}">
                            <span class="input-group-btn">
                                <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                </div>
                <table class="table">
                    <tr id="table-header">
                        <th colspan="1"><a href="{{ url(Request::url().'?sort=id&orderby=') }}{{ Request::get('orderby') == 'asc' ? 'desc' : 'asc'}}"># {!! Request::get('sort') == 'id' ? ( Request::get('orderby') == 'desc' ? '<i class="fa fa-angle-down"></i>' : '<i class="fa fa-angle-up"></i>' ) : '' !!}</a></td>
                        <th colspan="2"><a href="{{ url(Request::url().'?sort=name&orderby=') }}{{ Request::get('orderby') == 'asc' ? 'desc' : 'asc'}}">Product {!! Request::get('sort') == 'name' ? ( Request::get('orderby') == 'desc' ? '<i class="fa fa-angle-down"></i>' : '<i class="fa fa-angle-up"></i>' ) : '' !!}</a></td>
                        <th colspan="2"> <strong>SKU / UPC </strong> </th>
                        {{--<th colspan="1">Categories</td>--}}
                        <th colspan="1"><a href="{{ url(Request::url().'?sort=price&orderby=') }}{{ Request::get('orderby') == 'asc' ? 'desc' : 'asc'}}">Price {!! Request::get('sort') == 'price' ? ( Request::get('orderby') == 'desc' ? '<i class="fa fa-angle-down"></i>' : '<i class="fa fa-angle-up"></i>' ) : '' !!}</a></td>
                        <th colspan="1"><strong>Date added</strong></th>
                        <th colspan="1"><a href="{{ url(Request::url().'?sort=quantity&orderby=') }}{{ Request::get('orderby') == 'asc' ? 'desc' : 'asc'}}">Qty {!! Request::get('sort') == 'quantity' ? ( Request::get('orderby') == 'desc' ? '<i class="fa fa-angle-down"></i>' : '<i class="fa fa-angle-up"></i>' ) : '' !!}</a></td>
                        <th colspan="1"><a href="{{ url(Request::url().'?sort=status&orderby=') }}{{ Request::get('orderby') == 'asc' ? 'desc' : 'asc'}}">Status {!! Request::get('sort') == 'status' ? ( Request::get('orderby') == 'desc' ? '<i class="fa fa-angle-down"></i>' : '<i class="fa fa-angle-up"></i>' ) : '' !!}</a></td>
                        <th colspan="1">Published</th>
                       	<th colspan="2" class="text-center"> <strong>Actions</strong> </th>
                    </tr>
                    @foreach($products as $product)
                    <tr>
                        <td><a href="{{ url(getLang().'/admin/product/'.$product->id.'/edit') }}">{{ $product->id }}</a></td>
                        <td colspan="2" class="table-product-name">
                            <a  style="" href="{!! url(getLang().'/admin/product/'.$product->id.'/edit') !!}" class="fa fa-pencil-square-o fa-lg">
                                &nbsp; {!! $product->name !!}
                            </a>
                        </td>
                        <td colspan="2">{!! @$product->prices[0]->sku !!} / {!! @$product->prices[0]->upc !!}</td>
                        {{--<td> {!! $product->categories[0]->title !!} </td>--}}
                        {{--<td>--}}
                        {{--@foreach($product->categories as $category)--}}
                        {{--{!! $category->title !!}--}}
                        {{--@endforeach--}}
                        {{--</td>  --}}
                        <td>{{ $product->price }}</td>
                        <td colspan="1">{!!  $product->created_at->format('F d, Y') !!}</td>
                        <td>{{ $product->quantity }}</td>
                        <td id="status" >
                            @if ($product->status =='Online'||'online')
                            <span class="label label-primary w-300 normalize-label">{!! $product->status !!}</span>
                            @elseif ($product->status =='Offline')
                            <span class="label label-dark w-300 normalize-label"> {!! $product->status !!}</span>
                            @elseif ($product->status =='Removed')
                            <span class="label label-danger w-300 normalize-label">{!! $product->status !!}</span>
                            @elseif ($product->status =='Archived')
                            <span class="label label-warning w-300 normalize-label">{!! $product->status !!}</span>
                            @elseif ($product->status =='OnBackorder')
                            <span class="label label-warning normalize-label">{!! $product->status !!}</span>
                            @else
                            <span class="label  w-300 normalize-label" style="color:black">{!! $product->status !!}</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="#" id="{!! $product->id !!}" class="publish">
                                {!! ($product->is_published) ? '<i class="fa fa-check-circle-o fa-2x text-success" style="color:green"></i>' : '<i class="fa fa-times-circle fa-2x text-danger" style="color:red"></i>'  !!}
                                {{-- <img id="publish-image-{!! $product->id !!}" src="{!! url('/') !!}/assets/images/{!! ($product->is_published) ? 'publish.png' : 'not_publish.png'  !!}"/> --}}
                            </a>
                        </td>

                        <td colspan="2" class="text-center ">

                            <a href="{!! url(getLang().'/admin/product/'.$product->id.'/edit') !!}" class="edit btn btn-sm btn-info"><i class="fa fa-pencil"></i>&nbsp; Edit</a>
                            <a target="_blank" href="{!! url(getLang().'/product/' . $product->slug) !!}" class="preview btn btn-sm btn-danger"><i class="fa fa-eye"></i>&nbsp; Preview</a>
                            <a href="{!! url(getLang().'/admin/product/'.$product->id.'/delete') !!}" class="delete btn btn-sm btn-dark" onclick="return confirm('Are you sure?')">
                                <i class="fa fa-times-circle"></i>&nbsp; Remove</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
                {!! $products->appends(['sort' => Request::get('sort'), 'orderby' => Request::get('orderby') ])->render() !!}
            </div>
        </div>
    </div>
</div>
@endsection

@section('bottomscripts')
<script>
    (function ($) {
        $('.sidebar #products').addClass('active-section active open');
    });
</script>
@endsection

@section('clipinline')

@endsection
