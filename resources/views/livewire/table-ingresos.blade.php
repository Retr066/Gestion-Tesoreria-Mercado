<div class="md:flex ">

    <div class=" md:w-auto min-w-full md:min-w-0 ">
        <div class="text-left mx-7 mb-5">
            <button type="button" wire:click="atras()"
                class="bg-gray-700 text-white px-6 py-2 rounded font-medium mx-3 hover:bg-gray-800 transition duration-200 each-in-out">Atras</button>
        </div>
        <label> Ingreso Generado Total {{ number_format($sum_importe, 2) }}</label>

        @livewire('formulario', ['id_reporte' => $id_reporte,'can_submit' => $can_submit])
    </div>



    <div class=" md:w-auto min-w-full md:min-w-0 md:ml-8">
        <h1 class="text-center m-4">Listado de Ingresos</h1>
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <div class="flex bg-white px-4 py-3  sm:px-6">

                            <input wire:model="search" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                type="text" placeholder="Buscar...">
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
                        @if ($ingresos->count())
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
                                            Fecha
                                            <button wire:click="sortable('ingreso_fecha')">
                                                <span
                                                    class="fa fa{{ $camp === 'ingreso_fecha' ? $icon : '-circle' }}"></span>
                                            </button>
                                        </th>

                                        <th scope="col"
                                            class="px-6 py-3  text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Recibo
                                            <button wire:click="sortable('ingreso_codigo')">
                                                <span
                                                    class="fa fa{{ $camp === 'ingreso_codigo' ? $icon : '-circle' }}"></span>
                                            </button>

                                        </th>

                                        <th scope="col"
                                            class="px-6 py-3   text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Concepto
                                            <button wire:click="sortable('ingreso_descripcion')">
                                                <span
                                                    class="fa fa{{ $camp === 'ingreso_descripcion' ? $icon : '-circle' }}"></span>
                                            </button>
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3  text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Tipo Importe
                                            <button wire:click="sortable('tipo_importe')">
                                                <span
                                                    class="fa fa{{ $camp === 'tipo_importe' ? $icon : '-circle' }}"></span>
                                            </button>
                                        </th>

                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Importe
                                            <button wire:click="sortable('ingreso_importe')">
                                                <span
                                                    class="fa fa{{ $camp === 'ingreso_importe' ? $icon : '-circle' }}"></span>
                                            </button>
                                        </th>

                                        <th scope="col" class="relative px-6 py-3">
                                            <span
                                                class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($ingresos as $ingreso)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{ $ingreso->id }}</div>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">
                                                    {{ $ingreso->ingreso_fecha }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{ $ingreso->ingreso_codigo }}
                                                </div>
                                            </td>
                                            <td style="max-width: 15rem;"
                                                class="px-6 py-4 whitespace-normal break-words">
                                                <div class="text-sm text-gray-900">
                                                    {{ $ingreso->ingreso_descripcion }}</div>
                                            </td>
                                            <td style="max-width: 10rem;"
                                                class="px-6 py-4   whitespace-normal break-words">
                                                <div class="text-sm text-gray-900">{{ $ingreso->tipo_importe }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">
                                                    S/.{{ number_format($ingreso->ingreso_importe, 2) }}
                                                </div>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">

                                                <button {{-- onclick="oculta({{ $ingreso->id }})" --}}
                                                    wire:click="editIngreso({{ $ingreso->id }})"
                                                    class="text-yellow-400 hover:text-yellow-700">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                        <path fill-rule="evenodd"
                                                            d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                                <button {{ $can_submit ? '' : 'disabled' }}
                                                    onclick="borrarIngreso({{ $ingreso->id }})"
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
                                {{ $ingresos->links() }}
                            </div>
                        @elseif (!$ingresos->count() && $search == '')
                            <div class="bg-white px-4 py-3  border-t border-gray-200 text-gray-500 sm:px-6">
                                No hay Registro de Ingresos aun
                            </div>
                        @else
                            <div class="bg-white px-4 py-3  border-t border-gray-200 text-gray-500 sm:px-6">
                                No hay resultados para la Busqueda "{{ $search }}" en la pagina
                                {{ $page }}
                                al
                                mostrar "{{ $perPage }}".
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>


    @push('scripts')
        <script>
            function borrarIngreso(ingreso) {
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
                        Livewire.emit('deleteIngresoList', ingreso)

                    }
                })
            }
            Livewire.on('deleteIngreso', (ingreso) => {
                Swal.fire(
                    'Borrado!',
                    `El Ingreso ${ingreso.id} se borro corrrectamente`,
                    'success'
                )
            });
        </script>
    @endpush
