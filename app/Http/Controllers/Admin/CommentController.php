<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;

class CommentController extends Controller
{
    public function index()
    {
        $all = Comment::all();
        $comments = [];
        foreach($all as $comm) {
            $comments[] = [
                'id'       => $comm->id,
                'content'  => $comm->content,
                'nickname' => $comm->nickname,
                'email'    => $comm->email,
                'title'    => $comm->article->title,
                'a_id'    => $comm->article->id,
            ];
        }
        return view('/admin/comment/index')->withComments($comments);
    }

    public function edit($id)
    {
        return view('admin/comment/edit')->withComment(Comment::find($id));
    }

    public function destroy($id)
    {
        Comment::find($id)->delete();
        return redirect()->back()->withInput()->withErrors('删除成功！');
    }

    public function update(Request $request,$id)
    {
        if ($request->has(['nickname', 'email', 'website', 'content'])) {
            Comment::where('id', $id)->update([
                'nickname' => $request->nickname,
                'email'  => $request->email,
                'website'  => $request->website,
                'content'  => $request->content,
            ]);
            return redirect('admin/comments')->with('status', '更新成功');
        } 
        return redirect()->back()->withInput()->withErrors('更新失败');
    }
}
