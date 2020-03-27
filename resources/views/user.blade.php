@extends("admin.layout")
@section("top_content")
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">List User</h2>
            <a class="au-btn au-btn-icon au-btn--blue" href="{{url('user/create')}}">
                <i class="zmdi zmdi-plus"></i>Add User</a>
        </div>
    </div>
@endsection
@section("main_content")
    <div class="table-responsive table-responsive-data2">
        <table class="table table-data2">
            <thead>
            <tr>
                <th>ID</th>
                <th>name</th>
                <th>age</th>
                <th>address</th>
                <th>telephone</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @forelse($user as $u)
                <tr class="tr-shadow">
                    <td>{{$u->id}}</td>
                    <td>{{$u->name}}</td>
                    <td>{{$u->age}}</td>
                    <td>{{$u->address}}</td>
                    <td>{{$u->telephone}}</td>
                    <td>

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