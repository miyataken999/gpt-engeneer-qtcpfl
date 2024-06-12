<h1>Teams</h1>
<ul>
    @foreach($teams as $team)
        <li>{{ $team->name }}</li>
    @endforeach
</ul>
<form method="POST" action="{{ route('teams.store') }}">
    @csrf
    <label for="name">Team Name:</label>
    <input type="text" id="name" name="name" required>
    <br>
    <button type="submit">Create Team</button>
</form>