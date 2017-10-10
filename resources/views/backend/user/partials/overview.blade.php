<div class="row">
    <div class="col-sm-5 col-md-5">
        <div class="user-left">
            <div class="center">
                <h4 style="text-transform: capitalize;"> {!! $user->first_name !!}   {!! $user->last_name !!} </h4>
                <small>username:  {!! $user->username !!} </small>
                <div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="user-image">
                        <div class="fileupload-new thumbnail">


                            @if(@$user->userInfo->photo)
                            <img itemprop="image" src="{!!@$user->userInfo->photo !!}" alt="img"/>
                            @else
                            <img itemprop="image" src="http://placehold.it/300x300" alt="..." />
                            @endif
                        </div>
                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 300px; max-height: 300px; line-height: 20px;"></div>
                        <div class="user-image-buttons">
                            <span class="btn btn-teal btn-file btn-sm"><span class="fileupload-new"><i class="fa fa-pencil"></i></span><span class="fileupload-exists"><i class="fa fa-pencil"></i></span>
                                <input type="file">
                            </span>
                            <a href="#" class="btn fileupload-exists btn-bricky btn-sm" data-dismiss="fileupload">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <hr>
                <p>
                    @if(@$user->userInfo->facebook_username)
                    <a target="_blank" class="btn btn-facebook btn-sm btn-squared" href="https://www.facebook.com/{!! @$user->userInfo->facebook_username !!}"> <i class="fa fa-facebook"></i> </a>
                    @elseif(@$user->userInfo->facebook_url)
                    <a target="_blank" class="btn btn-facebook btn-sm btn-squared" href="{!! @$user->userInfo->facebook_url !!}"> <i class="fa fa-facebook"></i> </a>
                    @endif
                    @if(@$user->userInfo->twitter_username)
                    <a target="_blank" class="btn btn-twitter btn-sm btn-squared" href="//twitter.com/{!! @$user->userInfo->twitter_username !!}"> <i class="fa fa-twitter"></i> </a>
                    @endif
                    @if(@$user->userInfo->instagram)
                    <a target="_blank" class="btn btn-instagram btn-sm btn-squared" href="https://www.instagram.com/{!! @$user->userInfo->instagram !!}"> <i class="fa fa-instagram"></i> </a>
                    @endif
                    @if(@$user->userInfo->linked_in_url)
                    <a target="_blank" class="btn btn-linkedin btn-sm btn-squared" href="{!! @$user->userInfo->linked_in_url !!}"> <i class="fa fa-linkedin"></i> </a>
                    @endif
                    @if(@$user->userInfo->google_plus_url)
                    <a target="_blank" class="btn btn-google-plus btn-sm btn-squared" href="{!! @$user->userInfo->google_plus_url !!}"> <i class="fa fa-google-plus"></i> </a>
                    @endif
                    @if(@$user->userInfo->githubid)
                    <a target="_blank" class="btn btn-github btn-sm btn-squared" href="{!! @$user->userInfo->githubid !!}"> <i class="fa fa-github"></i> </a>
                    @endif
                </p>
                <hr>
            </div>


            <table class="table table-condensed table-hover">
                <thead>
                    <tr>
                        <th colspan="3">Contact Information</th>
                    </tr>
                </thead>
                <tbody>
                    @if(@$user->userInfo->company)
                    <tr>
                        <td>Company:</td>
                        <td style="text-transform: capitalize;">
                            <a href="#">
                                {!! @$user->userInfo->company !!}
                            </a>
                        </td>
                        {{-- <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td> --}}
                    </tr>
                    @endif
                    @if(@$user->userInfo->website)
                    <tr>
                        <td>Website:</td>
                        <td>
                            <a href="#">
                                {{ @@$user->userInfo->website }}
                            </a>
                        </td>
                        {{-- <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td> --}}
                    </tr>
                    @endif

                    @if($user->email)
                    <tr>
                        <td>Email:</td>
                        <td>
                            <a href="">
                                {!! $user->email !!}
                            </a>
                        </td>
                        {{-- <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td> --}}
                    </tr>
                    @endif

                    @if(@$user->userInfo->phone)
                    <tr>
                        <td>Phone:</td>
                        <td>{!! @$user->userInfo->phone !!}</td>
                    </tr>
                    @endif

                    @if(@$user->userInfo->mobile)
                    <tr>
                        <td>Mobile:</td>
                        <td> {!! @$user->userInfo->mobile !!} </td>
                        {{--   <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td> --}}
                    </tr>
                    @endif

                    @if(@$user->userInfo->work)
                    <tr>
                        <td>Work:</td>
                        <td> {!! @$user->userInfo->work !!} </td>
                        {{--   <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td> --}}
                    </tr>
                    @endif

                    @if(@$user->userInfo->other)
                    <tr>
                        <td>Other:</td>
                        <td>{!!  @$user->userInfo->other !!} </td>
                        {{--   <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td> --}}
                    </tr>
                    @endif

                    @if(@$user->userInfo->skypeid)
                    <tr>
                        <td>Skype</td>
                        <td>
                            <a href="">
                                {!! @$user->userInfo->skypeid !!}
                            </a>
                        </td>
                        {{-- <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td> --}}
                    </tr>
                    @endif
                </tbody>
            </table>
            @if(@$user->userInfo->is_employee)
            {{-- @includes('backend.user.partials.employee') --}}

            @endif
            <table class="table table-condensed table-hover">
                <thead>
                    <tr>
                        <th colspan="3">Additional information</th>
                    </tr>
                </thead>
                <tbody>
                    @if($user->last_login)
                    <tr>
                        <td>Last Logged In:</td>
                        <td> {!! date('g:i A \o\n l jS F Y', strtotime($user->last_login)) !!} </td>
                        {{-- <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td> --}}
                    </tr>
                    @endif
                    @if($user->isDealer)
                    <tr>
                        <td>Tier:</td>
                        <td>{{$user->tier->first()->title}}</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-sm-7 col-md-7">
        @if(@$user->userInfo->about_me)
        <h3>About Me </h3>
        <p> {!! @$user->userInfo->about_me !!}</p>
        @endif
        <!--        <p>
            Be the first to get savings and offers when you sign up for Jeevandeeps's emails and texts.
            </p> -->
    </div>
</div>