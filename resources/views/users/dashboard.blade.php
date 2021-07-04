<x-app-layout>
    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @role('Trabajador|Jefe')
                <livewire:fitro-graficos>
                    <livewire:graficos>
                @endrole
            </div>
        </div>
    </div>

</x-app-layout>
