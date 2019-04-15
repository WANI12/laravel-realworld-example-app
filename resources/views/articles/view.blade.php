@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">View Article</div>
                <div class="panel-body">
                    <div class="col-md-4">
                        <ul class="list-group">
                        @if(count($category)> 0)
                            @foreach($category->all() as $categories)
                            <li class=" list-group-item">
                                <a href='{{url("category/{$categories->id}")}}'>
                                {{$categories->category}}
                                </a>
                            </li>

                            @endforeach
                        @else
                            <p>No categories</p>
                        @endif
                       
                        </ul>
                    </div>
                    <div class="col-md-8">
                    @if(count($article)>0)
                        @foreach($article->all() as $articles)
                            <h2>{{$articles->title}}</h2>
                            <center><img src="{{$articles->article_image}}" alt="no preview" class="img-thumbnail" width="400"></center>
                            <p>{{substr($articles->description,0,100)}}</p>
                             <ul class="nav nav-pills">
                                <li role="presentation">
                                    <a href='{{url("view/{$articles->id}")}}'>
                                        <span class="fas fa-eye">View</span>
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href='{{url("edit/{$articles->id}")}}'>
                                        <span class="fas fa-pencil">Edit</span>
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href='{{url("delete/{$articles->id}")}}'>
                                        <span class="fas fa-trash">Delete</span>
                                    </a>
                                </li>
                             </ul>
                            <cite style="">Posted on{{date('M j, Y H:i', strtotime($articles->created_at))}}</cite>
                        @endforeach
                    @else
                    <p>No Articles</p>
                   @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
