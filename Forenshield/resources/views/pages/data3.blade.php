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
                            <form action="{{ route('admin.history.data3', ['id', $id]) }}">
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
                            <h4 class="card-title">Router Analytics</h4>
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
                                                <th><small>IP</small></th>
                                                <th><small>MAC</small></th>
                                                <th><small>Host Name</small></th>
                                                <th><small>Vendor</small></th>
                                                <th><small>Latency</small></th>
                                                <th><small>Open Ports</small></th>
                                                <th><small>OS Guess</small></th>
                                                <th><small>First Seen</small></th>
                                                <th><small>Result</small></th>
                                                <th><small>Created At</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($data as $key => $record)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $record->ip }}</td>
                                                    <td>{{ $record->mac }}</td>
                                                    <td>{{ $record->hostname }}</td>
                                                    <td>{{ $record->vendor }}</td>
                                                    <td>{{ $record->latency }}</td>
                                                    <td>{{ $record->open_ports }}</td>
                                                    <td>{{ $record->os_guess }}</td>
                                                    <td>{{ $record->first_seen }}</td>
                                                    <td>{{ $record->result }}</td>
                                                    <td>{{ $record->created_at }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="11" class="text-danger text-center"><small>No
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
        // PDF Export Functionality
        document.addEventListener('DOMContentLoaded', function() {
            const exportPdfBtn = document.getElementById('exportPdfBtn');
            if (exportPdfBtn) {
                exportPdfBtn.addEventListener('click', function () {
                    const { jsPDF } = window.jspdf;
                    const doc = new jsPDF();

                    // Add title to the PDF
                    doc.text("Router Analytics", 14, 16);

                    // Convert the table to PDF
                    doc.autoTable({
                        html: '#usersTable',
                        startY: 20,
                        theme: 'grid',
                        styles: {
                            fontSize: 10
                        },
                        headStyles: {
                            fillColor: [41, 128, 185]
                        },
                        alternateRowStyles: {
                            fillColor: [240, 240, 240]
                        },
                        columnStyles: {
                            0: { cellWidth: 10 },   // "#"
                            1: { cellWidth: 20 },   // "IP"
                            2: { cellWidth: 20 },   // "MAC"
                            3: { cellWidth: 10 },   // "Host Name"
                            4: { cellWidth: 10 },   // "Vendor"
                            5: { cellWidth: 20 },   // "Latency"
                            6: { cellWidth: 20 },   // "Open Ports"
                            7: { cellWidth: 20 },   // "OS Guess"
                            8: { cellWidth: 20 },   // "First Seen"
                            9: { cellWidth: 20 },   // "Result"
                            10: { cellWidth: 20 },  // "Created At"
                        },
                    });

                    // Save the PDF with a name
                    doc.save('router-analytics.pdf');
                });
            }
        });
    </script>
@endsection
