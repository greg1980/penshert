@extends('layouts.admin')

@section('content')

    @if(Session::has('deleted_user'));
        <p class="bg-success">{{Session('deleted_user')}}</p>
    @endif

         <section class="dashboard-counts no-padding-bottom">
            <div class="container-fluid">
              <div class="row bg-white has-shadow title">
                  <h2>NBA-SLP Users</h2>
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Active</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th>Lastname</th>
                          </tr>
                        </thead>
                        <tbody>

                          @if($users)

                               @foreach($users as $user)
                          <tr>
                            <td>{{$user->id}}</td>
                            <td><a href="{{route('users.edit',$user->id)}}">{{$user->name}}</a></td>
                            <td><img height="40"src="{{$user->photo ? $user->photo->file : '../../uploads/files/default.jpg'}}" alt="" ></td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role->name}}</td>
                            <td>{{$user->is_active = 1 ? 'Active' : 'Not Active'}}</td>
                            <td>{{$user->created_at->diffForHumans()}}</td>
                            <td>{{$user->updated_at->diffForHumans()}}</td>
                          </tr>
                         

                              @endforeach
                         @endif
                        </tbody>
                      </table>
              </div>
            </div>
          </section>
               


@endsection
