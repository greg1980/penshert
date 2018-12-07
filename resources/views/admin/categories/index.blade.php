@extends('layouts.admin');

@section('content')

    <section class="dashboard-counts no-padding-bottom">
        <div class="container-fluid">
            <div class="row bg-white has-shadow title">
               <div class="col-sm-6">
                <h2>Categories</h2>

                @if($categories)
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <td>id</td>
                            <td>Name</td>
                            <td>Created date</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td><a href="{{route('categories.edit',$category->id )}}">{{$category->name}}</a></td>
                                <td>{{$category->created_at ? $category->created_at->diffForHumans() : 'No date'}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-6">
                    @include('includes.form_error');
                   {!! Form::Open(['method'=>'POST', 'action'=>'AdminCategoriesController@store']) !!}
                      <div class="form-group">
                          {!! Form::label('name', 'Name') !!}
                          {!! Form::text('name',null,['class'=>'form-control']) !!}
                      </div>
                      <div>
                        {!! Form::submit('create Categories',null,['class'=>'btn btn-primary']) !!}
                      </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@endif
@stop
