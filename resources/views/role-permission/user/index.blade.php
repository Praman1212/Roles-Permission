<x-app-web-layout>
    @include('role-permission.nav-links')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

                @if(session('delete'))
                <div class="alert alert-danger">
                    {{session('delete')}}
                </div>
                @endif

                @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
                @endif

                <div class="card mt-3">
                    <div class="card-header">
                        <h4>
                            User
                            <a href="{{ route('user.create') }}" class="btn btn-primary float-end">Add User</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Roles</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $id => $user)

                                <tr>
                                    <td>
                                        {{$id+1}}
                                    </td>
                                    <td>
                                        {{$user->name}}
                                    </td>
                                    <td>
                                        @foreach($user->getRoleNames() as $roleName)
                                        <label for="" class="badge bg-primary mx-1">{{ $roleName }}</label>
                                        @endforeach
                                    </td>
                                    <td>
                                        {{$user->email}}
                                    </td>
                                    <td>
                                        <a href="{{ route('user.edit',$user->id) }}" class="btn btn-success">Edit</a>
                                        @can('delete-user')
                                        <a class="btn btn-danger h-10">
                                            <form action="{{ route('user.destroy',$user->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit">Delete</button>
                                            </form>
                                        </a>
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-web-layout>