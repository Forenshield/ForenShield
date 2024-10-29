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
                            <h4 class="card-title">Crime Scene Evidences</h4>
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
                                                <th><small>Description</small></th>
                                                <th class="text-end"><small>Action</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($data as $key => $record)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $record->name }}</td>
                                                    <td>{{ $record->description }}</td>
                                                    <td class="text-end">
                                                        <a target="_blank"
                                                            href="{{ route('admin.attachments.view.one', $record->path) }}"
                                                            class="btn btn-info btn-sm">View</a>
                                                        <a onclick="remove({{ $record->id }})"
                                                            class="btn btn-danger btn-sm">Delete</a>
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
                <div class="col-md-4">
                    <form autocomplete="off" enctype="multipart/form-data" action="{{ route('admin.attachments.enroll') }}"
                        method="POST" id="user_form">
                        @csrf
                        <input type="hidden" id="id" name="id" value="{{ $id }}">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Evidence</h4>
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
                                                    <label for="attachment"><small
                                                            class="text-dark">Attachment</small></label>
                                                    <br>
                                                    <input type="file" name="attachment" id="attachment">
                                                    @error('attachment')
                                                        <span class="text-danger"><small>{{ $message }}</small></span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <hr class="my-2">
                                            <div class="row">
                                                <div class="col-md-6"> <input id="submitbtn" class="btn btn-success w-100"
                                                        type="submit" value="Submit">
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

            </div>
            @include('layouts.footer2')
        </div>
    </main>
@endsection

@section('scripts')
    <script>
        function remove(id) {
            showAlert('Are you sure to delete this record ?', function() {
                window.location = "{{ route('admin.attachments.delete.one') }}?id=" + id +
                    "&cid={{ $id }}";
            });
        }
    </script>
@endsection
