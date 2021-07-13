<x-app-layout>
    <div class="py-1">
        <div class="text-center">
            <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                <span class="block xl:inline">Listado de Meses x año</span>
            </h1>
        </div>
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
