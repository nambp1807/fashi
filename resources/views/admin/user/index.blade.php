@extends("admin.layout")
@section("top_content")
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">User Manage</h2>
            <form method="get" action="{{url('admin/user/create')}}">
                <button class="au-btn au-btn-icon au-btn--blue">
                    <i class="zmdi zmdi-plus"></i>Create User
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
                <th>ID</th>
                <th>email</th>
                <th>name</th>
                <th>email_verified_at</th>
                <th>role</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @forelse($user as $u)
                <tr class="tr-shadow">
                    <td>{{$u->id}}</td>
                    <td>{{$u->email}}</td>
                    <td>{{$u->name}}</td>
                    <td>{{$u->email_verified_at}}</td>
                    <td>{{$u->role}}</td>
                    <td>
                        <div class="table-data-feature">
                            <form action="{{url("admin/user/edit",['id'=>$u->id])}}">
                                <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="zmdi zmdi-edit"></i>
                                </button>
                            </form>
                            <form action="{{url("admin/user/delete",['id'=>$u->id])}}">
                                <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                    <i class="zmdi zmdi-delete"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                <tr class="spacer"></tr>
            @empty
                <p>Không có người dùng nào</p>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection