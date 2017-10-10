Hi <?=$user->first_name . ' ' . $user->last_name?>,<br><br>
To sign in to our site, use these credentials during checkout or on the My Account page: <br><br>
<strong>Email:</strong> <?=$user->email?><br>
<strong>Password:</strong> Password you set when creating account <br><br>

Forgot your account password? <a href="{{url(getLang().'/forgot-password')}}">Click here</a> to reset it. <br><br>
Thank you, Grace!