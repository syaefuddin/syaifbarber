<x-filament::page>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-6">
        {{-- Kartu 1 --}}
        <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow text-center">
            <h3 class="text-sm text-gray-500 dark:text-gray-300">Total Pelanggan Hari Ini</h3>
            <p class="text-xl font-bold text-indigo-600 dark:text-indigo-400">{{ $ordersToday }}</p>
        </div>

        {{-- Kartu 2 (Admin Only) --}}
        @if (auth()->user()->role == 'admin')
            <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow text-center">
                <h3 class="text-sm text-gray-500 dark:text-gray-300">Pendapatan Bulan Ini</h3>
                <p class="text-xl font-bold text-green-600 dark:text-green-400">Rp {{ number_format($incomeThisMonth) }}
                </p>
            </div>

            {{-- Kartu 3 --}}
            <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow text-center">
                <h3 class="text-sm text-gray-500 dark:text-gray-300">Layanan Aktif</h3>
                <p class="text-xl font-bold text-pink-600 dark:text-pink-400">{{ $serviceCount }}</p>
            </div>
        @endif
    </div>

    {{-- Order Terbaru (selalu full width) --}}
    <div class="mt-8 bg-white dark:bg-gray-800 rounded-xl shadow p-4">
        <h3 class="text-lg font-bold mb-4 dark:text-white">Order Terbaru</h3>
        <ul>
            @foreach ($recentOrders as $order)
                <li class="border-b border-gray-200 dark:border-gray-700 py-2 text-sm text-gray-800 dark:text-gray-200">
                    {{ $order->nama_pelanggan }} - Rp {{ number_format($order->total_harga) }}
                    ({{ $order->created_at->diffForHumans() }})
                </li>
            @endforeach
        </ul>
    </div>
</x-filament::page>
