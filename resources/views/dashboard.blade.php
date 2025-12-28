<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">


        <!-- OVDE dodaj Livewire CRUD komponentu -->
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 p-4">
            @livewire('product-crud')
        </div>
    </div>
</x-layouts.app>
