@extends('layouts.app')

@section('content')
    @include('layouts.sidebar')

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @include('layouts.navbar')
        <div class="container-fluid py-4">
            @include('layouts.flash')
            <div class="row">
                <div class="col-md-12 mb-5">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.history.data2', ['id', $id]) }}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="start"><small class="text-dark">Start
                                                Date{!! required_mark() !!}</small></label>
                                        <input value="{{ request()->start ?? '' }}" type="datetime-local" name="start"
                                            id="start" class="form-control" placeholder="Start Date">
                                        @error('start')
                                            <span class="text-danger"><small class="text-xs">{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="end"><small class="text-dark">End
                                                Date{!! required_mark() !!}</small></label>
                                        <input value="{{ request()->end ?? '' }}" type="datetime-local" name="end"
                                            id="end" class="form-control" placeholder="End Date">
                                        @error('end')
                                            <span class="text-danger"><small class="text-xs">{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <center>
                                            <button type="reset"
                                                class="btn btn-outline-danger pull-right mr-5">Clear</button>
                                            <button type="submit" class="btn btn-primary pull-right ml-5">Filter</button>
                                            <input class="btn btn-info align-bottom" id="exportPdfBtn"
                                                        value="Export" type="button">
                                        </center>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Browser Analytics</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a onclick="refreshTable()" data-action="reload"><i class="ft-rotate-cw"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table w-100" id="usersTable">
                                        <thead>
                                            <tr>
                                                <th><small>#</small></th>
                                                <th><small>Percentage Malicious</small></th>
                                                <th><small>Created At</small></th>
                                                <th><small>Actions</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($data as $key => $record)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $record->percentage_malicious }}</td>
                                                    <td>{{ $record->created_at }}</td>
                                                    <td>
                                                        <button sub="{{ $record->data }}"
                                                            class="btn btn-warning btn-sm more-info"><small>More
                                                                Info</small></button>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6" class="text-danger text-center"><small>No
                                                            Data</small></td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                {{ $data->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.footer2')
        </div>
    </main>
@endsection

@section('scripts')
    <script>
        $('.more-info').on('click', function(e) {
            var response = JSON.parse($(this).attr('sub'));
            var content = '';

            for (let index = 0; index < response.length; index++) {
                const element = response[index];
                content = content + '<tr><th>' + element.HitCount + '</th><td>' +
                    element.TimeStamp + '</td><td>' + element.URL + '</td></tr>';
            }

            $.alert({
                title: 'Investigators History',
                content: '<table class="table table-active"><thead><tr><th>Hit Count</th><th>Timestamp</th><th>URL</th></tr></thead><tbody>' +
                    content +
                    '</tbody></table>',
            });

        });

         // Ensure DOM is ready
         document.addEventListener('DOMContentLoaded', function() {

            // Check if the button exists
            const exportPdfBtn = document.getElementById('exportPdfBtn');

            if (exportPdfBtn) {
                exportPdfBtn.addEventListener('click', function () {
                    // Initialize jsPDF and autoTable
                    const { jsPDF } = window.jspdf;
                    const doc = new jsPDF();

                    // Set document title
                    doc.text("Browser Analytics", 14, 16);

                    // Extract the table with ID 'usersTable' and convert to PDF
                    doc.autoTable({
                        html: '#usersTable', // Table ID
                        startY: 20, // Starting position on page
                        theme: 'grid', // Table theme
                        styles: {
                            fontSize: 10 // Adjust font size
                        },
                        headStyles: {
                            fillColor: [41, 128, 185] // Table header color
                        },
                        alternateRowStyles: {
                            fillColor: [240, 240, 240] // Alternate row colors
                        },
                        columnStyles: {
                            0: { cellWidth: 10 },   // Column width for "#"
                            1: { cellWidth: 50 },   // Column width for "Percentage Malicious"
                            2: { cellWidth: 40 },   // Column width for "Created At"
                            3: { cellWidth: 30 }    // Column width for "Actions"
                        },
                    });

                    // Save the generated PDF
                    doc.save('Browser-Analytics.pdf');
                });
            } else {
                console.error('Export button not found!');
            }
        });

    </script>
@endsection
