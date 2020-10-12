<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;


use App\Categories;
use App\Cource;
use App\trainer;
use App\trainee;
use App\traineecou;
use App\trainertopic;
use App\coursetopic;
use App\topic;
use Auth,DB;

class CateController extends Controller
{
    public function Cate($id){
        $cate = Categories::find($id);
        $user = Auth::user();
        if($user->can('view',Categories::class)){
            return view('cate_show',compact('cate'));
        }
        else{
            dd('Ban khong co quyen');
        }
       
    }

    public function getinsert(){
        $user = Auth::user();
        if($user->can('create',Categories::class)){
            return view('createCategories');
        }
        else{
            dd('that bai');
        }
      
    }
    
        public function insert(Request $request)
        {
            $user = Auth::user();
            if($user->can('create',Categories::class)){
                $categories = new Categories;
                $categories->name = $request->name;
                $categories->description = $request->description;
                $categories->save();
                return back();
            }
            else{
                dd('that bai');
            }
        }

        public function getAddCource(){
            $user = Auth::user();
            if($user->can('create',Categories::class)){
                $cate = Categories::all();
                return view('add_cource',compact('cate'));
            }
            else{
                dd('that bai');
            }
          
        }

        public function postAddCource(Request $request)
        {
            $user = Auth::user();
            if($user->can('create',Categories::class)){
                $cource = new Cource;
                $cource->name = $request->courcename;
                $cource->Description = $request->description;
                $cource->Credit = $request->credit;
                $cource->CateID = $request->cate;
                $cource->save();
                return back();
            }
            else{
                dd('that bai');
            }
        }

        public function getAddTrainer(){
            $user = Auth::user();
            if($user->can('create',Categories::class)){
                return view('add_tutor');
            }
            else{
                dd('that bai');
            }
          
        }

        public function postAddTrainer(Request $request)
        {
            $validatedData = $request->validate([
                'tutorname' => 'required',
                'email' => 'required',
            ],
            [
                'tutorname.required' => 'Tutor name can not be empty!',
                'email.required' => 'Email can not be empty!'
            ]);
           
            $user = Auth::user();
            if($user->can('create',Categories::class)){
                $trainer = new trainer;
                $trainer->TrainerName = $request->tutorname;
                $trainer->email = $request->email;
                $trainer->save();
                return back();
            }
            else{
                dd('that bai');
            }
        }
//----------------------------------------------------------------------


        public function getAddTrainee(){
            $user = Auth::user();
            if($user->can('create',Categories::class)){
                return view('addtrainee');
            }
            else{
                dd('that bai');
            }
          
        }

        public function postAddTrainee(Request $request)
        {
            $validatedData = $request->validate([
                'traineeName' => 'required',
                'address' => 'required',
            ],
            [
                'traineeName.required' => 'Trainee name can not be empty!',
                'address.required' => 'Address can not be empty!'
            ]);
           
            $user = Auth::user();
            if($user->can('create',Categories::class)){
                $trainee = new trainee;
                $trainee->TraineeName = $request->traineeName;
                $trainee->Address = $request->address;
                $trainee->save();
                return back();
            }
            else{
                dd('that bai');
            }
        }

        public function viewcource(){
            // $cource = DB::table('cources')->join('tutor_courses','cources.id','=','tutor_courses.CourceID')->join('tutors','tutor_courses.TutorID','=','tutors.id')->paginate(3);
            // $cources = $cource->sortable()->paginate(3);
            $user = Auth::user();
            if($user->can('viewinfortrainer',Categories::class)){
                $id = Auth::user()->id;
                $unscource = Cource::sortable()->paginate(3);
                return view('cource_list',compact('unscource','id'));
            }
            else{
                dd('that bai');
            }
           
        }

        public function Search(Request $request){
        $keyword = $request->search;
        $result = Cource::where('name','like',"%$keyword%")->orWhere('Description','like',"%$keyword%")->orWhere('Credit','like',"%$keyword%")->get();
        return view('coure_search',compact('result'));
        }

        public function viewtrainees(){
            $trainees = trainee::sortable()->paginate(3);
            return view('student_list',compact('trainees'));
        }

