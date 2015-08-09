@extends("layouts.admin")


@section("title", "Admin Dashboard - User Management")


@section("content")
<div class="table-responsive">
    <h3> User List <span class="label label-danger"> {{count($users)}} </span></h3>
    <a href="user-management/add">
        <button id="tableUstuBtn" class="btn btn-success right" type="button"><span class="glyphicon glyphicon-plus"></span> Add User </button>
    </a>
    <table class="table table-striped table-bordered table-hover">
        <tr>
            <th> User Name </th>
            <th> User Account Type </th>
            <th> Edit | Delete </th>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{$user->KullaniciAdi}}</td>
            <td>{{$user->KullaniciTuruAdi}}</td>
            <td>
                <a href="user-management/edit/{{$user->KullaniciNo}}">
                    <button class="btn btn-info" type="submit"><span class="glyphicon glyphicon-edit"></span> Edit </button>
                </a>
                <a href="user-management/remove/{{$user->KullaniciNo}}">
                    <button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-remove"></span> Remove </button>
                </a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection