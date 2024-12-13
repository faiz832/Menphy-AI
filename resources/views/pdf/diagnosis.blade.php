<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagnosis Report</title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            line-height: 1.6;
            padding: 40px;
        }

        .header {
            position: relative;
            text-align: center;
            margin-bottom: 20px;
        }

        .logo {
            position: absolute;
            top: 10px;
            left: 5px;
            width: 90px;
            height: 90px;
        }

        .company-name {
            font-size: 28px;
            font-weight: bold;
            margin: 0;
        }

        .company-address {
            font-size: 16px;
            line-height: 1.15;
        }

        .line {
            display: flex;
            width: 100%;
            height: 1px;
            background-color: #000;
        }

        .report-title {
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            margin: 30px 0;
            text-transform: uppercase;
            text-decoration: underline;
        }

        .info-section {
            margin-bottom: 30px;
        }

        .info-item {
            margin-bottom: 10px;
        }

        .info-label {
            font-weight: bold;
            display: inline-block;
            width: 150px;
        }

        .info-value {
            display: inline-block;
        }

        .recommendation-section {
            margin-top: 30px;
        }

        .recommendation-title {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .recommendation-text {
            text-align: justify;
            text-indent: 50px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        th {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="{{ public_path('assets/images/menpy-logo.png') }}" alt="Menpy AI Logo" class="logo">
        <h1 class="company-name">MENPY AI</h1>
        <div class="company-address">
            Jl. Kyai Moch. Syafei Gg 1 No.2450, RT.04/RW.08,<br>
            Kebondalem, Purwokerto Lor, Kec. Purwokerto Tim.,<br>
            Kabupaten Banyumas, Jawa Tengah 53114
        </div>
    </div>

    <span class="line"></span>

    <h2 class="report-title">Laporan Diagnosis</h2>

    <div class="info-section">
        <div class="info-item">
            <span class="info-label">Nama</span>
            <span class="info-value" style="text-transform: capitalize">: {{ $diagnosis->user->name }}</span>
        </div>
        <div class="info-item">
            <span class="info-label">Tanggal Diagnosis</span>
            <span class="info-value">: {{ $diagnosis->created_at->format('d F Y') }}</span>
        </div>
        <div class="info-item">
            <span class="info-label">Gangguan Mental</span>
            <span class="info-value">:
                {{ $diagnosis->mentalDisorder ? $diagnosis->mentalDisorder->name : 'Tidak Ada' }}</span>
        </div>
        <div class="info-item">
            <span class="info-label">Kepastian</span>
            <span class="info-value">: {{ number_format($diagnosis->cf, 2) }}%</span>
        </div>
        <div class="info-item">
            <span class="info-label">Status</span>
            <span class="info-value">:
                @if ($diagnosis->is_recovered)
                    Sembuh
                @elseif (!$diagnosis->mentalDisorder)
                    Tidak Ada
                @else
                    Belum sembuh
                @endif
            </span>
        </div>
    </div>

    @if ($diagnosis->recommendation)
        <div class="recommendation-section">
            <h2 class="recommendation-title">Rekomendasi AI</h2>
            <div class="recommendation-text">
                {{ $diagnosis->recommendation->recommendation_text }}
            </div>
        </div>
    @endif

    @if ($diagnosis->assessments->isNotEmpty())
        <div class="recommendation-section">
            <h2 class="recommendation-title">Evaluasi Penilaian</h2>
            <table>
                <thead>
                    <tr style="background: #f2f2f2">
                        <th>Tanggal</th>
                        <th>Skor</th>
                        <th>Peningkatan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($diagnosis->assessments as $assessment)
                        <tr>
                            <td>{{ $assessment->created_at->format('d F Y') }}</td>
                            <td>{{ $assessment->score }}</td>
                            <td>{{ number_format($assessment->percentage_improvement, 2) }}%</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="recommendation-section">
            <h2 class="recommendation-title">Evaluasi Penilaian</h2>
            <p>Belum ada penilaian yang dilakukan.</p>
        </div>
    @endif
</body>

</html>
