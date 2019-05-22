<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classrooms;
use App\Students;
use Illuminate\Support\Facades\Input;
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

    
}
