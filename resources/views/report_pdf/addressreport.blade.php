<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Address Verification Report</title>
    <style>
   body {
    font-family: 'Times New Roman', serif;
    margin: 0;
    padding: 0;
    background-color: #fff;
}

.container {
    width: 100%; /* Utilize full width for A4 page */
    max-width: 750px; /* Limit width for readability */
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #000;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    page-break-inside: avoid; /* Prevent breaking inside elements */
}

.header-section {
    display: flex; /* Flexbox layout for alignment */
    justify-content: center; /* Center content horizontally */
    align-items: center; /* Center content vertically */
    margin-bottom: 20px; /* Reduced space for A4 fitting */
    padding: 10px 0; /* Padding for spacing */
    gap: 20px; /* Space between the logo and text */
    flex-wrap: wrap; /* Allow content to wrap on smaller screens */
}

.company-logo {
    display: flex; /* Flexbox for centering */
    justify-content: center; /* Center the logo horizontally */
    align-items: center; /* Center the logo vertically */
    flex: 1 1 auto; /* Allow the logo to grow and shrink */
    max-width: 200px; /* Smaller max width for A4 fitting */
    text-align: center; /* Center text if any */
}

.company-logo img {
    max-width: 100%; /* Ensure image scales properly */
    height: auto; /* Maintain aspect ratio */
}

.report-summary {
    flex: 1 1 auto; /* Allow text to grow and shrink */
    max-width: 400px; /* Maximum width for text container */
    text-align: center; /* Center align text */
}

.report-summary table {
    width: 100%; /* Full width of the container */
    table-layout: auto; /* Ensure table width is dynamic */
    border-collapse: collapse; /* Collapse borders for neat look */
}

.report-summary th, .report-summary td {
    padding: 5px 10px; /* Padding for cells */
    text-align: left; /* Align text to the left */
    border: 1px solid #000; /* Add border */
}

.report-summary th {
    background-color: #f2f2f2; /* Background color for headers */
    font-weight: bold; /* Bold text for headers */
}

h1, h2 {
    font-size: 16px; /* Slightly smaller for A4 fitting */
    color: #000;
    text-transform: uppercase;
    margin: 10px 0; /* Reduced margin for A4 fitting */
    text-align: center;
}

.report-details {
    width: 100%;
    margin-bottom: 15px; /* Reduced margin for fitting */
    border-collapse: collapse;
}

.report-details th, .report-details td {
    border: 1px solid #000;
    padding: 8px; /* Reduced padding for A4 fitting */
    text-align: left;
}

.report-details th {
    background-color: #f2f2f2;
    font-weight: bold;
}

.image-section {
    margin: 10px 0; /* Reduced margin for A4 fitting */
    text-align: center;
}

.image-section img {
    max-width: 100%; /* Use full width */
    height: auto; /* Maintain aspect ratio */
    margin: 0 auto; /* Center align */
}

.signature-section {
    margin-top: 30px; /* Reduced margin for A4 fitting */
    text-align: center;
}

.signature-section img {
    max-width: 150px;
    height: auto;
}

.footer {
    text-align: center;
    margin-top: 30px; /* Reduced margin for A4 fitting */
    font-size: 12px;
    color: #555;
}

