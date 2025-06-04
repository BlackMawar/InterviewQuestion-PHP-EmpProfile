@extends('layouts.app')

@section('title', 'Employee Profiles')

@section('content')
    <div class="outer-div-data">
        <h1 class="text-2xl font-bold mb-4">Employee's Profile Data</h1>
        
        @if(count($employees) > 0)
            <table class="table-data">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>Date of Birth</th>
                        <th>Date of Hired</th>
                        <th>Department</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employees as $employee)
                        <tr>
                            <td>{{ $employee['emp_Name'] }}</td>
                            <td>{{ $employee['gender'] }}</td>
                            <td>{{ $employee['email'] }}</td>
                            <td>{{ $employee['countryCode']}}{{ $employee['phone_number'] }}</td>
                            <td>{{ $employee['street'] }}, {{ $employee['district'] }}, {{ $employee['state'] }}, {{ $employee['country'] }}</td>
                            <td>{{ $employee['dob'] }}</td>
                            <td>{{ $employee['hireDate']}}</td>
                            <td>{{ $employee['department']}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <button id="downloadList">Download List</button>
        @else
            <p>No employees found.</p>
        @endif

        <button id="addEmployee">Add Employee</button>
    </div>
@endsection

@section('scripts')
<script>
    const addEmployee = document.getElementById('addEmployee')
    const downloadList = document.getElementById('downloadList')

    downloadList.addEventListener('click', function() {
        //PHP to JS
        const employees = @json($employees);

        // Create the CSV using ',' as delimiter
        let csvContent = "Name,Gender,Email,Phone Number,Address,Date of Birth,Date of Hired,Department\n";
        
        //Using Space instead of ',' to avoid conflict when download CSV
        employees.forEach(employee => {
            const address = `${employee.street.replace(/,/g, ' ')} ${employee.district.replace(/,/g, ' ')} ${employee.state.replace(/,/g, ' ')} ${employee.country.replace(/,/g, ' ')}`;
            const row = `${employee.emp_Name},${employee.gender},${employee.email},${employee.countryCode}${employee.phone_number},${address},${employee.dob},${employee.hireDate},${employee.department}`;
            csvContent += row + "\n";
        });

        // Create a Blob with the CSV content
        const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
        
        const getDate = new Date();
        const dateString = getDate.toISOString().split('T')[0];

        // Create a link to trigger the download
        const link = document.createElement("a");
        if (link.download !== undefined) {
            // Create a URL for the Blob and set it to the link's href
            const url = URL.createObjectURL(blob);
            link.setAttribute("href", url);
            link.setAttribute("download", `employee_profiles_${dateString}.csv`);
            
            // Trigger the download by simulating a click
            link.click();
        }
    });

    addEmployee.addEventListener('click', function(){
        window.location.href = '/form';
    });
</script>
@endsection
