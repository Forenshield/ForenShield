@extends('layouts.app')

@section('content')
    @include('layouts.sidebar')

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @include('layouts.navbar')
        <div class="container-fluid py-4">
            @include('layouts.flash')
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">User List</h4>
                                <a class="heading-elements-toggle"><i
                                        class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a onclick="refreshTable()" data-action="reload"><i
                                                    class="ft-rotate-cw"></i></a></li>
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
                                                    <th><small>Email</small></th>
                                                    <th><small>NIC</small></th>
                                                    <th><small>Action</small></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($data as $key => $record)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $record->name }}</td>
                                                    <td>{{ $record->email }}</td>
                                                    <td>{{ $record->nic }}</td>
                                                    <td>
                                                        <button onclick="doEdit({{ $record->id }})" class="btn btn-warning btn-sm">Edit</button>
                                                        <a onclick="doDelete({{ $record->id }})" class="btn btn-danger btn-sm">Delete</a>
                                                    </td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="5" class="text-danger text-center"><small>No Data</small></td>
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
                    <div class="col-md-4">
                        <form autocomplete="off" action="{{ route('admin.users.enroll') }}" method="POST"
                            id="user_form">
                            @csrf
                            <input type="hidden" id="isnew" name="isnew"
                                value="{{ old('isnew') ? old('isnew') : '1' }}">
                            <input type="hidden" id="record" name="record"
                                value="{{ old('record') ? old('record') : '' }}">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Add/Edit Users</h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
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
                                                        <input value="{{ old('name') }}" type="text"
                                                            name="name" id="name" class="form-control"
                                                            placeholder="Your Name ..">
                                                        @error('name')
                                                            <span
                                                                class="text-danger"><small>{{ $message }}</small></span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row mt-1">
                                                    <div class="col-md-12">
                                                        <label for="nic"><small
                                                                class="text-dark">NIC{!! required_mark() !!}</small></label>
                                                        <input value="{{ old('nic') }}" type="text"
                                                            name="nic" id="nic" class="form-control"
                                                            placeholder="Your NIC ..">
                                                        @error('nic')
                                                            <span
                                                                class="text-danger"><small>{{ $message }}</small></span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row mt-1">
                                                    <div class="col-md-12">
                                                        <label for="email"><small
                                                                class="text-dark">Email{!! required_mark() !!}</small></label>
                                                        <input autocomplete="false" value="{{ old('email') }}"
                                                            type="text" name="email" id="email"
                                                            class="readonly form-control" placeholder="Email">
                                                        @error('email')
                                                            <span
                                                                class="text-danger"><small>{{ $message }}</small></span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row mt-1">
                                                    <div class="col-md-12">
                                                        <label for="password"><small class="text-dark">Password
                                                                (Min 8
                                                                Characters){!! required_mark() !!}</small></label>
                                                        <input autocomplete="false"
                                                            value="{{ old('password') }}" type="password"
                                                            name="password" id="password" class="form-control"
                                                            placeholder="Password">
                                                        @error('password')
                                                            <span
                                                                class="text-danger"><small>{{ $message }}</small></span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row mt-1">
                                                    <div class="col-md-12">
                                                        <label for="password_confirmation"><small
                                                                class="text-dark">Password
                                                                Confirmation{!! required_mark() !!}</small></label>
                                                        <input value="{{ old('password_confirmation') }}"
                                                            type="password" name="password_confirmation"
                                                            id="password_confirmation" class="form-control"
                                                            placeholder="Confirmation">
                                                        @error('password_confirmation')
                                                            <span
                                                                class="text-danger"><small>{{ $message }}</small></span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <hr class="my-2">
                                                <div class="row">
                                                    <div class="col-md-6"> <input id="submitbtn"
                                                            class="btn btn-success w-100" type="submit"
                                                            value="Submit">
                                                    </div>
                                                    <div class="col-md-6 mt-md-0 mt-1"><input
                                                            class="btn btn-danger w-100" type="button"
                                                            form="user_form" id="resetbtn" value="Reset">
                                                    </div>
                                                </div>

                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
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
                    url: "{{ route('admin.users.get.one') }}",
                    data: {
                        'id': id
                    },
                    success: function(response) {
                        $('#name').val(response.name);
                        $('#nic').val(response.nic);
                        $('#email').val(response.email);
                        $('#email').attr('readonly', '');
                        $('#password').val('');
                        $('#password_confirmation').val('');
                        $('#record').val(response.id);
                        $('#isnew').val('2').trigger('change');
                    }
                });
            });
        }

        function doDelete(id) {
            showAlert('Are you sure to delete this record ?', function() {
                window.location = "{{ route('admin.users.delete.one') }}?id=" + id;
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
