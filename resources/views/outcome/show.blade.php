<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    <div class="card">
        <div class="card-body">

            <h4>Detail Outcome</h4>
            <p>Jenis: {{ $outcome->outcome }}</p>
            <p>Didapatkan dari : {{ $outcome->from }}</p>
            <p>Nominal:
                Rp {{ number_format($outcome->nominal, 0, ',', '.') }}
            </p>
            <p>Tanggal: {{ $outcome->tanggal_outcome }}</p>
            <hr>

            <p>
                Tabungan Asal:
                {{ $outcome->income->from }}
            </p>

            <p>
                Nominal Tabungan:
                Rp {{ number_format($outcome->income->nominal, 0, ',', '.') }}
            </p>

        </div>
    </div>

</x-app>
