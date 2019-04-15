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
                <div class="panel-heading">categories</div>
                <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/addCategory') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label for="category" class="col-md-4 control-label">CategoryName</label>

                            <div class="col-md-6">
                                <input id="category" type="text" class="form-control" name="category" value="{{ old('category') }}" required autofocus>

                                @if ($errors->has('category'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 
                        <div class="form-group{{ $errors->has('parent') ? ' has-error' : '' }}">
                            <label for="parent" class="col-md-4 control-label">Parent Category</label>

                            <div class="col-md-6">
                                 <select name="" id="" class="form-control">
                                 <option value="1">Select parent category</option>
                                 @if(count($category)>0)
                                    @foreach($category->all() as $category)
                                        <option value="{{$category->id}}">{{$category->category}}</option>
                                    @endforeach
                                 @endif
                                </select>
                                 </select>

                                @if ($errors->has('parent_category'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('parent_category') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    addCategory
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
