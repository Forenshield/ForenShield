@extends('layouts.app')

@section('content')
    @include('layouts.sidebar')

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @include('layouts.navbar')
        <div class="container-fluid py-4">
            @include('layouts.flash')
            <div class="row">
                <div class="col-md-{{ Auth::user()->is_admin ? '8' : '12' }}">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Crime Scene List</h4>
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
                                                <th><small>Name</small></th>
                                                <th><small>Investigator</small></th>
                                                <th class="text-end"><small>Action</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($data as $key => $record)
                                            @if (!Auth::user()->is_admin && $record->investigatorsData && $record->investigatorsData->investigator != Auth::user()->id)
                                                @php
                                                    continue;
                                                @endphp
                                            @endif
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $record->name }}</td>
                                                    <td>{{ $record->investigatorsData->userData->name ?? '' }}</td>
                                                    <td class="text-end">
                                                        <a href="{{ route('admin.attachments.index', ['id' => $record->id]) }}"
                                                            class="btn btn-success btn-sm"><small>Evidences</small></a>
                                                        <button onclick="doView({{ $record->id }})"
                                                            class="btn btn-info btn-sm"><small>History</small></button>
                                                        <button onclick="doEdit({{ $record->id }})"
                                                            class="btn btn-warning btn-sm"><small>Edit</small></button>
                                                        <a onclick="doDelete({{ $record->id }})"
                                                            class="btn btn-danger btn-sm"><small>Delete</small></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="text-end">
                                                        <a href="{{ route('admin.history.data2', ['id' => $record->id]) }}"
                                                            class="btn btn-outline-success btn-sm"><small>Browser Analytics</small></a>
                                                        <a href="{{ route('admin.history.data3', ['id' => $record->id]) }}"
                                                            class="btn btn-outline-success btn-sm"><small>Router Analytics</small></a>
                                                        <a href="{{ route('admin.history.data4', ['id' => $record->id]) }}"
                                                            class="btn btn-outline-success btn-sm"><small>Document Analytics</small></a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="text-danger text-center"><small>No
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
                @if (Auth::user()->is_admin)
                    <div class="col-md-4">
                        <form autocomplete="off" action="{{ route('admin.crime-scene.enroll') }}" method="POST"
                            id="user_form">
                            @csrf
                            <input type="hidden" id="isnew" name="isnew"
                                value="{{ old('isnew') ? old('isnew') : '1' }}">
                            <input type="hidden" id="record" name="record"
                                value="{{ old('record') ? old('record') : '' }}">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Add/Edit Crime Scenes</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><label for="resetbtn"><a data-action="reload"><i
                                                            class="ft-rotate-cw"></i></a></label></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="name"><small
                                                                class="text-dark">Name{!! required_mark() !!}</small></label>
                                                        <input value="{{ old('name') }}" type="text" name="name"
                                                            id="name" class="form-control" placeholder="Your Name ..">
                                                        @error('name')
                                                            <span class="text-danger"><small>{{ $message }}</small></span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row mt-1">
                                                    <div class="col-md-12">
                                                        <label for="nic"><small
                                                                class="text-dark">Description</small></label>
                                                        <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
                                                        @error('nic')
                                                            <span class="text-danger"><small>{{ $message }}</small></span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row mt-1">
                                                    <div class="col-md-12">
                                                        <label for="nic"><small
                                                                class="text-dark">Investigator</small></label>
                                                        <select class="form-control" name="investigator" id="investigator">
                                                            <option disabled selected value="">- Select -</option>
                                                            @foreach ($investigators as $investigator)
                                                                <option value="{{ $investigator->id }}">
                                                                    {{ $investigator->name }} ({{ $investigator->email }})
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('nic')
                                                            <span class="text-danger"><small>{{ $message }}</small></span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <hr class="my-2">
                                                <div class="row">
                                                    <div class="col-md-6"> <input id="submitbtn"
                                                            class="btn btn-success w-100" type="submit" value="Submit">
                                                    </div>
                                                    <div class="col-md-6 mt-md-0 mt-1"><input class="btn btn-danger w-100"
                                                            type="button" form="user_form" id="resetbtn" value="Reset">
                                                    </div>
                                                </div>

                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                @endif

            </div>
            @include('layouts.footer2')
        </div>
    </main>
@endsection

@section('scripts')
    <script>
        function doEdit(id) {
            showAlert('Are you sure to edit this record ?', function() {
                $.ajax({
                    type: "GET",
                    url: "{{ route('admin.crime-scene.get.one') }}",
                    data: {
                        'id': id
                    },
                    success: function(response) {
                        if (response.investigators_data) {
                            $('#investigator').val(response.investigators_data.investigator);
                        }


                        $('#name').val(response.name);
                        $('#description').val(response.description);
                        $('#record').val(response.id);
                        $('#isnew').val('2').trigger('change');
                    }
                });
            });
        }

        function doView(id) {
            showAlert('Are you sure to view history of this record ?', function() {
                $.ajax({
                    type: "GET",
                    url: "{{ route('admin.crime-scene.get.one') }}",
                    data: {
                        'id': id
                    },
                    success: function(response) {

                        var content = '';

                        for (let index = 0; index < response.history.length; index++) {
                            const element = response.history[index];
                            console.log(element);
                            content = content + '<tr><th>' + element.user_data.name + '</th><td>' +
                                element.from + '</td><td>' + ((response.history[index + 1]) ? response
                                    .history[index + 1].to : 'Current') + '</td></tr>';
                        }

                        $.alert({
                            title: 'Investigators History',
                            content: '<table class="table table-active"><tbody>' + content +
                                '</tbody></table>',
                        });
                    }
                });
            });
        }

        function doDelete(id) {
            showAlert('Are you sure to delete this record ?', function() {
                window.location = "{{ route('admin.crime-scene.delete.one') }}?id=" + id;
            });
        }

        @if (old('record'))
            $('#record').val({{ old('record') }});
        @endif

        @if (old('isnew'))
            $('#isnew').val({{ old('isnew') }}).trigger('change');
        @endif
    </script>
@endsection
