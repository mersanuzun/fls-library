@extends("layouts.admin")
@section("title", "Admin Dashboard")

@section("content")
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-book fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{$bookNumber}}</div>
                        <div>Registered Book</div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <div class="clearfix"></div>
            </div>
        </div> 
    </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-graduation-cap fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{$studentNumber}}</div>
                        <div>Registered Student</div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-user fa-fw"></i> Users
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
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
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
@endsection