@extends("layouts.admin")
@section("title", "Advance Management")

@section("content")
<div class="alert alert-danger" role="alert">WARNING! Use with Caution. The tools which is in the page are advance management on your records and settings.</div>

<div class="row">
    <div class="col-lg-12">
        <div class="page-header">
            <h2>Clear Records</h2>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td>
                            <p>This option delete all records about the student. <span class="label label-danger">Use with Caution</span></p>
                        </td>
                        <td>
                            <a href="/management/admin/advance/clearStudentRecords">
                                <button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-remove"></span> Clear Students Records </button>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>This option delete all records about the circulation. <span class="label label-danger">Use with Caution</span></p>
                        </td>
                        <td>
                            <a href="/management/admin/advance/clearCirculationRecords">
                                <button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-remove"></span> Clear Circulation Records </button>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div><!-- /.table-responsive -->
    </div><!-- /.col-md-12 -->
</div><!-- /.row -->

@endsection