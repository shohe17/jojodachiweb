@extends('layout', ['page' => 'index'])
@section('content')
<!-- 確認includeの第二引数で表示するページ名を指定していたおと思っていた -->
@include('postList', ['page' => 'index'])
@endsection