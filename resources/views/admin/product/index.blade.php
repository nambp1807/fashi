@extends("admin.layout")
@section("top_content")
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">Product Manage</h2>
            <form method="get" action="{{url('admin/product/create')}}">
                <button class="au-btn au-btn-icon au-btn--blue">
                    <i class="zmdi zmdi-plus"></i>Create Product
                </button>
            </form>
        </div>
    </div>
@endsection
@section("main_content")
    <div class="table-responsive table-responsive-data2">
        <table class="table table-data2">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Brand</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($product as $p)
                <tr class="tr-shadow">
                    <td data-target="id" class="align-items-center align-middle">{{ $p->id }}</td>
                    <td data-target="product_name">{{ $p->product_name }}</td>
                    <td data-target="brand_name">{{ $p->Brand->brand_name }}</td>
                    <td data-target="category_name">{{ $p->Category->category_name }}</td>
                    <td data-target="quantity" class="number">{{ $p->quantity }}</td>
                    <td data-target="price" class="number">{{ number_format($p->price, 2) }}</td>
                    <td>{{ $p->created_at }}</td>
                    <td>{{ $p->updated_at }}</td>
                    <td>
                        <div class="table-data-feature">
                            <form action="{{url("admin/product/edit",['id'=>$p->id])}}">
                                <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="zmdi zmdi-edit"></i>
                                </button>
                            </form>
                            <form action="{{url("admin/product/delete",['id'=>$p->id])}}">
                                <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                    <i class="zmdi zmdi-delete"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <p>Không có sản phẩm</p>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
