<div>
    <table class="table table-sm">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Status</th>
            <th scope="col">Created at</th>
            <th scope="col">Updated at</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($games as $game)
                <tr>
                    <th scope="row">{{ $game->id }}</th>
                    <td>{{ $game->status }}</td>
                    <td>{{ $game->created_at }}</td>
                    <td>{{ $game->updated_at }}</td>
                    <td>
                        
                        <a href="#" class="btn btn-success @if ($game->status != 0) {{ 'disabled' }} @endif" 
                            onclick="event.preventDefault(); document.getElementById('start-game-{{ $game->id }}').submit();">
                            START
                        </a>
                        <a href="#" class="btn btn-danger @if ($game->status == -1) {{ 'disabled' }} @endif"
                            onclick="event.preventDefault(); document.getElementById('cancel-game-{{ $game->id }}').submit();">
                            CANCEL
                        </a>
                        <x-show-game-details gameID='{{ $game->id }}'></x-show-game-details>
                        @livewire('add-players-to-game', ['status' => $game->status, 'gameId' => $game->id ] ,key($game->id))
                        <form 
                            method="POST" 
                            id="start-game-{{ $game->id }}"
                            action="{{ route('startGame', $game->id) }}"  
                            class="d-none">
                            @method('PUT')
                            @csrf
                            <input type="hidden" value="true" name="startGame">
                        </form>
                        <form 
                            method="POST" 
                            id="cancel-game-{{ $game->id }}"
                            action="{{ route('cancelGame', $game->id) }}"  
                            class="d-none">
                            @method('PUT')
                            @csrf
                            <input type="hidden" value="true" name="cancelGame">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>