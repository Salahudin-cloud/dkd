<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Transaksi Donasi</title>
    <!-- CSS Manual -->
    <style>
        body {
            font-family: Arial, sans-serif;

        }

        .container {
            max-width: 800px;
            margin: 10px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
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
    </style>
</head>

<body>
    <div class="container">
        <h2>Laporan Transaksi Donasi Tahun
            <?php echo date('Y') ?>
        </h2>

        <table>
            <thead>
                <tr>
                    <th>NO</th>
                    <th>ID Transaksi</th>
                    <th>Tanggal Donasi</th>
                    <th>Metode Pembayaran</th>
                    <th>Nama Donatur</th>
                    <th>Nama Program</th>
                    <th>Nominal</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($transaksi as $data) : ?>

                    <tr>
                        <td>
                            <?php echo $i++; ?>
                        </td>
                        <td>
                            <?php echo $data->id_transaksi ?>
                        </td>
                        <td>
                            <?php echo $data->tanggal_transaksi ?>
                        </td>
                        <td>
                            <?php echo strtoupper($data->metode_pembayaran) ?>
                        </td>
                        <td>
                            <?php echo $data->pengguna_nama ?>
                        </td>
                        <td>
                            <?php echo $data->program_judul ?>
                        </td>
                        <td>Rp
                            <?php echo number_format($data->nominal_pembayaran, 0, ',', '.')  ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

    </div>

</body>

</html>