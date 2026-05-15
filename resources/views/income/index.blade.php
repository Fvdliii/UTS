<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    <ul class="list-group">
        @foreach ($incomes as $income)
            <li class="list-group-item">{{ $income->income }} -- {{ $income->from }} -- {{ $income->nominal }} --
                {{ $income->tanggal_income }}</li>
        @endforeach
    </ul>
</x-app>
