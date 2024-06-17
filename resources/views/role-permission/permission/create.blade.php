
<x-app-web-layout>
    @include('role-permission.nav-links')

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Create Permission
                            <a href="{{ route('permission.index') }}" class="btn btn-dark float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                       


                        <form action="{{ route('permission.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="">Permission Name</label>
                                <input type="text" name="name"  class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-web-layout>