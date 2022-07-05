@extends('templates/dashboard')
@section('content')
<div class="my-4 card border-0">
    <small class="text-muted text-center mt-2 mb-3">
        <span class="badge bg-primary text-white mb-3">All</span>
        <h3 class="text-dark">Post by {{ auth()->user()->name }}</h3>
    </small>
    <div class="table-responsive-md">
        <table id="example" class="table table-hover" cellspacing="0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($posts->count())
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->category->name }}</td>
                        <td>{{ date('d/F/Y', strtotime($post->created_at)) }}</td>
                        <td>
                            <a href="/dashboard/posts/{{ $post->slug }}" class="text-decoration-none text-info"><i class="fas fa-eye"></i></a>
                            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="text-decoration-none text-warning mx-2"><i class="fas fa-pencil-alt"></i></a>
                            <a class="text-decoration-none text-danger" id="btn-delete" data-slug="{{ $post->slug }}" data-bs-toggle="modal" data-bs-target="#modal-delete"><i class="fas fa-times"></i></a>
                        </td>
                    </tr>
                @endforeach
                @else
                    <tr>
                        <td colspan="6" class="pt-3"><p class="text-center">No post found.</p></td>
                    </tr>
                @endif

                <!-- Modal delete -->
                <div class="modal fade" id="modal-delete" tabindex="-1" aria-labelledby="deleteLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm p-4">
                        <div class="modal-content border-0 shadow-sm">
                            <h6 class="modal-title text-center mt-4" id="deleteLabel">Delete the post now?</h6>
                            <div class="modal-footer border-0 justify-content-center">
                                <button type="button" class="btn bg-light rounded-pill px-4" data-bs-dismiss="modal">Close</button>
                                <form action="" method="POST" id="formDelete">
                                    @csrf
                                    @method('delete')
                                    {{-- <a href="" id="hrefDelete">data</a> --}}
                                    <button type="submit" class="btn bg-danger text-white rounded-pill px-4">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
                <script>
                    $('#btn-delete').click(function() {
                        var slug = $(this).data('slug');
                        $('#formDelete').attr('action', '/dashboard/posts/'+slug);
                        // $('#hrefDelete').attr('href', '/dashboard/posts/'+slug);
                    });
                </script>
            </tbody>
        </table>
    </div>
</div>
@endsection
