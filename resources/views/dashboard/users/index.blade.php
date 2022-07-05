@extends('templates/dashboard')
@section('content')
<div class="my-4 card border-0">
    <small class="text-muted text-center mt-2 mb-3">
        <span class="badge bg-primary text-white mb-3">All</span>
        <h3 class="text-dark">Users</h3>
    </small>
    <div class="table-responsive-md">
        <table id="example" class="table table-hover" cellspacing="0">
            <thead>
                <tr>
                    <th>#</th>
                    {{-- <th>Photo</th> --}}
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    {{-- <td><img src="/assets/img/{{ $user->image }}" alt="{{ $user->name }}" class="rounded-circle" width="100" height="100"></td> --}}
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <a href="/dashboard/users/{{ $user->id }}/edit" class="text-decoration-none text-warning mx-2"><i class="fas fa-pencil-alt"></i></a>
                        <a class="text-decoration-none text-danger" id="btn-delete" data-id="{{ $user->id }}" data-bs-toggle="modal" data-bs-target="#modal-delete"><i class="fas fa-times"></i></a>
                    </td>
                </tr>
                @endforeach

                <!-- Modal delete -->
                <div class="modal fade" id="modal-delete" tabindex="-1" aria-labelledby="deleteLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm p-4">
                        <div class="modal-content border-0 shadow-sm">
                            <h6 class="modal-title text-center mt-4" id="deleteLabel">Delete the user now?</h6>
                            <div class="modal-footer border-0 justify-content-center">
                                <button type="button" class="btn bg-light rounded-pill px-4" data-bs-dismiss="modal">Close</button>
                                <form action="" method="post" id="formDelete">
                                    @csrf
                                    @method('delete')
                                    {{-- <a href="" id="formDelete">data</a> --}}
                                    <button type="submit" class="btn bg-danger text-white rounded-pill px-4">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
                <script>
                    $('#btn-delete').click(function() {
                        var username = $(this).data('username');
                        $('#formDelete').attr('action', '/dashboard/users/'+username);
                        // $('#formDelete').attr('href', '/dashboard/users/'+username);
                    });
                </script>
            </tbody>
        </table>
    </div>
</div>
@endsection
