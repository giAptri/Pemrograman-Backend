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
        $validatedData = $request->validate([
            'nama' => 'required',
            'nim' => 'numeric|required',
            'email' => 'email|required',
            'jurusan' => 'required'
        ]);

        $student = Student::create($validatedData);

        $data = [
            'message' => 'student is create succesfully',
            'data' => $student,
        ];

        return response()->json($data, 201);
    }

    public function update(Request $request, $id) {
        $student = student::find($id);

        if($student) {
            $input = [
                'nama' => $request->nama ?? $student->nama,
                'nim' => $request->nim ?? $student->nim,
                'email' => $request->email ?? $student->email,
                'jurusan' => $request->jurusan ?? $student->jurusan
            ];

            $student->update($input);

            $data = [
                'message' => 'student is updated',
                'data' => $student
            ];

            return response()->json($data, 200);
        }

        else{
            $data = [
                'message' => 'student not found'
            ];

            return response()->json($data, 404);
        }
    }

    public function destroy($id){
        $student = Student::find($id);

        if ($student) {
            $student->delete();

            $data = [
                'message' => 'student is delete',

            ];

            return response()->json($data, 200);

        }

        else{
            $data = [
                'messasge' => 'student not found',

            ];

            return response()->json($data, 404);
        }
    }

    public function show ($id){
        $student = Student::find($id);

        if ($student) {
            $data = [
                'message' => 'get detail student',
                'data' => $student,
            ];

            return response()->json($data, 200);

        }

        else {
            $data = [
                'message' => 'student not found',
            ];

            return response()->json($data, 404);
        }
    }
}
