<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('client.index') }}" class="btn bg-primary m-0 ms-2">
                Back
            </a>
        </h2>
    </x-slot>


    <div class="row">
        <div class="col-lg-9 col-12 mx-auto">
            <div class="card card-body mt-4">
                <h6 class="mb-0 text-center">UPDATE THE CLIENT</h6>
                <hr class="horizontal dark my-3">

                <form action="{{ route('client.update', $client->id) }}" method="POST" id="edit-client-form" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-6"><label for="first_name" class="form-label">First Name <span
                                    style="color: red">*</span></label>
                            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $client->first_name }}">
                        </div>
                        <div class="col-6"><label for="last_name" class="form-label">Last Name <span
                                    style="color: red">*</span></label>
                            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $client->last_name }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6"><label for="contact" class="form-label">Contact <span
                                    style="color: red">*</span></label>
                            <input type="text" class="form-control" id="contact" name="contact" placeholder="Ex :- 0761234567" value="{{ $client->contact }}">
                        </div>
                        <div class="col-6"><label for="email" class="form-label">Email Address <span
                                    style="color: red">*</span></label>
                            <input type="email" class="form-control" id="email" name="email"  value="{{ $client->email }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-control-label mt-2" for="gender">Gender <span style="color: red">*</span></label>
                            <select id="gender" class="form-control form-control-alternative" name="gender">
                                <option value="Male" @if ($client->gender == 'Male') selected @endif>Male</option>
                                <option value="Female" @if ($client->gender == 'FeMale') selected @endif>Female</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-control-label mt-2" for="birth">Date of Birth <span style="color: red">*</span></label>
                            <div class="row">
                                <div class="col-md-4">
                                    <select id="year" class="form-control form-control-alternative" name="year">
                                        <option>Year</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select id="month" class="form-control form-control-alternative" name="month">
                                        <option>Month</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select id="date" class="form-control form-control-alternative" name="date">
                                        <option>Date</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6"><label for="street_no" class="form-label">Street No <span
                                    style="color: red">*</span></label>
                            <input type="text" class="form-control" id="street_no" name="street_no"  value="{{ $client->street_no }}">
                        </div>
                        <div class="col-6"><label for="street_address" class="form-label">Street Address <span
                                    style="color: red">*</span></label>
                            <input type="text" class="form-control" id="street_address" name="street_address" value="{{ $client->street_address }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6"><label for="city" class="form-label">City <span
                                    style="color: red">*</span></label>
                            <input type="text" class="form-control" id="city" name="city" value="{{ $client->city }}">
                        </div>
                        <div class="col-6"><label for="is_active" class="form-label mt-2">Active/Inactive</label>
                            <div class="form-check form-switch ms-2">
                                <input class="form-check-input" type="checkbox" id="is_active" name="is_active" @if ($client->is_active == 1) checked @endif>
                            </div>
                        </div>
                    </div>
                    {{--
                    <label for="image" class="form-label mt-2">Image <span
                            style="color: rgb(163, 163, 163)">(optional)</span></label>
                    <input type="file" name="image" class="form-control flight-image"> --}}

                    <div class="d-flex justify-content-end mt-4">
                        {{-- <button type="reset" class="btn btn-light m-0">Cancel</button> --}}
                        <button type="submit" class="btn bg-primary m-0 ms-2">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>

<script>
    var currentYear = new Date().getFullYear();
    var yearDropdown = document.getElementById("year");
    for (var i = currentYear; i >= currentYear - 100; i--) {
        var option = document.createElement("option");
        option.text = i;
        option.value = i;
        if (i == {{ $client->year }}) {
            option.selected = true;
        }
        yearDropdown.add(option);
    }

    var monthDropdown = document.getElementById("month");
    for (var i = 1; i <= 12; i++) {
        var option = document.createElement("option");
        option.text = i;
        option.value = i;
        if (i == {{ $client->month }}) {
            option.selected = true;
        }
        monthDropdown.add(option);
    }
    var dateDropdown = document.getElementById("date");
    for (var i = 1; i <= 31; i++) {
        var option = document.createElement("option");
        option.text = i;
        option.value = i;
        if (i == {{ $client->date }}) {
            option.selected = true;
        }
        dateDropdown.add(option);
    }
</script>

{!! JsValidator::formRequest('App\Http\Requests\StoreClientRequest', '#edit-client-form') !!}
