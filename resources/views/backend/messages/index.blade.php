@extends('backend/layout/messages')


@section('topscripts')@endsection

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
		<ul class="messages-list">
			<li class="messages-search">
				<form action="#" class="form-inline">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search messages...">
						<div class="input-group-btn">
							<button class="btn btn-primary" type="button">
								<i class="fa fa-search"></i>
							</button>
						</div>
					</div>
				</form>
			</li>
			<li class="messages-item">
				<span title="Mark as starred" class="messages-item-star"><i class="fa fa-star"></i></span>
				<img alt="" src="assets/images/avatar-1.jpg" class="messages-item-avatar">
				<span class="messages-item-from">Peter Clark</span>
				<div class="messages-item-time">
					<span class="text">{!! date('F d, Y', strtotime($article->created_at)) !!}</span>
					<span><a href="#" id="{!! $formPost->id !!}" class="answer">
                        <img id="answer-image-{!! $formPost->id !!}" src="{!!url('/assets/images')!!}/{!! ($formPost->is_answered) ? 'answered.png' : 'not_answered.png'  !!}"/>
                    </a></span>
					<div class="messages-item-actions">
						<a data-toggle="dropdown" title="Reply" href="#"><i class="fa fa-mail-reply"></i></a>
						<div class="dropdown">
							<a data-toggle="dropdown" title="Move to folder" href="#"><i class="fa fa-folder-open"></i></a>
							<ul class="dropdown-menu pull-right">
								<li>
									<a href="#">
										<i class="fa fa-pencil"></i> Mark as Read
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fa fa-ban"></i> Spam
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fa fa-trash-o"></i> Delete
									</a>
								</li>
							</ul>
						</div>
						<div class="dropdown">
							<a data-toggle="dropdown" title="Attach to tag" href="#"><i class="fa fa-tag"></i></a>
							<ul class="dropdown-menu pull-right">
								<li>
									<a href="#"><i class="tag-icon red"></i>Important</a>
								</li>
								<li>
									<a href="#"><i class="tag-icon teal"></i>Work</a>
								</li>
								<li>
									<a href="#"><i class="tag-icon green"></i>Home</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<span class="messages-item-subject">{!! $formPost->subject !!}</span>
				<span class="messages-item-preview">{!! $formPost->message !!}</span>
			</li>

		</ul>
		<div class="messages-content">
			<div class="message-header">
				<div class="message-time">
					11 NOV 2014, 11:46 PM
				</div>
				<div class="message-from">
					Nicole Bell &lt;nicole@example.com&gt;
				</div>
				<div class="message-to">
					To: Peter Clark
				</div>
				<div class="message-subject">
					{!! $formPost->subject !!}
				</div>
				<div class="message-actions">
					<a title="Move to trash" href="#"><i class="fa fa-trash-o"></i></a>
					<a title="Reply" href="#"><i class="fa fa-reply"></i></a>
					<a title="Reply to all" href="#"><i class="fa fa-reply-all"></i></a>
					<a title="Forward" href="#"><i class="fa fa-long-arrow-right"></i></a>
					 <a href="#" id="{!! $formPost->id !!}" class="answer">
                        <img id="answer-image-{!! $formPost->id !!}" src="{!!url('/assets/images')!!}/{!! ($formPost->is_answered) ? 'answered.png' : 'not_answered.png'  !!}"/>
                    </a>
				</div>
			</div>
			<div class="message-content">
			{!! $formPost->message !!}
			</div>
		</div>
	</div>
</div>
<!-- end: INBOX PANEL -->
@endsection

@section('bottomscripts')
	<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->

	<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
@endsection

@section('clipinline')@endsection
