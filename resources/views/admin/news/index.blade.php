@extends('layouts.admin')
@section('title', 'All News')

@section('content')

    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/admin-news.css') }}">
    @endpush

    <div class="news-container">
        <h2>All News</h2>

        @if(session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('admin.news.create') }}" class="btn-add">+ Add News</a>

        <div class="news-table">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Short Description</th>
                        <th>Image</th>
                        <th>Published</th>
                        <th>Published Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($news as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->category->name ?? 'N/A' }}</td>
                            <td>{{ $item->short_desc }}</td>
                            <td>
                                @if($item->image)
                                    <img src="{{ asset('uploads/news/' . $item->image) }}" alt="news image">
                                @endif
                            </td>
                            <td>{{ $item->is_published ? 'Yes' : 'No' }}</td>
                            <td>{{ $item->created_at->format('d M Y, H:i') }}</td>
                            <td class="actions">
                                <a href="{{ route('user.news.show', $item->id) }}" title="View">
                                    <i class="bi bi-search text-primary"></i>
                                </a>
                                <a href="{{ route('admin.news.edit', $item->id) }}" title="Edit">
                                    <i class="bi bi-pencil-square text-warning"></i>
                                </a>
                                <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-icon" title="Delete">
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="pagination">
                {{ $news->links() }}
            </div>
        </div>
    </div>

@endsection