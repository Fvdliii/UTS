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
            <li class="list-group-item">
                {{ $loop->iteration }}.
                {{ $income->from }} --
                {{ $income->income }} --
                Rp {{ number_format($income->nominal, 0, ',', '.') }} --
                {{ $income->tanggal_income }}

                <a class="btn btn-warning btn-sm" href="{{ route('income.edit', $income) }}" role="button">Edit</a>

                <form action="{{ route('income.destroy', $income) }}" method="POST" class="d-inline">
                    @method('DELETE')
                    @csrf

                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('Apakah anda yakin ingin menghapus data anda?')">Delete</button>
                </form>



            </li>
        @endforeach
    </ul>
</x-app>
