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
        }

        h1 {
            text-align: center;
        }

        h1,
        h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Diagnosis Report</h1>
    <p><strong>Name:</strong> {{ $diagnosis->user->name }}</p>
    <p><strong>Diagnosis Date:</strong> {{ $diagnosis->created_at->format('d M Y') }}</p>
    <p><strong>Mental Disorder:</strong>
        {{ $diagnosis->mentalDisorder ? $diagnosis->mentalDisorder->name : 'No Specific Disorder' }}</p>
    <p><strong>Certainty Factor:</strong> {{ number_format($diagnosis->cf, 2) }}%</p>

    @if ($diagnosis->recommendation)
        <h2>AI Recommendation</h2>
        <p>{{ $diagnosis->recommendation->recommendation_text }}</p>
    @endif

    @if ($diagnosis->assessments->isNotEmpty())
        <h2>Assessments</h2>
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
    @else
        <h2>Assessments</h2>
        <p>No assessments found.</p>
    @endif
</body>

</html>
