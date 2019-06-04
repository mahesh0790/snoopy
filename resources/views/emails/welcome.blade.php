<!DOCTYPE html>
<html>
<head>
    <title>Welcome Email</title>
</head>

<body>
<h2>Welcome {{$password['first_name']}} !!</h2>
<br/>
 Snoopy Application is inviting you to login by clicking the below link and use the given Credentials to login
 Link: {{url('/login')}}
 Credentials:
Your registered email-id  and password is {{$password['email']}},{{$password['password']}}
</body>

</html>