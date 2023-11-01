<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        $students = Student::paginate(8);
        return view('index', compact('students'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $storeData = $request->validate([
            'name' => 'required|max:55',
            'email' => 'required|max:55',
            'address' => 'required|max:255',
            'country' => 'required|max:55',
            'city' => 'required|max:55',
            'pincode' => 'required|max:25'
        ]);

        $students = Student::create($storeData);
        return redirect('/student')->with('completed', 'Student Data has been saved');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $students = Student::findorfail("$id");
        // dd($students);
        return view('edit', compact('students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        // dd($id);
        $updateData = $request->validate([
            'name' => 'required|max:55',
            'email' => 'required|max:55',
            'address' => 'required|max:255',
            'country' => 'required|max:55',
            'city' => 'required|max:55',
            'pincode' => 'required|max:25'
        ]);

        $students = Student::whereId("$id")->update($updateData);
        $students = Student::all();
        return redirect()->route('student.index')->with('completed', 'Student Data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $students = Student::findorfail("$id");
        $students->delete();
        return redirect('/')->with('completed', 'Student Information has been deleted');
    }


    public function search(Request $request)
    {

        $q = $request->input('search');
        if ($q != '') {
            $data = Student::where('name', 'like', '%' . $q . '%')->orWhere('email', 'like', '%' . $q . '%')->paginate(5);
        
            // $data->appends(array('q' => Request::get('q')));
        }

        // dd($data->toArray());

        // dd($data);
        if (count($data) > 0) {
            return view('index', [
                'students' => $data,
            ]);
        }
        // return view('index')->withMessage("No Results Found!");
    }
}
