<!-- Assign Role Modal -->
<div class="modal fade" id="assignRoleModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="assignRoleModalLabel{{ $user->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="assignRoleModalLabel{{ $user->id }}">Assign Roles</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('users.assignRoles', $user->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Roles</label><br>
                        @foreach ($roles as $role)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="roles[]" id="role{{ $role->id }}" value="{{ $role->id }}" @if($user->hasRole($role->id)) checked @endif>
                                <label class="form-check-label" for="role{{ $role->id }}">{{ $role->name }}</label>
                            </div>
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Assign Roles</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
