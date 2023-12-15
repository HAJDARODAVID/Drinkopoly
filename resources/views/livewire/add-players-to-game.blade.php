<div style="display: inline">
    {{-- Modal show button --}}
    <a href="#" class="btn btn-primary @if( $status != 0) {{ 'disabled' }}@endif"
        wire:click='showModalAddUsersToGame'>
        ADD PLAYERS
    </a>

    <!-- Modal -->
    <div class="modal" id="addUserToGame-{{ $gameId }}" style="display: @if($showModal) {{ 'block' }} @endif">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addNewItem">Add user to game: #{{ $gameId }}</h5>
                </div>
                <div class="modal-body">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">In game</th>
                            <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>@livewire('online-status-indicator', ['user' => $user->id], key('addPlayerTable-'.$user->id))</td>
                                    <td> @isset($user->getPlayersGame->game_id) {{ $user->getPlayersGame->game_id }} @endisset</td>
                                    <td>
                                        <button class="btn btn-success btn-sm" 
                                            wire:click='addPlayerToGame({{ $user->id }}, {{ $gameId }})'
                                            @if (isset($user->getPlayersGame->game_id)) {{ 'disabled' }} @endif>
                                            JOIN
                                        </button>
                                        <button class="btn btn-danger btn-sm" 
                                            wire:click='removePlayerFromGame({{ $user->id }})'
                                            @if (!isset($user->getPlayersGame->game_id)) {{ 'disabled' }} @endif>
                                            KICK OUT
                                        </button>
                                    </td>
                                </tr>  
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="document.getElementById('addUserToGame-{{ $gameId }}').style.display='none'">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
    
    

