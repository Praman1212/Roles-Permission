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
                            User
                            <a href="{{ route('user.create') }}" class="btn btn-primary float-end">Add User</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label>Role Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-web-layout>