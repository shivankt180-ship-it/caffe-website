


@extends('admin.layouts.admin')
@section('content')




<div class="table-responsive">

    <table class="table table-hover align-middle">

        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Number</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

            <tr>
                <td colspan="7" class="text-center py-4">
                    No messages found.
                </td>
            </tr>

        </tbody>

    </table>

</div>
@endsection