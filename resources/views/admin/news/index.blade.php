@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h2>All News</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('admin.news.create') }}" class="btn btn-primary mb-3">Add News</a>

        <table class="table table-bordered">
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
                                <img src="{{ asset('uploads/news/' . $item->image) }}" width="80" alt="news image">
                            @endif
                        </td>
                        <td>{{ $item->is_published ? 'Yes' : 'No' }}</td>
                        <td>{{ $item->created_at->format('d M Y, H:i') }}</td>
                        <td>
                            <!-- View Button (same tab) -->
                            <a href="{{ route('user.news.show', $item->id) }}" class="btn btn-sm btn-info">View</a>

                            <!-- Edit Button -->
                            <a href="{{ route('admin.news.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>

                            <!-- Delete Button -->
                            <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">
                                    Delete
                                </button>
                            </form>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center mt-3">
            {{ $news->links() }}
        </div>

    </div>
@endsection