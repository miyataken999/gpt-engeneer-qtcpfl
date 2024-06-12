<h1>{{ $user->name }}</h1>
<p>Profile: {{ $user->profile }}</p>
<p>Team: {{ $user->team->name }}</p>
<p>Tags: {{ implode(', ', $user->tags) }}</p>