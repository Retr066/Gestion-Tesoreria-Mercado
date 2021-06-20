<div>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <div class="flex bg-white px-4 py-3  sm:px-6">
                        <input wire:model="search" class="form-input rounded-md shadow-sm mt-1 block w-full" type="text"
                            placeholder="Buscar...">

                        <div class="form-input rounded-md shadow-sm mt-1 ml-6 block ">
                            <select wire:model="perPage" class="ouline-none text-gray-500 text-sm">
                                <option value="5">5 por Pagina</option>
                                <option value="10">10 por Pagina</option>
                                <option value="15">15 por Pagina</option>
                                <option value="50">50 por Pagina</option>
                                <option value="100">100 por Pagina</option>
                            </select>
                        </div>
                        @if ($search !== '')
                            <button wire:click="clear" class="form-input rounded-md shadow px-3 mt-1 ml-6 block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M6.707 4.879A3 3 0 018.828 4H15a3 3 0 013 3v6a3 3 0 01-3 3H8.828a3 3 0 01-2.12-.879l-4.415-4.414a1 1 0 010-1.414l4.414-4.414zm4 2.414a1 1 0 00-1.414 1.414L10.586 10l-1.293 1.293a1 1 0 101.414 1.414L12 11.414l1.293 1.293a1 1 0 001.414-1.414L13.414 10l1.293-1.293a1 1 0 00-1.414-1.414L12 8.586l-1.293-1.293z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        @endif
                    </div>
                    @if ($reportes->count())
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ID
                                        <button wire:click="sortable('id')">
                                            <span class="fa fa{{ $camp === 'id' ? $icon : '-circle' }}"></span>
                                        </button>
                                    </th>
                                    <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Desarrollado por

                                </th>
                                    {{-- <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Descripcion
                                        <button wire:click="sortable('description')">
                                            <span
                                                class="fa fa{{ $camp === 'description' ? $icon : '-circle' }}"></span>
                                        </button>
                                    </th> --}}

                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Mes
                                        <button wire:click="sortable('mes')">
                                            <span class="fa fa{{ $camp === 'mes' ? $icon : '-circle' }}"></span>
                                        </button>

                                    </th>

                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Ingreso Total
                                        <button wire:click="sortable('ingreso_importe_total')">
                                            <span
                                                class="fa fa{{ $camp === 'ingreso_importe_total' ? $icon : '-circle' }}"></span>
                                        </button>
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Egreso Total
                                        <button wire:click="sortable('egreso_importe_total')">
                                            <span
                                                class="fa fa{{ $camp === 'egreso_importe_total' ? $icon : '-circle' }}"></span>
                                        </button>
                                    </th>

                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Utilidad
                                        <button wire:click="sortable('liquidez')">
                                            <span class="fa fa{{ $camp === 'liquidez' ? $icon : '-circle' }}"></span>
                                        </button>
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Estado
                                        <button wire:click="sortable('estado')">
                                            <span class="fa fa{{ $camp === 'estado' ? $icon : '-circle' }}"></span>
                                        </button>
                                    </th>

                                    <th scope="col" class="relative px-6 py-3">
                                        <span
                                            class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($reportes as $reporte)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $reporte->id }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $reporte->r_user->name }} {{ $reporte->r_user->lastname }}</div>
                                        </td>
                                        {{-- <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $reporte->description }}</div>
                                        </td> --}}
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $reporte->mes }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">
                                                S/.{{ number_format($reporte->ingreso_importe_total, 2) }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">
                                                S/.{{ number_format($reporte->egreso_importe_total, 2) }}</div>
                                        </td>
                                        @if ($reporte->liquidez > 0)
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-green-600  hover:text-green-900 ">
                                                    S/.{{ number_format($reporte->liquidez, 2) }}</div>
                                            </td>
                                        @else
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class=" text-sm text-red-600 hover:text-red-900' ">
                                                    S/.{{ number_format($reporte->liquidez, 2) }}</div>
                                            </td>
                                        @endif
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $reporte->estado }}</div>
                                        </td>

                                        <td class="flex px-6 py-4 whitespace-nowrap text-center text-sm font-medium">


                                            <a class="text-green-600  hover:text-green-900 whitespace-nowrap"
                                                href="{{ route('pdf', $reporte->id) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </a>

                                            <a class="text-red-600  hover:text-red-900 whitespace-nowrap"
                                                href="{{ route('pdfEgreso', $reporte->id) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </a>


                                            <button onclick="borrarReporte({{ $reporte->id }})"
                                                class="text-red-400 hover:text-red-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>

                                @endforeach
                                <!-- More people... -->
                            </tbody>
                        </table>
                        <div class="bg-white px-4 py-3  border-t border-gray-200 sm:px-6">
                            {{ $reportes->links() }}
                        </div>
                    @elseif (!$reportes->count() && $search == '')
                        <div class="bg-white px-4 py-3  border-t border-gray-200 text-gray-500 sm:px-6">
                            No hay Registro de Reportes Terminados aun
                        </div>
                    @else
                        <div class="bg-white px-4 py-3  border-t border-gray-200 text-gray-500 sm:px-6">
                            No hay resultados para la Busqueda "{{ $search }}" en la pagina {{ $page }}
                            al
                            mostrar "{{ $perPage }}" por Pagina .
                        </div>
                    @endif

                </div>
            </div>
        </div>

    </div>
    @push('scripts')
        <script>
            function borrarReporte(reporte) {
                Swal.fire({
                    title: 'Estas Seguro de Eliminar?',
                    text: `No habra Vuelta Atras!
                                                Se eliminara el reporte ${reporte}`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, Borralo!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emit('deleteReporteList', reporte)

                    }
                })
            }
            Livewire.on('destroyReporte', (reporte) => {
                Swal.fire(
                    'Borrado!',
                    `El Reporte ${reporte.id} se borro corrrectamente`,
                    'success'
                )
            });

        </script>
    @endpush
