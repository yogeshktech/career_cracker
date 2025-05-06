<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Welcome to Our Learning Platform</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background-color: #007bff; color: #fff; padding: 10px; text-align: center; }
        .content { padding: 20px; background-color: #f8f9fa; }
        .footer { text-align: center; padding: 10px; font-size: 0.9em; color: #666; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Welcome, {{ $user->name }}!</h2>
        </div>
        <div class="content">
            <p>Thank you for joining our learning platform. Your account has been created successfully.</p>
            <p><strong>Your Login Details:</strong></p>
            <ul>
                <li><strong>Email:</strong> {{ $user->email }}</li>
                <li><strong>Password:</strong> {{ $password }}</li>
            </ul>
            <p>Please keep this information secure and change your password after logging in.</p>
            <p><a href="{{ url('/') }}" style="color: #007bff;">Visit our platform</a> to start learning!</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Career Cracker. All rights reserved.</p>
        </div>
    </div>
</body>
</html>