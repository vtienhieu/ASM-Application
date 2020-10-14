<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


use App\Categories;
use App\Cource;
use App\trainer;
use App\trainee;
use App\traineecou;
use App\trainertopic;
use App\coursetopic;
use App\topic;
use App\User;
use Auth,DB;

class CateController extends Controller
{
    public function trainingmenu(){
        $user = Auth::user();
        if($user->can('training',Categories::class)){
            return view('trainingmenu');
        }
        
    }

    public function getinsert(){
        $user = Auth::user();
        if($user->can('training',Categories::class)){
            return view('createCategories');
        }
        else{
            dd('that bai');
        }
      
    }
    
        public function insert(Request $request)
        {
            $user = Auth::user();
            if($user->can('training',Categories::class)){
                $categories = new Categories;
                $categories->name = $request->name;
                $categories->description = $request->description;
                $categories->save();
                return redirect()->intended('managecategories');
            }
            else{
                dd('that bai');
            }
        }

        public function getAddCource(){
            $user = Auth::user();
            if($user->can('training',Categories::class)){
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
            if($user->can('training',Categories::class)){
                $cource = new Cource;
                $cource->name = $request->courcename;
                $cource->Description = $request->description;
                $cource->Credit = $request->credit;
                $cource->CateID = $request->cate;
                $cource->save();
                return redirect()->intended('viewcource');
            }
            else{
                dd('that bai');
            }
        }

        public function getAddTrainer(){
            $user = Auth::user();
            $u = User::all();
            if($user->can('training',Categories::class)){
                return view('add_tutor',compact('u'));
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
            
            if($user->can('training',Categories::class)){
                $trainer = new trainer;
                $trainer->TrainerName = $request->tutorname;
                $trainer->email = $request->email;
                $trainer->trainerID = $request->trainerID;
                $trainer->save();
                return redirect()->intended('viewtrainer');
            }
            else{
                dd('that bai');
            }
        }
//----------------------------------------------------------------------


        public function getAddTrainee(){
            $user = Auth::user();
            if($user->can('training',Categories::class)){
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
            if($user->can('training',Categories::class)){
                $trainee = new trainee;
                $trainee->TraineeName = $request->traineeName;
                $trainee->Address = $request->address;
                $trainee->save();
                return redirect()->intended('viewtrainees');
            }
            else{
                dd('that bai');
            }
        }

        public function viewcource(){
            // $cource = DB::table('cources')->join('tutor_courses','cources.id','=','tutor_courses.CourceID')->join('tutors','tutor_courses.TutorID','=','tutors.id')->paginate(3);
            // $cources = $cource->sortable()->paginate(3);
            $user = Auth::user();
            if($user->can('training',Categories::class)){
                $unscource = Cource::sortable()->paginate(3);
                return view('cource_list',compact('unscource'));
            }
            else{
                dd('that bai');
            }
           
        }

        public function viewtopic(){
            // $cource = DB::table('cources')->join('tutor_courses','cources.id','=','tutor_courses.CourceID')->join('tutors','tutor_courses.TutorID','=','tutors.id')->paginate(3);
            // $cources = $cource->sortable()->paginate(3);
            $user = Auth::user();
            if($user->can('training',Categories::class)){
                $topic = topic::sortable()->paginate(3);
                return view('topiclist',compact('topic'));
            }
            else{
                dd('that bai');
            }
           
        }
        public function viewtrainer(){
            // $cource = DB::table('cources')->join('tutor_courses','cources.id','=','tutor_courses.CourceID')->join('tutors','tutor_courses.TutorID','=','tutors.id')->paginate(3);
            // $cources = $cource->sortable()->paginate(3);
            $user = Auth::user();
            if($user->can('training',Categories::class)){
        
                $trainer = trainer::sortable()->paginate(3);
                return view('trainerlist',compact('trainer'));
            }
            else{
                dd('that bai');
            }
           
        }

        public function viewaccount(){
            // $cource = DB::table('cources')->join('tutor_courses','cources.id','=','tutor_courses.CourceID')->join('tutors','tutor_courses.TutorID','=','tutors.id')->paginate(3);
            // $cources = $cource->sortable()->paginate(3);
            $user = Auth::user();
            if($user->can('admin',Categories::class)){
        
                $account = User::sortable()->paginate(3);
                return view('accountlist',compact('account'));
            }
            else{
                dd('that bai');
            }
           
        }

        public function searchcourse(Request $request){
            $user = Auth::user();
            if($user->can('training',Categories::class)){
                $keyword = $request->search;
                $result = Cource::where('name','like',"%$keyword%")->orWhere('Description','like',"%$keyword%")->orWhere('Credit','like',"%$keyword%")->get();
                return view('searchcourse',compact('result'));
            }
        
        }

        public function searchcate(Request $request){
            $user = Auth::user();
            if($user->can('training',Categories::class)){
        $keyword = $request->search;
        $result = Categories::where('name','like',"%$keyword%")->orWhere('description','like',"%$keyword%")->get();
        return view('searchcate',compact('result'));
            }
       
        }

        public function searchtrainee(Request $request){
            $user = Auth::user();
            if($user->can('training',Categories::class)){
                $keyword = $request->search;
                $result = trainee::where('TraineeName','like',"%$keyword%")->orWhere('Address','like',"%$keyword%")->get();
                return view('searchtrainee',compact('result'));
            }
      
        }

        public function viewtrainees(){
            $user = Auth::user();
            if($user->can('training',Categories::class)){
                $trainees = trainee::sortable()->paginate(3);
            return view('student_list',compact('trainees'));
            }
          
        }

        public function trainerinformation($id){
            $user = Auth::user();
            if($user->can('trainer',Categories::class)){
                $st = trainer::find($id);
                $data = DB::table('trainers')->join('trainertopics','trainers.trainerID','=','trainertopics.TrainerID')->join('topics','trainertopics.TopicID','=','topics.TopicId')->where('trainers.trainerID','=',$id)->get();
                return view('trainerInformation',compact('data','st'));
            }
         
        }

        public function trainerdetail($id){
            $user = Auth::user();
            if($user->can('trainer',Categories::class)){
                $roleID = Auth::user()->id;
                $data = DB::table('trainers')->join('trainertopics','trainers.trainerID','=','trainertopics.TrainerID')->join('topics','trainertopics.TopicID','=','topics.TopicId')->where('topics.TopicId','=',$id)->get();
                $data2 = DB::table('topics')->join('coursetopics','topics.TopicId','=','coursetopics.TopicID')->join('cources','coursetopics.CourceID','=','cources.id')->where('topics.TopicId','=',$id)->get(); // lấy ra chi tiết hóa đơn theo id
                return view('student_detail',compact('data','data2','roleID'));
            }
            
        }

        public function getassigntutor(){
            $user = Auth::user();
            if($user->can('training',Categories::class)){
                $topic = topic::all();
                $topic2 = DB::table('trainers')->join('trainertopics','trainers.trainerID','=','trainertopics.TrainerID')->join('topics','trainertopics.TopicID','=','topics.TopicId')->get();
                $trainer = trainer::all();
                // $course = Cource::all();
                return view('assigntutor',compact('topic','trainer','topic2'));
            }
            
           
        }

        public function postassigntutor(Request $request){
            $validatedData = $request->validate([
                'TopicID' => 'required|unique:trainertopics'
            ],
            [
                'TopicID.unique' => 'This topic is already has trainer'
                
            ]);
            $user = Auth::user();
            if($user->can('training',Categories::class)){
                $assgin = new trainertopic;
                $assgin->TrainerID = $request->id;
                $assgin->TopicID = $request->TopicID;
                $assgin->save();
                // $addtopic = new coursetopic;
                // $addtopic->TopicID = $request->TopicID;
                // $addtopic->CourceID = $request->CourceID;
                // $addtopic->save();
                return redirect()->intended('trainingmenu');
            }
           
        }

        //-------------------------------------------------------
        public function getassigntrainee(){
            $user = Auth::user();
            if($user->can('training',Categories::class)){
                $course = Cource::all();
                $trainee = trainee::all();
                return view('assigntrainee',compact('course','trainee'));
            }
         
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
            $user = Auth::user();
            if($user->can('training',Categories::class)){
                $assgintn = new traineecou;
                $assgintn->CourceID = $request->CourceID;
                $assgintn->TraineeID = $request->traineeID;
                $assgintn->save();
                return redirect()->intended('trainingmenu');
            }
        
        }


        //----------------------------------------------
        public function getaddtopictocourse(){
            $user = Auth::user();
            if($user->can('training',Categories::class)){
                $topic = DB::table('trainers')->join('trainertopics','trainers.trainerID','=','trainertopics.TrainerID')->join('topics','trainertopics.TopicID','=','topics.TopicId')->get();
            $course = Cource::all();
            return view('addtopictocourse',compact('course','topic'));
            }
           
        }

        public function postaddtopictocourse(Request $request){
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
            $user = Auth::user();
            if($user->can('training',Categories::class)){
                $addtopic = new coursetopic;
                $addtopic->TopicID = $request->TopicID;
                $addtopic->CourceID = $request->CourceID;
                $addtopic->save();
                return redirect()->intended('trainingmenu');
            }
       
        }



        public function getaddtopic(){
            $user = Auth::user();
            if($user->can('training',Categories::class)){
                return view('addtopic');
            }
            else{
                dd('that bai');
            }
          
        }

        public function postaddtopic(Request $request)
        {
            $user = Auth::user();
            if($user->can('training',Categories::class)){
                $topic = new topic;
                $topic->TopicName = $request->topicname;
                $topic->Description = $request->description;
                $topic->save();
                return redirect()->intended('viewtopic');
            }
            else{
                dd('that bai');
            }
        }


        public function getupdatetrainee($id){
            $user = Auth::user();
            if($user->can('training',Categories::class)){
                $trainee = trainee::find($id);
            return view('updatetrainee',compact('trainee'));
            }
            
        }

        public function postupdatetrainee($id,Request $request){
            $user = Auth::user();
            if($user->can('training',Categories::class)){
                $trainee = trainee::find($id);
                $trainee->TraineeName = $request->traineeName;
                $trainee->Address = $request->address;
                $trainee->save();
                return redirect()->intended('viewtrainees');
            }
           
        }

        public function getdeletetrainee($id){
            $user = Auth::user();
            if($user->can('training',Categories::class)){
                trainee::destroy($id);
            return redirect()->intended('viewtrainees');
            }
            
        }
        //-----------------------------------------------------------------
        public function getupdatetopic($id){
            $user = Auth::user();
            if($user->can('training',Categories::class)){
                $topic = topic::find($id);
            return view('updatetopic',compact('topic'));
            }
            
        }

        public function postupdatetopic($id,Request $request){
            $user = Auth::user();
            if($user->can('training',Categories::class)){
                $topic = topic::find($id);
                $topic->TopicName = $request->topicname;
                $topic->Description = $request->description;
                $topic->save();
                return redirect()->intended('viewtopic');
            }
           
        }

        public function getdeletetopic($id){
            $user = Auth::user();
            if($user->can('training',Categories::class)){
                topic::destroy($id);
            return redirect()->intended('viewtopic');
            }
            
        }
        //-----------------------------------------------------------------
        public function getupdatetrainer($id){
            $user = Auth::user();
            if($user->can('training',Categories::class)){
                $trainer = trainer::find($id);
            $u = User::all();
            return view('updatetrainer',compact('trainer','u'));
            }
            
        }

        public function postupdatetrainer($id,Request $request){
            $user = Auth::user();
            if($user->can('training',Categories::class)){
            $trainer = trainer::find($id);
            $trainer->TrainerName = $request->tutorname;
            $trainer->email = $request->email;
            $trainer->trainerID = $request->trainerID;
            $trainer->save();
            return redirect()->intended('viewtrainer');
            }
            
        }

        public function getdeletetrainer($id){
            $user = Auth::user();
            if($user->can('training',Categories::class)){
                trainer::destroy($id);
                return redirect()->intended('viewtrainer');
            }
            
        }
        //----------------------------------------------

        public function managecategories(){
            $user = Auth::user();
            if($user->can('training',Categories::class)){
                $cate = Categories::sortable()->paginate(3);
            return view('manageCategories',compact('cate'));
            }
            
        }

        public function getupdatecate($id){
            $user = Auth::user();
            if($user->can('training',Categories::class)){
                $cate = Categories::find($id);
            return view('updatecate',compact('cate'));
            }
            
        }

        public function postupdatecate($id,Request $request){
            $user = Auth::user();
            if($user->can('training',Categories::class)){
            $cate = Categories::find($id);
            $cate->name = $request->name;
            $cate->description = $request->description;
            $cate->save();
            return redirect()->intended('managecategories');
            }
            
        }

        public function getdeletecate($id){
            $user = Auth::user();
            if($user->can('training',Categories::class)){
                Categories::destroy($id);
                return redirect()->intended('managecategories');
            }
            
        }

//--------------------------------------------------------------------
        public function getupdatecourse($id){
            $user = Auth::user();
            if($user->can('training',Categories::class)){
                $course = Cource::find($id);
            $cate = Categories::all();
            return view('updatecourse',compact('course','cate'));
            }
            
        }

        public function postupdatecourse($id,Request $request){
            $user = Auth::user();
            if($user->can('training',Categories::class)){
            $cource = Cource::find($id);
            $cource->name = $request->courcename;
            $cource->Description = $request->description;
            $cource->Credit = $request->credit;
            $cource->CateID = $request->cate;
            $cource->save();
            return redirect()->intended('viewcource');
            }
            
        }

        public function getdeletecourse($id){
            $user = Auth::user();
            if($user->can('training',Categories::class)){
                Cource::destroy($id);
                return redirect()->intended('viewcource');
            }
            
        }


        public function getLogin(){
            return view('login');
        }

        public function postLogin(Request $request){
            $login = [
                'email' => $request->uname,
                'password' => $request->psw,
            ];
            if(Auth::attempt($login)){
                if(Auth::user()->roleID == 3){
                    return redirect()->intended('trainerinformation/'.Auth::user()->id);
                }
                else if(Auth::user()->roleID ==1){
                    return redirect()->intended('viewaccount');
                }
                else if(Auth::user()->roleID ==2){
                    return redirect()->intended('trainingmenu');
                }
                






            }else{
                return redirect()->intended('login');
            }
        }


        public function getregister(){
            $user = Auth::user();
            if($user->can('admin',Categories::class)){
                return view('register');
            }
            
        }

        public function postregister(Request $request){
            $user = Auth::user();
            if($user->can('admin',Categories::class)){
            $user = new User;
            $user->email = $request->uname;
            $user->password = Hash::make($request->psw);
            $user->roleID = $request->id;
            $user->save();
            return redirect()->intended('viewaccount');
            }
        
        }

        public function getupdateaccount($id){
            $user = Auth::user();
            if($user->can('admin',Categories::class)){
                $account = User::find($id);
                return view('updateaccount',compact('account'));
            }
            
        }

        public function postupdateaccount($id,Request $request){
            $user = Auth::user();
            if($user->can('admin',Categories::class)){
                $user = User::find($id);
        $user->email = $request->uname;
        $user->password = Hash::make($request->psw);
        $user->roleID = $request->id;
        $user->save();
        return redirect()->intended('viewaccount');
            }
        
        }

        public function getdeleteaccount($id){
            $user = Auth::user();
            if($user->can('admin',Categories::class)){
                User::destroy($id);
            return redirect()->intended('viewaccount');
            }
            
        }

        public function logout(){

            Auth::logout();
            return redirect()->intended('/');
        }


        
}
