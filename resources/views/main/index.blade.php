@extends("layouts.main")

@section("title", "Main Page")
@section("content")
<div class="col-xs-3"> <!-- required for floating -->
    <!-- Nav tabs -->
    <ul class="nav nav-tabs tabs-left">
        <li class="active"><a href="#kitapAdi" data-toggle="tab">Book Name</a></li>
        <li><a href="#kitapSeviye" data-toggle="tab">Book Level</a></li>
        <li><a href="#yazarAdi" data-toggle="tab">Author Name</a></li>
    </ul>
</div>

<div class="col-xs-8">
    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="kitapAdi">
            <div class="form-group">
                <form action="/search" method="post" class="form-signin">
                   {!! csrf_field() !!}
                    <label for="aranacakKitap" id="aranacakKitapLabel" class="form-control"> Enter Book Name </label>
                    <input type="text" name="aranacakKitap" class="form-control" placeholder="Search by Book Name" autofocus required/>
                    <input type="checkbox" name="onlyAvailable" class=""/> <strong>Show Only Available Books</strong>   
                    <input type="submit" name="araButonuKitap" value="Search"  class="btn btn-mmm btn-block"/>
                </form>
            </div><!-- .form-group sonu -->            
        </div>
        <div class="tab-pane" id="kitapSeviye">
            <div class="form-group">
                <form action="/search" method="post" class="form-signin">
                   {!! csrf_field() !!}
                    <label for="seviyeSec" class="form-control"> Choose Level </label>
                    <select name="seviyeSec" class="form-control">
                        @foreach ($bookLevels as $level)
                            <option value='{{$level->SeviyeNo}}'>{{$level->SeviyeAdi}} ({{$level->SeviyeNo}})</option>
                        @endforeach
                    </select>
                    <input type="checkbox" name="onlyAvailable" class=""/> <strong>Show Only Available Books</strong>   
                    <input type="submit" name="araButonuSeviye" value="Search" class="btn btn-mmm btn-block"/>

                </form>
            </div><!-- .form-group sonu -->    
        </div>
        <div class="tab-pane" id="yazarAdi">
            <div class="form-group">
                <form action="/search" method="post" class="form-signin">
                    {!! csrf_field() !!}
                    <label for="aranacakKelime" class="form-control"> Enter Author Name </label>
                    <input type="text" name="aranacakYazar" class="form-control" placeholder="Search by Author Name" autofocus required/>
                    <input type="checkbox" name="onlyAvailable" class=""/> <strong>Show Only Available Books</strong>   
                    <input type="submit" name="araButonuYazar" value="Search" class="btn btn-mmm btn-block"/>
                </form>
            </div><!-- .form-group sonu -->                      
        </div>
    </div>
</div> 
@endsection