<x-app-layout>
    <div class="py-1">
        <div class="text-center">
            <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                <span class="block xl:inline">Modulo Finanzas</span>
            </h1>
        </div>
        <div class="max-w-7xl mx-auto text-center sm:px-6 lg:px-8">
            <livewire:table-lote />
        </div>
    </div>
    @push('modals')
        <livewire:lote-modal />
        <livewire:lote-delete-modal />
    @endpush
</x-app-layout>
