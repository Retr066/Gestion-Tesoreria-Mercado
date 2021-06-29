<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body {
            background-color: #ffffff;
            font-family: Arial;
            font-size: 10px;
            box-sizing: border-box;
        }

        #main-container {
            margin: 150px auto;
            width: 600px;
        }

        table {
            background-color: white;
            text-align: left;
            border-collapse: collapse;
            width: 100%;

        }

        th,
        td {
            border: 1px solid #000;
            border-collapse: collapse;
            text-align: center;
            padding: 2px;
        }

        thead {
            background-color: #ffffff;
            color: rgb(0, 0, 0);
            display: table-header-group;
            text-align: left;

        }

        tr:nth-child(even) {
            background-color: rgb(255, 255, 255);
        }

        tr:hover td {
            background-color: #ffffff;
            color: white;
        }

        .izquierda {
            text-align: left;
            width: 64%;
        }

        h2 {
            text-align: center;
        }

        .border-titulo {
            display: block;
            text-align: center;
            width: 50%;
            border: 2px solid #000;
            margin-left: 25%;
            margin-right: 25%;
            margin-bottom: 1rem;
        }

    </style>
    <title>balance</title>
</head>

<body>
    <H2> ASOCIACION LAS LOMAS DE PACHACAMAC {{ $año }}</H2>
    <div class="border-titulo">
        <b>INGRESOS</b>
    </div>
    <table>
        <thead>
            <tr>
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Meses
                </th>
                @foreach ($tipos as $tipo)
                    @if ($tipo !== 'Ninguno')
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            {{ $tipo }}
                        </th>
                    @endif
                @endforeach
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Totales
                </th>
            </tr>
        </thead>
        <tbody>
            @if ($saldo_anterior !== null && $año_atras !== null)
            <tr>
                <th class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">Saldo {{ $año_atras }}</div>
                </th>
                <th class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">S/.{{ number_format($saldo_anterior,2) }}</div>
                </th>
                @for ($i = 0 ; $i < 12; $i++)
                <th class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">S/.{{ number_format(0,2) }}</div>
                </th>
                @endfor

                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">S/.{{ number_format($saldo_anterior,2) }}</div>
                </td>
            </tr>
            @endif
            @foreach ($total as $key => $total)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $key }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div id="sum" class="text-sm text-gray-900 suma">
                                                S/.{{ number_format($total['Aportacion /Guard. /InsCrip /Cuota Asamblea.'], 2) }}
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">
                                                S/.{{ number_format($total['Pago de Multas y Faenas.'], 2) }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900 ">
                                                S/.{{ number_format($total['Cancelacion de Deudas.'], 2) }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">
                                                S/.{{ number_format($total['Aportacion Atrazadas Alquiler'], 2) }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">
                                                S/.{{ number_format($total['Aportacion Atrazadas Guard.'], 2) }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">
                                                S/.{{ number_format($total['Alumbrado Interno'], 2) }}</div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">
                                                S/.{{ number_format($total['Alquiler'], 2) }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">
                                                S/.{{ number_format($total['Ambulante'], 2) }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">
                                                S/.{{ number_format($total['Consumo de Agua'], 2) }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">
                                                S/.{{ number_format($total['SS.HH Limpieza Publica'], 2) }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">
                                                S/.{{ number_format($total['Pago por Autovaluo'], 2) }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">
                                                S/.{{ number_format($total['Aportacion por Actividad y Donaciones'], 2) }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">
                                                S/.{{ number_format($total['Nuevos Socios Ingresos Varios'], 2) }}
                                            </div>
                                        </td>
                                        <th class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-500">
                                                S/.{{ number_format(array_sum($total), 2) }}</div>
                                        </th>
                                    </tr>

                                @endforeach
                                <tr>

                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Totales
                                    </th>
                                    @foreach ($total_final as $total_fi)

                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            S/.{{ number_format($total_fi, 2) }}
                                        </th>

                                    @endforeach
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        S/.{{ number_format(array_sum($total_final), 2) }}
                                    </th>
                                </tr>
             </tbody>
            </table>
            <br>
            <div class="border-titulo">
                <b>EGRESOS</b>
            </div>
            <table>
                <thead>
                    <tr>
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Meses
                </th>
                @foreach ($tiposE as $tipo)
                    @if ($tipo !== 'Ninguno')
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            {{ $tipo }}
                        </th>
                    @endif
                @endforeach
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Totales
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($totalE as $key => $total)
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
                <th class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-500">
                        S/.{{ number_format(array_sum($total), 2) }}</div>
                </th>
            </tr>

        @endforeach
        <tr>
            <th scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Totales
            </th>
            @foreach ($total_finalE as $total_final)
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    S/.{{ number_format($total_final, 2) }}
                </th>
            @endforeach
            <th scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                S/.{{ number_format(array_sum($total_finalE), 2) }}
            </th>
        </tr>
        @if ($saldo !== null)
        <tr >
            <th style="border: none;" colspan="12">

            </th>
            <th colspan="2">
                SALDO {{ $año }}
            </th>
            <th scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                S/.{{ number_format($saldo, 2) }}
            </th>
        </tr>
        @endif

        </tbody>
    </table>
</body>


</html>
