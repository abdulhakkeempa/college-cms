<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Funded Projects - Report</title>

  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .pb-2{
      font-size: 20px;
    }

    .table {
      width: 100%;
      border-collapse: collapse;
      border: 1px solid #ccc;
      font-size: 14px;
    }

    .table thead {
      background-color: #f2f2f2;
    }

    .table th,
    .table td {
      padding: 8px;
      border: 1px solid #ccc;
    }

    .fw-bold {
      font-weight: bold;
    }

    .fw-normal {
      font-weight: normal;
    }
  </style>
</head>
<body>
  <h1><strong>Funded Projects</strong></h1>
  @foreach ($fundedProjects as $researcher => $projects)
    <h5 class="pb-2"><strong>{{ $researcher }}</strong></h5>
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="col-12" style="overflow-x:auto;">
            <table class="table">
              <thead>
                <tr>
                  <th>Role</th>
                  <th>Project</th>
                  <th>Funding Agency</th>
                  <th>Status</th>
                  <th>Amount</th>
                </tr>
              </thead>
              <tbody>
                @foreach($projects as $project)
                  <tr>
                    <td>
                      <div class="d-flex align-items-center">
                        <div>
                          <p class="fw-bold mb-1">{{ $project->role }}</p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <p class="fw-normal mb-1">{{ $project->project }}</p>
                    </td>
                    <td>{{ $project->funding_agency }}</td>
                    <td>{{ $project->status }}</td>
                    <td>Rs. {{ $project->amount }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  @endforeach
</body>
</html>
