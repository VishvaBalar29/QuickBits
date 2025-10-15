@extends('layouts.user')

@section('title', 'News | QuickBits')
<link rel="stylesheet" href="{{ asset('css/user/news.css') }}">

@section('content')

    <div class="news-container"> 
        {{-- Category Filter --}} 
        <div class="category-filter">
            <form method="GET" action="{{ route('user.news.index') }}"> <select name="category"
                    onchange="this.form.submit()">
                    <option value="">All Categories</option> @foreach($categories as $cat) <option value="{{ $cat->name }}"
                    {{ $categoryName == $cat->name ? 'selected' : '' }}> {{ ucfirst($cat->name) }} </option> @endforeach
                </select> </form>

        </div> 
        
        {{-- News List --}} @if($news->count()) @foreach($news as $item) <div class="news-item"> @if($item->image)
                <img src="{{ asset('uploads/news/' . $item->image) }}" alt="News Image"> @endif <div class="news-content">
                        <h2> <a href="{{ route('user.news.show', $item->id) }}">{{ $item->title }}</a> </h2>
                        <p>{{ $item->short_desc }}</p>
                        <div class="news-meta"> Category: {{ $item->category->name ?? 'Uncategorized' }} | Published:
                            {{ $item->created_at->format('d M, Y') }}
                        </div>
                        <div class="news-actions"> <a href="{{ route('user.news.show', $item->id) }}">Comment</a> </div>
                    </div>

                </div>
            @endforeach

            {{-- Pagination --}}
            <div class="pagination-wrapper"> {{ $news->links() }}
        </div> @else
            <p>No
                news found{{ $categoryName ? " in category '$categoryName'" : '' }}.</p>
        @endif
</div> @endsection