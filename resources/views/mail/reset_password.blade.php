
{{-- ​<h2><strong> Your Login Id: {{ $user->email }}</strong></h2> --}}

<div>
    This mail is for password reset.
    <a href="{{ env('FRONTEND_URL') }}/recovary?token={{ $token }}">Reset Password</a>
    {{-- <a href="{{ env('FRONTEND_URL') }}/create_password?token={{ $token }}">reset Password</a> --}}
</div>
​
Thanks,<br>
{{ env('MAIL_FROM_NAME') }}
