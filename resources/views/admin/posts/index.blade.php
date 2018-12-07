@extends('layouts.admin');


@section ('content')

    <section class="dashboard-counts no-padding-bottom">
        <div class="container-fluid">
            <div class="row bg-white has-shadow title">
                <h2>Posts</h2>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Photo</th>
                        <th>Owner</th>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Body</th>
                        <th>Created</th>
                        <th>Updated</th>

                    </tr>
                    </thead>
                    <tbody>

                    @if($posts)

                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td><img height="40"src="{{$post->photo ? $post->photo->file : '../../uploads/files/default.jpg'}}" alt="" ></td>
                                <td><a href="{{route('posts.edit',$post->id)}}">{{$post->user->name}}</a></td>
                                <td>{{$post->category ? $post->category->name : 'uncategorized'}}</td>
                                <td>{{$post->title}}</td>
                                <td>{{str_limit($post->body, 25)}}</td>
                                <td>{{$post->created_at->diffForHumans()}}</td>
                                <td>{{$post->updated_at->diffForHumans()}}</td>
                            </tr>


                        @endforeach
                    @endif
                    </tbody>
                </table>

            </div>
        </div>
    </section>
@stop


