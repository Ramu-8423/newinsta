<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Registration Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style4.css">
    <style>
    body {
    font-family: 'Arial', sans-serif;
    background: url('https://instaclient.yashkirti.com/images/cover2.png') no-repeat center center fixed;
    background-size: cover;
}

.logo img {
    width: 80px;
    height: 80px;
}

.logo h2 {
    margin: 0;
    font-size: 1.5rem;
}

.form-control:focus {
    box-shadow: 0 0 5px 3px rgba(184, 16, 219, 0.5); /* Adjust the color and spread as needed */
    border-color: #b810db; /* Optional: to change the border color as well */
    outline: none; /* Remove the default outline */
}

.form-control {
    border-radius: 1.25rem; /* Adjust the border radius as needed */
}
.register-form .form-group {
    position: relative;
}

.register-form .form-group input::placeholder {
    color: #999;
    font-size: 0.9rem;
    border-radius:1.25rem;
}

.form-check {
    display: inline-block;
    margin-right: 20px;
}
.form-check-input {
    width: 20px;
    height: 20px;
}
.form-check-label {
    margin-left: 10px;
}
    
        .form-control:hover {
        border-color: #b810db!important; /* Change to your desired color */
        box-shadow: 0 0 5px 3px rgba(184, 16, 219, 0.5)!important; /* Change to your desired color and spread */
    }
    
     .form-check-input:checked {
        background-color: #b810db!important; /* Change to your desired color */
        border-color: #b810db!important; /* Change to your desired color */
    }
    
input[type="checkbox"] {
accent-color:#e311e8f5;
}

    </style>
</head>
<body>
    <div class="container my-5">
        <div class="row no-gutters">
            <div class="col-md-5 d-flex flex-column align-items-center justify-content-center text-center text-white p-4" style="background-color:#c370ead6">
                <div class="logo mb-3">
                    <img src="https://instaclient.yashkirti.com/images/green_check.png" alt="Romanchat" class="img-fluid rounded-circle" style="width: 80px; height: 80px;">
                    <h2 class="mt-3">BG Verification</h2>
                </div>
                <p>Create your account. It's free and only takes a minute.</p>
                <button class="btn btn-light text-primary">WEBSITE NAME</button>
            </div>
            <div class="col-md-7 bg-white p-4">
               
                
                <form class="register-form" action="{{route('create_account')}}" method="post">
                   
                    @csrf
                    
                     @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block mt-3">
                    <button type="button" class="close" data-dismiss="alert">X</button>
                    <strong>{{$message}}</strong>
                </div>
                @endif
                    <h2 class="text-center">Registration Form</h2>
                    <div class="form-group position-relative">
                        <i class="fas fa-building position-absolute" style="left: 10px; top: 50%; transform: translateY(-50%);"></i>
                        <input type="text" class="form-control pl-5" name="company_name" placeholder="Company Name" required>
                    </div>
                    <div class="form-group position-relative">
                        <i class="fas fa-user position-absolute" style="left: 10px; top: 50%; transform: translateY(-50%);"></i>
                        <input type="text" class="form-control pl-5" name="person_name" placeholder="Concern Person Name" required>
                    </div>
                    <div class="form-group position-relative">
                        <i class="fas fa-user-tie position-absolute" style="left: 10px; top: 50%; transform: translateY(-50%);"></i>
                        <input type="text" class="form-control pl-5" name="designation" placeholder="Concern Person Designation" required>
                    </div>
                    <div class="form-group position-relative">
                        <i class="fas fa-map-marker-alt position-absolute" style="left: 10px; top: 50%; transform: translateY(-50%);"></i>
                        <input type="text" class="form-control pl-5" name="company_address" placeholder="Company Address" required>
                    </div>
                    <div class="form-group position-relative">
                        <i class="fas fa-envelope position-absolute" style="left: 10px; top: 50%; transform: translateY(-50%);"></i>
                        <input type="email" class="form-control pl-5" name="email" placeholder="Email ID" required>
                    </div>
                    <div class="form-group position-relative">
                        <i class="fas fa-phone position-absolute" style="left: 10px; top: 50%; transform: translateY(-50%);"></i>
                        <input type="tel" class="form-control pl-5" name="phone" placeholder="Phone Number" pattern="\d{10}" title="Please enter a valid 10-digit phone number" required>
                        <div class="invalid-feedback">
                            Please enter a valid 10-digit phone number.
                        </div>
                    </div>
                    
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                             const phoneInput = document.querySelector('input[name="phone"]');
            
                             phoneInput.addEventListener('input', function() {
                                 const value = phoneInput.value;

                                    if (value.length > 10) {
                                     phoneInput.value = value.slice(0, 10);
                                    }

                                    if (/^\d{10}$/.test(phoneInput.value)) {
                                        phoneInput.setCustomValidity("");
                                        phoneInput.classList.remove("is-invalid");
                                    } else {
                                     phoneInput.setCustomValidity("Invalid phone number");
                                        phoneInput.classList.add("is-invalid");
                                    }
                                });
                            });
                        </script>
                    

                    <div class="form-group">
                        <label>Select Project Type:</label>
                        <div class="form-check">
                            <input class="form-check-input"  type="checkbox" name="project_type[]" value="address_verification">
                            <label class="form-check-label">Address Verification</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="project_type[]" value="site_visit">
                            <label class="form-check-label">Site Visit</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Payment Preference:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-money-bill"></i></span>
                            </div>
                            <select class="form-control" name="payment_preference" required>
                                <option value="" disabled selected>Select Payment Preference</option>
                                <option value="prepaid">Prepaid</option>
                                <option value="postpaid">Postpaid</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group position-relative">
                        <i class="fas fa-lock position-absolute" style="left: 10px; top: 50%; transform: translateY(-50%);"></i>
                        <input type="password" class="form-control pl-5" name="password" placeholder="Create Password" required>
                    </div>
                    <div class="form-group position-relative">
                        <i class="fas fa-lock position-absolute" style="left: 10px; top: 50%; transform: translateY(-50%);"></i>
                        <input type="password" class="form-control pl-5" name="password_confirmation" placeholder="Confirm Password" required>
                    </div>
                   <button type="submit" name="submit" class="btn btn-block" style="border-radius:1.25rem;background-color:#b810db;color:white;">SUBMIT</button> 
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
