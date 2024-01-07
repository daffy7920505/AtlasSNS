<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Post;
use App\User;
use App\Follow;

class FollowsController extends Controller
{
    // 一覧表示
    public function followlist()
    {
        $posts = \DB::table('posts')->get();
        $users = User::get();
        return view('follows.followList',['posts'=>$posts,'users'=>$users]);
    }//follows→フォルダ名.followList→blade名

    public function followerlist()
    {
        $list = \DB::table('posts')->get();//postsテーブルの情報を全部
        $users = User::get();//userテーブルの情報全部持ってくる
        return view('follows.followerList',['list'=>$list,'users'=>$users]);
    }
    // // 新規ツイート入力画面
    // public function create()
    // {
    //     //
    // }

    // // 新規ツイート投稿処理
    // public function store(Request $request)
    // {
    //     //
    // }

    // ツイート詳細画面
    public function show(id $id, Follower $follower)
    {
    $login_user = auth()->user();
        $is_following = $login_user->isFollowing($user->id);
        $is_followed = $login_user->isFollowed($user->id);
        $timelines = $tweet->getUserTimeLine($user->id);
        $tweet_count = $tweet->getTweetCount($user->id);
        $follow_count = $follower->getFollowCount($user->id);
        $follower_count = $follower->getFollowerCount($user->id);

        // フォローしているユーザーのidを取得
        $following_id = Auth::user()->follows()->pluck(' users.id ');
        // フォローしているユーザーのidを元に投稿内容を取得
        $posts = Post::with('user')->whereIn(' user_id ', $following_id)->get();
        return view('yyyy', compact('posts'));

        return view('users.show', [
            'user'           => $user,
            'is_following'   => $is_following,
            'is_followed'    => $is_followed,
            'timelines'      => $timelines,
            'tweet_count'    => $tweet_count,
            'follow_count'   => $follow_count,
            'follower_count' => $follower_count
        ]);

    }


    // // ツイート編集画面
    // public function edit($id)
    // {
    //     //
    // }

    // // ツイート編集処理
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // // ツイート削除処理
    // public function destroy($id)
    // {
    //     //
    // }

        // フォロー
    public function follow(User $user)
    {
        $follower = auth()->user();
        // フォローしているか(isFollwingigが紐づいている)
        // $is_following = $follower->isFollowing($user->id);
        // if(!$is_following) {
        //     // フォローしていなければフォローする（follow）
        //     $follower->follow($user->id);
        //     return back();
        // }

        //tableに追加しフォロー数を追加
        $followingID = Auth::user()->id;
        $followedID = $user->id;
        \DB::table('follows')->insert([
        'following_id' => $followingID,//'自分のIDがはいる（ログインユーザー）
        'followed_id'=>$followedID//フォローされた人のIDが入る
        ]);
        return back();// リターンでの動きで戻る

    }

    // フォロー解除
    public function unfollow(User $user)
    {
        $followingID = Auth::user()->id;
        $followedID = $user->id;
        \DB::table('follows')
            ->where('following_id', $followingID)//'自分のIDがはいる（ログインユーザー）
            ->where('followed_id', $followedID)//フォローされた人のIDが入る
            ->delete();
            return back();// リターンでの動きで戻る
    }

    // フォローリスト画像
    public function image(Request $request, User $user) {

        $originalImg = $request->user_image;

        if($originalImg->isValid()) {
        $filePath = $originalImg->store('public');
        $user->image = str_replace('public/', '', $filePath);
        $user->save();
        return redirect("/user/{$user->id}")->with('user', $user);
        }
    }

}
