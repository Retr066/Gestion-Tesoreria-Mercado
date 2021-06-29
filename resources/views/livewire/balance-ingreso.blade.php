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
                                @if ($saldo_anterior !== null)
                                <tr>
                                    <th class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Saldo Anterior</div>
                                    </th>
                                    <th class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">S/.{{ number_format($this->saldo_anterior,2) }}</div>
                                    </th>
                                    @for ($i = 0 ; $i < 12; $i++)
                                    <th class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">S/.{{ number_format(0,2) }}</div>
                                    </th>
                                    @endfor

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">S/.{{ number_format($this->saldo_anterior,2) }}</div>
                                    </td>
                                </tr>
                                @endif
                                @foreach ($this->total as $key => $total)
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

@push('styles')
<style>

.la-ball-spin-clockwise-fade-rotating,
.la-ball-spin-clockwise-fade-rotating > div {
    position: relative;
    -webkit-box-sizing: border-box;
       -moz-box-sizing: border-box;
            box-sizing: border-box;
}
.la-ball-spin-clockwise-fade-rotating {
    display: block;
    font-size: 0;
    color: #fff;
}
.la-ball-spin-clockwise-fade-rotating.la-dark {
    color: #333;
}
.la-ball-spin-clockwise-fade-rotating > div {
    display: inline-block;
    float: none;
    background-color: currentColor;
    border: 0 solid currentColor;
}
.la-ball-spin-clockwise-fade-rotating {
    width: 32px;
    height: 32px;
    -webkit-animation: ball-spin-clockwise-fade-rotating-rotate 6s infinite linear;
       -moz-animation: ball-spin-clockwise-fade-rotating-rotate 6s infinite linear;
         -o-animation: ball-spin-clockwise-fade-rotating-rotate 6s infinite linear;
            animation: ball-spin-clockwise-fade-rotating-rotate 6s infinite linear;
}
.la-ball-spin-clockwise-fade-rotating > div {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 8px;
    height: 8px;
    margin-top: -4px;
    margin-left: -4px;
    border-radius: 100%;
    -webkit-animation: ball-spin-clockwise-fade-rotating 1s infinite linear;
       -moz-animation: ball-spin-clockwise-fade-rotating 1s infinite linear;
         -o-animation: ball-spin-clockwise-fade-rotating 1s infinite linear;
            animation: ball-spin-clockwise-fade-rotating 1s infinite linear;
}
.la-ball-spin-clockwise-fade-rotating > div:nth-child(1) {
    top: 5%;
    left: 50%;
    -webkit-animation-delay: -.875s;
       -moz-animation-delay: -.875s;
         -o-animation-delay: -.875s;
            animation-delay: -.875s;
}
.la-ball-spin-clockwise-fade-rotating > div:nth-child(2) {
    top: 18.1801948466%;
    left: 81.8198051534%;
    -webkit-animation-delay: -.75s;
       -moz-animation-delay: -.75s;
         -o-animation-delay: -.75s;
            animation-delay: -.75s;
}
.la-ball-spin-clockwise-fade-rotating > div:nth-child(3) {
    top: 50%;
    left: 95%;
    -webkit-animation-delay: -.625s;
       -moz-animation-delay: -.625s;
         -o-animation-delay: -.625s;
            animation-delay: -.625s;
}
.la-ball-spin-clockwise-fade-rotating > div:nth-child(4) {
    top: 81.8198051534%;
    left: 81.8198051534%;
    -webkit-animation-delay: -.5s;
       -moz-animation-delay: -.5s;
         -o-animation-delay: -.5s;
            animation-delay: -.5s;
}
.la-ball-spin-clockwise-fade-rotating > div:nth-child(5) {
    top: 94.9999999966%;
    left: 50.0000000005%;
    -webkit-animation-delay: -.375s;
       -moz-animation-delay: -.375s;
         -o-animation-delay: -.375s;
            animation-delay: -.375s;
}
.la-ball-spin-clockwise-fade-rotating > div:nth-child(6) {
    top: 81.8198046966%;
    left: 18.1801949248%;
    -webkit-animation-delay: -.25s;
       -moz-animation-delay: -.25s;
         -o-animation-delay: -.25s;
            animation-delay: -.25s;
}
.la-ball-spin-clockwise-fade-rotating > div:nth-child(7) {
    top: 49.9999750815%;
    left: 5.0000051215%;
    -webkit-animation-delay: -.125s;
       -moz-animation-delay: -.125s;
         -o-animation-delay: -.125s;
            animation-delay: -.125s;
}
.la-ball-spin-clockwise-fade-rotating > div:nth-child(8) {
    top: 18.179464974%;
    left: 18.1803700518%;
    -webkit-animation-delay: 0s;
       -moz-animation-delay: 0s;
         -o-animation-delay: 0s;
            animation-delay: 0s;
}
.la-ball-spin-clockwise-fade-rotating.la-sm {
    width: 16px;
    height: 16px;
}
.la-ball-spin-clockwise-fade-rotating.la-sm > div {
    width: 4px;
    height: 4px;
    margin-top: -2px;
    margin-left: -2px;
}
.la-ball-spin-clockwise-fade-rotating.la-2x {
    width: 64px;
    height: 64px;
}
.la-ball-spin-clockwise-fade-rotating.la-2x > div {
    width: 16px;
    height: 16px;
    margin-top: -8px;
    margin-left: -8px;
}
.la-ball-spin-clockwise-fade-rotating.la-3x {
    width: 96px;
    height: 96px;
}
.la-ball-spin-clockwise-fade-rotating.la-3x > div {
    width: 24px;
    height: 24px;
    margin-top: -12px;
    margin-left: -12px;
}
/*
 * Animations
 */
