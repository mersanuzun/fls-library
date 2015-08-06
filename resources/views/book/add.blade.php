@extends("layouts.librarian")


@section("title", "Librarian - Add Book")


@section("content")
<div class="table-responsive">
    <form action="" method="post">
        {!! csrf_field() !!}
        <fieldset>
            <legend> Add Book </legend>
            <div class="error" style="text-align:center;">
                @if (session("message"))
                {{session("message")}}
                @endif
            </div>
            <table class="table table-hover" >
                <tr>
                    <td>
                        <label for="kitapSeviyesi">Level:</label>
                    </td>
                    <td>
                        <select name="kitapSeviyesi" id="kitapSeviyesi"  class="form-control">
                            @foreach ($bookLevels as $level)
                            <option>{{$level->SeviyeAdi . "(" . $level->SeviyeNo . ")"}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="kitapNo">Book Number:</label>
                    </td>
                    <td>
                        <input type="text" name="kitapNo" id="kitapNo" class="form-control" placeholder="Book Number" autofocus="true"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="kitapAdi">Book Name:</label>
                    </td>
                    <td>
                        <input type="text" name="kitapAdi" id="kitapAdi" class="form-control" placeholder="Book Name"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="yazarAdi">Author's Name:</label>
                    </td>
                    <td>
                        <input type="text" name="yazarAdi" id="yazarAdi" class="form-control" placeholder="Author's Name"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="yazarAdi">Publisher:</label>
                    </td>
                    <td>
                        <input type="text" name="yayinEvi" id="yayinEvi" class="form-control" placeholder="Publisher"/>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="kitapEkleSubmit" value="Add Book" class="form-control btn btn-mmm"/>
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
</div><!-- .table-responsive sonu -->
@endsection