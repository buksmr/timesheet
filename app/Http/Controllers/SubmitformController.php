<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Input;
use App\Category;
use App\Description;
use App\Department;
use App\Branch;
use App\Ticket;
use DB;
use Hash;
use Illuminate\Support\Facades\Auth;


class SubmitformController extends Controller
{

 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $categories = Category::all();
        $Description = Description::all();

        foreach ($categories as  $key ) {
           $id = $key->id;
           $names=$key->name;
        }

        foreach ($Description as  $value) {
            $val = $value->category_id;
        }

       $data = DB::table('categories')
       ->where('id', $val)
       ->get();

    



      return view('IssueDescription', ['categories'=>$categories, 'Description'=>$Description,]);
   
  }


   public function usershow()
    {
      

       $branches = DB::table('branches')
       
       ->get();

        $departments = DB::table('departments')
       
       ->get();

        $user_types = DB::table('user_types')
       
       ->get();
        $user_privileges = DB::table('user_privileges')
       
       ->get();




    



      return view('createusers', ['branches'=>$branches, 'departments'=>$departments, 'user_types'=>$user_types, 'user_privileges'=>$user_privileges ]);
   
  }

       public function __construct()
    {
        $this->middleware('auth');
    }


public function ticketshow()
    {
      

       $ticket = Ticket::all();
       $description = Description::all();
       $department= Department::all();
       
       

  

//        foreach ($ticket as $key ) {      
//  $issue = Category::where('id', '=', $key->issue)->get();          
     
//  $description = Description::where('id', '=', $key->description)->get();

//    foreach ($issue as $issue ){
    

//     $result1[] = $issue;


   
//   }

//  foreach ($description as $description ){
    

//     $result[] = $description;
   
//   }

//        }

//     $tick[] = $ticket;

// $ticket1= array_merge($tick, $result1, $result);

// foreach ($ticket as $key) {

//     echo $key->category->id;
 
// }

  return view('viewtickets', compact('ticket', 'description', 'department'));  



      

  }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function user(Request $request)
    {

        $LoginName = Input::get('LoginName');
        $userloginame = User::where('LoginName', '=', $LoginName)->first();


        $users = new User([


            'UserName' => $request->input('UserName'),
            'LoginName' => $request->input('LoginName'),
            'email' => $request->input('exampleInputEmail1'),  
            'PhoneNumber' => $request->input('PhoneNumber'),
            'StaffId' => $request->input('StaffId'),
            'user_privilege_id'=>$request->input('user_privilege_id'),
            'department_id' => $request->input('department_id'),
            'user_type_id' => $request->input('user_type_id'),
            'branch_id'=>$request->input('branch_id'),
            'password' => Hash::make('123456'),


        ]);

        if ($userloginame===null){
            $users->save();

            return redirect()->back()->with("success", "User created Successfully.");
        }
        else{

            return redirect()->back()->with("error", "User Already Exist.");
        }


  




    }

    public function category(Request $request)
    {

        $LoginName = Input::get('name');
        $userloginame = Category::where('name', '=', $LoginName)->first();


        $users = new Category([


            'name' => $request->input('name'),

        ]);

        if ($userloginame===null){
            $users->save();

            return redirect()->back()->with("success", "Issue Category Created Successfully.");
        }
        else{

            return redirect()->back()->with("error", "Issue Category Already Exist.");
        }




    }

    public function description(Request $request)
    {


        $LoginName = Input::get('name');
        $userloginame = Description::where('name', '=', $LoginName)->first();


        $users = new Description([

            'category_id' => $request->input('category_id'),
            'name' => $request->input('name'),



        ]);


        if ($userloginame===null){
            $users->save();

            return redirect()->back()->with("success", "Issue Description Created Successfully.");
        }
        else{

            return redirect()->back()->with("error", "Issue Description Already Exist.");
        }


}
        public function department(Request $request)
        {


            $LoginName = Input::get('name');
            $userloginame = Department::where('name', '=', $LoginName)->first();


            $users = new Department([

                'name' => $request->input('name'),



            ]);


            if ($userloginame===null){
                $users->save();

                return redirect()->back()->with("success", " Department Created Successfully.");
            }
            else{

                return redirect()->back()->with("error", " Department Already Exist.");
            }





        }



        public function show($id)
        {
        //
        }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
