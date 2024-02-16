<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Employee;


class EmployeeController extends Controller
{
    //
    public function index(){
        $employees=Employee::paginate(8);
        return view('employee.index', compact('employees'));
    }

    public function create(){
        return view('employee.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'nama'=>'required|string|min:5|max:20',
            'umur'=>'required|integer|min:21',
            'alamat'=>'required|string|min:10|max:40',
            'no_telp'=>'required|regex:/^08[0-9]{7,10}$/',
        ], [
            'nama.required' => 'The name field is required.',
            'nama.min' => 'The name must be at least 5 characters.',
            'nama.max' => 'The name must not be greater than 20 characters.',
            'umur.required' => 'The age field is required.',
            'umur.integer' => 'The age must be an integer.',
            'umur.min' => 'The age must be greater than 20.',
            'alamat.required' => 'The address field is required.',
            'alamat.min' => 'The address must be at least 10 characters.',
            'alamat.max' => 'The address must not be greater than 40 characters.',
            'no_telp.required' => 'The phone number field is required.',
            'no_telp.regex' => 'The phone number must be 9-12 characters long and start with 08.',
        ]);
        
        $slug=Str::slug($request->nama);

        Employee::create([
            'nama'=>$request->nama,
            'slug'=>$slug,
            'umur'=>$request->umur,
            'alamat'=>$request->alamat,
            'no_telp'=>$request->no_telp,
        ]);

        return redirect()->route('index')->with('success', 'Employee data added successfully!');
    }

    // public function show($slug){
    //     $employee=Employee::where('slug',$slug)->first();
    //     return view('employee.show', compact('employee'));
    // }

    public function edit($slug){
        $employee= Employee::where('slug', $slug)->first();
        return view('employee.edit', compact('employee'));
    }

    public function update(Request $request, $slug){
        $this->validate($request, [
            'nama'=>'required|string|min:5|max:20',
            'umur'=>'required|integer|min:21',
            'alamat'=>'required|string|min:10|max:40',
            'no_telp'=>'required|regex:/^08[0-9]{7,10}$/',
        ], [
            'nama.required' => 'The name field is required.',
            'nama.min' => 'The name must be at least 5 characters.',
            'nama.max' => 'The name must not be greater than 20 characters.',
            'umur.required' => 'The age field is required.',
            'umur.integer' => 'The age must be an integer.',
            'umur.min' => 'The age must be greater than 20.',
            'alamat.required' => 'The address field is required.',
            'alamat.min' => 'The address must be at least 10 characters and not greater than 40 characters.',
            'alamat.max' => 'The address must be at least 10 characters and not greater than 40 characters.',
            'no_telp.required' => 'The phone number field is required.',
            'no_telp.regex' => 'The phone number must be 9 to 12 characters long and start with 08.',
        ]);

        $employee= Employee::where('slug', $slug)->first();
        $slug=Str::slug($request->nama);

        $employee->update([
            'nama'=>$request->nama,
            'slug'=>$slug,
            'umur'=>$request->umur,
            'alamat'=>$request->alamat,
            'no_telp'=>$request->no_telp,
        ]);

        return redirect()->route('index')->with('success', 'Employee data edited successfully!');
    }

    public function delete($slug){
        $employee= Employee::where('slug', $slug)->first();
        $employee->delete();

        return redirect()->route('index');
    }
}
