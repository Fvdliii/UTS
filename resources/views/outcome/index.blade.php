<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    <ul class="list-group">
        @foreach ($outcomes as $outcome)
            <li class="list-group-item">{{ $loop->iteration }}. {{ $outcome->outcome }} -- {{ $outcome->from }} --
                {{ $outcome->nominal }} --
                {{ $outcome->tanggal_outcome }}</li>
        @endforeach
    </ul>
</x-app>
