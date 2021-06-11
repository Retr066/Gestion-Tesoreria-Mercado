<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-3">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <livewire:table-reportes />
            </div>
        </div>
    </div>
    @push('modals')
        <livewire:reporte-modal>
        @endpush
</x-app-layout>
