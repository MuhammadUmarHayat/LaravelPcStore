<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
        <select name="role" required>
            <option value="admin">Admin</option>
            <option value="customer">Customer</option>
        </select>
        <select name="gender" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>
        <input type="text" name="address" placeholder="Address">
        <input type="text" name="phone_no" placeholder="Phone Number">
        <button type="submit">Register</button>
    </form>
</body>
</html>
