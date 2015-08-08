@extends("layouts.librarian")

@section("title", "Librarian - Book Level List")

@section("content")
@if (false)
    <span>There is no registered book level.</span>
@else
    <div class="table-responsive">
        <h3> Book Level List <span class="label label-danger">{{$bookLevelsNumber}}<span></h3>
        <a href="booklevel/add">
            <button id="tableUstuBtn" class="btn btn-success right" type="button"><span class="glyphicon glyphicon-plus"></span> Add Book </button>
        </a>
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>Book Level No</th>
                <th>Book Level Name</th>
                <th>Edit | Delete</th>
            </tr>
            @foreach($bookLevels as $level)
            <tr>
                <td>{{$level->SeviyeNo}}</td>
                <td>{{$level->SeviyeAdi}}</td>
                <td>
                    <a href="booklevel/edit/{{$level->SeviyeNo}}">
                        <button class="btn btn-info" type="submit"><span class="glyphicon glyphicon-edit"></span> Edit </button>
                    </a>
                    <a href="booklevel/remove/{{$level->SeviyeNo}}">
                        <button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-remove"></span> Remove </button>
                    </a>
                </td>
            </tr>
            @endforeach
        </table>
        {!! $bookLevels->render() !!}
    </div><!-- .table-responsive sonu -->
@endif
@endsection