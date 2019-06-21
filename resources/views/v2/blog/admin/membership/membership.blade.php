@extends('layouts.admin')

@section('title')
Membership &mdash; Blog
@endsection

@section('memberActive')
active
@endsection

@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Users</h1>
            <div class="section-header-button">
                <a href="{{action('MembershipController@create')}}" class="btn btn-primary">Enroll</a>
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="#">User</a></div>
                <div class="breadcrumb-item active">All User</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Users</h2>
            <p class="section-lead">
                You can manage all users, such as editing, deleting and more.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card mb-0">
                        <div class="card-body">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#">All <span
                                            class="badge badge-white">{{\App\User::count()}}</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Platinum <span class="badge badge-primary">{{\App\User::where('membership',
                                                    3)->count()}}</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Premium <span class="badge badge-primary">{{\App\User::where('membership',
                                                    2)->count()}}</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Free <span class="badge badge-primary">{{\App\User::where('membership',
                                                    1)->count()}}</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">

                        @if (\Session::has('success'))
                        <div class="alert alert-success alert-has-icon">
                            <div class="alert-icon"><i class="fas fa-check-circle"></i></div>
                            <div class="alert-body">
                                <div class="alert-title">Success</div>
                                {{ \Session::get('success') }}
                            </div>
                        </div>
                        @endif

                        <div class="card-header">
                            <h4>All Users</h4>
                        </div>

                        <div class="clearfix mb-3"></div>

                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Membership Status</th>
                                    <th>Email</th>
                                    <th>Verified</th>
                                </tr>
                                @foreach ($users as $user)
                                <tr id="userId_{{ $user->id }}">
                                    <td>{{$user->id}}</td>
                                    <td>
                                        <a href="#">
                                            <img alt="image" src="{{asset('image/profile.jpg')}}" class="rounded-circle"
                                                width="35" data-toggle="title" title="">
                                            <div class="d-inline-block ml-1">{{$user->name}}</div>
                                        </a>
                                        <div class="table-links">
                                            <a href="{{action('MembershipController@edit', $user->id)}}">Edit</a>
                                            <div class="bullet"></div>
                                            <a href='javascript:void(0)' id="deleteUser" data-id="{{ $user->id }}"
                                                class="text-danger">Remove</a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="badge badge-primary">{{\App\Membership::where('id',
                                                    $user->membership)->first()->member}}</div>
                                    </td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @if ($user->email_verified_at != null)
                                        <div class="badge badge-success">Yes</div>
                                        @else
                                        <div class="badge badge-warning">No</div>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#deleteUser').on('click', function () {
            var userId = $(this).data("id");
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this blog post",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((confirm) => {
                    if (confirm) {
                        $.ajax({
                            type: "DELETE",
                            url: "{{ url('blog/admin/panel/membership')}}" + '/' + userId,
                            success: function (data) {
                                $("#userId_" + userId).remove();
                            },
                            error: function (data) {
                                alert("Error! Check log.")
                                console.log(data);
                            }
                        });
                    }
                });
        });
    });

</script>
@endsection
