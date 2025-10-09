<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $news->title }}</title>
    <link rel="stylesheet" href="{{ asset('css/news.css') }}">
</head>

<body>
    <div class="news-container">
        <div class="news-main">
            @if($news->image)
                <img src="{{ asset('uploads/news/' . $news->image) }}" alt="News Image" class="news-image">
            @endif
            <div class="news-content">
                <h1>{{ $news->title }}</h1>
                <div class="news-meta">
                    Category: {{ $news->category->name ?? 'Uncategorized' }} |
                    Published: {{ $news->created_at->format('d M, Y') }}
                </div>
                <p>{{ $news->short_desc }}</p>
            </div>
        </div>

        {{-- Comments --}}
        <div class="comments-section">
            <h3>Comments</h3>
            <div class="comments-list">
                @if($news->comments->count())
                    @foreach($news->comments as $comment)
                        <div class="comment-item">
                            <img src="{{ asset($comment->user->profile_photo ?? 'uploads/users/default.png') }}"
                                alt="User Image" class="comment-user-image">
                            <div class="comment-content">
                                <strong>{{ $comment->user->username ?? 'Guest' }}</strong>
                                <p>{{ $comment->comment }}</p>
                            </div>

                            {{-- Delete button for logged-in user --}}
                            @if(auth()->check() && auth()->id() == $comment->user_id)
                                <form method="POST" action="{{ route('user.comment.destroy', $comment->id) }}"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-comment" title="Delete">
                                        &#x2716; {{-- small cross icon --}}
                                    </button>
                                </form>
                            @endif
                        </div>
                    @endforeach

                @else
                    <p>No comments yet.</p>
                @endif
            </div>

            {{-- Add Comment --}}
            @auth
                <form method="POST" action="{{ route('user.news.comment', $news->id) }}" class="add-comment-form">
                    @csrf
                    <input type="text" name="comment" placeholder="Add a comment..." required>
                    <button type="submit">Post</button>
                </form>
            @else
                <p>Please <a href="{{ route('login') }}">login</a> to comment.</p>
            @endauth

        </div>
    </div>
</body>

</html>