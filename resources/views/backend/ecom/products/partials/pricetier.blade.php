<table class="table table-striped table-hover table-bordered" id="product-tier-table">
    <thead>
        <tr>
            @if($tier->count()>0)
            @foreach($tier as $tr)
            <th>{{$tr->title}} :</th>
            @endforeach
            @endif
        </tr>
    </thead>
    <tbody>
        @if($tier->count()>0)
        <tr>
            @foreach($tier as $tr)
            <?php $pricetier = $price->tier->where('tier_id',$tr->id)->first()?>
            <td class="tier-body">                
               <input type="text" placeholder="Price" class="text-center form-control" name="prices[tier][{{$i}}][price][]" value="{{@$pricetier->price}}" />
                <input type="hidden" name="prices[tier][{{$i}}][id][]" value="{{$tr->id}}"/>
            </td>
            @endforeach
        </tr>
       
        @endif
    </tbody>
</table>