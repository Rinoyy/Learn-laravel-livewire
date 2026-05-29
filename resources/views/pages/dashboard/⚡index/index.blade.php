<div>
    <x-ui.page-header title="Dashboard" />

    <div class="grid gap-6 xl:grid-cols-[minmax(0,22rem)_1fr]">
        <x-ui.card>
            <div class="flex items-start justify-between gap-4">
                <div class="flex items-center gap-3">
                    <div class="bg-blue-50 p-3">
                        <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-neutral-500">E-Meterai Saldo</p>
                        <p class="text-3xl font-bold tabular-nums text-neutral-900">
                            {{ number_format($saldo) }}
                        </p>
                    </div>
                </div>
                <button type="button"
                        aria-label="Perbarui saldo e-Meterai"
                        class="mt-1 cursor-pointer text-neutral-400 transition-colors hover:text-blue-600">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                    </svg>
                </button>
            </div>

            <div class="mt-3 flex items-center gap-2 border-t border-neutral-100 pt-3">
                <x-ui.badge type="success">Aktif</x-ui.badge>
                <span class="text-xs text-neutral-500">- {{ number_format($notstamp) }} belum dicap</span>
                <span class="ml-auto text-xs text-neutral-400">{{ $fetchedAt }}</span>
            </div>
        </x-ui.card>

        <div class="grid gap-4 md:grid-cols-3">
            @foreach ($stats as $stat)
                <div class="corporate-panel p-5">
                    <div class="flex items-center justify-between gap-3">
                        <p class="text-sm font-semibold text-neutral-900">{{ $stat['label'] }}</p>
                        <x-ui.badge :type="$stat['type']">{{ $stat['hint'] }}</x-ui.badge>
                    </div>
                    <p class="mt-5 text-3xl font-bold tabular-nums text-neutral-900">{{ $stat['value'] }}</p>
                    <div class="mt-4 h-1 bg-neutral-100">
                        <div class="h-1 w-2/3 bg-gradient-to-r from-blue-700 via-blue-600 to-sky-500"></div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="mt-6 corporate-panel overflow-hidden">
        <div class="flex flex-col gap-3 border-b border-neutral-200 bg-white px-5 py-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-semibold text-neutral-900">Aktivitas terbaru</p>
                <p class="mt-1 text-sm text-neutral-500">Contoh tampilan dashboard tanpa integrasi backend.</p>
            </div>
            <x-ui.badge type="processing">Preview</x-ui.badge>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="dashboard-table-head-row">
                        <th class="dashboard-table-head-cell">Batch</th>
                        <th class="dashboard-table-head-cell">Status</th>
                        <th class="dashboard-table-head-cell">Serial Number</th>
                        <th class="dashboard-table-head-cell">Update</th>
                        <th class="dashboard-table-head-cell text-right">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ([
                        ['batch' => 'BCH-2026-0529-001', 'status' => 'completed', 'serial' => '8.240', 'time' => '29 May 2026, 09:42'],
                        ['batch' => 'BCH-2026-0529-002', 'status' => 'processing', 'serial' => '3.120', 'time' => '29 May 2026, 10:18'],
                        ['batch' => 'BCH-2026-0528-014', 'status' => 'pending', 'serial' => '940', 'time' => '28 May 2026, 16:03'],
                    ] as $row)
                        <tr class="dashboard-table-row">
                            <td class="dashboard-table-cell font-medium text-neutral-800">{{ $row['batch'] }}</td>
                            <td class="dashboard-table-cell">
                                <x-ui.badge :type="$row['status']">{{ $row['status'] }}</x-ui.badge>
                            </td>
                            <td class="dashboard-table-cell">{{ $row['serial'] }}</td>
                            <td class="dashboard-table-cell-muted">{{ $row['time'] }}</td>
                            <td class="dashboard-table-cell text-right">
                                <button type="button" class="btn-table-view">View</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
