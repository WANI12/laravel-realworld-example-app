@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
             @if(count($errors)>0)
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                    @endforeach
                @endif
                @if(session('response'))
                    <div class="alert alert-success">{{session('response')}}</div>
                @endif
                <div class="panel-heading">Articles</div>

                <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/addArticle') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="category" class="col-md-4 control-label">Article Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus>

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 
                         
                        <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                            <label for="slug" class="col-md-4 control-label">Slug</label>

                            <div class="col-md-6">
                                <input id="slug" type="text" class="form-control" name="slug" value="{{ old('slug') }}" required autofocus>

                                @if ($errors->has('slug'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('slug') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Article body</label>

                            <div class="col-md-6">
                                 <textarea name="description" id="" class="form-control" cols="30" rows="10"></textarea>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 
    
                        <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                            <label for="category_id" class="col-md-4 control-label">Category</label>

                            <div class="col-md-6">
                                <select name="category_id" class="form-control" id="">
                                <option value="0">Select category</option>
                                 @if(count($category)>0)
                                    @foreach($category->all() as $category)
                                        <option value="{{$category->id}}">{{$category->category}}</option>
                                    @endforeach
                                 @endif
                                </select>

                                @if ($errors->has('category_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 
                        <div class="form-group{{ $errors->has('article_image') ? ' has-error' : '' }}">
                            <label for="article_image" class="col-md-4 control-label">Article image</label>

                            <div class="col-md-6">
                                <input id="article_image" type="file" class="form-control" name="article_image" value="{{ old('article_image') }}" required autofocus>

                                @if ($errors->has('article_image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('slugarticle_image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    addArticle
                                </button>
 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
