@extends("layouts.librarian")


@section("title", "Circulation")


@section("content")
<div class="col-md-6 table-responsive">
    <h3> Book Loan <span class="label label-danger"></span></h3>
    <form action="/management/librarian/circulation" method="post">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <table class="table table-hover">
            <tr>
                <td>
                    <label for="bookLevel"> Book Level </label>
                </td>
                <td>
                    <select name="bookLevel" id="bookLevel"  class="form-control">
                        @foreach ($bookLevels as $level)
                        <option value="{{$level->SeviyeNo}}">
                                {{$level->SeviyeAdi . "(" . $level->SeviyeNo . ")"}}
                        </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="bookLevel"> Book's Number </label>
                </td>
                <td>
                    <input type="text" name="bookNo" class="form-control" placeholder="Book's Number" required="" autofocus="true">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="studentNo"> Student's Number </label>
                </td>
                <td>
                    <input type="text" name="studentNo" class="form-control" placeholder="Student's Number" required="">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="estimatedFinishDate"> Circulation Estimated Finish Date </label>
                </td>
                <td>
                    <input type="date" name="estimatedFinishDate" class="form-control" placeholder="Circulation Estimated Finish Date" required="">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="startCirculation" value="Start Circulation" class="form-control btn btn-mmm">
                </td>
            </tr>
        </table>
    </form>
</div>

<div class="col-md-6 table-responsive">
    <h3> Book Deliver <span class="label label-danger"></span></h3>
    <form action="/management/librarian/circulation" method="post">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <table class="table table-hover">
            <tr>
                <td>
                    <label for="deliveredBookLevel"> Book's Level </label>
                </td>
                <td>
                    <select name="deliveredBookLevel" id="deliveredBookLevel"  class="form-control">
                        @foreach ($bookLevels as $level)
                        <option value="{{$level->SeviyeNo}}">
                                {{$level->SeviyeAdi . "(" . $level->SeviyeNo . ")"}}
                        </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="teslimKitapNo"> Book's Number </label>
                </td>
                <td>
                    <input type="text" name="deliveredBookNo" class="form-control" placeholder="Book's Number" required="" maxlength="10">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="deliveredStudentNo"> Student's Number </label>
                </td>
                <td>
                    <input type="text" name="deliveredStudentNo" class="form-control" placeholder="Student's Number" required="" maxlength="9">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="finishCirculation" value="Finish the Circulation" class="form-control btn btn-mmm">
                </td>
            </tr>
        </table>
    </form>
</div>
<div id="message">
    @if (session("message"))
        {{session("message")}}
    @endif
</div>
@endsection