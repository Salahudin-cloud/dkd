<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Laporan Transaksi Donasi</title>
    <!-- CSS Manual -->
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 10px auto;
            margin-top: 90px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
        }

        h1,
        p {
            text-align: center;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        /* CSS for Print */
        @page {
            size: landscape;
            margin: 20mm 10mm;
        }

        .header {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            text-align: center;
            padding: 10px 0;
            font-size: 18px;
            font-weight: bold;
        }

        .signature {
            display: flex;
            justify-content: space-between;
            margin-top: 40px;
        }

        .signature div {
            width: 45%;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Laporan Transaksi Donasi</h1>
        </div>
        <table>
            <thead>
                <tr>
                    <th>NO</th>
                    <th>ID Transaksi</th>
                    <th>Tanggal Donasi</th>
                    <th>Metode Pembayaran</th>
                    <th>Nama Donatur</th>
                    <th>Nama Program</th>
                    <th>Nominal Pembayaran</th>
                    <th>Info Transaksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($transaksi as $data) : ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $data->id_transaksi ?></td>
                        <td><?php echo $data->tanggal_transaksi ?></td>
                        <td><?php echo strtoupper($data->metode_pembayaran) ?></td>
                        <td><?php echo $data->pengguna_nama ?></td>
                        <td><?php echo $data->program_judul ?></td>
                        <td>
                            Rp
                            <?php echo number_format($data->nominal_pembayaran, 0, ',', '.')
                            ?>
                        </td>
                        <td><?php echo $data->info_transaksi ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

        <div class="signature">
            <div>
                <div>
                    <p>Manajer Keuangan</p>
                    <br />
                    <br />
                    <br />
                    <p>( Ika Royani, S.E )</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>