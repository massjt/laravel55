<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
class ArticleController extends Controller
{
    public function index()
    {
        return view('admin/article/index')->withArticles(Article::all());
    }
    // add
    public function create()
    {
        return view('admin/article/create');
    }
    // 
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:articles|max:255',
            'body' => 'required',
        ]);

        $article = new Article;
        $article->title = $request->get('title');
        $article->body = $request->get('body');
        $article->user_id = $request->user()->id;

        if ($article->save()) {
            return redirect('admin/articles');
        } else {
            return redirect()->back()->withInput()->withErrors('保存失败！');
        }
    }
    // delete
    public function destroy($id)
    {
        Article::find($id)->delete();
        return redirect()->back()->withInput()->withErrors('删除成功！');
    }
    // edit
    public function edit($id)
    {
        $article = Article::find($id);
        if (empty($article)) {
            return redirect()->back()->withInput()->withErrors('修改失败');
        }
        return view('admin/article/edit', ['article' => $article]);
    }
    // update
    public function update(Request $request, $id)
    {
        // 判断
        if ($request->has(['title', 'body'])) {
            Article::where('id', $id)->update([
                'title' => $request->title,
                'body'  => $request->body
            ]);
            return redirect('admin/articles')->with('status', '更新成功');
        } 
        return redirect()->back()->withInput()->withErrors('更新失败');
        
        
    }
}
