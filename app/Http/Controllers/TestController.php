<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classrooms;
use App\Students;
use Illuminate\Support\Facades\Input;
use Auth;
use Carbon;
class TestController extends Controller
{
    public function showClassroomList(){
    	$classrooms = Classrooms::all();
    	//$classrooms = Classrooms::find(1); //cest pour afficher le titre du premier title 
    	//dd($classrooms);
    	return view('welcome',['classrooms'=>$classrooms]);
    }

    public function showAddClassroom(){
    	
    	return view('classroom.add');

    }

    public function handleAddClassroom(){

    	$data = Input::all(); //$data cest transformer en tableau    	
    	//dd($data);

    	Classrooms::create([
    		'title'=>$data['title'], 'photo'=>$data['photo']
    	]);
    	//return back();
    	return redirect(route('showClassroomList'));
    }

    public function showStudentList(){
    	$student = Students::all();
    	dd($student);
    }

    public function showAddStudent(){
    	$classrooms = Classrooms::all();
    	

    	return view('student.add',['classrooms'=>$classrooms]);

    }

    public function handleAddStudent(){
    	$data = Input::all();

    	Students::create(['name'=>$data['title'],'email'=>$data['email'],'password'=>bcrypt($data['password']),'classroom_id'=>$data['student']]);
        return redirect(route('showAddClassroom'));
    }
    public function handleDeleteStudent($id){
    	
    	$student = Students::find($id);
    		if($student){
    			$student->delete();
    			return 'succes';
    		}else{
    			return 'Erreur';
    		}
    }

    public function showStudent($id){

    	$student = Students::find($id);
    	if($student){
    		
    		return view('result',['students'=>$student]);
    		}else{
    			return 'Erreur';
    		}
    }
    public function showUpdateStudent($id){
    
    /*if(!Auth::user()){
        return redirect(route('showClassroomList'));
    }*/
    $student=Students::find($id);
   
      if($student){    
            $classrooms=Classroom::all();
        
            return view('student.update',['student'=>$student],['classrooms'=>$classrooms]);
        }
        return 'erreur id student';}


    public function handleUpdateStudent($id){
        $data=Input::all();
        $student=Students::find($id);     if($student){
           
            $student->name=$data['name'];
            $student->email=$data['email'];
            $student->classroom_id=$data['classroom_id'];
            $student->save();
            return view('student.view',['student'=>$student]);
            
            $student=DB::table('student')->where('id','=',$id)->update([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'classroom_id'=>$data['classroom_id']
            ]);
        return redirect(route('showStudent',['id'=> $id]));    }
            
        return back();
        }
    public function showLoginStudent(){
       return view('student.login');
    }

    public function handleLoginStudent(){
        $data = Input::all();
        $cred=[
            'email'=>$data['email'],
            'password'=>$data['password']
        ];

        if(Auth::attempt($cred)){
        return redirect(route('showAddClassroom'));
        }
    
        return back();
    }

    public function handlelogoutStudent(){

        Auth::logout();
        return view('welcome',['classrooms'=>$classrooms]);
    }
}


