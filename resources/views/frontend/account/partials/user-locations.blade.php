<table class="table table-responsive" id="locations-table">
    <thead>
        <th>Nickname</th>
        <th>City</th>
        <th>State</th>
        <th>Zipcode</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($locations as $location)
        <tr>
            <td>{!! $location->nickname !!}</td>
            <td>{!! $location->city !!}</td>
            <td>{!! $location->state !!}</td>
            <td>{!! $location->zipcode !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.locations.destroy', $location->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.locations.show', [$location->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.locations.edit', [$location->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
