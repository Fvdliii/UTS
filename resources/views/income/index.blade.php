<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    @session('success')
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endsession

    <a class="btn btn-primary mb-3" href="{{ route('income.create') }}" role="button">Tambahkan</a>

    <div class="table-responsive">

        <table class="table table-hover table-striped align-middle mb-0 text-center">

            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>From</th>
                    <th>Income</th>
                    <th>Nominal</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($incomes as $income)
                    <tr>
                        <td>
                            {{ $incomes->firstItem() + $loop->index }}
                        </td>

                        <td>
                            {{ $income->from }}
                        </td>

                        <td>
                            {{ $income->income }}
                        </td>

                        <td>
                            Rp {{ number_format($income->nominal, 0, ',', '.') }}
                        </td>

                        <td>
                            {{ $income->tanggal_income }}
                        </td>

                        <td>
                            <a class="btn btn-info btn-sm" href="{{ route('income.show', $income) }}">
                                Detail
                            </a>

                            <a class="btn btn-warning btn-sm" href="{{ route('income.edit', $income) }}">
                                Edit
                            </a>

                            <form action="{{ route('income.destroy', $income) }}" method="POST" class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Apakah anda yakin ingin menghapus data anda?')">
                                    Delete
                                </button>

                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

    </div>

    {{ $incomes->links() }}
</x-app>
