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
                            <form action="{{ route('admin.history.data1') }}">
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
                            <h4 class="card-title">IOT Data History</h4>
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
                                                <th><small>PIR</small></th>
                                                <th><small>Temperature</small></th>
                                                <th><small>Humudity</small></th>
                                                <th><small>GAS</small></th>
                                                <th><small>Created At</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($data as $key => $record)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>
                                                        @if (\Illuminate\Support\Facades\Crypt::decrypt($record->pir) == 1)
                                                            <span class="badge badge-sm bg-gradient-success">ON</span>
                                                        @else
                                                            <span class="badge badge-sm bg-gradient-danger">OFF</span>
                                                        @endif

                                                    </td>
                                                    <td>{{ \Illuminate\Support\Facades\Crypt::decrypt($record->temperature) }}°C
                                                    </td>
                                                    <td>{{ \Illuminate\Support\Facades\Crypt::decrypt($record->humidity) }}%
                                                    </td>
                                                    <td>{{ \Illuminate\Support\Facades\Crypt::decrypt($record->gas) }}%</td>
                                                    <td>{{ $record->created_at }}</td>
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
