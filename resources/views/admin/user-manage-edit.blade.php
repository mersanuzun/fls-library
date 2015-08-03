@extends("layouts.admin")


@section("title", "Admin Dashboard - User Management")


@section("content")
<div class="panel panel-primary">
    <!-- Default panel contents -->
    <div class="panel-heading"> Edit User </div>

    <form action="/management/admin/user-management/edit/{{$user->KullaniciNo}}" method="post">
       <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <fieldset>
            <legend>User's</legend>
            <div class="error-user-management">
                @if(session("message"))
                    {{session("message")}}
                @endif
            </div>
            <table class="table table-hover">
                <tr>
                    <td>
                        <label for="kullaniciAdi"> Name: </label>
                    </td>
                    <td>
                        <input type="text" name="kullaniciAdi" id="kullaniciAdi" value="{{$user->KullaniciAdi}}" required="" class="form-control" autofocus="true">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="yeniSifre"> New Password: </label>
                    </td>
                    <td>
                        <input type="password" name="yeniSifre" id="yeniSifre" required="" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="yeniSifreTekrar"> Again New Password: </label>
                    </td>
                    <td>
                        <input type="password" name="yeniSifreTekrar" id="yeniSifreTekrar" required="" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="sifreDegistirSubmit" id="sifreDegistirSubmit" value="Change Password" class="form-control btn btn-mmm">
                    </td>     
                </tr>
            </table>
        </fieldset>
    </form>
</div><!-- .panel -->
@endsection