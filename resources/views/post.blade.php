@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card mb-4">
            <div class="card-body">
              @if ($post->image)
                <img src="{{$post->get_image}}" alt="{{$post->title}}" class="card-img-top" />
              @elseif ($post->iframe)
                <div class="embed-responsive embed-responsive-16by9">
                  {!! $post->iframe !!}
                </div>
              @endif
              <h5 class="card-title">
                {{$post->title}}
              </h5>
              <p class="card-text">
                {{$post->body}}
              </p>
              <div class="text-muted mb-0">
                <em>
                  &ndash; {{$post->user->name}}
                </em>
                {{ $post->created_at->format("d M Y") }}
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection