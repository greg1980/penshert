@extends('layouts.users');


@section ('content')

    <section class="dashboard-counts no-padding-bottom">
        <div class="container-fluid">

            @include('includes.form_error')

            <div class="row bg-white has-shadow title">
                <h2>Create Post</h2>
                {!! Form::Open(['method'=>'POST', 'action'=>'AdminPostsController@store', 'files'=>true]) !!}

                    <div class="form-group">
                         {!! Form::label('title', 'title:') !!}
                         {!! Form::text('title', null,['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('category_id', 'Category:') !!}
                        {!! Form::select('category_id', [ ''=> 'Choose categories'] + $categories, null,['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('photo_id', 'Photo:') !!}
                        {!! Form::file('photo_id',['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('body', 'Description') !!}
                        {!! Form::textarea('body', null,['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                         {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
                    </div>

                 {!! Form::close() !!}

            </div>
        </div>
    </section>
@stop


