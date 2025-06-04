@extends('layouts.app')
@section('title', 'Employee Profiles')

@section('content')
    <div class="outer-div">  
        <h1 class="text-2xl font-bold mb-4">Lets Start Filling in the Employee's Detail</h1>
        <div class="button-container">
            <button id="addEmployee">Add Employee</button>
            <button id="dispData">Display Employees</button>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    const addEmployee = document.getElementById('addEmployee');
    const dispData = document.getElementById('dispData');

    addEmployee.addEventListener('click', function(){
        window.location.href = '/form';
    });
    dispData.addEventListener('click', function(){
        window.location.href = '/dataView';
    });
</script>
@endsection
