<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
class StudentController extends Controller
{
    
    public function index(){
        return view('student.index');
    }


    public function store(Request $request){


        if($request->hasFile('photo')){
            $img = $request->file('photo');
            $unique_name = md5(time().rand()) . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('media/students'), $unique_name);
        }
       // return  $request -> all();
    //     dd($students);

        Student::create([
            'name'      => $request -> name,
            'email'     => $request -> email,
            'cell'      => $request -> cell,
            'uname'     => $request -> uname,
            'gender'    => $request -> gender,
            'photo'     =>  $unique_name,
            'status'    => 'active',
        ]);

    }

    public function all(){
        $all_students = Student::latest()->get();

        $content = '';
        $i = 1;
        forEach($all_students as $student){
            //$del_id=$student->id;
            $content.='<tr>';
            //id="'.$data->id.'"
            //$content.='<td>' .$i; $i++.'</td>';
            $content.='<td>'. $student->id .'</td>';
            $content.='<td>'. $student->name .'</td>';
            $content.='<td>'. $student->email .'</td>';
            $content.='<td>'. $student->cell .'</td>';
            $content.='<td>'. $student->uname .'</td>';
            $content.='<td>'. $student->gender .'</td>';
            $content.='<td><img src="media/students/'.$student->photo.'"></td>';
            $content .= ' <td>
                            <a class="btn btn-sm btn-info" show_id="'.$student->id.'" id="student_view_modal">View</a>
                            <a class="btn btn-sm btn-warning" href="#">Edit</a>
                            <a class="btn btn-sm btn-danger" del_id="'.$student->id.'" id="delete_data" href="#">Delete</a>
                        </td>';
            $content.='</tr>';
        }
        echo $content;
    }



    public function show($id){

         return $single_student = Student::findOrFail($id);
        // return view('student.index', ['student' => $single_student]);
     
    }

    public function delete($id){

        $data = Student::findOrFail($id);
        $data->delete();
     
    }
}