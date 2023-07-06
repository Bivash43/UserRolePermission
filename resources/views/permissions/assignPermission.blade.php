<!-- Assign permission Modal -->
<div class="modal fade" id="assignPermissionModal{{ $role->id }}" tabindex="-1" permission="dialog" aria-labelledby="#assignPermissionModal{{ $role->id }}" aria-hidden="true">
    <div class="modal-dialog" permission="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="#assignPermissionModal{{ $role->id }}">Assign Permissions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('roles.assignPermissions', $role->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>permissions</label><br>
                        @foreach ($permissions as $permission)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="permissions[]" id="permission{{ $permission->id }}" value="{{ $permission->id }}" @if($role->hasPermission($permission->id)) checked @endif>
                                <label class="form-check-label" for="permission{{ $permission->id }}">{{ $permission->name }}</label>
                            </div>
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Assign permissions</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
