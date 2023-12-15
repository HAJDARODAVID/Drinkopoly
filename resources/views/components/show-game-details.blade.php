<div style="display: inline">
    <!-- Modal open button -->
    <a href="#" class="btn btn-secondary"
        onclick="event.preventDefault(); document.getElementById('showGameDetails-{{ $gameID }}').style.display='block'">
        DETAILS
    </a>

    <!-- Modal -->
    <div class="modal" id="showGameDetails-{{ $gameID }}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addNewItem">Game #{{ $gameID }} details</h5>
                </div>
                <div class="modal-body">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->getPlayerInfo->id }}</th>
                                    <td>{{ $user->getPlayerInfo->name }}</td>
                                    <td>@livewire('online-status-indicator', ['user' => $user->getPlayerInfo->id], key('gameDetailsTable-'.$user->id))</td>
                                </tr>  
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="document.getElementById('showGameDetails-{{ $gameID }}').style.display='none'">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>