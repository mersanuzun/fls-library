@extends("layouts.librarian")

@section("title", "Librarian - Edit Book")

@section("content")
@if (false)
<span>There is no registered book.</span>
@else
<div class="table-responsive">
    <form action="" method="post">
        {!! csrf_field() !!}
        <fieldset>
            <legend>Edit Book </legend>
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
                        <select name="kitapSeviyesi" id="kitapSeviyesi"  class="form-control" readonly>
                            @foreach ($bookLevels as $level)
                            <option value="{{$level->SeviyeNo}}" @if($level->SeviyeNo == $book[0]->KitapSeviyeNo) ? selected="selected"}}@endif>
                                    {{$level->SeviyeAdi . "(" . $level->SeviyeNo . ")"}}
                        </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="kitapNo">Book Number:</label>
                </td>
                <td>
                    <input type="text" name="kitapNo" id="kitapNo" value="{{$book[0]->KitapNo}}" readonly class="form-control"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="kitapAdi">Book Name:</label>
                </td>
                <td>
                    <input type="text" name="kitapAdi" id="kitapAdi" value="{{$book[0]->KitapAdi}}" class="form-control" placeholder="Book Name"autofocus="true"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="yazarAdi">Author's Name:</label>
                </td>
                <td>
                    <input type="text" name="yazarAdi" id="yazarAdi" value="{{$book[0]->YazarAdi}}" class="form-control" placeholder="Author's Name"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="yazarAdi">Publisher:</label>
                </td>
                <td>
                    <input type="text" name="yayinEvi" id="yayinEvi" value="{{$book[0]->YayinEvi}}" class="form-control" placeholder="Publisher"/>
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