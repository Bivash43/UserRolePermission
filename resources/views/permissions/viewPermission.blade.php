<div class="modal fade" id="permissionsModal" tabindex="-1" permission="dialog" aria-labelledby="permissionsModalLabel" aria-hidden="true">
    <div class="modal-dialog" permission="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="permissionsModalLabel">Permissions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul>
                    @foreach ($permissions as $permission)
                    <li>{{ $permission->name }}</li>
                    <form class="d-inline" action="{{ route('permissions.destroy', $permission->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
