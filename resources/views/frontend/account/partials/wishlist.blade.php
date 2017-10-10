<style type="text/css">
    .table-wishlist td{
        vertical-align: middle !important;
    }
</style>
<table class="table table-striped table-bordered table-wishlist">
    <tr id="table-header">
        <td class="text-center">&nbsp;</td>
        <td>Product</td>
        <td>Price</td>
        <td class="text-center" width="10%">Remove</td>
    </tr>
    @foreach($wishlist as $wl)
    <?php $product = $wl->product ?>
    <tr>            
        <td class="text-center"> @if($product->thumbnail)
            <a data-id="{!! $product->id!!}" data-name="{!! $product->name!!}" data-price="{!! $product->price!!}" data-brand="Grace" data-category="{!! $product->categories[0]->title !!}" class="goproduct" href="{!! url(getLang().'/product/'. $product->slug .'/') !!}">
                <img style="width:50px" src="{!! url('uploads/products/shop') !!}/{{ $product->thumbnail }}" alt="{!! $product->slug !!}">
            </a>
            @endif</td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->price }}</td>
        <td class="text-center" nowrap="nowrap">

            <span data-id="{{$wl->product_id}}" class="delete-wishlist fa fa-trash" role="button"></span>
        </td>
    </tr>

    @endforeach
</table>
<script>
    $('.delete-wishlist').click(function () {
        var url = "{{ url(getLang().'/cart/removefromwishlist/') }}";
        var $data = {};
        $this = $(this);
        $data.pid = $this.attr('data-id');
        $data.ajax = 1;
        $.ajax({
            type: 'POST',
            url: url,
            data: $data,
            cache: false,
            dataType: 'json',
            error: function (request, error) {
            },
            success: function (data) {
                $this.parents('tr').remove();
            }
        });
    });
</script>