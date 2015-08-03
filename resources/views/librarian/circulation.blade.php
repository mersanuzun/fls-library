@extends("layouts.master")


@section("title", "Circulation")


@section("content")
<div id="ver">
   <form action="/management/librarian/circulation" method="post">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <table>
            <tr>
                <td>Book's No</td>
                <td>
                    <input type="text" name="bookNo">
                </td>
            </tr>
            <tr>
                <td>Level</td>
                <td>
                    <input type="text" name="bookLevel" required="">
                </td>
            </tr>
            <tr>
                <td>Student's No</td>
                <td>
                    <input type="text" name="studentNo" required="">
                </td>
            </tr>
            <tr>
                <td>Circulation Start Date</td>
                <td>
                    <input type="date" name="startDate" required="">
                </td>
            </tr>
            <tr>
                <td>Circulation Estimated Finish Date</td>
                <td>
                    <input type="date" name="estimatedFinishDate" required="">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="startCirculation" value="Start Circulation">
                </td>
            </tr>
        </table>
    </form>
</div>

<div id="al">
   <form action="/management/librarian/circulation" method="post">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <table class="table table-hover">
            <tr>
                <td>
                    <label for="teslimKitapNo">Book's No: </label>
                </td>
                <td>
                    <input type="text" name="deliveredBookNo" id="teslimKitapNo" required="" maxlength="10">
                </td>
            </tr>
            <tr>
                <td>Level</td>
                <td>
                    <input type="text" name="deliveredBookLevel">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="deliveredStudentNo">Student's Number: </label>
                </td>
                <td>
                    <input type="text" name="deliveredStudentNo" id="deliveredStudentNo" required="" maxlength="9">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="teslimEdilenTarih">Circulation Finish Date: </label>
                </td>
                <td>
                    <input type="date" name="finishDate" id="teslimEdilenTarih" required="">
                <td>
            </tr>
            <tr>
                <td>
                    <label></label>
                </td>
                <td>
                    <input type="submit" name="finishCirculation" value="Finish the Circulation" >
                </td>
            </tr>
        </table>
   </form>
   <div id="message">
       @if (session("message"))
           {{session("message")}}
       @endif
   </div>
</div>
@endsection