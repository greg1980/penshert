<?php

namespace App\Http\Controllers;
use App\User;
use App\Photo;
use App\Role;
use App\Http\Requests\UsersRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
       $users =User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  

        $roles =Role::pluck('name','id')->all();

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        // return $request->all();
 
        /* persisting the data to database */
         $input = $request->all();


         if($file = $request->file('photo_id')) {
             $name = time()  . $file->getClientOriginalName();
              
              $file->move('uploads/files', $name);
              $photo = Photo::create(['file'=>$name]);
              
              $input['photo_id'] = $photo->id;

         }
              $input['password'] = bcrypt($request->password);
              User::create($input);

         
          return redirect('/admin/users');
         

         
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return view('admin.users');
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findorFail($id);
         $roles =Role::Pluck('name','id')->all();

        return view('admin.users.edit', compact('user','roles'));

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
       // return view('admin/edit/{id}');
        $input = $request->all();


        if ($file =$request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('uploads/files',$name);
            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;
        }


        return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        User::findOrFail($id)->delete();

        $user =User::findOrFail($id);
        unlink(public_path() . $user->photo->file);
        $user->delete();
        Session::flash('deleted_user','The user has been successfully deleted ');

        return redirect('/admin/users');

        //
    }
}
