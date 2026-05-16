<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    <form method="POST" action="{{ route('income.store') }}">
        @csrf

        <div class="mb-3">
            <label for="income" class="form-label">Uang yang masuk</label>
            <input type="string" class="form-control @error('income') is-invalid @enderror" id="income" name="income">
            @error('income')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <label for="from" class="form-label">Uangnya Dari Mana</label>
            <input type="string" class="form-control @error('from') is-invalid @enderror" id="from"
                name="from">
            @error('from')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <label for="nominal" class="form-label">Berapa Nominalnya</label>
            <input type="text" class="form-control @error('nominal') is-invalid @enderror" id="nominal"
                name="nominal">
            @error('nominal')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <label for="tanggal_income" class="form-label">Kapan Uangnya Masuk</label>
            <input type="date" class="form-control @error('tanggal_income') is-invalid @enderror" id="tanggal_income"
                name="tanggal_income">
            @error('tanggal_income')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
        <a class="btn btn-danger btn-sm" href="{{ route('income.index') }}" role="button">Cancel</a>
    </form>

</x-app>
