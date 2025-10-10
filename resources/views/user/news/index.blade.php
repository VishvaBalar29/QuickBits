@extends('layouts.user') 

@section('title', 'News | QuickBits')

@section('content')
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f8f9fa;
        }

        .news-container {
            max-width: 900px;
            margin: auto;
        }

        .news-item {
            display: flex;
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 15px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            align-items: flex-start;
            gap: 20px;
        }

        .news-item img {
            width: 250px;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
        }

        .news-content h2 a {
            text-decoration: none;
            color: #333;
        }

        .news-content h2 a:hover {
            color: #0275d8;
        }

        .category-filter {
            text-align: right;
            margin-bottom: 20px;
        }

        select {
            padding: 6px 10px;
            font-size: 15px;
        }
    </style>

    <div class="news-container">
        {{-- Category Filter --}}
        <div class="category-filter">
            <form method="GET" action="{{ route('user.news.index') }}">
                <select name="category" onchange="this.form.submit()">
                    <option value="">All Categories</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->name }}" {{ $categoryName == $cat->name ? 'selected' : '' }}>
                            {{ ucfirst($cat->name) }}
                        </option>
                    @endforeach
                </select>
            </form>
        </div>

        {{-- News List --}}
        @if($news->count())
            @foreach($news as $item)
                <div class="news-item">
                    @if($item->image)
                        <img src="{{ asset('uploads/news/' . $item->image) }}" alt="News Image">
                    @endif
                    <div class="news-content">
                        <h2>
                            <a href="{{ route('user.news.show', $item->id) }}">{{ $item->title }}</a>
                        </h2>
                        <p>{{ $item->short_desc }}</p>
                        <div class="news-meta text-muted" style="font-size:13px;">
                            Category: {{ $item->category->name ?? 'Uncategorized' }} |
                            Published: {{ $item->created_at->format('d M, Y') }}
                        </div>
                        <div style="margin-top: 5px;">
                            <a href="{{ route('user.news.show', $item->id) }}" style="font-size:14px; color:#0275d8; text-decoration:none;">
                                Comment
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach

            {{-- Pagination --}}
            <div class="mt-4">
                {{ $news->links() }}
            </div>
        @else
            <p>No news found{{ $categoryName ? " in category '$categoryName'" : '' }}.</p>
        @endif
    </div>
@endsection
