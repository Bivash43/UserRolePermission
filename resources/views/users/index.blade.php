@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Users and Roles</h1>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createUserModal">Create User</button>
         
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Roles</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @foreach ($user->roles as $role)
                    <span class="badge badge-primary">{{ $role->name }}</span>
                    @endforeach
                </td>
                <td>
                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#assignRoleModal{{ $user->id }}">Assign Role</button>
                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editUserModal{{ $user->id }}">Edit</button>
                    <form class="d-inline" action="{{ route('users.destroy', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>

            <!-- Edit User Modal -->
            @include('users.editUser')

            <!--Assign Roles to User Model-->
            @include('roles.assignRole')

            @endforeach
        </tbody>
    </table>
</div>

<!--Tables to show roles and Permissions-->
@include('roles.index')

<!-- Create User Modal -->
@include('users.createUser')



