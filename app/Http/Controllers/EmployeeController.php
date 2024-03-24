<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // Import Validator

class EmployeeController extends Controller
{
    public function index()
    {
        $pageTitle = 'Employee List';

        return view('employee.index', ['pageTitle' => $pageTitle]);
    }

    public function create()
    {
        $pageTitle = 'Create Employee';

        return view('employee.create', compact('pageTitle'));
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'email' => 'Isi :attribute dengan format yang benar',
            'numeric' => 'Isi :attribute dengan angka'
        ];

        $validator = Validator::make($request->all(), [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'age' => 'required|numeric',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Proses penyimpanan data ke dalam database bisa dilakukan di sini

        // Redirect ke halaman employee list
        return redirect()->route('employees.index')->with('success', 'Employee data has been saved successfully.');
    }
}
