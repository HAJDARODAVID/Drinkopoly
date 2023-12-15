<div>
    <table class="table table-sm">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">E-mail</th>
            <th scope="col">Online</th>
            <th scope="col">Created at</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>@livewire('online-status-indicator', ['user' => $user->id], key('userTable-'.$user->id))</td>
                    <td>{{ $user->created_at }}</td>
                    <td>
                        <a href="{{ Route('user', $user->id) }}" class="btn btn-primary">EDIT</a>
                        <a href="#" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete-user-{{ $user->id }}').submit();">DELETE</a>
                        <form 
                            method="POST" 
                            id="delete-user-{{ $user->id }}"
                            action="{{ route('userDelete', $user->id) }}"  
                            class="d-none">
                            @method('DELETE')
                            @csrf
                            <input type="hidden" value="true" name="deletionComplete">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>