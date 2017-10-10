@extends('backend/layout/messages')


@section('topjs')
<style type="text/css">
    .messages-list .messages-item{padding:5px !important;}
</style>
<script type="text/javascript">
    function toggleRead(id) {
    
            $.ajax({
            type: "POST",
                    url: "{!! url( getLang() . '/admin/form-post/" + id + "/toggle-read/') !!}",
                    headers: {
                    'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                    },
                    success: function (response) {
                    },
                    error: function () {
                    }
            });
            $('#message-item-'+id).css('font-weight', 'bold')
            $('.messages-content').toggleClass('hide');
            $('.messages-hide').toggleClass('hide');
        }
    $(document).ready(function () {
    $('#notification').show().delay(4000).fadeOut(700);
            // answer settings
            $(".messages-item").bind("click", function (e) {
    var id = $(this).attr('data-id');
            $.ajax({
            type: "POST",
                    url: "{!! url( getLang() . '/admin/form-post/" + id + "/make-read/') !!}",
                    headers: {
                    'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                    },
                    success: function (response) {
                    },
                    error: function () {
                    }
            });
            $(this).css('font-weight', 'normal')
            $('.messages-content').removeClass('hide');
            $('.messages-hide').addClass('hide');
            $('.messages-content .message-time').text($(this).find('.messages-item-time .text').text());
            $('.messages-content .message-from').text($(this).find('.messages-item-fromm').text());
            $('.messages-content .message-actions').html($(this).find('.messages-item-actions').html());
            $('.messages-content .message-phone').text($(this).find('.messages-item-phone').text());
            $('.messages-content .message-email').text($(this).find('.messages-item-email').text());
            $('.messages-content .message-subject').text('Subject: ' + $(this).find('.messages-item-subject').text());
            $('.messages-content .message-content').text($(this).find('.messages-item-preview').text());
            $('.messages-content .message-answered').html($(this).find('.messages-item-answered').html());
            $('.messages-content .message-reply').html($(this).find('.messages-item-reply').html());
            //$('.messages-content .answer').html($(this).find('.answer').html());
            //$('.messages-content .answer').attr('id', $(this).find('.answer').attr('id'));
    });
    
    
    {{--$(".answer").bind("click", function (e) {--}}
    {{--var id = $(this).attr('id'); --}}
    {{--e.preventDefault(); --}}
    {{--$.ajax({--}}
    {{--type: "POST", --}}
    {{--url: "{!! url( getLang() . '/admin/form-post/" + id + "/toggle-answer/') !!}", --}}
    {{--headers: {--}}
    {{--'X-CSRF-Token': $('meta[name="_token"]').attr('content')--}}
    {{--}, --}}
    {{--success: function (response) {--}}
    {{--if (response['result'] == 'success') {--}}
    {{--var imagePath = (response['changed'] == 1) ? "{!!url('/')!!}/assets/images/answered.png" : "{!!url('/')!!}/assets/images/not_answered.png"; --}}
    {{--$(".answer-image-" + id).attr('src', imagePath); --}}
    {{--}--}}
    {{--}, --}}
    {{--error: function () {--}}
    {{--alert("error"); --}}
    {{--}--}}
    {{--})--}}
    {{--}); --}}
    });</script>
@endsection

@section('pagetitle')
<div class="row">
    <div class="col-sm-12">
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('admin.dashboard') !!}">Dashboard</a></li>
            <li class="active">messages</li>
        </ol>
        <div class="page-header">
            <h1> Messages <small> | INBOX Panel</small> </h1>
        </div>
    </div>
</div>
@endsection

@section('content')
<!-- start: INBOX PANEL -->
<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-envelope-o"></i> Inbox
        <div class="panel-tools">
            <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a>
            <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-wrench"></i> </a>
            <a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh"></i> </a>
            <a class="btn btn-xs btn-link panel-expand" href="#"> <i class="fa fa-resize-full"></i> </a>
            <a class="btn btn-xs btn-link panel-close" href="#"> <i class="fa fa-times"></i> </a>
        </div>
    </div>
    <div class="panel-body messages">
        <ul class="messages-list" style="overflow-x: hidden;overflow-y: scroll">
            <li class="messages-search">
                <form action="#" class="form-inline">
                    <div class="input-group">
                        <input type="text" name="search" value="{{@$search}}" class="form-control" placeholder="Search messages...">
                        <div class="input-group-btn">
                            <button class="btn btn-primary" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>

                    </div>
                    <div style="margin-top:5px;width: 100%">
                        <select name="status" class="form-control" onchange="this.form.submit()">
                            <option value=""> Show All Messages </option>
                            <option {!!(@$status=='replied')?'selected':''!!} value="replied">Replied</option>
                            <option {!!(@$status=='not_replied')?'selected':''!!} value="not_replied">Not Replied</option>
                        </select>
                    </div>
                    <div style="margin-top:5px;width: 100%">
                        <select name="read_status" class="form-control" onchange="this.form.submit()">
                            <option value=""> Show All Messages </option>
                            <option {!!(@$read_status=='read')?'selected':''!!} value="read">Read</option>
                            <option {!!(@$read_status=='unread')?'selected':''!!} value="unread">Unread</option>
                        </select>
                    </div>
                </form>
            </li>
            @if($formPosts->count())
            <?php $formPostshow = FALSE; ?>
            @foreach( $formPosts as $formPost )
            <li id="message-item-{{ $formPost->id}}" data-id="{{ $formPost->id}}" class="messages-item" style="{!! ($formPost->is_read) ? '' : 'font-weight: bold!important;'  !!}">
<!--                <span title="Mark as starred" class="messages-item-star"><i class="fa fa-star"></i></span>-->
<!--                <img alt="" src="assets/images/avatar-1.jpg" class="messages-item-avatar">-->
                <span class="messages-item-fromm" style="margin-left: 0px">{{ $formPost->sender_name_surname}}</span>
                <div class="messages-item-time">
                    <span class="text">{!! date('M d, Y', strtotime($formPost->created_at)) !!}</span>
                    <span><a href="#" id="{!! $formPost->id !!}" class="answer">
                            {{--<img class="answer-image-{!! $formPost->id !!}" src="{!!url('/assets/images')!!}/{!! ($formPost->is_answered) ? 'answered.png' : 'not_answered.png'  !!}"/>--}}
                        </a></span>


                </div>
                <div class="messages-item-actions hide">
                    <a title="Move to trash" href="{!! route('admin.form-post.delete', [$formPost->id,'#']) !!}"><i class="fa fa-trash-o"></i></a>
                    <a title="Reply" onclick="$('.message-reply').toggle()" href="#message-reply"><i class="fa fa-reply"></i></a>
<!--                        <a title="Reply to all" href="#"><i class="fa fa-reply-all"></i></a>
                    <a title="Forward" href="#"><i class="fa fa-long-arrow-right"></i></a>-->
                    <a title="Mark as Unread" onClick="toggleRead({{ $formPost->id}});" href="#"><i id="read-check-{{ $formPost->id}}"  class="fa fa-check" style="color:greenyellow"></i></a>
                    <a href="#" id="{!! $formPost->id !!}" class="answer">
                        <img class="answer-image-{!! $formPost->id !!}" src="{!!url('/assets/images')!!}/{!! ($formPost->is_answered) ? 'answered.png' : 'not_answered.png'  !!}"/>
                    </a>
                </div>
                <span class="messages-item-subject"  style="margin-left: 0px">{!! $formPost->subject !!}</span>
                <span class="messages-item-preview hide">{!! $formPost->message !!}</span>
                <span class="messages-item-email hide">From: {!! $formPost->sender_email !!}</span>
                <span class="messages-item-answered hide"> @if($formPost->reply)
                    <b>ANSWERED :</b>
                    {!! $formPost->reply !!}
                    @endif</span>
                <span class="messages-item-reply hide">
                    <form method="POST">
                        <input type="hidden" name="sender_email" value="{{$formPost->sender_email}}">
                        <input type="hidden" name="sender_name_surname" value="{{$formPost->sender_name_surname}}">
                        <input type="hidden" name="subject" value="{{$formPost->subject}}">
                        <input type="hidden" name="message" value="{{$formPost->message}}">
                        <input type="hidden" name="id" value="{{$formPost->id}}">
                        <textarea class="form-control" rows="6" name="post"></textarea>
                        <input type="submit" name="REPLY" value="REPLY" class="btn btn-success col-md-12">
                    </form>
                </span>
                <span class="messages-item-phone hide">
                    @if($formPost->sender_phone_number)
                    Phone: {!! $formPost->sender_phone_number !!}
                    @endif
                </span>
            </li>
            <?php
            if (isset($_GET['id']) && $_GET['id'] == $formPost->id) {
                $formPostshow = $formPost;
            }
            ?>
            @endforeach
            @else
            <li><div class="alert alert-danger">No results found</div></li>
            @endif
        </ul>

        @if($formPosts->count())
        @if(!@$formPostshow)
        <div class="messages-hide" style="padding:20px;display:inline-block;">
            Select Message From Left Panel To View Content 
        </div>
        @endif
        <div class="messages-content {{(@$formPostshow)?'':'hide'}}">
            <div class="message-header">
                <div class="message-time">
                    {!! date('M d, Y', strtotime(@$formPostshow->created_at)) !!}
                </div>
                <div class="message-from">
                    {!! @$formPostshow->sender_name_surname !!}<br/>
                    <{!! @$formPostshow->sender_email !!}>
                </div>
                <div class="message-phone">
                    @if(@$formPostshow->sender_phone_number)
                    Phone: {!! @$formPostshow->sender_phone_number !!}
                    @endif
                </div>

                <div class="message-email">
                    From: {!! @$formPostshow->sender_email !!}
                </div>
                <div class="message-to">
                    To: info@graceframe.com
                </div>
                <div class="message-subject">
                    Subject: {!! @$formPostshow->subject !!}
                </div>
                <div class="message-actions">
                    <a title="Move to trash" href="{!! route('admin.form-post.delete', [@$formPostshow->id,'#']) !!}"><i class="fa fa-trash-o"></i></a>
                    <a title="Reply" onclick="$('.message-reply').toggle()" href="#message-reply"><i class="fa fa-reply"></i></a>
<!--                    <a title="Reply to all" href="#"><i class="fa fa-reply-all"></i></a>
                    <a title="Forward" href="#"><i class="fa fa-long-arrow-right"></i></a>-->
                    <a href="#" id="{!! @$formPostshow->id !!}" class="answer">
                        <img class="answer-image-{!! @$formPostshow->id !!}" src="{!!url('/assets/images')!!}/{!! (@$formPostshow->is_answered) ? 'answered.png' : 'not_answered.png'  !!}"/>
                    </a>
                </div>
            </div>
            <div class="message-content" style="min-height: 300px">
                {!! @$formPostshow->message !!}
            </div>
            <div class="message-answered col-md-12" style="min-height: 100px">
                @if(@$formPostshow->reply)
                <b>ANSWERED :</b>
                {!! @$formPostshow->reply !!}
                @endif
            </div>
            <div class="message-reply col-md-12 text-center" id="message-reply" style="display:none">
                <form method="POST">
                    <input type="hidden" name="sender_email" value="{{@$formPostshow->sender_email}}">
                    <input type="hidden" name="sender_name_surname" value="{{@$formPostshow->sender_name_surname}}">
                    <input type="hidden" name="subject" value="{{@$formPostshow->subject}}">
                    <input type="hidden" name="message" value="{{@$formPostshow->message}}">
                    <input type="hidden" name="id" value="{{@$formPostshow->id}}">
                    <textarea class="form-control" rows="6" name="post"></textarea>
                    <input type="submit" name="REPLY" value="REPLY" class="btn btn-success col-md-12">
                </form>
            </div>
        </div>

        @endif
    </div>
    <div class="col-md-12 text-center">
        {!! $formPosts->render() !!}
    </div>
</div>
<!-- end: INBOX PANEL -->
@endsection

@section('bottomscripts')
<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->

<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
@endsection

@section('clipinline')@endsection
