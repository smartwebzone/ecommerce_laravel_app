                                <table class="table table-condensed table-hover">
                                    <thead>
                                        <tr>
                                            <th colspan="3">General information</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($user->userInfo->position)
                                        <tr>
                                            <td>Position</td>
                                            <td> $user->userInfo->position </td>
                                            <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
                                        </tr>
                                        @endif
                                        @if($user->userInfo->employment_title)
                                        <tr>
                                            <td>Position</td>
                                            <td> $user->userInfo->employment_title </td>
                                            <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
                                        </tr>
                                        @endif
                                        @if($user->userInfo->supervisor)
                                        <tr>
                                            <td>Supervisor</td>
                                            <td>
                                                <a href="#">
                                                 $user->userInfo->supervisor
                                                </a>
                                            </td>
                                            <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
                                        </tr>
                                        @endif
                                        @if($user->userInfo->employment_status)
                                        <tr>
                                            <td>Status</td>
                                            <td><span class="label label-sm label-info"> $user->userInfo->employment_status </span></td>
                                            <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
                                        </tr>
                                        @endif
                                        @if($user->userInfo->employment_role)
                                        <tr>
                                            <td>Role</td>
                                            <td><span class="label label-sm label-info"> $user->userInfo->employment_role </span></td>
                                            <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
