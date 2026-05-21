<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    <h3 class="mb-3">Recycle Bin</h3>

    <a class="btn btn-primary mb-3" href="{{ route('income.index') }}" role="button">Kembali</a>

    <table class="table table-bordered table-hover text-center">

        <thead class="table-dark">

            <tr>
                <th>No</th>
                <th>From</th>
                <th>Income</th>
                <th>Nominal</th>
                <th>Aksi</th>
            </tr>

        </thead>

        <tbody>

            @foreach ($incomes as $income)
                <tr>
                    <td>
                        {{ $incomes->firstItem() + $loop->index }}
                    </td>
                    <td>{{ $income->from }}</td>
                    <td>{{ $income->income }}</td>
                    <td>
                        Rp {{ number_format($income->nominal, 0, ',', '.') }}
                    </td>

                    <td>
                        <form action="{{ route('income.restore', $income->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">
                                Restore
                            </button>
                        </form>

                        <form action="{{ route('income.forceDelete', $income->id) }}" method="POST">

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Hapus Permanen data?')"> Hapus Permanen
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app>
