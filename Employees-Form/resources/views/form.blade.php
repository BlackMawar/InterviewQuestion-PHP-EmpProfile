<!--@vite('resources/css/app.css')
@vite('resources/js/app.js')
TODO -->
<!--Create a form to add new employee

    ```
    Employee Name
    Gender
    Martial Status
    Phone No.
    Email
    Address
    Date of birth
    Nationality
    Hire Date
    Department
    ```
-->

<!--The flows : User fills form → JavaScript sends data → API endpoint → Validates → Saves to file (JSON/CSV)-->

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" src="styles.css">
    @vite('resources/css/app.css') {{-- Load Laravel CSS --}}
</head>
<body> -->
@extends('layouts.app')

@section('title', 'Employee Profile Form')

@section('content')
    <div class="outer-div">
        <h1>Employee's Profile</h1>
        <h1>Data</h1>
        <p>Welcome, you are required to complete the form. Please fill in the form and submit once done.</p>
        <div class="form1" id="form1" name="form1">
            <form action="#" method="POST">
                @csrf
                
                <div class="form-div">
                    <label>Employee's Name</label><br>
                    <input type="text"  id="emp_Name" name="emp_Name" placeholder="eg. John Doe" required>
                </div>
                <div class="form-div">
                    <label>Gender</label><br>
                    <label>
                        <input type="radio" id="gender" name=gender value="Male" required>Male
                    </label>
                    <label>
                        <input type="radio" id="gender" name=gender value="Female" >Female
                    </label>
                </div>
                <div class="form-div">
                    <label>Marital Status</label><br>
                    <select name="martialStatus" id="martialStatus">
                        <option value="">--Click to select--</option>
                        <option value="single">Single</option>
                        <option value="married">Married</option>
                        <option value="divorced">Divorced</option>
                        <option value="widowed">Widowed</option>
                    </select>
                </div>
                <div class="form-div">
                    <label for="phone_number">Phone Number</label><br>
                    <select name="countryCode" id="countryCode">
                        <option value="">--Please select Country--</option>
                        <option value="+60">MY +60</option>
                        <option value="+62">ID +62</option>
                        <option value="+66">Th +66</option>
                        <option value="+65">SG +65</option>
                    </select>
                    <input type="tel" name="phone_number" placeholder="eg. 123456789" required>
                </div>
                <div class="form-div">
                    <label for="email">Email</label><br>
                    <input type="email" name="email" placeholder="eg. 123@example.com" required>
                </div>
                <div class="form-div">
                    <label>Address</label><br><br>
                    <tr >
                        <label for="street">Street</label><br>
                        <input type="text" id="street" name="street" placeholder="eg. Rd. 123" required><br>

                        <label for="district">District</label><br>
                        <input type="text" id="district" name="district" placeholder="eg. Ipoh" required><br>

                        <label for="poscode">Poscode</label><br>
                        <input type="text" id="poscode" name="poscode" placeholder="eg. 31000" required><br>

                        <label for="state">State</label><br>
                        <input type="text" id="state" name="state" placeholder="eg. Perak" required><br>

                        <label for="country">Country</label><br>
                        <input type="text" id="country" name="country" placeholder="eg. Malaysia">
                    </tr>
                </div>
                <div class="form-div">
                    <label for="dob">Date Of Birth</label>
                    <input type="date" name="dob" id="dob">
                </div>
                <div class="form-div">
                    <label for="nationality">Nationality</label><br>
                    <select name="nationality" id="nationality">
                        <option value="">--Select your Nationality--</option>
                        <option value="malaysia">Malaysia</option>
                        <option value="indonesia">Indonesia</option>
                        <option value="thailand">Thailand</option>
                    </select>
                </div>
                <div class="form-div">
                    <label for="hireDate">Hired Date</label><br>
                    <input type="date" name="hireDate" id="hireDate">
                </div>
                <div class="form-div">
                    <label for="department">Department</label><br>
                    <select name="department" id="department">
                        <option value="">--Select your Department--</option>
                        <option value="IT">Information Technology</option>
                        <option value="HR">Human Resource</option>
                        <option value="OP">Operation</option>
                    </select>
                </div>
                <div class="form-div">
                    <button type="reset">Reset</button>
                    <button type="submit" name="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <!-- <script src="./scirpt.js"></script>
</body>
</html>-->
@endsection