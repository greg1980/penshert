@extends('layouts.users');


@section ('content')

    <section class="dashboard-counts no-padding-bottom">

        <div class="container-fluid">

            <div class="row bg-white has-shadow title">
                @include('includes.form_error')
            <h2>Edit Post</h2>
            {!! Form::model($post, ['method'=>'PATCH', 'action'=> ['AdminPostsController@update', $post->id], 'files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('title', 'title:') !!}
                {!! Form::text('title', null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('category_id', 'Category:') !!}
                {!! Form::select('category_id',  $categories, null,['class'=>'form-control']) !!}
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

                <div class="row bg-white">
                    {!! form::open(['method'=>'DELETE','action'=> ['AdminPostsController@destroy',$post->id] ]) !!}
                    <div class="form-group pull-left">
                        {!! form::submit('delete post',['class'=>'btn btn-danger']) !!}
                    </div>
                    {!! form::close() !!}
                </div>
                <div class="col-lg-3 pull-right">
                    <div class="row">
                        <img src="{{$post->photo->file}}" alt="">
                    </div>
                </div>
        </div>
        </div>


    </section>
@stop


