
<html>
<head>
    <title></title>
</head>

<body>
    <fieldset>
    <legend>Login Form</legend>
        <form action='../controllers/LoginController.php' method='post'>
            <input type='text' name='email' placeholder='username or email' required='required' />
            <input type='password' name='password' placeholder='password' required='required' />
            <input type='submit' name='submit' value='Login' />
        </form>
    </fieldset>

    <fieldset>
    <legend>Registeration Form</legend>
        <form action='../controllers/LoginController.php' method='post'>
            <input type='text' name='firstname' placeholder='first name' required='required' />
            <input type='text' name='lastname' placeholder='last name' required='required' />
            <input type='text' name='email' placeholder='email' required='required'
            pattern="[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-‌​9-]+)*" />
            <input type='password' name='password' placeholder='password' required='required' />
            <input type='password' name='confirmPassword' placeholder='confirm password' required='required' />
            <input type='submit' name='submit' value='Register' />
        </form>
    </fieldset>
    
</body>
</html>