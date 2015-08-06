@extends("layouts.librarian")


@section("title", "Librarian - Add Book Level")


@section("content")
<div class="table-responsive">
    <form action="" method="post">
        {!! csrf_field() !!}
        <fieldset>
            <legend> Add Book Level </legend>
            <div class="error" style="text-align:center;">
                @if (session("message"))
                {{session("message")}}
                @endif
            </div>
            <table class="table table-hover" >
                <tr>
                    <td>
                        <label for="kitapSeviyeNo">Book Level No:</label>
                    </td>
                    <td>
                        <input type="text" name="kitapSeviyeNo" id="kitapSeviyeNo" class="form-control" placeholder="Level Number" autofocus="true"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="kitapSeviyeAdi">Book Level Name:</label>
                    </td>
                    <td>
                        <input type="text" name="kitapSeviyeAdi" id="kitapSeviyeAdi" class="form-control" placeholder="Level Name"/>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="kitapSeviyeEkleSubmit" value="Add Book" class="form-control btn btn-mmm"/>
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
</div><!-- .table-responsive sonu -->
@endsection