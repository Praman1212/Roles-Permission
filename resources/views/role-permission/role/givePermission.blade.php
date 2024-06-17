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
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Role : {{$role->name}}
                            <a href="{{ route('role.index') }}" class="btn btn-dark float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Model</th>
                                    <th>Permission</th>

                                </tr>
                            </thead>
                            <tbody>
                                <form action="{{ route('role.givePermission',$role->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    @error('permission')
                                    <span class="text-danger">
                                        {{$message}}
                                    </span>
                                    @enderror
                                    @foreach ($models as $id => $model)
                                    <tr>

                                        <td>
                                            {{ $id +1 }}
                                        </td>

                                        <td>
                                            <input type="text" name="model" value="{{ $model }}" class="form-control input-no-border" readonly>
                                        </td>

                                        <td>
                                            @foreach($permissions as $permission)
                                            <label>
                                                <input type="checkbox" name="permission[]" value="{{ $permission->name }} " {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }} />
                                                {{$permission->name }}
                                            </label>
                                            @endforeach
                                        </td>

                                    </tr>
                                    @endforeach
                                    <button type="submit" class="btn btn-warning">Update</button>
                                </form>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</x-app-web-layout>