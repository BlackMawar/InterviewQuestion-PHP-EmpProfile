<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EmployeeController extends Controller
{
    // Display the form
    public function showForm()
    {
        return view('form');
    }

    // Handle the form submission
    public function submitForm(Request $request)
    {
        // Form validation using php
        $validated = $request->validate([
            'emp_Name' => 'required|string|max:255',
            'gender' => 'required|in:Male,Female',
            'maritalStatus' => 'required|string',
            'countryCode' => 'required|string',
            'phone_number' => 'required|regex:/^\+?[0-9]{6,15}$/',
            'email' => 'required|email',
            'street' => 'required|string',
            'district' => 'required|string',
            'poscode' => 'required|string',
            'state' => 'required|string',
            'country' => 'required|string',
            'dob' => 'required|date',
            'nationality' => 'nullable|string',
            'hireDate' => 'required|date',
            'department' => 'required|string',
        ]);

        // Store the data in a JSON file
        $path = storage_path('app/employees.json');
        $existing = [];

        if (file_exists($path)) {
            $content = file_get_contents($path);
            $existing = json_decode($content, true);

            // Handle malformed JSON
            if (!is_array($existing)) {
                $existing = [];
            }
        }

        // Append new employee data
        $existing[] = $validated;

        // Use file locking to prevent overwrite
        $file = fopen($path, 'c+');
        if (flock($file, LOCK_EX)) {
            ftruncate($file, 0);
            fwrite($file, json_encode($existing, JSON_PRETTY_PRINT));
            flock($file, LOCK_UN); // Release the lock
        }
        fclose($file);

        return response()->json(['message' => 'Employee saved successfully'], 201);
    }

    public function showEmployeesData(){
        $path = storage_path('app/employees.json');

        $fileContents = File::get($path);

        $employees = json_decode($fileContents, true);

        return view('dataView', compact('employees'));
    }
}