        public function trainerinformation($id){
            $st = trainer::find($id);
            $data = DB::table('trainers')->join('trainertopics','trainers.trainerID','=','trainertopics.TrainerID')->join('topics','trainertopics.TopicID','=','topics.TopicId')->where('trainers.trainerID','=',$id)->get();
            return view('trainerInformation',compact('data','st'));
        }

        public function trainerdetail($id){
            $roleID = Auth::user()->id;
            $data = DB::table('trainers')->join('trainertopics','trainers.trainerID','=','trainertopics.TrainerID')->join('topics','trainertopics.TopicID','=','topics.TopicId')->where('topics.TopicId','=',$id)->get();
            $data2 = DB::table('topics')->join('coursetopics','topics.TopicId','=','coursetopics.TopicID')->join('cources','coursetopics.CourceID','=','cources.id')->where('topics.TopicId','=',$id)->get(); // lấy ra chi tiết hóa đơn theo id
            return view('student_detail',compact('data','data2','roleID'));
        }

        public function getassigntutor(){
            $topic = topic::all();
            $trainer = trainer::all();
            $course = Cource::all();
            return view('assigntutor',compact('topic','trainer','course'));
        }

        public function postassigntutor(Request $request){
            $validatedData = $request->validate([
                'TopicID' => 'required|unique:coursetopics'
            ],
            [
                'TopicID.unique' => 'This topic is already in course'
            ]);
            $assgin = new trainertopic;
            $assgin->TrainerID = $request->id;
            $assgin->TopicID = $request->TopicID;
            $assgin->save();
            $addtopic = new coursetopic;
            $addtopic->TopicID = $request->TopicID;
            $addtopic->CourceID = $request->CourceID;
            $addtopic->save();
            return back();
        }

        //-------------------------------------------------------
        public function getassigntrainee(){
            $course = Cource::all();
            $trainee = trainee::all();
            return view('assigntrainee',compact('course','trainee'));
        }

        public function postassigntrainee(Request $request){
            // $validatedData = $request->validate([
            //     'TutorID' => 'required',
            //     'CourceID' => 'required|unique:tutor_courses',
            //     'year' => 'required'
            // ],
            // [
            //     'TutorID.required' => 'Tutor name can not be empty!',
            //     'CourceID.required' => 'Email can not be empty!',
            //     'CourceID.unique' => 'Khoa hoc nay da co tutor',
            //     'year.required' => 'Year can not be empty!'
            // ]);
            $assgintn = new traineecou;
            $assgintn->CourceID = $request->CourceID;
            $assgintn->TraineeID = $request->traineeID;
            $assgintn->save();
            return back();
        }


        //----------------------------------------------
        // public function getaddtopictocourse(){
        //     $topic = topic::all();
        //     $course = Cource::all();
        //     return view('addtopictocourse',compact('course','topic'));
        // }

        // public function postaddtopictocourse(Request $request){
        //     // $validatedData = $request->validate([
        //     //     'TutorID' => 'required',
        //     //     'CourceID' => 'required|unique:tutor_courses',
        //     //     'year' => 'required'
        //     // ],
        //     // [
        //     //     'TutorID.required' => 'Tutor name can not be empty!',
        //     //     'CourceID.required' => 'Email can not be empty!',
        //     //     'CourceID.unique' => 'Khoa hoc nay da co tutor',
        //     //     'year.required' => 'Year can not be empty!'
        //     // ]);
        //     $addtopic = new coursetopic;
        //     $addtopic->TopicID = $request->TopicID;
        //     $addtopic->CourceID = $request->CourceID;
        //     $addtopic->save();
        //     return back();
        // }



        public function getaddtopic(){
            $user = Auth::user();
            if($user->can('create',Categories::class)){
                return view('addtopic');
            }
            else{
                dd('that bai');
            }
          
        }

        public function postaddtopic(Request $request)
        {
            $user = Auth::user();
            if($user->can('create',Categories::class)){
                $topic = new topic;
                $topic->TopicName = $request->topicname;
                $topic->Description = $request->description;
                $topic->save();
                return back();
            }
            else{
                dd('that bai');
            }
        }


        
}
