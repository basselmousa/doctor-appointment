@extends('dashboard.layouts.app')
@section('dashboardContent')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Vaccines table</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                <tr>

                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Vaccine name </th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($vaccines as $vaccine)
                                    <tr>
                                        <td>
                                            {{ $vaccine->vaccines_name }}
                                        </td>

                                        <td class="align-middle">
                                            <button class="btn btn-primary"
                                                    onclick="event.preventDefault();
                                                        document.getElementById('done-form-{{$vaccine->id}}').submit();
                                                        ">Done</button>
                                            <form id="done-form-{{$vaccine->id}}"
                                                  class="d-none"
                                                  method="post"
                                                  action="{{ route('admin.vaccines.delete_vaccine', $vaccine) }}"
                                            >
                                                @csrf
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
