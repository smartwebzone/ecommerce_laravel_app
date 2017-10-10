<H3>User Catalog Info :</H3>
<hr>
@foreach($data as $key=>$value )
    @if($key != 'user-data')
    <div>
        {!! '<strong>'.ucfirst(str_replace('-',' ',$key)).'</strong>'.' : '.$value !!}
    </div>
    @endif
@endforeach
