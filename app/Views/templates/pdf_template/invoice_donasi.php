<?php
$date = new DateTime($tanggal_transaksi);
$format = $date->format('d F Y');
$format_2 = $date->format('G:i:s');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Donasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .invoice-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
        }

        .invoice-header,
        .invoice-footer {
            background-color: #f5f5f5;
            padding: 10px;
            margin-bottom: 20px;
        }

        .invoice-header h1,
        .invoice-footer p {
            margin: 0;
        }

        .invoice-details {
            margin-bottom: 20px;
        }

        .invoice-table {
            width: 100%;
            border-collapse: collapse;
        }

        .invoice-table th,
        .invoice-table td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="invoice-container">
        <div class="invoice-header">
            <h1>Invoice Donasi</h1>
        </div>
        <div class="invoice-details">
            <p><strong>No. Transaksi :</strong> <?= $id_transaksi ?></p>
            <p><strong>Tanggal Donasi :</strong> <?= $format ?></p>
            <p><strong>Waktu Donasi :</strong> <?= $format_2 ?></p>
            <p><strong>Nama Donatur :</strong> <?= $pengguna_nama ?></p>
            <p><strong>No. Whatssap :</strong> <?= $nomor_wa ?></p>
            <p><strong>Alamat :</strong> <?= $alamat ?></p>
        </div>
        <table class="invoice-table">
            <thead>
                <tr>
                    <th>Nama Program</th>
                    <th>Metode Pembayaran</th>
                    <th>Jumlah Donasi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $program_judul ?></td>
                    <td><?= strtoupper($metode_pembayaran) ?></td>
                    <td>Rp. <?= number_format($nominal_pembayaran, 0, ',', '.') ?></td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td><strong>Total Donasi</strong></td>
                    <td style="border-left: none; border-right: 1px solid #ccc;"></td>
                    <td><strong>Rp. <?= number_format($nominal_pembayaran, 0, ',', '.') ?></strong></td>
                </tr>
            </tfoot>
        </table>
        <div class="invoice-footer">
            <p>Terima kasih atas donasi Anda!</p>
        </div>
    </div>
</body>

</html>