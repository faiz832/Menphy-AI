<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagnosis Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            padding: 20px;
        }

        .header {
            position: relative;
            height: 60px;
            margin-bottom: 30px;
        }

        .logo {
            position: absolute;
            left: 0;
            top: 0;
            width: 50px;
            height: 50px;
        }

        .company-name {
            position: absolute;
            left: 70px;
            top: 0;
            font-size: 24px;
            font-weight: bold;
            margin: 0;
        }

        .report-title {
            font-size: 24px;
            font-weight: bold;
            margin: 30px 0 20px 0;
        }

        .info-section {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
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
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .recommendation-text {
            text-align: justify;
            text-indent: 50px;
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f8f9fa;
            font-weight: bold;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        .status-recovered {
            color: #28a745;
            font-weight: bold;
        }

        .status-not-recovered {
            color: #dc3545;
            font-weight: bold;
        }

        .status-none {
            color: #6c757d;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="{{ public_path('assets/images/menpy-logo.png') }}" alt="Menpy AI Logo" class="logo">
        <h1 class="company-name">Menpy AI</h1>
    </div>

    <h2 class="report-title">Diagnosis Report</h2>

    <div class="info-section">
        <div class="info-item">
            <span class="info-label">Name</span>
            <span class="info-value" style="text-transform: capitalize;">: {{ $diagnosis->user->name }}</span>
        </div>
        <div class="info-item">
            <span class="info-label">Diagnosis Date</span>
            <span class="info-value">: {{ $diagnosis->created_at->format('d M Y') }}</span>
        </div>
        <div class="info-item">
            <span class="info-label">Mental Disorder</span>
            <span class="info-value">:
                {{ $diagnosis->mentalDisorder ? $diagnosis->mentalDisorder->name : 'No Specific Disorder' }}</span>
        </div>
        <div class="info-item">
            <span class="info-label">Certainty Factor</span>
            <span class="info-value">: {{ number_format($diagnosis->cf, 2) }}%</span>
        </div>
        <div class="info-item">
            <span class="info-label">Status</span>
            @if ($diagnosis->is_recovered)
                <span class="info-value">:</span>
                <span class="status-recovered info-value"> Recovered</span>
            @elseif (!$diagnosis->mentalDisorder)
                <span class="info-value">:</span>
                <span class="status-none info-value"> None</span>
            @else
                <span class="info-value">:</span>
                <span class="status-not-recovered info-value"> Not Recovered</span>
            @endif
        </div>
    </div>

    @if ($diagnosis->recommendation)
        <div class="recommendation-section">
            <h2 class="recommendation-title">AI Recommendation</h2>
            <div class="recommendation-text">
                {{ $diagnosis->recommendation->recommendation_text }}
            </div>
        </div>
    @endif

    @if ($diagnosis->assessments->isNotEmpty())
        <div class="recommendation-section">
            <h2 class="recommendation-title">Assessments</h2>
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Improvement</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($diagnosis->assessments as $assessment)
                        <tr>
                            <td>{{ $assessment->created_at->format('d M Y') }}</td>
                            <td>{{ number_format($assessment->percentage_improvement, 2) }}%</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="recommendation-section">
            <h2 class="recommendation-title">Assessments</h2>
            <p>No assessments found.</p>
        </div>
    @endif
</body>

</html>
