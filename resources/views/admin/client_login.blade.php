<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
       body {
    margin: 0;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    background: url({{ asset('images/bgcover22.jpeg') }});
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    height: 100vh;
    font-family: 'Roboto', sans-serif;
}

.form-2-wrapper {
    background: #be5efaa1;
    padding: 50px;
    border-radius: 8px;
}

input.form-control {
    padding: 11px;
    border: 2px solid #405c7cb8;
    border-radius: 30px;
    background-color: rgba(255, 255, 255,1); /* White transparent background */
    font-family: Arial, Helvetica, sans-serif;
    margin-bottom: 10px; /* Added for spacing */
}

input.form-control:focus {
    box-shadow: none !important;
    outline: 0px !important;
    background-color: rgba(255, 255, 255, 1); /* White transparent background */
}

button.login-btn {
    background: #b400ff;
    color: #fff;
    border: none;
    padding: 10px;
    border-radius: 30px;
}

.form-box {
    position: relative;
}

.form-box input.form-control {
    padding-left: 40px; /* Adjusted padding for icon */
}

.form-box i {
    position: absolute;
    left: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: #666;
}

    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6 d-flex align-items-center justify-content-center right-side">
            <div class="form-2-wrapper">
                <div class="logo text-center">
                    <img src="{{asset('images/green_check.png')}}" alt="Cover Image" height="100" width="100" style="border-radius: 50%;">
                </div>
                <h2 class="text-center mb-4">Sign Into Your Account</h2>
                <form class="register-form" id="login-form">
                    <div class="mb-3 form-box position-relative">
                        <i class="fas fa-id-card position-absolute" style="left: 15px; top: 50%; transform: translateY(-50%); color: #666;"></i>
                        <input type="text" id="reference-id" name="reference-id" class="form-control pl-5" placeholder="Reference ID" required>
                    </div>
                    <div class="mb-3 form-box position-relative">
                        <i class="fas fa-lock position-absolute" style="left: 15px; top: 50%; transform: translateY(-50%); color: #666;"></i>
                        <input type="password" id="password" name="password" class="form-control pl-5" placeholder="Password" required>
                    </div>
                    <button type="button" id="generate-otp" class="btn btn-outline-secondary login-btn w-100 mb-3">Generate OTP</button>
                    
                    <div class="mb-3 form-box position-relative" id="otp-section" style="display: none;">
                        <i class="fas fa-key position-absolute" style="left: 15px; top: 50%; transform: translateY(-50%); color: #666;"></i>
                        <input type="text" id="otp" name="otp" class="form-control pl-5" placeholder="Enter OTP" required>
                        <button type="button" id="verify-otp" class="btn btn-outline-secondary login-btn w-100 mt-2">Verify OTP</button>
                    </div>

                    <div class="mb-3 form-box position-relative" id="login-section" style="display: none;">
                        <button type="submit" class="btn btn-outline-secondary login-btn w-100 mb-3">Login</button>
                    </div>
                    
                    <div class="error-message text-danger text-center" id="error-message" style="display: none;"></div>
                </form>

                <p class="text-center register-test mt-3">Don't have an account? <a href="{{route('client_register')}}" class="text-decoration-none">Register here</a></p>
            </div>
        </div>
        <div class="col-lg-3"></div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        var progress_status;
        var remark_status;
        
        $('#generate-otp').on('click', function() {
            var referenceId = $('#reference-id').val();
            var password = $('#password').val();
            
            if (referenceId && password) {
                // Send referenceId and password to the server to verify and get the mobile number
                $.ajax({
                    url: '/api/verify_client_credentials', // Your endpoint for verifying credentials
                    method: 'POST',
                    data: {
                        referenceId: referenceId,
                        password: password
                    },
                    success: function(response) {
                        if (response.status == 200) {
                            var mobile = response.mobile;
                            var status = response.status;
                            //console.log(mobile,status);
                            // Send OTP to the mobile number
                            $.ajax({
                                url: `https://otp.fctechteam.org/send_otp.php?mode=test&digit=4&mobile=${mobile}`,
                                method: 'GET',
                                success: function(otpResponse) {
                                    if (otpResponse.error == 200) {
                                       // console.log(JSON.stringify(otpResponse));
                                        $('#otp-section').show();
                                        $('#generate-otp').hide();
                                    } else {
                                         console.log(JSON.stringify(otpResponse));
                                        $('#error-message').text('Failed to send OTP').show();
                                    }
                                }
                            });
                        } else {
                            $('#error-message').text('Invalid reference ID or password').show();
                        }
                    }
                });
            } else {
                $('#error-message').text('Please enter both reference ID and password').show();
            }
        });

        $('#verify-otp').on('click', function() {
            var otp = $('#otp').val();
            var referenceId = $('#reference-id').val();

            if (otp) {
                // Get the mobile number from the server again or store it in a variable
                $.ajax({
                    url: '/api/get_client_mobile', // Your endpoint to get mobile number using referenceId
                    method: 'POST',
                    data: {
                        referenceId: referenceId
                    },
                    success: function(response) {
                      //  console.log(JSON.stringify(response));
                        if (response.status ==200) {
                            var mobile = response.mobile;
                             progress_status = response.progress_status;
                              remark_status = response.remark_status;
                         console.log(`mobile is ${mobile}  progress_status is ${progress_status} remark_status is ${remark_status}`);
                            // Verify OTP
                            $.ajax({
                                url: `https://otp.fctechteam.org/verifyotp.php?mobile=${mobile}&otp=${otp}`,
                                method: 'GET',
                                success: function(otpVerifyResponse) {
                                   // console.log(JSON.stringify(otpVerifyResponse));
                                    if (otpVerifyResponse.error == 200) {
                                        $('#login-section').show();
                                        $('#verify-otp').hide();
                                    } else {
                                        $('#error-message').text('Invalid OTP').show();
                                    }
                                }
                            });
                        } else {
                            $('#error-message').text('Failed to retrieve mobile number').show();
                        }
                    }
                });
            } else {
                $('#error-message').text('Please enter the OTP').show();
            }
        });
            
            $('#login-form').on('submit', function(e) {
                            let redirect_url;
            if (progress_status <= 3 || (progress_status == 4 && remark_status == 1)) {
                  redirect_url = "{{ route('client_onboarding') }}";
            } else {
                    redirect_url = "{{ route('dashboard', 0) }}";
            }
                
                e.preventDefault();
                window.location.href = redirect_url;
            });
    });
</script>
</body>
</html>
