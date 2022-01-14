@extends('dashboard.layouts.app')
@section('dashboardContent')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <button type="button" class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add Vaccine
                </button>

                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <span class="text-white text-capitalize ps-3">Vaccines table</span>



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
                                                        ">Delete</button>
                                            <form id="done-form-{{$vaccine->id}}"
                                                  class="d-none"
                                                  method="post"
                                                  action="{{ route('admin.vaccines.delete_vaccine', $vaccine) }}"
                                            >
                                                @method('DELETE')
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


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="vaccines-form" action="{{ route('admin.vaccines.add_vaccine') }}" method="post">
                    @csrf
                        <div class="input-group input-group-static mb-4">
                            <label for="exampleFormControlSelect1" class="ms-0">Vaccines</label>
                            <select class="form-control" name="vaccine" id="exampleFormControlSelect1">
                                @forelse($all_vaccines as $vaccine)
                                    <option value="{{ $vaccine->id }}">{{ $vaccine->vaccines_name }}</option>
                                @empty
                                    <option disabled selected>No Vaccines For You</option>
                                @endforelse
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn bg-gradient-primary"
                            onclick="event.preventDefault();
                            document.getElementById('vaccines-form').submit();
                            "
                    >Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
