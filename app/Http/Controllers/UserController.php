<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $users = User::all();
        
         return view('listing',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    
    return view('fileUpload');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
          
        $request->validate([
            'name'=>[
                'required',
                'min:3',
                'max:20'
            ],
            'file' => [
                'required',
                'mimes:jpg,jpeg,png,webp'
            ],
            ]);

        $path = $request->file('file')->store('images','public');
           
    
        //save path to the database

        User::create([

            'name'=>$request->name,
            'image'=>$path
        ]);


        return redirect()->route('users.index')->with('status','Image uploaded successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
      $user = User::find($id);
      return view('editFile',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $user = User::find($id);

        if($request->hasFile('file'))
        {

               // remove the existing image 
            
               $imagePath = public_path('storage/').$user->image;

               if(file_exists($imagePath))
               {
                  @unlink($imagePath);
               }
               $path = $request->file('file')->store('images','public');
               $user->image= $path;
               $user->save();
        }

        return redirect()->route('users.index')->with('status', 'User profile updated successfully');



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        $user = User::find($id);
        
        $user->delete();

        $imagePath = public_path('storage/').$user->image;

        if(file_exists($imagePath))
        {
            @unlink($imagePath);
        }
        return redirect()->route('users.index')->with('status', 'User has been deleted Successfully');
    }
}
