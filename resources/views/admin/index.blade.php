@extends("layouts.admin")
@section("title", "Admin Dashboard")

@section("content")

<div class="row">
    <div class="col-lg-12">
        <div class="page-header">
            <h2>Information</h2>
        </div>
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <td>
                <div class="col-xs-3 text-left">
                    <i class="fa fa-book fa-5x"></i>
                </div>
                <div class="text-right">
                    <div class="huge">{{$bookNumber}}</div>
                    <div>Registered Book</div>
                </div>
                </td>
                </tr>
                <tr>
                    <td>
                <div class="col-xs-3 text-left">
                    <i class="fa fa-graduation-cap fa-5x"></i>
                </div>
                <div class="text-right">
                    <div class="huge">{{$studentNumber}}</div>
                    <div>Registered Student</div>
                </div>
                </td>
                </tr>
                </tbody>
            </table>
        </div><!-- /.table-responsive -->
    </div><!-- /.col-lg-12 -->
</div><!-- /.row -->


<div class="row">
    <div class="col-lg-12">
        <div class="panel-body">
            <div class="table-responsive">
                <div class="page-header">
                    <h2>User List <span class="label label-danger"> {{count($users)}} </span></h2>
                    <a href="user-management/add">
                        <button id="tableUstuBtn" class="btn btn-success right" type="button"><span class="glyphicon glyphicon-plus"></span> Add User </button>
                    </a>
                </div>
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
            </div><!-- /.table-responsive -->
        </div><!-- /.panel-body -->
    </div><!-- /.col-lg-12 -->
</div><!-- /.row -->

@endsection