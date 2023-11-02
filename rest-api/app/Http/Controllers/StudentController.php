<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index(){
        $students = Student::all();
        $data = [
            'message' => 'get all student', 'data' => $students
        ];

        return response()->json($data,200);
    }

    public function store(Request $request) {
        $input = [
            'nama' => $request ->nama,
            'nim' => $request ->nim,
            'email' => $request ->email,
            'jurusan' => $request -> jurusan
        ];

        $student = Student::create($input);

        $data = [
            'message' => 'student is create succesfully',
            'data' => $student,
        ];

        return response()->json($data, 201);
    }
}
