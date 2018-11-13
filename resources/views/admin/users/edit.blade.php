@extends('layouts.users')

@section('content')
          
                               
                 
            <section class="dashboard-counts no-padding-bottom">
               <div class="container-fluid">
                                  
					        @include('includes.form_error')
                                       
                      <div class="row bg-white">
                          {!! Form::model ($user, ['method'=>'PATCH', 'action'=> ['AdminUsersController@update',$user->id],]) !!}


                          <div class="form-group">  
                            {!! Form::Label('email', 'Email:') !!}
                            {!! Form::text('email', null, ['class'=>'form-control'])!!}
                          </div>

                          <div class="form-group">  
                            {!! Form::Label('name', 'Name:') !!}
                            {!! Form::text('name', null, ['class'=>'form-control'])!!}
                          </div>

                          <div class="form-group"> 
                            {!! Form::Label('Password', 'Password:') !!}
                            {!! Form::password('password',  ['class'=>'form-control'])!!}
                          </div>
                                                
                          <div class="form-group">
                             {!! Form::Label('file','Receipt') !!}
                             {!! Form::File('file', null, ['class' =>'form-control']) !!}

                          </div>

                          <div class="form-group">   
                              {!! Form::Label('role_id', 'Role:') !!}
                              {!! Form::select('role_id',  $roles, null, ['class'=>'form-control'])!!}
                          </div>
                                               
                           <div class="form-group"> 
                             {!! Form::Label('active', 'Status:') !!}
                             {!! Form::select('active', array( 1 =>'active', 0 =>'Not Active'), null, ['class'=>'form-control'])!!}
                           </div>

                           <div class="form-group">
                              {!! Form::Submit('Update User', ['class'=>'btn btn-success']) !!}
                           </div>

                         {!! Form::close() !!}
                                                                     

                        </div>

			        
			          	
			       </div>
    
  </section>

@endsection
      