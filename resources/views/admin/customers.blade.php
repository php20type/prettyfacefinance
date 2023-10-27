@extends('layouts.admin')
@section('content')
    <div class="container-fluid mt-3">
        <table class="table table-hover table-striped data-table">
            <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Email</td>
                <td>Date Registered</td>
                <td></td>
            </tr>
            </thead>
            <tbody>
            @foreach($users->where('clinic_id', '0') as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>
                        <form action="/admin/orders">
                            <input type="hidden" name="customer" value="{{$user->id}}">
                            <button class="btn btn-primary btn-sm">View Orders</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection