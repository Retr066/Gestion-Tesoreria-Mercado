<div>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <div class="flex bg-white px-4 py-3  sm:px-6">
                        {{-- <button wire:click="$emit('abrirModal')"
                            class="form-input rounded-md shadow  px-3 py-1 mt-1 mr-6 block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-600 " fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V8z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button> --}}
                        <input wire:model="search" class="form-input rounded-md shadow-sm mt-1 block w-full" type="text"
                            placeholder="Buscar...">
                        <div class="form-input rounded-md shadow-sm mt-1 ml-6 block ">
                            <select wire:model="reportes_estado" class="ouline-none text-gray-500 text-sm">
                                <option value="">Seleccione</option>
                                <option value="Generado">Generado</option>
                                <option value="Proceso">Proceso</option>
                            </select>
                        </div>
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
                                        @if ($reporte->estado == 'Generado')
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span
                                                    class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">{{ $reporte->estado }}</span>
                                            </td>
                                        @elseif($reporte->estado == 'Proceso')
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span
                                                    class="bg-yellow-200 text-yellow-600 py-1 px-3 rounded-full text-xs">{{ $reporte->estado }}</span>
                                            </td>
                                        @elseif ($reporte->estado == 'Terminado')
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span
                                                    class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">{{ $reporte->estado }}</span>
                                            </td>
                                        @endif
                                        <td class="flex px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                            @if ($reporte->estado == 'Generado' || $reporte->estado == 'Proceso')


                                                <a class="text-green-600  hover:text-green-900 whitespace-nowrap"
                                                    href="{{ route('ingresos', $reporte->id) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </a>
                                                <a class="text-gray-600  hover:text-gray-900 whitespace-nowrap"
                                                    href="{{ route('pdf', $reporte->id) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </a>
                                                <a class="text-red-600  hover:text-red-900"
                                                    href="{{ route('egresos', $reporte->id) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </a>
                                                <a class="text-gray-600  hover:text-gray-900 whitespace-nowrap"
                                                    href="{{ route('pdfEgreso', $reporte->id) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </a>
                                                {{-- <button wire:click="$emit('editReporte',{{ $reporte }})"
                                                    class="text-yellow-400 hover:text-yellow-700">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                        <path fill-rule="evenodd"
                                                            d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button> --}}

                                                <button onclick="terminarReporte({{ $reporte->id }})"
                                                    class="text-blue-400 hover:text-blue-700">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>

                                                {{-- <button onclick="borrarReporte({{ $reporte->id }})"
                                                class="text-red-400 hover:text-red-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button> --}}

                                            @else

                                                <button class="text-green-600  hover:text-green-900 whitespace-nowrap"
                                                    wire:click="$emitTo('table-reportes','listIngreso',{{ $reporte->id }})">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                                <a class="text-gray-600  hover:text-gray-900 whitespace-nowrap"
                                                    href="{{ route('pdf', $reporte->id) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </a>
                                                <button class="text-red-600  hover:text-red-900"
                                                    wire:click="$emitTo('table-reportes','listEgreso',{{ $reporte->id }})">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                                <a class="text-gray-600  hover:text-gray-900 whitespace-nowrap"
                                                    href="{{ route('pdfEgreso', $reporte->id) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </a>

                                            @endif
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
                            No hay Registro de Reportes aun
                        </div>
                    @else
                        <div class="bg-white px-4 py-3  border-t border-gray-200 text-gray-500 sm:px-6">
                            No hay resultados para la Busqueda "{{ $search }}" en la pagina {{ $page }}
                            al
                            mostrar "{{ $perPage }}" por Pagina con el Estado de "{{ $reportes_estado }}".
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
                    title: 'Estas Seguro?',
                    text: "No habra Vuelta Atras!",
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

            function terminarReporte(reporte) {
                Swal.fire({
                    title: 'Estas Seguro de Terminar?',
                    text: `El mes ${reporte} se terminara y no se podras hacer cambios!`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, Terminar!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emit('terminarReporteList', reporte)

                    }
                })
            }

            Livewire.on('terminarReporte', (reporte) => {
                Swal.fire(
                    'Terminado!',
                    `El mes ${reporte} a concluido corrrectamente`,
                    'success'
                )
            });
        </script>
    @endpush
