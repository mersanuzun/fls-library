@extends("layouts.librarian")


@section("title", "Librarian - Edit Student")


@section("content")
<div class="table-responsive">
    <form action="" method="post">
        {!! csrf_field() !!}
        <fieldset>
            <legend> Edit Student </legend>
            <div class="error" style="text-align:center;">
                @if (session("message"))
                {{session("message")}}
                @endif
            </div>
            <table class="table table-hover">
                <tr>
                    <td>
                        <label for="ogrenciNo">School Number:</label>
                    </td>
                    <td>
                        <input type="text" name="ogrenciNo" id="ogrenciNo" value="{{$student[0]->OgrenciNo}}" readonly class="form-control" placeholder="School Number"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="ogrenciAdi">Name:</label>
                    </td>
                    <td>
                        <input type="text" name="ogrenciAdi" id="ogrenciAdi" value="{{$student[0]->OgrenciAdi}}" class="form-control" placeholder="Name" autofocus="true"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="ogrenciSoyadi">Surname:</label>
                    </td>
                    <td>
                        <input type="text" name="ogrenciSoyadi" id="ogrenciSoyadi" value="{{$student[0]->OgrenciSoyadi}}" class="form-control" placeholder="Surname"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="ogrenciSinif">Class (in prep school):</label>
                    </td>
                    <td>
                        <input type="text" name="ogrenciSinif" id="ogrenciSinif" value="{{$student[0]->OgrenciSinif}}" class="form-control" placeholder="Class"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="ogrenciBolumKodu">Department:</label>
                    </td>
                    <td>
                        <select name="ogrenciBolumKodu" id="ogrenciBolumKodu" class="form-control" >
                            @foreach($departments as $dep)
                                <option  value="{{$dep->BolumKodu}}" @if($dep->BolumKodu == $student[0]->OgrenciBolumKodu) ? selected="selected"}}@endif>
                                    <?= $dep->BolumAdi . "(" . $dep->BolumKodu . ")"; ?>
                                </option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="ogrenciEkleSubmit" id="ogrenciEkleSubmit" value="Add Student" class="form-control btn btn-mmm">
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
</div><!-- .table-responsive -->  
@endsection