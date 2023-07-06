<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Roles and Permissions</h1>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addRoleModal">Add Role</button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPermissionModal">Add Permission</button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#permissionsModal">View Permissions</button>  
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Role</th>
                <th>Permissions</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
            <tr>
                <td>{{ $role->name }}</td>
                <td>
                    
                     @foreach ($role->permissions as $permission)
                    <span class="badge badge-primary">{{ $permission->name }}</span>
                    @endforeach   
                    
                    
                </td>
                <td>
                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#assignPermissionModal{{ $role->id }}">Assign Permission</button>
                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editRoleModal{{ $role->id }}">Edit</button>
                    <form class="d-inline" action="{{ route('roles.destroy', $role->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>

            <!-- Edit Role Modal -->
            @include('roles.editRole')            

            <!--Assign Permissions to role Model-->
            @include('permissions.assignPermission')

            @endforeach
        </tbody>
    </table>
</div>

<!--Create Role Modal-->
@include('roles.createRole')

<!--Create Permission Modal-->
@include('permissions.createPermission')

<!--View Permission Modal-->
@include('permissions.viewPermission')


