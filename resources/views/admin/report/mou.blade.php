<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MoU - Report</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .mou-container {
      margin-bottom: 30px;
    }

    .mou-logo {
      width: 25%;
      max-width: 200px;
      margin-right: 20px;
    }

    .mou-details {
      width: 75%;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .mou-title {
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .mou-year {
      font-size: 14px;
      margin-bottom: 10px;
    }

    .mou-description {
      font-size: 14px;
      line-height: 1.5;
    }

    .custom-table {
      width: 100%;
      border-collapse: collapse;
      border: 1px solid #ccc;
      font-size: 14px;
      font-family: Arial, sans-serif;
      margin-bottom: 20px;
    }

    .custom-table th,
    .custom-table td {
      padding: 8px;
      border: 1px solid #ccc;
    }
  </style>
</head>
<body>
  <h1>Memorandum of Understanding</h1>
    <table class="custom-table">
      <thead>
        <tr>
          <th>Logo</th>
          <th>Title</th>
          <th>Description</th>
          <th style="width: 10%;">Year</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($MoUs as $mou)
        <tr>
          <td class="mou-logo">
            @if ($mou->logo_img_path)
              <img src="{{ public_path('storage/' . $mou->logo_img_path) }}" alt="MoU Logo" style="width: 100%;">
            @endif
          </td>
          <td class="mou-title">{{ $mou->title }}</td>
          <td class="mou-description">{{ $mou->description }}</td>
          <td class="mou-year">{{ $mou->year }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>

</body>
</html>
