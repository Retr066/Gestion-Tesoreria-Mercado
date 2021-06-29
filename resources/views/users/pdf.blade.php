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
            font-size: 13px;
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

        h1 {
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
    <title>Ingresos</title>
</head>

<body>
    <H1> Movimiento Económico del Mes de {{ $reporte->mes }} {{ $date }}</H1>
    <div class="border-titulo"><b>INGRESOS</b></div>
    <div id="#main-container">
        <table>
            <thead>
                <tr>
                    <th scope="col">FECHA</th>
                    <th scope="col">RECIBO</th>
                    <th scope="col">CONCEPTO</th>
                    <th scope="col">IMPORTE</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ingresos as $ingreso)
                    <tr>
                        <th scope="row">{{ \Carbon\Carbon::parse($ingreso->ingreso_fecha)->format('d/m/Y') }}</th>
                        <td>{{ $ingreso->ingreso_codigo }}</td>
                        <td class="izquierda">{{ $ingreso->ingreso_descripcion }}</td>
                        <td>S/.{{ number_format($ingreso->ingreso_importe, 2) }}</td>
                    </tr>
                @endforeach
                <tr>
                    <th scope="row"> </th>
                    <td> </td>
                    <td><b>TOTAL</b></td>
                    <td style="border:2px solid #000">
                        <b>S/.{{ number_format($reporte->ingreso_importe_total, 2) }}</b>
                    </td>
                </tr>
            </tbody>
        </table>
        <br>
        <label>Total, de Recibos: <b>{{ $ingresos->count() }}.</b></label>
    </div>
</body>

</html>
