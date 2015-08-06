@extends("layouts.librarian")


@section("title", "Librarian - Department List")


@section("content")
    @if (false)
        <span>There is no registered department.</span>
    @else
        <div class="table-responsive">
            <h3> Department List <span class="label label-danger">{{count($departments)}}<span></h3>
            <a href="department/add">
                <button id="tableUstuBtn" class="btn btn-success right" type="button"><span class="glyphicon glyphicon-plus"></span> Add Department </button>
            </a>
            <table class="table table-striped">
                <tr>
                    <th>Department Number</th>
                    <th>Department Name</th>
                    <th>Edit | Delete</th>
                </tr>
                @foreach($departments as $dep)
                <tr>
                    <td>{{$dep->BolumKodu}}</td>
                    <td>{{$dep->BolumAdi}}</td>
                    <td>
                        <a href="department/edit/{{$dep->BolumKodu}}">
                            <button class="btn btn-info" type="submit"><span class="glyphicon glyphicon-edit"></span> Edit </button>
                        </a>
                        <a href="department/remove/{{$dep->BolumKodu}}">
                            <button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-remove"></span> Remove </button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </table>
                        <h1>sayfalama</h1>
        </div><!-- .table-responsive sonu -->
    @endif
@endsection