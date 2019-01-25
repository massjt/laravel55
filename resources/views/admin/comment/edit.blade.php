@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">文章管理</div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif

                        <form action="{{ url('admin/comments/'.$comment->id) }}" method="POST">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <input type="text" name="nickname" class="form-control" required="required" readonly  value="{{ $comment->nickname }}">
                            <br>
                            <input type="email" name="email" class="form-control" required="required" value="{{ $comment->email }}">
                            <br>
                            <input type="text" name="website" class="form-control" required="required" value="{{ $comment->website }}">
                            <br>
                            <textarea name="content" rows="10" class="form-control" required="required" placeholder="请输入内容">{{ $comment->content }}</textarea>
                            <br>
                            <button class="btn btn-lg btn-info">修改评论</button>
                        </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection