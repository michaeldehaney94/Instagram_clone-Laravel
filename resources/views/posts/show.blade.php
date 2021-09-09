@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{ $post->image }}" class="w-100">
        </div>
        <div class="col-4">
            <div>
                <div class="d-flex align-items-center">
                    <div class="pr-3">
                        <img src="{{ $post->user->profile->image ?? asset('img/wzmDkERnlLMMTnatpjp4Rx38v2rinn6AqgAencAs.png') }}" class="rounded-circle w-100" style="max-width: 40px;">
                    </div>
                    <div>
                        <div class="font-weight-bold">
                            <span >
                                <a href="/profile/{{ $post->user->id }}" class="text-dark">
                                    {{ $post->user->username }}
                                </a>
                            </span>
                            <a href="" class="pl-3">Follow</a>
                        </div>
                    </div>
                </div>

                <hr>

                <p>
                    <span class="font-weight-bold">
                        <span>
                            <a href="/profile/{{ $post->user->id }}" class="text-dark">
                                {{ $post->user->username }}
                            </a>
                        </span>
                    </span>{{ $post->caption }}
                </p>
            </div>
        </div>
    </div>
    
</div>
    
@endsection