.page-break {
    page-break-before: always;
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




@media print {
    body {
        margin: 0;
        padding: 0;
        background-color: #fff;
    }

    .container {
        width: 100%;
        border: none;
        box-shadow: none;
        padding: 0;
        margin: 0;
        max-width: 100%; /* Use full width for printing */
    }

    .header-section, .footer {
        page-break-after: avoid; /* Avoid breaks after headers */
    }

    .page-break {
        page-break-before: always;
    }
}
</style>
</head>

<body>
    <div class="container">
        <!-- Header Section -->
        <div class="header-section">
            <div class="company-logo">
                <img src="https://via.placeholder.com/150x50.png?text=Company+Logo" alt="Company Logo">
            </div>
            <div class="report-summary">
                <table>
                    <tr>
                        <th scope="col">Company Name</th>
                        <td scope="col">Founder Code Technology</td>
                    </tr>
                    <tr>
                        <th scope="col">Company Ref. Num</th>
                        <td scope="col">12334 Q S D DWQdq 5</td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Report Summary -->
        <h1>Vendors Details</h1>

        <!-- Applicant Details -->
        <table class="report-details">
        <tr>
            <th>Vendor_ID</th>
            <td>{{ $vendor->vendor_id }}</td>
            <th>Vendor Name</th>
            <td>{{ $vendor->name }}</td>
        </tr>
        <tr>
            <th>Signature</th>
            <td>{{ $vendor->signature }}</td>
            <th>Remark</th>
            <td>{{ $vendor->remark }}</td>
        </tr>
    </table>

        <!-- Case Details Table -->
        <h2>Candidates Details</h2>
        <table class="report-details">
            <tr>
                <th>Candidate Name</th>
                <td>Akash</td>
                <th>Emp ID</th>
                <td>Emp-7890</td>
            </tr>
            <tr>
                <th>Father Name</th>
                <td>XYZ</td>
                <th>Mother Name</th>
                <td>XYZ</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>xyz@gmail.com</td>
                <th>Mobile Number</th>
                <td>9999999999</td>
            </tr>
        </table>

        <!-- Respondent Information Table -->
        <h2>Address Details</h2>
        <table class="report-details">
            <tr>
                <th>State</th>
                <td>Uttar Pradesh</td>
                <th>City</th>
                <td>Lucknow</td>
            </tr>
            <tr>
                <th>Pincode</th>
                <td>226010</td>
                <th>Address Type</th>
                <td>Permanent</td>
            </tr>
            <tr>
                <th>Stay From</th>
                <td>22/10/2023</td>
                <th>Stay To</th>
                <td>21/10/2025</td>
            </tr>
        </table>

        <!-- Residence Details -->
        <h2>Verification Details</h2>
        <table class="report-details">
            <tr>
                <th>Respondent Name</th>
                <td>ABCD</td>
                <th>Relation With Candidates</th>
                <td>XYZZZ</td>
            </tr>
            <tr>
                <th>Landmark</th>
                <td>Near Foundercode</td>
                <th>Visited Date</th>
                <td>22 July 2024</td>
            </tr>
            <tr>
                <th>Residence status</th>
                <td>XYZZZ</td>
                <th>Resedence Type</th>
                <td>Self</td>
            </tr>
            <tr>
                <th>Peroid of Stay From</th>
                <td>22-10-2022</td>
                <th>Peroid of stay To</th>
                <td>22-12-2024</td>
            </tr>
            <tr>
                <th>Respondent Signature</th>
                <td>
                    <img src="https://via.placeholder.com/150x50.png?text=Signature" alt="Respondent Signature">
                </td>
            </tr>
        </table>

        <!-- Address Breakdown -->
        <!--<h2>Address Breakdown</h2>-->
        <!--<table class="report-details">-->
        <!--    <tr>-->
        <!--        <th>House</th>-->
        <!--        <td>123 Main St</td>-->
        <!--    </tr>-->
        <!--    <tr>-->
        <!--        <th>Gate</th>-->
        <!--        <td>Gate A</td>-->
        <!--    </tr>-->
        <!--    <tr>-->
        <!--        <th>Door</th>-->
        <!--        <td>Door 5</td>-->
        <!--    </tr>-->
        <!--    <tr>-->
        <!--        <th>Near Landmark</th>-->
        <!--        <td>Next to the Grocery Store</td>-->
        <!--    </tr>-->
        <!--</table>-->

        <!-- Address Image Sections -->
        <div class="image-section">
            <h2>House Image</h2>
            <img src="https://via.placeholder.com/600x400.png?text=House+Image" alt="House Image">
        </div>
        <div class="image-section">
            <h2>Gate Images</h2>
            <img src="https://via.placeholder.com/600x400.png?text=Gate+Image" alt="Gate Image">
        </div>
        <div class="image-section">
            <h2>Door Image</h2>
            <img src="https://via.placeholder.com/600x400.png?text=Door+Image" alt="Door Image">
        </div>
        <div class="image-section">
            <h2>Near By Landmark Image</h2>
            <img src="https://via.placeholder.com/600x400.png?text=Near By Landmark+Image" alt="Near BY Landmark Image">
        </div>
        <div class="image-section">
            <h2>ID Proof Image</h2>
            <img src="https://via.placeholder.com/600x400.png?text=ID Proof+Image" alt="ID Proof Image">
        </div>

        <!-- ID Proof & Signature -->
        <!--<h2>ID Proof & Signature</h2>-->
        <!--<table class="report-details">-->
        <!--    <tr>-->
        <!--        <th>ID Proof</th>-->
        <!--        <td>Valid ID Proof</td>-->
        <!--    </tr>-->
        <!--    <tr>-->
        <!--        <th>Respondent Signature</th>-->
        <!--        <td>-->
        <!--            <img src="https://via.placeholder.com/150x50.png?text=Signature" alt="Respondent Signature">-->
        <!--        </td>-->
        <!--    </tr>-->
        <!--</table>-->

        <!-- Signature Section -->
        <!--<div class="signature-section">-->
        <!--    <p><strong>Signature of Verifier:</strong></p>-->
        <!--    <img src="https://via.placeholder.com/150x50.png?text=Signature" alt="Verifier Signature">-->
        <!--</div>-->
        
        <!--<h2>Action</h2>-->
        <!--<table class="report-details">-->
        <!--<tr>-->
            <!-- Buttons for Reject and Mark as Completed -->
        <!--    <th> Rejected </th>-->
        <!--    <td>-->
        <!--    <button type="button" class="btn btn-danger btn-sm">Reject</button>-->
        <!--    </td>-->
        <!--    <th>Mark As completed</th>-->
        <!--    <td>-->
        <!--    <button type="button" class="btn btn-success btn-sm">Mark as Completed</button>-->
        <!--    </td>-->
        <!--</tr>-->
        <!--</table>-->

        <!-- Footer -->
        <!--<div class="footer">-->
        <!--    <p>Confidential | Page 1 of 7</p>-->
        <!--</div>-->

        <!-- Page Break for Additional Pages -->
        <!--<div class="page-break"></div>-->
        <h1>Action</h1>
        <div class="button-container">
            <button class="btn-reject">Rejected</button>
            <button class="btn-complete">Mark as Completed</button>
        </div>

        
    </div>
</body>

</html>
