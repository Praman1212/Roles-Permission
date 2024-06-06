<x-app-web-layout>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Role : {{$role->name}}
                            <a href="{{ route('role.index') }}" class="btn btn-dark float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('role.updatePermission',$role->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="">Permission</label>
                                <div class="row">
                                    @foreach($permissions as $permission)
                                    <div class="col-md-2">
                                        <label>
                                            <input type="checkbox" name="permission[]" value="{{ $permission->id }}" />
                                            {{ $permission->name }}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
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