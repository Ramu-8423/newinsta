<!-- resources/views/otp.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>OTP Verification</title>
</head>
<body>
    <form action="{{ route('otp.verify') }}" method="POST">
        @csrf
        <div>
            <label for="otp">Enter OTP:</label>
            <input type="text" id="otp" name="otp" required>
        </div>
        <button type="submit">Verify OTP</button>
    </form>
</body>
</html>
