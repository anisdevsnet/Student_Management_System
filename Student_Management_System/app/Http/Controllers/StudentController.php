<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{
    //

    public function index()
    {
        $student = Student::all();
        return view('student.index',compact('student'));
    }

    public function create()
    {
        return view ('student.create');
    }

    public function store(Request $request)
    {

        $input = request()->validate([
            'name' => 'required | max: 10',
            'roll' => 'required | numeric| min:0 | max: 20000',
            'class' => 'required | numeric',
            'mobile' => 'required | numeric| min:15',
            'email' => 'required| email| max:255',
            
        ]);

        $student = new Student;
        $student ->name =$request->input('name');
        $student ->roll =$request->input('roll'); 
        $student ->class =$request->input('class');
        $student ->mobile =$request->input('mobile');
        $student ->email =$request->input('email');
        if ($request -> hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file -> move('uploads/students/'.$filename);
            $student ->image = $filename;
        }
        $student-> save();

        return redirect()->back()->with('status','Student Added Successfully!');
    }

    public function edit($id)
    {
        $student = Student::find($id);
        return view('student.edit', compact('student'));
    }

     public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $student ->name =$request->input('name');
        $student ->roll =$request->input('roll'); 
        $student ->class =$request->input('class');
        $student ->mobile =$request->input('mobile');
        $student ->email =$request->input('email');
        if ($request -> hasfile('image'))
         {
            $destination = 'uploads/students/'.$student->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file -> move('uploads/students/'.$filename);
            $student ->image = $filename;
        }
        $student-> update();

        return redirect()->back()->with('status','Student update Successfully!');
       
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        $destination = 'uploads/students/'.$student->image;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $student -> delete();
        return redirect()->back()->with('status','Student Deleted Successfully'); 
    }
}
