@extends('dashboard.layouts.app')
@section('dashboardContent')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Appoints table</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Username</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Doctor Name </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Vaccine name </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Time</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Day</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($appoints as $appoint)
                                    <tr>
                                        <td>
                                            {{ $appoint->user->full_name }}
                                        </td>
                                        <td>
                                            {{ $appoint->admin->full_name }}
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            {{ $appoint->vaccine->vaccines_name }}
                                        </td>
                                        <td class="align-middle text-center">
                                            {{ $appoint->time }}
                                        </td>
                                        <td class="align-middle text-center">
                                            {{ $appoint->day }}
                                        </td>
                                        <td class="align-middle">
                                            <button class="btn btn-primary"
                                                    onclick="event.preventDefault();
                                                    document.getElementById('done-form-{{$appoint->user_id}}-{{$appoint->vaccine_id}}').submit();
                                                    ">Done</button>
                                            <form id="done-form-{{$appoint->user_id}}-{{$appoint->vaccine_id}}"
                                                  class="d-none"
                                                  method="post"
                                                  action="{{ route('admin.appoints.done-user',[$appoint->user_id,$appoint->vaccine_id]) }}">
                                                @csrf
                                            </form>
                                            <button class="btn btn-primary"
                                                    onclick="event.preventDefault();
                                                    document.getElementById('done-form-{{$appoint->user_id}}-{{$appoint->vaccine_id}}').submit();
                                                    ">Delete</button>
                                            <form id="done-form-{{$appoint->user_id}}-{{$appoint->vaccine_id}}"
                                                  class="d-none"
                                                  method="post"
                                                  action="{{ route('admin.appoints.delete-user',[$appoint->user_id,$appoint->vaccine_id]) }}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
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
