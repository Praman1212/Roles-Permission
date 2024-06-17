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
                            <a href="{{ route('product.create') }}" class="btn btn-primary float-end">Add Product</a>
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
                                @foreach($products as $id => $product)
                                <tr>
                                    <td>
                                        {{$id+1}}
                                    </td>
                                    <td>
                                        {{$product->name}}
                                    </td>
                                    <td>
                                        <a href="{{ route('product.edit',$product->id) }}" class="btn btn-success">Edit</a>
                                        <a href="{{ route('product.show',$product->id) }}" class="btn btn-info">Show</a>
                                        <a class="btn btn-danger h-10">
                                            <form action="{{ route('product.destroy',$product->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit">Delete</button>
                                            </form>
                                        </a>
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