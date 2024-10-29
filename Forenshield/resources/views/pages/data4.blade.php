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
                            <form action="{{ route('admin.history.data4', ['id', $id]) }}">
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
                            <h4 class="card-title">Document Analytics</h4>
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
                                                <th><small>File</small></th>
                                                <th><small>Result</small></th>
                                                <th><small>Percentage</small></th>
                                                <th><small>Created At</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($data as $key => $record)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td><a target="_blank" href="{{ asset('storage/' . $record->file) }}">Open file in new tab</a></td>
                                                    <td>{{ $record->result }}</td>
                                                    <td>{{ $record->percentage }}</td>
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
                    doc.text("Document Analytics", 14, 16);

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
                            1: { cellWidth: 30 },   // "File"
                            2: { cellWidth: 30 },   // "Result"
                            3: { cellWidth: 20 },   // "Percentage"
                            4: { cellWidth: 30 },   // "Created At"
                        },
                    });

                    // Save the PDF with a name
                    doc.save('document-analytics.pdf');
                });
            }
        });
    </script>
@endsection
