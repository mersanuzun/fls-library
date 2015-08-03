@extends("layouts.admin")


@section("title", "Admin Dashboard - User Management")


@section("content")
<div class="table-responsive">
    <form action="" method="post">
       {!! csrf_field() !!}
        <fieldset>
            <legend> Add User </legend>
            <div class="error">
                @if (session("message"))
                    {{session("message")}}
                @endif
            </div>
            <table class="table table-hover">
                <tr>
                    <td>
                        <label for="kullaniciAdi"> User Name </label>
                    </td>
                    <td>
                        <input type="text" name="kullaniciAdi" id="kullaniciAdi" required="" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="sifre"> Password </label>
                    </td>
                    <td>
                        <input type="password" name="sifre" id="sifre" required="" class="form-control">
                    </td>
                </tr>
                <tr> 
                    <td>
                        <label for="kullaniciSecim"> User Position </label>
                    </td>
                    <td>
                        <select id="kullaniciSecim" name="kullaniciSecim" required="" class="form-control">
                            <option selected="" value="3"> Librarian </option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="kullaniciEkleSubmit" id="kullaniciEkleSubmit" value="Add User" class="form-control btn btn-mmm">
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
</div><!-- .table-responsive -->
@endsection