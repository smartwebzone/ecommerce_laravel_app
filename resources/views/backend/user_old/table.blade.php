<table class="table table-responsive table-striped table-bordered table-hover" id="users-table">
    <thead>
        <th>Id</th>
        <th>Name</th>
       
        <th>Type</th>
<!--        <th>Username</th>-->
        <th>Email</th>

        <th>Phone</th>
        <th>Add Date</th>
        <th>Status</th>
        <th class="text-center">Action</th>
    </thead>
    <tbody>
    @foreach($users as $user)

        <tr>
            <td>{!! $user->id !!}</td>
            <td><a href="{!! route('admin.user.edit', [$user->id,'#panel_edit_account']) !!}">{!! $user->first_name !!} {!! $user->last_name !!} </a></td>
           
            <td>
            {{-- {!! $user->roles !!} --}}
            {!! $user->isAdmin == 1 ? 'Admin' : ($user->isDealer == 1?'Dealer':'Customer') !!}
            </td>
<!--            <td>{!! $user->username !!}</td>-->
            <td>{!! $user->email !!}</td>
            <td>{!! @$user->phone !!}</td>
            <td>{!! @$user->created_at !!}</td>
            <td>{!! (@$user->is_active ? 'Active' : 'Inactive') !!}</td>
            <td class="text-center">
                {!! Form::open(['route' => ['admin.user.destroy', $user->id ],'method' => 'delete']) !!}
                <div class='btn-group'>
<!--                    <a href="{!! route('admin.user.edit', [$user->id,'#panel_overview']) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>-->
                    <a href="{!! route('admin.user.edit', [$user->id,'#panel_edit_account']) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit" title="Edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash" title="Delete"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>

    @endforeach
    </tbody>
</table>
{!! $users->render() !!}
