<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Address Verification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .logo {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo img {
            width: 150px; /* Adjust size as per your logo */
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .section-title {
            background-color: #696969;
            color: #000;
            padding: 10px;
            text-align: center;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .signature {
            margin-top: 30px;
        }
        .signature p {
            margin: 10px 0;
        }
        .remarks {
            margin-top: 20px;
            font-style: italic;
            color: #555;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 12px;
            color: #777;
        }
        
        /*Css For Button*/
.button-container {
    display: flex;
    justify-content: center; /* Align buttons to the right */
    gap: 15px; /* Increased spacing between buttons */
    margin-right: 20px; /* Optional: Add some margin to the right side of the container */
}

.btn-reject {
    background-color: #ff6347; /* Tomato color */
    color: white;
    border: none;
    padding: 15px 30px; /* Larger button size */
    font-size: 18px; /* Larger font size */
    border-radius: 8px;
    cursor: pointer;
}

.btn-complete {
    background-color: #20b2aa; /* Light Sea Green color */
    color: white;
    border: none;
    padding: 15px 30px; /* Larger button size */
    font-size: 18px; /* Larger font size */
    border-radius: 8px;
    cursor: pointer;
}

.btn-reject:hover, .btn-complete:hover {
    opacity: 0.9; /* Subtle transparency on hover */
    transform: scale(1.05); /* Slight scale effect on hover */
    transition: transform 0.2s;
}



    </style>
</head>
<body>

    <div class="container">
        <div class="logo">
            <img src="https://via.placeholder.com/150x50.png?text=Company+Logo" alt="Company Logo">
        </div>

        <h2>Employee Address Verification Details</h2>

        <div class="section-title"><strong>Employee Address Verification Details</strong></div>

        <table>
            <tr>
                <th>Name of the Candidate</th>
                <td>NA</td>
            </tr>
            <tr>
                <th>Address of the Candidate</th>
                <td>NA</td>
            </tr>
            <tr>
                <th>Father's Name</th>
                <td>NA</td>
            </tr>
            <tr>
                <th>Period of Stay</th>
                <td>From NA To NA</td>
            </tr>
            <tr>
                <th>Telephone No.</th>
                <td>NA</td>
            </tr>
        </table>

        <div class="section-title"><strong>Employee Address Verified Details</strong></div>

        <table>
            <tr>
                <th>Name of the Respondent</th>
                <td>NA</td>
            </tr>
            <tr>
                <th>Relationship with Candidate</th>
                <td>NA</td>
            </tr>
            <tr>
                <th>Contact Number</th>
                <td>NA</td>
            </tr>
            <tr>
                <th>Landmark</th>
                <td>NA</td>
            </tr>
            <tr>
                <th>Date of Visit</th>
                <td>NA</td>
            </tr>
            <tr>
                <th>Residence Status</th>
                <td>Owned - Rented - Others</td>
            </tr>
            <tr>
                <th>Residence Type</th>
                <td>Present - Permanent - Previous</td>
            </tr>
            <tr>
                <th>Period of Stay</th>
                <td>From NA To NA</td>
            </tr>
        </table>

        <div class="signature">
            <p><strong>Field Agent Name:</strong> [Field Agent]</p>
            <p><strong>Field Agent Signature:</strong> ______________________</p>
        </div>

        
        
        <div class="section-title"><strong>Action</strong></div>

        <div class="button-container">
            <button class="btn-reject">Rejected</button>
            <button class="btn-complete">Mark as Completed</button>
        </div>
        
        <div class="remarks">
            <p>In case the field executive asks for money or other favors, please do not entertain them. Contact us immediately at +91 0120 4149741 or via email: supportscs@iis-pl.com.</p>
        </div>


        <div class="footer">
            <p>Intuitive Info Services Pvt. Ltd. | D-205, 1st Floor, Sector 10, Noida 201 301, Uttar Pradesh</p>
            <p>www.iis-pl.com | Email: enquiries@iis-pl.com</p>
        </div>
    </div>

</body>
</html>
