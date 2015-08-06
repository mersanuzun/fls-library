@extends("layouts.librarian")

@section("title", "Librarian - Edit Book Level")

@section("content")
@if (false)
<span>There is no registered book level.</span>
@else
<div class="table-responsive">
    <form action="" method="post">
        {!! csrf_field() !!}
        <fieldset>
            <legend>Edit Book Level </legend>
            <div class="error" style="text-align:center;">
                @if (session("message"))
                {{session("message")}}
                @endif
            </div>
            <table class="table table-hover" >
                <tr>
                    <td>
                        <label for="kitapSeviyeNo">Level Number:</label>
                    </td>
                    <td>
                        <input type="text" name="kitapSeviyeNo" id="kitapSeviyeNo" value="{{$bookLevel[0]->SeviyeNo}}" readonly class="form-control" placeholder="Book Number"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="kitapSeviyeAdi">Level Name: </label>
                    </td>
                    <td>
                        <input type="text" name="kitapSeviyeAdi" id="kitapSeviyeAdi" value="{{$bookLevel[0]->SeviyeAdi}}" class="form-control" placeholder="Level Name" autofocus="true"/>
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