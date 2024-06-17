
<x-app-web-layout>
@include('role-permission.nav-links')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Edit User
                            <a href="{{ route('user.index') }}" class="btn btn-dark float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.update',$user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="">User Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                                @error('name')
                                <span class="text-danger">
                                    {{$message}}
                                </span> 
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Email</label>
                                <input type="text" name="email" class="form-control" readonly value="{{ $user->email }}">
                                @error('email')
                                <span class="text-danger">
                                    {{$message}}
                                </span> 
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control" value="{{ $user->password }}">
                                @error('password')
                                <span class="text-danger">
                                    {{ $message }}
                                </span> 
                                @enderror
                            </div>
                            <div class="mb-3">
                            <label>Roles</label>
                                <select name="roles[]" class="form-control" multiple>
                                    <option value="">Select Role</option>
                                    @foreach($roles as $role)
                                    <option value="{{ $role }}" {{in_array($role, $userRole)}}>{{ $role }}</option>
                                    @endforeach
                                </select>
                                @error('roles')
                                <span class="text-danger">
                                    {{$message}}
                                </span> 
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-warning">Update</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-web-layout>