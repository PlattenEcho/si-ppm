<div>
    <select wire:model.live="selectedMonth">
        @for ($i = 1; $i <= 12; $i++)
            <option value="{{ $i }}">{{ date('F', mktime(0, 0, 0, $i, 1)) }}</option>
        @endfor
    </select>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Informasi Bulan{{$month}}</h5>
            <p class="card-text">Pendapatan: ${{ $info['revenue'] }}</p>
            <p class="card-text">Pengeluaran: ${{ $info['expenses'] }}</p>
            <p class="card-text">Keuntungan: ${{ $info['profit'] }}</p>
        </div>
    </div>
</div>
