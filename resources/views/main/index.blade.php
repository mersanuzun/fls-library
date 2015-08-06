@extends("layouts.main")

@section("title", "Main Page")
@section("content")
<div class="col-xs-3"> <!-- required for floating -->
    <!-- Nav tabs -->
    <ul class="nav nav-tabs tabs-left">
        <li class="active"><a href="#kitapAdi" data-toggle="tab">Book Name</a></li>
        <li><a href="#kitapSeviye" data-toggle="tab">Book Level</a></li>
        <li><a href="#yazarAdi" data-toggle="tab">Author Name</a></li>
        <li><a href="#yayinEvi" data-toggle="tab">Publisher</a></li>
    </ul>
</div>

<div class="col-xs-8">
    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="kitapAdi">
            <div class="form-group">
                <form action="search-in.php" method="post" class="form-signin">
                    <label for="aranacakKitap" id="aranacakKitapLabel" class="form-control"> Enter Book Name </label>
                    <input type="text" name="aranacakKitap" id="aranacakKitap" class="form-control" placeholder="Search by Book Name" autofocus="true"/>
                    <input type="checkbox" name="onlyAvailable" id="onlyAvailable" class=""/> <strong>Show Only Available Books</strong>   
                    <input type="submit" id="araButonuKitap" name="araSubmit" value="Search" onclick="TextBoxKontrol()" class="btn btn-mmm btn-block"/>
                </form>
            </div><!-- .form-group sonu -->            
        </div>
        <div class="tab-pane" id="kitapSeviye">
            <div class="form-group">
                <form action="search-in.php" method="post" class="form-signin">
                    <label for="seviyeSec" id="seviyeSecLabel" class="form-control"> Choose Level </label>
                    <select name="seviyeSec" id="seviyeSec" class="form-control">
                        <option value='1'>Starter (1)</option>
                        <option value='2'>Beginner (2)</option>
                        <option value='3'>Pre-Intermediate (3)</option>
                        <option value='4'>Intermediate (4)</option>
                        <option value='5'>Advance (5)</option>                        
                    </select>
                    <input type="checkbox" name="onlyAvailable" id="onlyAvailable" class=""/> <strong>Show Only Available Books</strong>   
                    <input type="submit" id="araButonuSeviye" name="araSubmit" value="Search" onclick="TextBoxKontrol()" class="btn btn-mmm btn-block"/>

                </form>
            </div><!-- .form-group sonu -->    
        </div>
        <div class="tab-pane" id="yazarAdi">
            <div class="form-group">
                <form action="search-in.php" method="post" class="form-signin">
                    <label for="aranacakKelime" id="aranacakYazarLabel" class="form-control"> Enter Author Name </label>
                    <input type="text" name="ranacakYazar" id="ranacakYazar" class="form-control" placeholder="Search by Author Name" autofocus="true"/>
                    <input type="checkbox" name="onlyAvailable" id="onlyAvailable" class=""/> <strong>Show Only Available Books</strong>   
                    <input type="submit" id="araButonuYazar" name="araSubmit" value="Search" onclick="TextBoxKontrol()" class="btn btn-mmm btn-block"/>
                </form>
            </div><!-- .form-group sonu -->                      
        </div>
        <div class="tab-pane" id="yayinEvi">
            <div class="form-group">
                <form action="search-in.php" method="post" class="form-signin">
                    <label for="aranacakKelime" id="aranacakYayinEviLabel" class="form-control"> Enter Publisher Name </label>
                    <input type="text" name="aranacakYayinEvi" id="aranacakYayinEvi" class="form-control" placeholder="Search by Publisher Name" autofocus="true"/>
                    <input type="checkbox" name="onlyAvailable" id="onlyAvailable" class=""/> <strong>Show Only Available Books</strong>   
                    <input type="submit" id="araButonuYayinEvi" name="araSubmit" value="Search" onclick="TextBoxKontrol()" class="btn btn-mmm btn-block"/>
                </form>
            </div><!-- .form-group sonu -->                       
        </div>
    </div>
</div> 
@endsection