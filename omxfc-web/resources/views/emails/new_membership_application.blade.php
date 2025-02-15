<h1>Neue Mitgliedschaftsanfrage</h1>

<p>Es ist eine neue Mitgliedschaftsanfrage eingegangen:</p>

<ul>
    @foreach ($userData as $key => $value)
        @if ($key != 'password' || $key != 'password_confirmation' || $key != '_token')
            <li><strong>{{ ucfirst($key) }}:</strong> {{ $value }}</li>
        @endif
    @endforeach
</ul>