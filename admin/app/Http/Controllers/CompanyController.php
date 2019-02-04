<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Company;
use Validator;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$comapny = Company::all();
        $comapny = DB::table('companies')->paginate(15);
        return  response()->json($comapny);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $logo_id = 0;
        $validator  =  $request->validate([
            'name' => 'required' , 
            'logo'=>'dimensions:width=100,height=100',
        ]);

         if ($file = $request->file('logo'))
         {

          $name = time().$file->getClientOriginalName();
          Storage::disk('public')->put('logo', $name);
          $logo = Logo::create(['path'=> $name]);
            $logo_id = $logo->id;
            
         }

        $com =  Comapny::create(['name'=>$request->name , 'email'=>$request->email , 
             'logo_id' => $logo_id , 'website' =>$request->website ]);

        return rsponse()->json(1);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::findOrFail($id);
        return response()->json($company);
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
         $company = Company::findOrFail($id);

         $company->update($request->all());

         return response()->json($company);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::findOrFail($id);

        $company->delete();
        return response()->json('The item has been deleted');
    }
}
