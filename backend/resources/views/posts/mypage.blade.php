@extends('layout')
@section('content')
<!-- 左に画像表示、右に投稿、フォロー、フォロワー数 
ユーザー名
説明文 -->
@include('posts.postList', ['page' => 'mypage'])
@endsection