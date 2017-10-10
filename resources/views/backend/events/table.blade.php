<table class="table table-responsive" id="events-table">
    <thead>
        <th>Title</th>
        <th>Slug</th>
        <th>Ticket Vendor Id</th>
        <th>Ticket Vendor</th>
        <th>Venue</th>
        <th>Starts</th>
        <th>Start Time</th>
        <th>Ends</th>
        <th>End Time</th>
        <th>Text Date</th>
        <th>Event Image</th>
        <th>Event Image Alt</th>
        <th>Video Url</th>
        <th>Video Id</th>
        <th>Summary</th>
        <th>Content</th>
        <th>Link Text</th>
        <th>Link Url</th>
        <th>Map Zoom</th>
        <th>Latitude</th>
        <th>Longitude</th>
        <th>Marker Title</th>
        <th>Is Sticky</th>
        <th>In Rss</th>
        <th>Is Repeating</th>
        <th>Meta Description</th>
        <th>Meta Keywords</th>
        <th>Status</th>
        <th>Published Date</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($events as $event)
        <tr>
            <td>{!! $event->title !!}</td>
            <td>{!! $event->slug !!}</td>
            <td>{!! $event->ticket_vendor_id !!}</td>
            <td>{!! $event->ticket_vendor !!}</td>
            <td>{!! $event->venue !!}</td>
            <td>{!! $event->starts !!}</td>
            <td>{!! $event->start_time !!}</td>
            <td>{!! $event->ends !!}</td>
            <td>{!! $event->end_time !!}</td>
            <td>{!! $event->text_date !!}</td>
            <td>{!! $event->event_image !!}</td>
            <td>{!! $event->event_image_alt !!}</td>
            <td>{!! $event->video_url !!}</td>
            <td>{!! $event->video_id !!}</td>
            <td>{!! $event->summary !!}</td>
            <td>{!! $event->content !!}</td>
            <td>{!! $event->link_text !!}</td>
            <td>{!! $event->link_url !!}</td>
            <td>{!! $event->map_zoom !!}</td>
            <td>{!! $event->latitude !!}</td>
            <td>{!! $event->longitude !!}</td>
            <td>{!! $event->marker_title !!}</td>
            <td>{!! $event->is_sticky !!}</td>
            <td>{!! $event->in_rss !!}</td>
            <td>{!! $event->is_repeating !!}</td>
            <td>{!! $event->meta_description !!}</td>
            <td>{!! $event->meta_keywords !!}</td>
            <td>{!! $event->status !!}</td>
            <td>{!! $event->published_date !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.events.destroy', $event->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.events.show', [$event->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.events.edit', [$event->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>