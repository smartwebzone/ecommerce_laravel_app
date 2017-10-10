<div class="repeat">
    <div class="col-lg-12">
        <div class="wrapper">
            <div class="alert-container row">
                <p><span class="btn btn-primary add"><span class="glyphicon glyphicon-plus"></span>&nbsp; Add</span></p>
                @if(isset($alerts) && count($alerts)>0)
                @foreach($alerts as $ky=>$alert)
                     <div class="col-md-6 row">
                         
                    <table id="table-alert{{$ky}}" class="table table-condensed" width="100%" style="border-collapse:collapse;">
                        <tbody>
                        <tr data-toggle="collapse" data-target="#alert{{$ky}}" class="accordion-toggle template bg-primary">
                            <td style="max-width:5%"> <span class="btn btn-default btn-xs"><span class="glyphicon glyphicon-eye-open"></span></span> </td>
                            <td style="min-width:90%">
                                <input value="{{$alert['alert_title']}}" id="alert_title" class="form-control" name="alerts[{{$ky}}][alert_title]" type="text" placeholder="  Alert Title" style="min-width:100%" />
                                <input type="hidden" name="alerts[{{$ky}}][id]" value="{{$alert['id']}}">
                            </td>
                            <td style="max-width:5%"> <span class="btn btn-default btn-xs"><span class="remove glyphicon glyphicon-remove"></span></span>  </td>
                        </tr>
                        <tr>
                            <td colspan="12" class="hiddenRow">
                                <div class="accordian-body collapse" id="alert{{$ky}}">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>LAYOUT</th>
                                            <th>TYPE</th>
                                            <th>ICON</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <select id="alertstyle" name="alerts[{{$ky}}][alertstyle]" class="form-control">
                                                    <option value="" class="">-- layout --</option>
                                                    <option <?=($alert['alertstyle']=='style-msg')?'selected':''?> value="style-msg">Message Box</option>
                                                    <option <?=($alert['alertstyle']=='style-msg2')?'selected':''?> value="style-msg2">Message Panel</option>
                                                    <option <?=($alert['alertstyle']=='alert')?'selected':''?> value="alert">Alert Box</option>
                                                    <option <?=($alert['alertstyle']=='closable')?'selected':''?> value="closable">Closable Alert Box</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select id="alerttype" name="alerts[{{$ky}}][alerttype]" class="form-control">
                                                    <option value="" class="">-- type --</option>
                                                    <option <?=($alert['alerttype']=='successmsg')?'selected':''?> value="successmsg" class="style-msg2">Success Message</option>
                                                    <option <?=($alert['alerttype']=='errormsg')?'selected':''?> value="errormsg" class="style-msg2">Error Message</option>
                                                    <option <?=($alert['alerttype']=='infomsg')?'selected':''?> value="infomsg" class="style-msg2">Info Message</option>
                                                    <option <?=($alert['alerttype']=='alertmsg')?'selected':''?> value="alertmsg" class="style-msg2">Warning Message</option>
                                                    <option <?=($alert['alerttype']=='alert-success')?'selected':''?> value="alert-success" class="alert">Alert Success</option>
                                                    <option <?=($alert['alerttype']=='alert-error')?'selected':''?> value="alert-error" class="alert">Alert Error</option>
                                                    <option <?=($alert['alerttype']=='alert-info')?'selected':''?> value="alert-info" class="alert">Alert Info</option>
                                                    <option <?=($alert['alerttype']=='alert-warning')?'selected':''?> value="alert-warning" class="alert">Alert Warning</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select id="alerticon" name="alerts[{{$ky}}][alerticon]" class="form-control">
                                                    <option value="" class="">-- icon --</option>
                                                    <option <?=($alert['alerticon']=='fa-exclamation')?'selected':''?> value="fa-exclamation" class="alertmsg alert-warning alert-success successmsg">fa-exclamation</option>
                                                    <option <?=($alert['alerticon']=='fa-thumbs-up')?'selected':''?> value="fa-thumbs-up" class="alert-success successmsg">fa-thumbs-up</option>
                                                    <option <?=($alert['alerticon']=='fa-exclamation-triangle')?'selected':''?> value="fa-exclamation-triangle" class="errormsg alert-error">fa-exclamation-triangle</option>
                                                    <option <?=($alert['alerticon']=='fa-indo-circle')?'selected':''?> value="fa-info-circle" class="infomsg alert-info">fa-info-circle</option>
                                                    <option <?=($alert['alerticon']=='fa-bell-o')?'selected':''?> value="fa-bell-o" class="alert-success successmsg">fa-bell-o</option>
                                                    <option <?=($alert['alerticon']=='fa-exclamation-circle')?'selected':''?> value="fa-exclamation-circle" class="alertmsg alert-warning alert-success successmsg errormsg alert-error">fa-exclamation-circle</option>
                                                    <option <?=($alert['alerticon']=='fa-sticky-note')?'selected':''?> value="fa-sticky-note" class="alertmsg alert-warning infomsg alert-info">fa-sticky-note</option>
                                                    <option <?=($alert['alerticon']=='fa-comment')?'selected':''?> value="fa-comment" class="alertmsg alert-warning">fa-comment</option>
                                                    <option <?=($alert['alerticon']=='fa-commenting')?'selected':''?> value="fa-commenting" class="alertmsg alert-warning">fa-commenting</option>
                                                    <option <?=($alert['alerticon']=='fa-comments')?'selected':''?> value="fa-comments" class="alertmsg alert-warning">fa-comments</option>
                                                    <option <?=($alert['alerticon']=='fa-th-list')?'selected':''?> value="fa-th-list" class="infomsg alert-info">fa-th-list</option>
                                                    <option <?=($alert['alerticon']=='fa-history')?'selected':''?> value="fa-history" class="infomsg alert-info">fa-history</option>
                                                    <option <?=($alert['alerticon']=='fa-list=alt')?'selected':''?> value="fa-list-alt" class="infomsg alert-info errormsg alert-error">fa-list-alt</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <textarea id="alert_message" name="alerts[{{$ky}}][alert_message]" rows="5"  style="min-width: 100%" placeholder="&nbsp; Alert Message">{{$alert['alert_message']}}</textarea>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                @endforeach
                @endif
                <div class="col-md-6 template">
                    <table id="table-alert({alert-row-count})" class="table table-condensed" width="100%" style="border-collapse:collapse;">
                        <tbody>
                        <tr data-toggle="collapse" data-target="#alert({alert-row-count})" class="accordion-toggle template row bg-primary">
                            <td style="max-width:5%"> <span class="btn btn-default btn-xs"><span class="glyphicon glyphicon-eye-open"></span></span> </td>
                            <td style="min-width:90%">
                                <input id="alert_title" class="form-control" name="alerts[({alert-row-count})][alert_title]" type="text" placeholder="  Alert Title" style="min-width:100%" />
                            </td>
                            <td style="max-width:5%"> <span class="btn btn-default btn-xs"><span class="remove glyphicon glyphicon-remove"></span></span>  </td>
                        </tr>
                        <tr>
                            <td colspan="12" class="hiddenRow">
                                <div class="accordian-body collapse" id="alert({alert-row-count})">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>LAYOUT</th>
                                            <th>TYPE</th>
                                            <th>ICON</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <select id="alertstyle" name="alerts[({alert-row-count})][alertstyle]" class="form-control">
                                                    <option value="" class="">-- layout --</option>
                                                    <option value="style-msg">Message Box</option>
                                                    <option value="style-msg2">Message Panel</option>
                                                    <option value="alert">Alert Box</option>
                                                    <option value="closable">Closable Alert Box</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select id="alerttype" name="alerts[({alert-row-count})][alerttype]" class="form-control">
                                                    <option value="" class="">-- type --</option>
                                                    <option value="successmsg" class="style-msg">Success Message</option>
                                                    <option value="errormsg" class="style-msg">Error Message</option>
                                                    <option value="infomsg" class="style-msg">Info Message</option>
                                                    <option value="alertmsg" class="style-msg">Warning Message</option>
                                                    <option value="successmsg" class="style-msg2">Success Message</option>
                                                    <option value="errormsg" class="style-msg2">Error Message</option>
                                                    <option value="infomsg" class="style-msg2">Info Message</option>
                                                    <option value="alertmsg" class="style-msg2">Warning Message</option>
                                                    <option value="alert-success" class="alert">Alert Success</option>
                                                    <option value="alert-error" class="alert">Alert Error</option>
                                                    <option value="alert-info" class="alert">Alert Info</option>
                                                    <option value="alert-warning" class="alert">Alert Warning</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select id="alerticon" name="alerts[({alert-row-count})][alerticon]" class="form-control">
                                                    <option value="" class="">-- icon --</option>
                                                    <option value="fa-exclamation" class="alertmsg alert-warning alert-success successmsg">fa-exclamation</option>
                                                    <option value="fa-thumbs-up" class="alert-success successmsg">fa-thumbs-up</option>
                                                    <option value="fa-exclamation-triangle" class="errormsg alert-error">fa-exclamation-triangle</option>
                                                    <option value="fa-info-circle" class="infomsg alert-info">fa-info-circle</option>
                                                    <option value="fa-bell-o" class="alert-success successmsg">fa-bell-o</option>
                                                    <option value="fa-exclamation-circle" class="alertmsg alert-warning alert-success successmsg errormsg alert-error">fa-exclamation-circle</option>
                                                    <option value="fa-sticky-note" class="alertmsg alert-warning infomsg alert-info">fa-sticky-note</option>
                                                    <option value="fa-comment" class="alertmsg alert-warning">fa-comment</option>
                                                    <option value="fa-commenting" class="alertmsg alert-warning">fa-commenting</option>
                                                    <option value="fa-comments" class="alertmsg alert-warning">fa-comments</option>
                                                    <option value="fa-th-list" class="infomsg alert-info">fa-th-list</option>
                                                    <option value="fa-history" class="infomsg alert-info">fa-history</option>
                                                    <option value="fa-list-alt" class="infomsg alert-info errormsg alert-error">fa-list-alt</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <textarea id="alert_message" name="alerts[({alert-row-count})][alert_message]" rows="5"  style="min-width: 100%" placeholder="&nbsp; Alert Message"></textarea>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<br style="clear:both" />
@if($app->environment('local'))
    <script> if ( window.console && window.console.log ) {
            console.log("%c Alert.blade.php", 'background: #222; color: yellow', "loaded");
        }
    </script>
@endif