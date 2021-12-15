@extends('dashboard.layouts.app')
@section('dashboardContent')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Authors table</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Phone number</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Doctor Name </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Certificates </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Days</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Start</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">End</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($admins as $admin)
                                    <tr>
                                        <td>
                                            {{ $admin->phone_number }}
                                        </td>
                                        <td>
                                            {{ $admin->full_name }}
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            {{ $admin->certificates }}
                                        </td>
                                        <td class="align-middle text-center">
                                            {{ $admin->email }}
                                        </td>
                                        <td class="align-middle">
                                            @foreach(explode(',',$admin->days) as $day)
                                                <span class="col-form-label-sm  text-success" >{{ $day }}</span>
                                            @endforeach
                                        </td>
                                        <td class="align-middle">
                                            {{ $admin->start }}
                                        </td>
                                        <td class="align-middle">
                                            {{ $admin->end }}
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
