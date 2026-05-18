<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    <form method="POST" action="{{ route('outcome.update', $outcome) }}">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="outcome" class="form-label">Cash Or Transfer</label>
            <input type="string" class="form-control @error('outcome') is-invalid @enderror" id="outcome" name="outcome"
                value="{{ old('outcome', $outcome->outcome) }}">
            @error('outcome')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <label for="from" class="form-label">Digunakan Untuk Apa</label>
            <input type="string" class="form-control @error('from') is-invalid @enderror" id="from" name="from"
                value="{{ old('from', $outcome->from) }}">
            @error('from')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <label for="nominal" class="form-label">Berapa Nominalnya</label>
            <input type="text" class="form-control @error('nominal') is-invalid @enderror" id="nominal"
                name="nominal" value="{{ old('nominal', $outcome->nominal) }}">
            @error('nominal')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <label for="tanggal_outcome" class="form-label">Kapan Uang Digunakan</label>
            <input type="date" class="form-control @error('tanggal_outcome') is-invalid @enderror"
                id="tanggal_outcome" name="tanggal_outcome"
                value="{{ old('tanggal_outcome', $outcome->tanggal_outcome) }}">
            @error('tanggal_outcome')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <label for="income_id" class="form-label">Pilih Tabungan</label>

            <select name="income_id" id="income_id" class="form-select @error('income_id') is-invalid @enderror">

                <option selected disabled>Pilih Tabungan</option>

                @foreach ($incomes as $income)
                    <option value="{{ $income->id }}">
                        {{ $income->income }} -
                        Rp {{ number_format($income->nominal, 0, ',', '.') }}
                    </option>
                @endforeach

            </select>

            @error('income_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
        <a class="btn btn-danger btn-sm" href="{{ route('outcome.index') }}" role="button">Cancel</a>
    </form>

</x-app>
