@extends("layouts.librarian")


@section("title", "Librarian - Department List")


@section("content")
@if (false)
<span>There is no registered department.</span>
@else
<div class="table-responsive">
    <form action="" method="post">
        {!! csrf_field() !!}
        <fieldset>
            <legend>Edit Department </legend>
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
                        <input type="text" name="bolumKodu" value="{{$department[0]->BolumKodu}}" readonly class="form-control"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="bolumAdi">Department Name:</label>
                    </td>
                    <td>
                        <input type="text" name="bolumAdi" value="{{$department[0]->BolumAdi}}" class="form-control" autofocus="true"/>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="bolumDuzenleSubmit" value="Edit Department" class="form-control btn btn-mmm"/>
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
</div><!-- .table-responsive sonu -->
@endif
@endsection