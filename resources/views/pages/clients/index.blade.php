<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clients') }}
        </h2>
    </x-slot>


    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header pb-0">
                    <div class="d-lg-flex">
                        <div>
                        </div>
                        <div class="ms-auto my-auto mt-lg-0 mt-4">
                            <div class="ms-auto my-auto">
                                <a href="{{ route('client.create') }}"
                                    class="btn bg-primary btn-sm mb-4">+&nbsp; Add
                                    New</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-0">
                    <div class="table-responsive">
                        <table class="table table-flush" id="client-list">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $client)
                                    <tr id="row{{ $client->id }}">
                                        <td> {{ $client->id }} </td>
                                        <td> {{ $client->id }} </td>
                                        <td> {{ $client->first_name }} {{ $client->last_name }}</td>
                                        <td> {{ $client->contact }} </td>
                                        <td> {{ $client->email }} </td>
                                        <td>

                                            @if ($client->is_active == 1)
                                                <span class="badge bg-primary">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif

                                        </td>
                                        <td class="text-sm">
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#client-{{ $client->id }}">
                                                <i class="fas fa-eye text-secondary">view</i>
                                            </a>
                                            <div class="modal fade modal-lg" id="client-{{ $client->id }}"
                                                tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog mt-lg-10">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="ModalLabel">Client Details
                                                            </h5>
                                                            <button type="button" class="btn btn-light"
                                                                data-bs-dismiss="modal"
                                                                aria-label="Close">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p><strong>First Name :</strong>
                                                                {{ $client->first_name ?? '---' }}</p>
                                                            <p><strong>Last Name :</strong>
                                                                {{ $client->last_name ?? '---' }}</p>
                                                            <p><strong>Name :</strong>
                                                                {{ $client->first_name ?? '' }}
                                                                {{ $client->last_name ?? '' }}</p>
                                                            <p><strong>Contact :</strong>
                                                                {{ $client->contact ?? '---' }}</p>
                                                            <p><strong>Email Address :</strong>
                                                                {{ $client->email ?? '---' }}</p>
                                                            <p><strong>Date of Birth :</strong>
                                                                {{ $client->year }}-{{ $client->month }}-{{ $client->date }}
                                                            </p>
                                                            <p><strong>Address :</strong>
                                                                {{ $client->street_no }},{{ $client->street_address }},{{ $client->city }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="{{ route('client.edit', $client->id) }}" class="mx-3"
                                                data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                <i class="fas fa-user-edit text-secondary">edit</i>
                                            </a>
                                            <a class="delete" data-id="{{ $client->id }}" href="#">
                                                <i class="fas fa-trash text-secondary">delete</i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

{{-- <script>
    $('body').on('click', '.delete', function() {
        var id = $(this).attr('data-id')
        var atr = $(this);
        var url = '{{ route('client.destroy', ':id') }}';
        Swal.fire({
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true,
            title: 'Are You Sure!',
            text: "You won't be able to revert this!",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: url.replace(':id', id),
                    method: "DELETE",
                    dataType: "json",
                    data: {
                        id: id,
                        '_token': '{{ csrf_token() }}'
                    },
                    beforeSend: function() {
                        Swal.showLoading();
                    },
                    success: function(data) {
                        if (data.response == "success") {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: data.message,
                                timer: 3000,
                                showConfirmButton: false
                            });
                            $("#row" + id).remove();
                        } else if (data.response == "error") {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: data.message,
                                timer: 3000,
                                showConfirmButton: false
                            });
                        }
                    }
                })
            }
        });
    });
</script> --}}
<!-- Add the following script below your existing script -->
<script>
    $('body').on('click', '.delete', function () {
        var id = $(this).attr('data-id');
        var atr = $(this);
        var url = '{{ route('client.destroy', ':id') }}';

        // Use SweetAlert2 for confirmation
        Swal.fire({
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true,
            title: 'Are You Sure!',
            text: "You won't be able to revert this!",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: url.replace(':id', id),
                    method: "DELETE",
                    dataType: "json",
                    data: {
                        id: id,
                        '_token': '{{ csrf_token() }}'
                    },
                    beforeSend: function () {
                        Swal.showLoading();
                    },
                    success: function (data) {
                        if (data.response == "success") {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: data.message,
                                timer: 3000,
                                showConfirmButton: false
                            });

                            // Remove the row from the table
                            $("#row" + id).remove();
                        } else if (data.response == "error") {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: data.message,
                                timer: 3000,
                                showConfirmButton: false
                            });
                        }
                    }
                });
            }
        });
    });
</script>

