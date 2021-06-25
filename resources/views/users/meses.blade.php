<x-app-layout>
    <div class="py-1">
        <h1 class="text-center m-4">Listado de Meses por año</h1>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </div>
    @push('modals')
        <livewire:reporte-modal>

        @endpush
</x-app-layout>
