@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
           <img src="https://avatars.githubusercontent.com/u/42852447?v=4" 
           alt="" class="rounded-circle" height="153.33px" width="153.33px">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{ $user->username }}</h1>
                <a href="#">Add New Post</a>
            </div>
            <div class="d-flex ">
                <div class="pr-5"><strong>178</strong> posts</div>
                <div class="pr-5"><strong>584</strong> followers</div>
                <div class="pr-5"><strong>4,904</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description }}</div>
            <div><a href="#">{{ $user->profile->url }}</a></div>
        </div>
    </div>
    <div class="row pt-5">
        <div class="col-4">
            <img src="https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/fa819678449427.5ca5082de66fe.jpg" 
            alt="" class="w-100">
        </div>
        <div class="col-4">
            <img src="https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/eaf53378414231.5ca444a9dc27e.jpg" 
            alt="" class="w-100">
        </div>
        <div class="col-4">
            <img src="https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/a8714278411291.5ca429221d74b.jpg" 
            alt="" class="w-100">
        </div>
    </div>
</div>
@endsection
