<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Ticket;
use App\Heritagecattypetables;
use App\Heritagecompaintdetails;
use Illuminate\Support\Facades\Input;
use App\Category;
use App\Description;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
use App\User;



class TicketController extends Controller
{

          public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


   
     public function provinces(){
        $provinces = DB::table('categories') 
        ->get();
     
      return view('/ticket', ['provinces'=>$provinces]);
    }

    public function regencies(){
      $provinces_id = Input::get('category_id');
      $regencies = Description::where('category_id', '=', $provinces_id)->get();
      return response()->json($regencies);
    }
    

    function fetch(Request $request)
    {
     $select = $request->get('select');
     $value = $request->get('value');
     $dependent = $request->get('dependent');
     $data = DB::table('heritagecattypetable')
       ->where($select, $value)
       ->groupBy($dependent)
       ->get();
     $output = '<option value="">Select '.ucfirst($dependent).'</option>';
     foreach($data as $row)
     {
      $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
     }
  

    }



  public function sendticket(Request $request)
    {
         $ticket = new Ticket([




            'category_id' => $request->input('category_id'),
            'description_id' => $request->input('description_id'),
            'customer_number' => $request->input('customer_number'),  
            'cname' => $request->input('cname'),
            'caddress' => $request->input('caddress'),
            'taccount'=>$request->input('taccount'),
            'priority' => $request->input('priority'),
            'gender' => $request->input('gender'),
            'pnumber'=>$request->input('pnumber'),
            'cemail' => $request->input('cemail'),
            'editor1'=>$request->input('editor1'),
            'ticket_id' => strtoupper(str_random(6)).rand(0000,1111),



        ]);

        $sendmails = User::where('user_type_id', '=', '3' )->get();

      
      

        
            if($ticket->save()){
                 foreach ($sendmails as $sendmail ) {
                     Mail::to($sendmail)->queue(new SendEmail());
         
       }
                

                return redirect()->back()->with("success", "Ticket created Successfully #$ticket->ticket_id ");

            }

            else {
                return redirect()->back()->with("error", "Error creating Ticket.");
            }


    


            
    

    }
    public function  assignticket(Request $request, $id)
    {
          

        $ticket= Ticket::find($id);
        $ticket->department_id = $request->get('department_id');

        if($ticket->department_id >0 ){

        $ticket->save();
          return redirect()->back()->with('success', 'Ticket Assigned');  
        } else{

            return redirect()->back()->with('error', 'Kindly Choose Staff Department'); 
        }
       
         


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($regencies)
    {
       dd($regencies);
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
