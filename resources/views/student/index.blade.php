@extends("layouts.librarian")


@section("title", "Librarian - Student List")


@section("content")
    @if (false)
        <span>There is no registered student.</span>
    @else
        <div class="table-responsive">
            <h3> Student List <span class="label label-danger">{{count($students)}}<span></h3>
            <a href="student/add">
                <button id="tableUstuBtn" class="btn btn-success right" type="button"><span class="glyphicon glyphicon-plus"></span> Add Student </button>
            </a>
            <table class="table table-striped">
                <tr>
                    <th>Number</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Class</th>
                    <th>Department</th>
                    <th>Edit | Delete</th>
                </tr>
                @foreach($students as $student)
                <tr>
                    <td>{{$student->OgrenciNo}}</td>
                    <td>{{$student->OgrenciAdi}}</td>
                    <td>{{$student->OgrenciSoyadi}}</td>
                    <td>{{$student->OgrenciSinif}}</td>
                    <td>{{$student->BolumAdi}}</td>
                    <td>
                        <a href="student/edit/{{$student->OgrenciNo}}">
                            <button class="btn btn-info" type="submit"><span class="glyphicon glyphicon-edit"></span> Edit </button>
                        </a>
                        <a href="student/remove/{{$student->OgrenciNo}}">
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