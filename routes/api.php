<?php

use App\Models\articles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('articles', function () {
    $Articles = articles::with('user')->get();
    $result = [];

    foreach($Articles as $article ){
        $result[] = [
            'id' => $article['id'],
            'auther' => $article->user->name,
            'title' => $article['title'],
            'date' => $article->created_at->format('Y-m-d'),
            'time' => $article->created_at->format('h:i A'),
            'content' => $article['content']
        ];
    }
    return $result;
});
