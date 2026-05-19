<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    <div class="card mb-3">
        <div class="card-body">

            <h4>Detail Income</h4>

            <p>From: {{ $income->from }}</p>
            <p>Jenis: {{ $income->income }}</p>
            <p>Nominal: Rp {{ number_format($income->nominal, 0, ',', '.') }}</p>
            <p>Tanggal: {{ $income->tanggal_income }}</p>

        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">

            <h4>Outcome Terkait</h4>

            @forelse ($outcomes as $outcome)
                <li>
                    {{ $outcome->outcome }} -
                    Rp {{ number_format($outcome->nominal, 0, ',', '.') }}
                </li>
            @empty
                <p>Tidak ada outcome</p>
            @endforelse

        </div>
    </div>

    <div class="card">
        <div class="card-body">

            <p>Total Outcome:
                Rp {{ number_format($totalOutcome, 0, ',', '.') }}
            </p>

            <p>Sisa Saldo:
                Rp {{ number_format($sisa, 0, ',', '.') }}
            </p>

        </div>
    </div>

</x-app>
