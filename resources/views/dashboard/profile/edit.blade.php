@extends('layouts.dashboard')

@section('title', 'Profile')
@section('section-title', 'Edit Profile')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Edit Profile</li>
@endsection

@push('styles')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush

@section('content')
    <section class="content">
        <div class="container-fluid">
            <x-alert type="success" />
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Profile Information</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ route('dashboard.profile.update') }}">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-6">
                                        <x-form.input label="First Name" type="text" name="first_name"
                                            :value="$user->profile->first_name" />
                                    </div>
                                    <div class="col-md-6">
                                        <x-form.input label="Last Name" type="text" name="last_name" :value="$user->profile->last_name" />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <x-form.input label="Birthday" type="date" name="birthday" :value="$user->profile->birthday" />
                                    </div>
                                    <div class="col-md-6">
                                        <x-form.radio name="gender" :options="['male' => 'Male', 'female' => 'Female']"
                                            :checked="$user->profile->gender">Gender</x-form.radio>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <x-form.input label="Street Address" type="text" name="street_address"
                                            :value="$user->profile->street_address" />
                                    </div>
                                    <div class="col-md-6">
                                        <x-form.input label="City" type="text" name="city" :value="$user->profile->city" />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <x-form.input label="State" type="text" name="state" :value="$user->profile->state" />
                                    </div>
                                    <div class="col-md-6">
                                        <x-form.input label="Postal Code" type="text" name="postal_code"
                                            :value="$user->profile->postal_code" />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <x-form.select_2 label="Country" name="country" class="countries" :options="$countries"
                                            :selected="$user->profile->country">
                                            <option value=""></option>
                                        </x-form.select_2>
                                    </div>
                                    <div class="col-md-6">
                                        <x-form.select_2 label="Locale" name="locale" class="locales" :options="$locales"
                                            :selected="$user->profile->locale">
                                            <option value=""></option>
                                        </x-form.select_2>
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer">
                                <x-form.button type="submit" label="Save" />
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection

@push('scripts')
    <!-- Select2 -->
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $('.countries').select2({
            theme: 'bootstrap4',
            placeholder: 'Select Country',
            allowClear: true
        })
        $('.locales').select2({
            theme: 'bootstrap4',
            placeholder: 'Select Language',
            allowClear: true
        })
    </script>
    <script src="{{ asset('js/dashboard/image-preview.js') }}"></script>
@endpush
