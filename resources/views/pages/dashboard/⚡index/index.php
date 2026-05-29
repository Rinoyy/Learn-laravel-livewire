<?php

use Livewire\Attributes\Layout;

new #[Layout('layouts.app', ['title' => 'Dashboard'])] class extends Livewire\Component {
    public int $saldo = 125000;
    public int $notstamp = 240;
    public string $fetchedAt = '';

    public array $stats = [
        [
            'label' => 'Serial Number',
            'value' => '18.420',
            'hint' => 'Total tersedia',
            'type' => 'processing',
        ],
        [
            'label' => 'Batch Aktif',
            'value' => '32',
            'hint' => 'Siap diproses',
            'type' => 'success',
        ],
        [
            'label' => 'Perlu Review',
            'value' => '7',
            'hint' => 'Antrian hari ini',
            'type' => 'pending',
        ],
    ];

    public function mount(): void
    {
        $this->fetchedAt = now()->format('d M Y, H:i:s');
    }
};
