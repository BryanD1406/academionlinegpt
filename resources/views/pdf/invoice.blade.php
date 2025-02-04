<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BOLETA DE VENTA ELECTRONICA</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      font-size: 12px;
      margin: 0;
      padding: 50px;
    }

    .header {
      text-align: center;
      margin-bottom: 20px;
    }

    .header img {
      height: 50px;
    }

    .details,
    .items {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }

    .details th,
    .details td,
    .items th,
    .items td {
      border: 1px solid #ccc;
      padding: 5px;
      text-align: left;
    }

    .items th {
      background-color: #f2f2f2;
    }

    .footer {
      text-align: center;
      margin-top: 30px;
    }

    .container {
      display: grid;
      grid-template-columns: 1fr 1fr;
      grid-gap: 20px
    }

    .title {
      text-align: center;
      border: 2px solid #ccc;
      height: 214px;
      border-radius: 10px;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="header">
      <img src="{{ public_path('img/Logo.jpg') }}" alt="Logo de la Empresa"
        style="width: 300px; height: 100px; object-fit: content;">
      <div style="border: 2px solid #ccc; padding: 10px;  border-radius: 10px;">
        <h1 style="font-size: 15px;">g&m rubi contratistas generales srl </h1>
        <p style="text-align: start; font-weight: bold">Dirección: <span style="font-weight: normal"> CALLE SAN
            JUAN 318
            HUANCAYO</span></p>
        <P style="text-align: start; font-weight: bold">Celular: <span style="font-weight: normal">+51 964 755
            083</span></P>
      </div>
    </div>
    <div class="title">
      <h1>BOLETA DE VENTA </h1>
      <h2>ELECTRONICA</h2>
      <p>R.U.C: 20486841495</p>
      <p style="font-size:30px">{{ $data_invoce['codigo_boleta'] }}</p>
    </div>

  </div>
  <table class="details">
    <tr>
      <th>Razon Social</th>
      <td>{{ $data_invoce['user_social'] }}</td>
    </tr>
    {{-- <tr>
            <th>Dirección</th>
            <td>{{ $data_invoce['user_address'] }}</td>
        </tr> --}}
    <tr>
      <th>Fecha de emision</th>
      <td>{{ $data_invoce['date']->format('d/m/Y') }}</td>
    </tr>
    <tr>
      <th>Tipo Moneda</th>
      <td>DÓLARES AMERICANOS</td>
    </tr>
  </table>
  <table class="items">
    <thead>
      <tr>
        <th>Codigo</th>
        <th>Descripción</th>
        <th>Cantidad</th>
        <th>TOTAL VENTA</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{ $data_invoce['course_id'] }}</td>
        <td>{{ $data_invoce['course_description'] }}</td>
        <td>{{ $data_invoce['amount'] }}</td>
        <td>{{ number_format($data_invoce['venta_total'], 2) }}</td>
      </tr>
    </tbody>
  </table>
  <div class="footer">
    <p>Gracias por tu compra. Conserva este documento como comprobante.</p>
  </div>
</body>

</html>
