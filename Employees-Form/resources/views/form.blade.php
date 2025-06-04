@extends('layouts.app')

@section('title', "Employee's Profile Form")

{{-- Section for HTML --}}
@section('content')
<div class="outer-div">
    <h1>Employee's Profile</h1>
    <p>Welcome, you are required to complete the form. Please fill in the form and submit once done.</p>
    <div class="form1" id="form1" name="form1">
        <form id="employeeForm" method="POST" action="{{ route('submit.form') }}">
            @csrf

            <div class="form-div">
                <label for="emp_Name">Employee's Name</label><br />
                <input type="text" id="emp_Name" name="emp_Name" placeholder="eg. John Doe" required />
            </div>
            <div class="form-div">
                <label>Gender</label><br />
                <label>
                    <input type="radio" id="gender_male" name="gender" value="Male" required /> Male
                </label>
                <label>
                    <input type="radio" id="gender_female" name="gender" value="Female" /> Female
                </label>
            </div>
            <div class="form-div">
                <label for="maritalStatus">Marital Status</label><br />
                <select name="maritalStatus" id="maritalStatus" required>
                    <option value="">--Click to select--</option>
                    <option value="single">Single</option>
                    <option value="married">Married</option>
                    <option value="divorced">Divorced</option>
                    <option value="widowed">Widowed</option>
                </select>
            </div>
            <div class="form-div">
                <label for="phone_number">Phone Number</label><br />
                <select name="countryCode" id="countryCode" required>
                    <option value="">--Please select Country--</option>
                    <option value="+60">MY +60</option>
                    <option value="+62">ID +62</option>
                    <option value="+66">Th +66</option>
                    <option value="+65">SG +65</option>
                </select>
                <input
                    type="tel"
                    name="phone_number"
                    id="phone_number"
                    placeholder="eg. 123456789"
                    required
                    pattern="[0-9]{6,15}"
                    title="Please enter 6 to 15 digits"
                />
            </div>
            <div class="form-div">
                <label for="email">Email</label><br />
                <input type="email" name="email" id="email" placeholder="eg. 123@example.com" required />
            </div>
            <div class="form-div">
                <label>Address</label><br /><br />
                <div>
                    <label for="street">Street</label><br />
                    <input type="text" id="street" name="street" placeholder="eg. Rd. 123" required /><br />

                    <label for="district">District</label><br />
                    <input type="text" id="district" name="district" placeholder="eg. Ipoh" required /><br />

                    <label for="poscode">Poscode</label><br />
                    <input type="text" id="poscode" name="poscode" placeholder="eg. 31000" required /><br />

                    <label for="state">State</label><br />
                    <input type="text" id="state" name="state" placeholder="eg. Perak" required /><br />

                    <label for="country">Country</label><br />
                    <input type="text" id="country" name="country" placeholder="eg. Malaysia" />
                </div>
            </div>
            <div class="form-div">
                <label for="dob">Date Of Birth</label>
                <input type="date" name="dob" id="dob" required />
            </div>
            <div class="form-div">
                <label for="nationality">Nationality</label><br />
                <select name="nationality" id="nationality">
                    <option value="">--Select your Nationality--</option>
                    <option value="malaysia">Malaysia</option>
                    <option value="indonesia">Indonesia</option>
                    <option value="thailand">Thailand</option>
                </select>
            </div>
            <div class="form-div">
                <label for="hireDate">Hired Date</label><br />
                <input type="date" name="hireDate" id="hireDate" required />
            </div>
            <div class="form-div">
                <label for="department">Department</label><br />
                <select name="department" id="department" required>
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
@endsection

{{-- section for js --}}
@section('scripts')
<script>
    document.getElementById('employeeForm').addEventListener('submit', async function (e) {
    e.preventDefault();

    const countryCode = document.getElementById('countryCode').value;
    const phoneNumber = document.getElementById('phone_number').value.trim();

    if (!countryCode) {
        alert('Please Select Your CountryCode !');
        return;
    }

    if (!phoneNumber.match(/^[0-9]{6,15}$/)) {
        alert('Please enter a 6 - 15 digits of Phone Number');
        return;
    }

    // Collecting the form data
    const formData = new FormData(this);
    const dataToSend = {};
    formData.forEach((value, key) => {
        dataToSend[key] = value;
    });

    try {
        const response = await fetch('{{ route("submit.form") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify(dataToSend),  // Send the form data as JSON
        });

        const responseData = await response.json();

        if (response.ok) {
            alert('Data Submitted Successfully');
            
            window.location.href = '/dataView';
        } else {
            alert('Error submitting form: ' + (responseData.message || 'Unknown Error'));
        }
    } catch (error) {
        alert('Network error: ' + error.message);
    }
});

</script>
@endsection
