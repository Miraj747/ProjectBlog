@extends('layouts.admin.master')
@section('breadcrumb')

    <!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('user.index')}}">Users</a></li>
            <li class="breadcrumb-item active">All Users</li>
        </ol>
        @endsection
@section('main part')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">

                    <h3 class="card-title">All Users List</h3>


                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>email</th>
                            <th>Phone</th>
                            <th>Operations</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($table as $user)
                            <tr>
                                <td>{{$serial++}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td><a href="{{route('user.edit',$user->id)}}" class="btn btn-primary btn-sm">  UPDATE  </a>
                                    <form action="{{route('user.destroy',$user->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you really want to delete?')"> DELETE</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        {{$table->render()}}
            <!-- /.card -->
        </div>
        <!--/.col (left) -->
        <!-- right column -->

        <!--/.col (right) -->
    </div>
    @endsection
