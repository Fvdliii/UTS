<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    @session('success')
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endsession

    <a class="btn btn-primary mb-3" href="{{ route('outcome.create') }}" role="button">Tambahkan</a>

    <form action="">
        <div class="row g-3 mb-3">
            <div class="col-md-4">
                <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Cari penggunaan uang"
                    value="{{ request('keyword') }}">
            </div>
            <div class="col-md-4">
                <select name="income_id" id="income_id" class="form-select">

                    <option selected disabled>Pilih Tabungan</option>

                    @foreach ($incomes as $income)
                        <option value="{{ $income->id }}" {{ request('income_id') == $income->id ? 'selected' : '' }}>
                            {{ $income->from }} -
                            Rp {{ number_format($income->nominal, 0, ',', '.') }}
                        </option>
                    @endforeach

                </select>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-success">Search</button>
            </div>
        </div>
    </form>

    <ul class="list-group">
        @foreach ($outcomes as $outcome)
            <li class="list-group-item">
                {{ $outcomes->firstItem() + $loop->index }}.
                {{ $outcome->income->from }} --
                {{ $outcome->outcome }} --
                {{ $outcome->from }} --
                Rp {{ number_format($outcome->nominal, 0, ',', '.') }} --
                {{ $outcome->tanggal_outcome }} --


                <a class="btn btn-warning btn-sm" href="{{ route('outcome.edit', $outcome) }}" role="button">Edit</a>
                <a class="btn btn-info btn-sm" href="{{ route('outcome.show', $income) }}" role="button">Detail</a>


                <form action="{{ route('outcome.destroy', $outcome) }}" method="POST" class="d-inline">
                    @method('DELETE')
                    @csrf

                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('Apakah anda yakin ingin menghapus data anda?')">Delete</button>
                </form>



            </li>
        @endforeach
    </ul>

    {{ $outcomes->links() }}

</x-app>
