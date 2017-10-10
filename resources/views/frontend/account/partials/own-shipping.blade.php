<style type="text/css">
    .table-shipping td{
        vertical-align: middle !important;
    }
</style>
<table class="table table-striped table-bordered table-shipping">
    <tr id="table-header">
        <td>Account</td>
        <td>Number</td>
        <td class="text-center" width="10%">Remove</td>
    </tr>
    @foreach($ownshipping as $os)
    <tr>            
      
        <td>{{ $os->account }}</td>
        <td>{{ $os->number }}</td>
        <td class="text-center" nowrap="nowrap">

            <span data-id="{{$os->id}}" class="delete-shipping fa fa-trash" role="button"></span>
        </td>
    </tr>

    @endforeach
    <tr>
        <td colspan="3">
            <input type="button" name="add" id="addnew" value="Add New">
        </td>
    </tr>
</table>
<script>
    $('.delete-shipping').click(function () {
        var url = "{{ url(getLang().'/cart/removefromshipping/') }}";
        var $data = {};
        $this = $(this);
        $data.id = $this.attr('data-id');
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
    function addshipping($this) {
        var url = "{{ url(getLang().'/cart/addownshipping/') }}";
        var $data = {};
        $this = $this.parents('tr');
        $data.account = $this.find('#account').val();
        $data.number = $this.find('#number').val();
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
                window.location.reload();
            }
        });
    }
    $('#addnew').click(function(){
        select= '{!! Form::select("account", getShippingAccount(), old("account"), ["id" => "account","class"=>"form-control"]) !!}';
        cancel='<span onclick="$(this).parents(\'tr\').remove()" class="fa fa-trash" role="button"></span>';
        ok='<span class="add-shipping fa fa-check" style="margin-left:10px" role="button" onclick="addshipping($(this))"></span>';
        html="<tr><td>"+select+"</td><td><input type='text' id='number' name='number' class='form-control'></td><td class='text-center'> "+cancel+" "+ok+" </td></tr>";
        $(this).parents('tr').before(html);
    });
</script>