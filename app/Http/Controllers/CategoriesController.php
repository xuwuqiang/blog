<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Link;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show(Category $category, Request $request, Topic $topic, User $user, Link $link)
    {
        if($category->status != 1){
            abort(404);
        }
        // 读取分类 ID 关联的话题，并按每 20 条分页
        $topics = $topic->withOrder($request->order)
            ->where('category_id', $category->id)
            //todo 3时不显示
            ->whereHas('category',function($query){
                $query->where('status',1);
            })
            ->paginate(20);
//        dd($topics);
        // 活跃用户列表
        $active_users = $user->getActiveUsers();

        // 资源链接
        $links = $link->getAllCached();
        
        // 传参变量话题和分类到模板中
        return view('topics.index', compact('topics', 'category', 'active_users', 'links'));
    }
}
