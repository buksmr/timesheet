<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Article;
use App\Student;
use App\Http\Resources\Article as ArticleResource;
use Guzzlehttp\Common\Exception\MultiTransferException;
use Psr\Http\Message\RequestInterface;
use GuzzleHttp\Client;
use vendor\autoload;



class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get articless
        $articles = Article::paginate(15);

        //Return collection of article has a resource
        return ArticleResource::collection($articles);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
            
            ]);

                
        
          $article = $request-> isMethod('put')? Article::findOrFail($request->$article_id): new article;

          $article->id = $request->input('article_id');
          $article->title = $request->input('title');
          $article->body = $request->input('body');
         
          
         
          
          if ($article->save()){

            return new ArticleResource ($article);

            $article->body = $request->action('http://127.0.0.1:8000/api/article');

        
            
            


           
          }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);
        return new ArticleResource($article);
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
        $article = Article::findOrFail($id);

        if ($article->delete()){
            return new ArticleResource($article);


        }
      
    }

    public function postGuzzleRequest()

    {
       
        $client = new Client();
        
        $response = $client->request('post', 'http://127.0.0.1:8085/TAFJServices/services/OFSService/Invoke?Request=FUNDS.TRANSFER,/I/PROCESS//0,AUTHOR/123456,,TRANSACTION.TYPE=AC,DEBIT.ACCT.NO=21261,DEBIT.CURRENCY=USD,DEBIT.AMOUNT=100,DEBIT.VALUE.DATE=20170417,ORDERING.CUST=MGT,CREDIT.ACCT.NO=20737,CREDIT.VALUE.DATE=20170417');
        $response = $client->request('get', 'http://127.0.0.1:8085/TAFJServices/services/OFSService/Invoke?Request=FUNDS.TRANSFER,/I/PROCESS//0,AUTHOR/123456,,TRANSACTION.TYPE=AC,DEBIT.ACCT.NO=21261,DEBIT.CURRENCY=USD,DEBIT.AMOUNT=100,DEBIT.VALUE.DATE=20170417,ORDERING.CUST=MGT,CREDIT.ACCT.NO=20737,CREDIT.VALUE.DATE=20170417');
     
      
        
        echo $response->getBody(). '<br>';
    
        echo $response->getBody(). <br>;




        
    }
   
    public function postGuzzle(Request $request)

    {

        


        $client = new \GuzzleHttp\Client(["base_uri" => "http://127.0.0.1:8085/TAFJServices/services/OFSService/Invoke?Request=FUNDS.TRANSFER,/I/PROCESS//0,AUTHOR/123456,,TRANSACTION.TYPE=AC,DEBIT.ACCT.NO=21261,DEBIT.CURRENCY=USD,DEBIT.AMOUNT=100,DEBIT.VALUE.DATE=20170417,ORDERING.CUST=MGT,CREDIT.ACCT.NO=20737,CREDIT.VALUE.DATE=20170417"]);
    

           $response = $client->request('GET');
           echo $response->getBody();
           
    }
    
}
