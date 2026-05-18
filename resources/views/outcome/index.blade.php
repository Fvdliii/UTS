<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    @session('success')
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endsession

    <a class="btn btn-primary mb-3" href="{{ route('outcome.create') }}" role="button">Tambahkan</a>

    <ul class="list-group">
        @foreach ($outcomes as $outcome)
            <li class="list-group-item">
                {{ $loop->iteration }}.
                {{ $outcome->outcome }} --
                {{ $outcome->from }} --
                Rp {{ number_format($outcome->nominal, 0, ',', '.') }} --
                {{ $outcome->tanggal_outcome }} --
                {{ $outcome->income->from }}

                <a class="btn btn-warning btn-sm" href="{{ route('outcome.edit', $outcome) }}" role="button">Edit</a>

                <form action="{{ route('outcome.destroy', $outcome) }}" method="POST" class="d-inline">
                    @method('DELETE')
                    @csrf

                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('Apakah anda yakin ingin menghapus data anda?')">Delete</button>
                </form>



            </li>
        @endforeach
    </ul>
</x-app>
