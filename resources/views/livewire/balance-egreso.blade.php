<div class="max-w-10/12 mx-auto text-center sm:px-6 lg:px-8">
    <div wire:loading>
        <div style="display: flex; justify-content:center; align-items:center; background-color:black;
            position:fixed; top:0px; left:0px; z-index: 9999; width:100%; height:100%; opacity:.75;">
    <div style="color: #9988cd" class="la-ball-spin-clockwise-fade-rotating la-3x">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
        </div>
</div>

     <div class="flex flex-col  ">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <div class="flex bg-white px-4 py-3  sm:px-6">
                        <table class="min-w-full divide-y divide-gray-200">

                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Meses
                                    </th>
                                    @foreach ($tipos as $tipo)
                                        @if ($tipo->Descripcion !== 'Ninguno')
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                {{ $tipo->Descripcion }}
                                            </th>
                                        @endif
                                    @endforeach
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Totales
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">

                                @foreach ($this->total as $key => $total)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $key }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div id="sum" class="text-sm text-gray-900 suma">
                                                S/.{{ number_format($total['Directiva Pagos de Socios'], 2) }}
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">
                                                S/.{{ number_format($total['Fondo de Salud'], 2) }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900 ">
                                                S/.{{ number_format($total['Tributo'], 2) }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">
                                                S/.{{ number_format($total['Honorarios Guardiania Baño Cobranza'], 2) }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">
                                                S/.{{ number_format($total['Servicios Publicos'], 2) }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">
                                                S/.{{ number_format($total['Articulos de Ferreteria'], 2) }}</div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">
                                                S/.{{ number_format($total['Articulos de Aseo y Proteccion Personal'], 2) }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">
                                                S/.{{ number_format($total['Articulos de Oficina'], 2) }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">
                                                S/.{{ number_format($total['Servic. de Impresion y Copias'], 2) }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">
                                                S/.{{ number_format($total['Gatos Notariable S/pago de Autovalu'], 2) }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">
                                                S/.{{ number_format($total['Servicios Profesionales'], 2) }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">
                                                S/.{{ number_format($total['Gastos Varios'], 2) }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">
                                                S/.{{ number_format($total['Mant. Y Reparacion'], 2) }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-500">
                                                S/.{{ number_format(array_sum($total), 2) }}</div>
                                        </td>
                                    </tr>

                                @endforeach
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Totales
                                    </th>
                                    @foreach ($this->total_final as $total_final)
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            S/.{{ number_format($total_final, 2) }}
                                        </th>
                                    @endforeach
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        S/.{{ number_format(array_sum($this->total_final), 2) }}
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
