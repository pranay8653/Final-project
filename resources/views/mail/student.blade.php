<h3>Welcome {{ $name }},</h3>

<div>

    set your password mail.
    <br/>
    <a href="{{ env('FRONTEND_URL') }}/create_password?token={{ $token }}">Create Password</a>
</div>

Thanks,<br>
