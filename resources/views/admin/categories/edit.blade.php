@extends('layouts.users')


@section('content')

    <section class="dashboard-counts no-padding-bottom">
        <div class="container-fluid">
            <div class="row bg-white has-shadow title">
                <div class="col-sm-6">
                    <h2>Categories</h2>

                    {!! Form::model($category, ['method'=>'PATCH', 'action'=> ['AdminCategoriesController@update',$category->id]]) !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Name') !!}
                        {!! Form::text('name',null,['class'=>'form-control']) !!}
                    </div>
                    <div>
                        {!! Form::submit('updateCategories', ['class'=>'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>

                <div class="col-sm-6">
                    {!! Form::Open(['method'=>'DELETE', 'action'=>['AdminCategoriesController@destroy', $category->id]]) !!}
                    <div class="form-group">
                        {!! Form::submit('Delete', ['class'=>'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>

    @endsection