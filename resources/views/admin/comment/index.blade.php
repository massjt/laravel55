@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">评论管理</div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <table class="table table-bordered">
                        <tr>
                            <td>content</td>
                            <td>user</td>
                            <td>page</td>
                            <td>操作</td>
                        </tr>
                        @foreach ($comments as $comment)
                           <tr>
                               <td>{{ $comment['content'] }}</td>
                               <td>{{ $comment['nickname'] }}</td>
                               <td>
                                   <a href="{{ url('/article/'.$comment['a_id']) }}" target="_blank">
                                        {{ $comment['title'] }}
                                    </a>
                                </td>
                               <td>
                                    <a href="{{ url('admin/comments/'.$comment['id'].'/edit') }}" class="btn btn-success">编辑</a>
                                    <form action="{{ url('admin/comments/'.$comment['id']) }}" method="POST">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button class="btn btn-danger">删除</button>
                                    </form>
                               </td>
                           </tr> 
                        @endforeach
                    </table>

                    {{--  @foreach ($comments as $comment)
                        <hr>
                        <div class="comment">
                            <h4>{{ $comment['title'] }}</h4>
                            <div class="content">
                                <p>
                                    {{ $comment['nickname'] }}
                                </p>
                            </div>
                        </div>
                        <a href="{{ url('admin/comments/'.$comment->id.'/edit') }}" class="btn btn-success">编辑</a>
                        <form action="{{ url('admin/comments/'.$comment->id) }}" method="POST" style="display: inline;">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger">删除</button>
                        </form>
                    @endforeach  --}}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection