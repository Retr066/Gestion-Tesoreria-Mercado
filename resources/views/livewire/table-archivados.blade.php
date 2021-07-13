<div>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block max-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <div class="flex bg-white px-4 py-3  sm:px-6">

                        <button wire:click="sortable('id')"
                            class="form-input rounded-md shadow  px-3 py-1 mt-1 mr-6 block">
                            <span class="fa fa{{ $camp === 'id' ? $icon : '-circle' }}"></span>
                        </button>
                        <input wire:model="search" class="form-input rounded-md shadow-sm mt-1 block w-full" type="text"
                            placeholder="Buscar...">
                        <div class="form-input rounded-md shadow-sm mt-1 ml-6 block ">
                            <select wire:model="lotes_estado" class="ouline-none text-gray-500 text-sm">
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
                    @if ($lotes->count())
                        @foreach ($lotes as $lote)


                            <div class="lg:flex shadow rounded-lg border  border-gray-400 m-2 mx-5">
                                <div class="bg-blue-600 rounded-lg lg:w-2/12 py-4 block h-full shadow-inner">
                                    <div class="text-center tracking-wide">
                                        <div class="text-white font-bold text-4xl ">{{ $lote->año }}</div>
                                        <div class="text-white font-normal text-2xl">Año</div>
                                    </div>
                                </div>
                                <div
                                    class="w-full  lg:w-11/12 xl:w-full px-1 bg-white py-5 lg:px-2 lg:py-2 tracking-wide">
                                    <div class="flex flex-row lg:justify-start justify-center">
                                        <div class="text-gray-700 font-medium text-sm text-center lg:text-left px-2">
                                            <i class="far fa-clock"></i> {{ $lote->created_at }} PM
                                        </div>
                                        <div class="text-gray-700 font-medium text-sm text-center lg:text-left px-2">
                                            Creado por : {{ $lote->r_user->name }} {{ $lote->r_user->lastname }}
                                        </div>
                                    </div>
                                    <div class="font-semibold text-gray-800 text-xl text-center lg:text-left px-2">
                                        Asociacion las Lomas de Pachacamac
                                    </div>

                                    <div class="text-gray-600 font-medium text-sm pt-1 text-center lg:text-left px-2">
                                        No:{{ $lote->id }} -- Estado
                                        <span
                                            class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">{{ $lote->estado }}</span>
                                        @if ($lote->saldo !== null)
                                            @if ($lote->saldo > 0)
                                                Saldo {{ $lote->año }} :<span
                                                    class=" text-sm text-green-600 hover:text-green-900 ">
                                                    S/.{{ number_format($lote->saldo, 2) }}</span>
                                            @else
                                                Saldo {{ $lote->año }} :<span
                                                    class=" text-sm text-red-600 hover:text-red-900 ">
                                                    S/.{{ number_format($lote->saldo, 2) }}</span>
                                            @endif
                                        @endif

                                    </div>
                                    <div class="text-gray-600 font-medium text-sm pt-1 text-center lg:text-left px-2">
                                        @if ($lote->saldo_semestre !== null)
                                            @if ($lote->saldo_semestre > 0)
                                                Saldo Julio {{ $lote->año }}:<span
                                                    class=" text-sm text-green-600 hover:text-green-900 ">
                                                    S/.{{ number_format($lote->saldo_semestre, 2) }}</span>
                                            @else
                                                Saldo Julio {{ $lote->año }}:<span
                                                    class=" text-sm text-red-600 hover:text-red-900 ">
                                                    S/.{{ number_format($lote->saldo_semestre, 2) }}</span>
                                            @endif
                                        @endif
                                        @if ($lote->saldo_segundo_semestre !== null)
                                            @if ($lote->saldo_segundo_semestre > 0)
                                                Saldo Diciembre {{ $lote->año }}:<span
                                                    class=" text-sm text-green-600 hover:text-green-900 ">
                                                    S/.{{ number_format($lote->saldo_segundo_semestre, 2) }}</span>
                                            @else
                                                Saldo Diciembre {{ $lote->año }}:<span
                                                    class=" text-sm text-red-600 hover:text-red-900 ">
                                                    S/.{{ number_format($lote->saldo_segundo_semestre, 2) }}</span>
                                            @endif
                                        @endif

                                    </div>

                                </div>
                                <div
                                    class="flex flex-row items-center w-full lg:w-1/3 bg-white lg:justify-end justify-center px-2 py-4 lg:px-0">
                                    <span
                                        class="flex items-center tracking-wider text-gray-600 bg-gray-200 px-2 text-sm rounded leading-loose mx-2 font-semibold">

                                    </span>
                                    <span
                                        class="flex items-center tracking-wider text-gray-600 bg-gray-200 px-2 text-sm rounded leading-loose mx-2 font-semibold">
                                        Detalles
                                        <button wire:click="$emit('Detalles',{{ $lote->id }})"
                                            class="flex mx-1 text-indigo-400 hover:text-indigo-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                <path fill-rule="evenodd"
                                                    d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                    clip-rule="evenodd" />
                                            </svg>

                                        </button>
                                    </span>
                                </div>
                            </div>
                        @endforeach

                        <!-- More people... -->


                        <div class="bg-white px-4 py-3  border-t border-gray-200 sm:px-6">
                            {{ $lotes->links() }}
                        </div>
                    @elseif (!$lotes->count() && $search == '')
                        <div class="bg-white px-4 py-3  border-t border-gray-200 text-gray-500 sm:px-6">
                            No hay Registro de Años Terminados aun
                        </div>
                    @else
                        <div class="bg-white px-4 py-3  border-t border-gray-200 text-gray-500 sm:px-6">
                            No hay resultados para la Busqueda "{{ $search }}" en la pagina {{ $page }}
                            al
                            mostrar "{{ $perPage }}" por Pagina con el Estado de "{{ $lotes_estado }}".
                        </div>
                    @endif

                </div>
            </div>
        </div>

    </div>
    @push('scripts')
        <script>

        </script>
    @endpush
