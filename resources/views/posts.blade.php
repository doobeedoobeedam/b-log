@extends('templates/main')
@section('content')

<div class="row justify-content-center mb-5">
    <div class="text-center main-title mb-1">
        <h2 class="text-primary fw-bold">{{ $title }}</h2>
        <p>Look for some amazing post that might you need.</p>
    </div>
    <div class="col-sm-10 col-md-6">
        @include('templates/search')
    </div>
</div>

<div class="row cards d-flex flex-wrap">
    @if ($posts->count())
    {{-- <div class="col-lg-6 col-12 mb-3 align-self-stretch">
        <div class="card border-0 shadow-sm">
            <div class="card-image">
                @if ($posts[0]->image)
                    <img src="{{ asset('storage/' . $posts[0]->image) }}" class="card-img-top img-fluid" alt="{{ $posts[0]->title }}">
                @else
                    <img src="https://source.unsplash.com/1200x600?{{ $posts[0]->category->name }}" class="card-img-top img-fluid" alt="{{ $posts[0]->title }}">
                @endif
            </div>
            <div class="card-body">
                <a href="/posts?category={{ $posts[0]->category->slug }}" class="text-decoration-none badge bg-primary mb-2 text-white">
                    {{ $posts[0]->category->name }}
                </a>
                <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">
                    <h5 class="card-title text-truncate">{{ $posts[0]->title }}</h5>
                </a>
                <p class="card-text">{{ $posts[0]->excerpt }}</p>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-12 mb-3 align-self-stretch">
        <div class="card border-0 shadow-sm">
            <div class="card-image">
                @if ($posts[1]->image)
                    <img src="{{ asset('storage/' . $posts[1]->image) }}" class="card-img-top img-fluid" alt="{{ $posts[1]->title }}">
                @else
                    <img src="https://source.unsplash.com/1200x600?{{ $posts[1]->category->name }}" class="card-img-top img-fluid" alt="{{ $posts[1]->title }}">
                @endif
            </div>
            <div class="card-body">
                <a href="/posts?category={{ $posts[1]->category->slug }}" class="text-decoration-none badge bg-primary mb-2 text-white">
                    {{ $posts[1]->category->name }}
                </a>
                <a href="/posts/{{ $posts[1]->slug }}" class="text-decoration-none text-dark">
                    <h5 class="card-title text-truncate">{{ $posts[1]->title }}</h5>
                </a>
                <p class="card-text">{{ $posts[1]->excerpt }}</p>
            </div>
        </div>
    </div> --}}
    {{-- @foreach ($posts->skip(2) as $post) --}}
    @foreach ($posts as $post)
    <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
        <div class="card border-0 shadow-sm">
            <div class="card-image">
                @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top img-fluid" alt="{{ $post->title }}">
                @else
                <img src="https://source.unsplash.com/1200x600?{{ $post->category->name }}" class="card-img-top img-fluid" alt="{{ $post->title }}">
                @endif
            </div>
            <div class="card-body">
                <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none badge bg-primary mb-2 text-white"><small>{{ $post->category->name }}</small></a>
                <a href="/posts/{{ $post->slug }}" class="text-decoration-none text-dark">
                    <h5 class="card-title text-truncate">{{ $post->title }}</h5>
                </a>
                <p class="card-text">{{ $post->excerpt }}</p>
                {{-- <hr>
                <div class="d-flex">
                    <div class="item me-3 align-self-center" style="width: 35px; height: 35px;">
                        <img src="{{ asset('storage/' . $post->author->image) }}" alt="{{ $post->author->name }}" class="rounded-circle">
                    </div>
                    <div class="item">
                        <span class="d-block" style="font-size: 15px">
                            <small>{{ $post->author->name }}</small>
                        </span>
                        <span class="d-block text-secondary" style="font-size: 13px">
                            <small>{{  date('d F Y', strtotime($post->created_at))  }}</small>
                        </span>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    @endforeach

    @else
    <p class="text-center fs-4">No post found.</p>
    @endif

    {{ $posts->links() }}
</div>
@endsection
