<div>

    <!-- Modal open button -->
    <button onclick="document.getElementById('newUserOverAdmin').style.display='block'"
            class="btn btn-success" style="width: 250px">
        Add new user
    </button>
    
    <div class="modal" id="newUserOverAdmin" style="display: @if ($errors->any()){{ 'block' }} @endif">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addNewItem">Add new user</h5>
                </div>
                <div class="modal-body">
                    <form 
                        id="modal-new-role-item-form" 
                        method="POST" 
                        action="{{ route('addNewUser') }}"
                    >
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="userName">Name</label>
                            <input type="text" class="form-control" id="userName" name="name">
                            @error('name')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div><br>
                        <div class="form-group">
                            <label for="userEmail">Email</label>
                            <input type="email" class="form-control" id="userEmail" name="email">
                            @error('email')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div><br>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="document.getElementById('newUserOverAdmin').style.display='none'">
                        Close
                    </button>
                    <button type="button" class="btn btn-success" onclick="event.preventDefault();document.getElementById('modal-new-role-item-form').submit();">
                        Save changes
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>