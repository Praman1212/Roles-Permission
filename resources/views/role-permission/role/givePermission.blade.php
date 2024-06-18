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
                                    <tr>


                                        <td>
                                            @foreach ($models as $id => $model)
                                            <div class="m-3">

                                                <input type="text" name="model" value="{{ $model }}" class="form-control input-no-border" readonly>

                                            </div>
                                            @endforeach
                                        </td>

                                        <td>
                                            @foreach($permissions->where('type' , 'user') as $permission)
                                            <label class="m-3">
                                                <input type="checkbox" name="permission[]" value="{{ $permission->name }} " {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }} />
                                                {{$permission->name }}
                                            </label>
                                            @endforeach
                                            <br>

                                            @foreach($permissions->where('type' , 'role') as $permission)
                                            <label class="m-3">
                                                <input type="checkbox" name="permission[]" value="{{ $permission->name }} " {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }} />
                                                {{$permission->name }}
                                            </label>
                                            @endforeach

                                            <br>
                                            @foreach($permissions->where('type' , 'product') as $permission)
                                            <label class="m-3">
                                                <input type="checkbox" name="permission[]" value="{{ $permission->name }} " {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }} />
                                                {{$permission->name }}
                                            </label>
                                            @endforeach
                                        </td>

                                    </tr>
                                    <button type="submit" class="btn btn-warning mb-3">Update</button>
                                </form>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</x-app-web-layout>