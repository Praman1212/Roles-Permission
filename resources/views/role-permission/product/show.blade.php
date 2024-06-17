
<x-app-web-layout>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            View product
                            <a href="{{ route('product.index') }}" class="btn btn-dark float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="">Role Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $product->name }}" readonly>
                            </div>
                            

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-web-layout>