@extends('backend/layout/clip')

@section('topcss')@endsection

@section('topscripts')@endsection

@section('pagetitle')
    <div class="row">
        <div class="col-sm-12">
            <!-- start: PAGE TITLE & BREADCRUMB -->
            <ol class="breadcrumb">
                <li><a href="{!! url(getLang() . '/admin') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Email  Post View</li>
            </ol>
            <div class="page-header">
                <h1>View Email <small> | Control Panel</small> </h1>
            </div>
            <!-- end: PAGE TITLE & BREADCRUMB -->
        </div>
    </div>
@endsection



@section('content')

<div class="container">
    <div class="pull-left">
        <div class="btn-toolbar">
            <a href="{!! langRoute('admin.form-post.index') !!}"
               class="btn btn-primary">
                <span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back
            </a>
        </div>
    </div>
    <br>
    <br>
    <br>
    <table class="table table-striped">
        <tbody>
        <tr>
            <td><strong>IP</strong></td>
            <td>{!! $formPost->created_ip !!}</td>
        </tr>
        <tr>
            <td><strong>Name and Surname</strong></td>
            <td>{!! e($formPost->sender_name_surname) !!}</td>
        </tr>
        <tr>
            <td><strong>Email</strong></td>
            <td>{!! $formPost->sender_email !!}</td>
        </tr>
        <tr>
            <td><strong>Phone Number</strong></td>
            <td>{!! e($formPost->sender_phone_number) !!}</td>
        </tr>
        <tr>
            <td><strong>Subject</strong></td>
            <td>{!! e($formPost->subject) !!}</td>
        </tr>
        <tr>
            <td><strong>Message</strong></td>
            <td>{!! e($formPost->message) !!}</td>
        </tr>
        </tbody>
    </table>
</div>
@endsection