@-webkit-keyframes ball-spin-clockwise-fade-rotating-rotate {
    100% {
        -webkit-transform: rotate(-360deg);
                transform: rotate(-360deg);
    }
}
@-moz-keyframes ball-spin-clockwise-fade-rotating-rotate {
    100% {
        -moz-transform: rotate(-360deg);
             transform: rotate(-360deg);
    }
}
@-o-keyframes ball-spin-clockwise-fade-rotating-rotate {
    100% {
        -o-transform: rotate(-360deg);
           transform: rotate(-360deg);
    }
}
@keyframes ball-spin-clockwise-fade-rotating-rotate {
    100% {
        -webkit-transform: rotate(-360deg);
           -moz-transform: rotate(-360deg);
             -o-transform: rotate(-360deg);
                transform: rotate(-360deg);
    }
}
@-webkit-keyframes ball-spin-clockwise-fade-rotating {
    50% {
        opacity: .25;
        -webkit-transform: scale(.5);
                transform: scale(.5);
    }
    100% {
        opacity: 1;
        -webkit-transform: scale(1);
                transform: scale(1);
    }
}
@-moz-keyframes ball-spin-clockwise-fade-rotating {
    50% {
        opacity: .25;
        -moz-transform: scale(.5);
             transform: scale(.5);
    }
    100% {
        opacity: 1;
        -moz-transform: scale(1);
             transform: scale(1);
    }
}
@-o-keyframes ball-spin-clockwise-fade-rotating {
    50% {
        opacity: .25;
        -o-transform: scale(.5);
           transform: scale(.5);
    }
    100% {
        opacity: 1;
        -o-transform: scale(1);
           transform: scale(1);
    }
}
@keyframes ball-spin-clockwise-fade-rotating {
    50% {
        opacity: .25;
        -webkit-transform: scale(.5);
           -moz-transform: scale(.5);
             -o-transform: scale(.5);
                transform: scale(.5);
    }
    100% {
        opacity: 1;
        -webkit-transform: scale(1);
           -moz-transform: scale(1);
             -o-transform: scale(1);
                transform: scale(1);
    }
}
    </style>
@endpush

