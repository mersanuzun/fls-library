@extends("layouts.librarian")


@section("title", "Librarian - Add Department")


@section("content")
<div class="table-responsive">
    <form action="" method="post">
        {!! csrf_field() !!}
        <fieldset>
            <legend> Add Department </legend>
            <div class="error" style="text-align:center;">
                @if (session("message"))
                {{session("message")}}
                @endif
            </div>
            <table class="table table-hover" >
                <tr>
                    <td>
                        <label for="bolumKodu">Department Code:</label>
                    </td>
                    <td>
                        <input type="text" name="bolumKodu" class="form-control" placeholder="Department Code" autofocus="true"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="bolumAdi">Department Name:</label>
                    </td>
                    <td>
                        <input type="text" name="bolumAdi" class="form-control" placeholder="Department Name"/>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="bolumEkleSubmit" value="Add Department" class="form-control btn btn-mmm"/>
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
</div><!-- .table-responsive sonu -->
@endsection