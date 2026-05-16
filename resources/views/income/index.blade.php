<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    @session('success')
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endsession

    <a class="btn btn-primary mb-3" href="{{ route('income.create') }}" role="button">Tambahkan</a>

    <ul class="list-group">
        @foreach ($incomes as $income)
            <li class="list-group-item">{{ $loop->iteration }}. {{ $income->income }} -- {{ $income->from }} --
                Rp {{ number_format($income->nominal, 0, ',', '.') }} --
                {{ $income->tanggal_income }}</li>
        @endforeach
    </ul>
</x-app>
