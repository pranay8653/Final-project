{{-- <h4>Hello {{$admin->name}}</h4>
<img src="https://southasianvoices.org/wp-content/uploads/2020/08/Pangong_lake_-_Ladakh-scaled.jpg">
<h5>Email - {{$admin->email}}</h5>
<h5>Email - {{$admin->phone_number}}</h5>
<h5>Your Password - {{$password}}</h5> --}}

<h1>Click here below link And Create Your Won Choose Password </h1>
<h2 style="color: #1a1aff">Welcome Sir {{ $admin->name }} </h2>

<div>


    <br/>
    <a href="{{ env('FRONTEND_URL') }}/create_password?token={{ $admin['token'] }}">Create Password</a>
</div>
