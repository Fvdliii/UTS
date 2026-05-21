<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a class="btn btn-primary mb-3" href="{{ route('outcome.create') }}">
        Tambahkan
    </a>

    <div class="table-responsive">

        <table class="table table-hover table-striped align-middle text-center">

            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>From</th>
                    <th>Outcome</th>
                    <th>Nominal</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($outcomes as $outcome)
                    <tr>

                        <td>
                            {{ $outcomes->firstItem() + $loop->index }}
                        </td>

                        <td>
                            {{ $outcome->from }}
                        </td>

                        <td>
                            {{ $outcome->outcome }}
                        </td>

                        <td>
                            Rp {{ number_format($outcome->nominal, 0, ',', '.') }}
                        </td>

                        <td>
                            {{ $outcome->tanggal_outcome }}
                        </td>

                        <td>
                            <a class="btn btn-info btn-sm" href="{{ route('outcome.show', $outcome) }}">
                                Detail
                            </a>

                            <a class="btn btn-warning btn-sm" href="{{ route('outcome.edit', $outcome) }}">
                                Edit
                            </a>

                            <form action="{{ route('outcome.destroy', $outcome) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus data ini?')">
                                    Delete
                                </button>
                            </form>

                        </td>

                    </tr>
                @endforeach
            </tbody>

        </table>

    </div>

    {{ $outcomes->links() }}

</x-app>
