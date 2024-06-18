<x-app-web-layout>
    @include('role-permission.nav-links')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
                @endif
                @if(session('delete'))
                <div class="alert alert-danger">
                    {{session('delete')}}
                </div>
                @endif

                <div class="card mt-3">
                    <div class="card-header">
                        <h4>
                            Role
                            @can('create-role')
                            <a href="{{ route('role.create') }}" class="btn btn-primary float-end">Add Role</a>
                            @endcan
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($roles as $id => $role)
                                <tr>
                                    <td>
                                        {{$id+1}}
                                    </td>
                                    <td>
                                        {{$role->name}}
                                    </td>
                                    <td>

                                    @role('super-admin')
                                        <a href="{{ route('role.givePermission',$role->id) }}" class="btn btn-primary">Give Permission</a>
                                    @endrole
                                        @can('edit-role')

                                        <a href="{{ route('role.edit',$role->id) }}" class="btn btn-success">Edit</a>

                                        @endcan

                                        @can('delete-role')
                                        <a class="btn btn-danger h-10">
                                            <form action="{{ route('role.destroy',$role->id) }}" method="post">
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