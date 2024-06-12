<form method="POST" action="{{ route('users.update', $user) }}">
    @csrf
    @method('PUT')
    <label for="profile">Profile:</label>
    <textarea id="profile" name="profile" required>{{ $user->profile }}</textarea>
    <br>
    <label for="team_id">Team:</label>
    <select id="team_id" name="team_id" required>
        @foreach($teams as $team)
            <option value="{{ $team->id }}" {{ $team->id == $user->team_id ? 'selected' : '' }}>{{ $team->name }}</option>
        @endforeach
    </select>
    <br>
    <button type="submit">Update</button>
</form>