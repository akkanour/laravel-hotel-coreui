@extends('layouts.app')
@section('content')
<div class="tab-content rounded-bottom">
    <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-438">
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                </div>
                <div class="col-sm-12">
                    <table class="table table-striped border datatable dataTable no-footer" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="border-collapse: collapse !important">
                        <thead>
                            <tr>
                                <th>Nom complet</th>
                                <th>Date début</th>
                                <th>Date fin</th>
                                <th>Chambre numéro</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservations as $reservation)
                            <tr>
                                <td>Adam Attari</td>
                                <td>{{$reservation->dateDebut}}</td>
                                <td>{{$reservation->dateFin}}</td>
                                <td>2</td>
                                <td>
                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalUpdateRes{{$reservation->id}}">
                                   Modifier
                                </button>
                                <div class="modal fade" id="exampleModalUpdateRes{{$reservation->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{ route('reservation_update',$reservation->id)}}" method="POST">
                                                <div class="modal-body">
                                                    {!! csrf_field() !!}
                                                    <div class="mb-3">
                                                        <label for="nomClient" class="form-label">Nom Client</label>
                                                        <input type="text" class="form-control" id="nomClient" name="nomClient" value="{{$reservation->nomClient}}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="dateDebut" class="form-label">Date début</label>
                                                        <input type="date" class="form-control" id="dateDebut" name="dateDebut" value="{{$reservation->dateDebut}}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="dateFin" class="form-label">Date fin</label>
                                                        <input type="date" class="form-control" id="dateFin" name="dateFin" value="{{$reservation->dateFin}}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="numChambre" class="form-label">Date fin</label>
                                                        <input type="text" class="form-control" id="numChambre" name="numChambre" value="">
                                                    </div>
                                                </div>


                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit"  class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <form action="{{ route('reservation_delete', $reservation->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-sm-12 col-md-7">
                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate"></div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
