<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Transaksi Keluar Donasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .header img {
            max-width: 100px;
            margin-right: 20px;
        }

        .header .text {
            text-align: center;
            flex-grow: 1;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .header p {
            margin: 5px 0;
            font-size: 14px;
        }

        .divider {
            border-bottom: 2px solid #ddd;
            margin: 20px 0;
        }

        .content {
            margin-bottom: 20px;
        }

        .content h2 {
            margin: 0 0 10px;
            font-size: 20px;
        }

        .content p {
            margin: 5px 0;
            font-size: 14px;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            color: #777;
            margin-top: 40px;
        }

        .signature {
            margin-top: 20px;
            text-align: center;
        }

        .signature div {
            display: inline-block;
            width: 45%;
            text-align: center;
            vertical-align: top;
            /* Align content at the top */
        }

        .signature div p {
            margin: 0;
        }

        .menyetujui {
            text-align: center;
            margin-top: 10px;
        }

        .mengetahui {
            text-align: center;
            margin-top: 10px;
        }

        .signature_dua {
            text-align: center;
            margin-top: 20px;
        }

        .signature_dua div {
            display: inline-block;
            width: 45%;
            text-align: center;
        }

        .signature_dua div p {
            margin: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="text">
                <h1>Transaksi Keluar Donasi</h1>
                <p>LAZ DKD</p>
            </div>
        </div>
        <div class="divider"></div>
        <div class="content">
            <h2>Detail Transaksi</h2>
            <p>
                Nomor Transaksi:
                <span id="nomor-transaksi"><?php echo $id_transaksi ?></span>
            </p>
            <p>
                Nama Pencetak:
                <span id="nama-pencetak"><?php echo $pengguna_nama ?></span>
            </p>
            <p>
                Tanggal : <span id="tanggal"><?php echo $tanggal_transaksi ?></span>
            </p>
        </div>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Program</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody id="tabel-transaksi">
                <tr>
                    <td>1</td>
                    <td><?php echo $program_judul ?></td>
                    <td>
                        Rp.
                        <?= number_format($nominal_pembayaran, 0, ',', '.') ?>
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2"><strong>Total</strong></td>
                    <td>
                        <strong>Rp.
                            <?= number_format($nominal_pembayaran, 0, ',', '.') ?></strong>
                    </td>
                </tr>
            </tfoot>
        </table>
        <div class="mengetahui">
            <p>Mengetahui</p>
        </div>
        <div class="signature">
            <div style="width: 45%; display: inline-block; text-align: center">
                <p>Manajer Program</p>
                <br />
                <br />
                <br />
                <p>( Sukarno, S.E )</p>
            </div>
            <div style="width: 45%; display: inline-block; text-align: center">
                <p>Manajer Keuangan</p>
                <br />
                <br />
                <br />
                <p>( Ika Royani, S.E )</p>
            </div>
        </div>
        <div class="menyetujui">
            <p>Menyetujui</p>
        </div>
        <div class="signature_dua">
            <div>
                <p>Direktur LAZ DKD</p>
                <br />
                <br />
                <br />
                <p>( Bayu Setiaji Muslih, S.T )</p>
            </div>
        </div>
        <div class="footer">
            <p>&copy; 2024 LAZ DKD. All rights reserved.</p>
        </div>
    </div>
</body>

</html>