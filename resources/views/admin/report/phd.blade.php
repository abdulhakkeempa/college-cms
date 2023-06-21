@extends('layouts.master')

@section('title')
    PhD's - Department of Computer Science
@endsection

@section('content')
    <main class="main" id="main">
        
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12 pagetitle d-flex justify-content-between pb-3">
                        <h1>PhD's</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-12" style="overflow-x:auto;">
                                <table class="custom-table">
                                    <thead>
                                        <tr>
                                            <th style="width: 27%;">Name</th>
                                            <th style="width: 30%;">Title</th>
                                            <th style="width: 25%;">Guide</th>
                                            <th style="width: 18%;">Awarded on</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($phds as $phd)
                                            <tr>
                                                <td>{{ $phd->scholar_name }}</td>
                                                <td>{{ $phd->title }}</td>
                                                <td>{{ $phd->guide }}</td>
                                                <td>{{ $phd->awarded_date }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <style>
        .custom-table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ccc;
            font-size: 14px;
            font-family: Arial, sans-serif;
            margin-bottom: 20px;
        }

        h1 {
            margin-top: 20px;
            font-size: 25px;
            font-family: Arial, sans-serif;
        }

        .custom-table th,
        .custom-table td {
            padding: 8px;
            border: 1px solid #ccc;
        }

        .custom-table th:nth-child(1),
        .custom-table td:nth-child(1) {
            width: 27%;
        }

        .custom-table th:nth-child(2),
        .custom-table td:nth-child(2) {
            width: 30%;
        }

        .custom-table th:nth-child(3),
        .custom-table td:nth-child(3) {
            width: 25%;
        }

        .custom-table th:nth-child(4),
        .custom-table td:nth-child(4) {
            width: 18%;
        }

        @page {
            margin: 8px;
        }
    </style>
@endsection
