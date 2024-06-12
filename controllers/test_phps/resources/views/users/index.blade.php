<h1>Users</h1>
<ul>
    @foreach($users as $user)
        <li><a href="{{ route('users.show', $user) }}">{{ $user->name }}</a></li>
    @endforeach
</ul>