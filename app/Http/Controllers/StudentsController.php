<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function list()
    {
        return view('main');
    }

    public function create(Request $request)
    {
        $student = new Student;

        $student->name = $request->name;
        $student->surname = $request->surname;
        $student->identification_no = $request->ident;
        $student->country = $request->country;
        $student->date_of_birth = $request->date;

        $student->save();

        return ['status' => 'OK', 'body'=> 'Student successfully added!'];
    }

    public function update(Request $request)
    {
        $student = Student::find($request->id);
         
        $student->name = $request->name;
        $student->surname = $request->surname;
        $student->identification_no = $request->ident;
        $student->country = $request->country;
        $student->date_of_birth = $request->date;

        $student->save();

        return ['status' => 'OK', 'body'=> 'Student successfully updated!'];
    }

    public function get_one($id)
    {
        return Student::find($id);
    }

    public function read()
    {
        return Student::paginate( env('MAX_ALLOWED_STUDENTS_PER_LIST') );
    }

    public function search(Request $request)
    {
        return Student::where('name', 'like', "%{$request->search}%")
            ->orWhere('surname', 'like', "%{$request->search}%")
            ->limit( env('MAX_ALLOWED_STUDENTS_PER_LIST') )->get();
    }
}
