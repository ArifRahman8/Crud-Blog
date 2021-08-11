@extends('users.master')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="{{ route('blog.create') }}" class="d-none d-sm-inline-block btn btn-primary shadow-sm"><i
        class="text-white "></i> Input Data Baru</a>
    </div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

    <table class="table table-borderless table-striped table-hover caption-top">
        <thead class="table-primary">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
    @foreach($blogs as $blog)
        <tbody>
            <tr>
                <td>{{ ++$i }}</td>
                <td>
                    <img src="{{ url('/img/'.$blog->gambar) }}" class="rounded" style="width: 150px">
                </td>
                <td>{{$blog['judul']}}</td>
                <td>{{$blog['content']}}</td>
                <td>
                    <form action="{{ route('blog.destroy',$blog->id) }}" method="POST">
                        <a class="btn btn-warning" href="{{ route('blog.edit',$blog->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Remove</button>
                    </form>
                </td>
            </tr>
        </tbody>
    @endforeach
    </table>
@endsection
 