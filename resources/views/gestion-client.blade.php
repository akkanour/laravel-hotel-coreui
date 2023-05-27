@extends('layouts.app')

@section('content')
    <div class="container-lg">
        <div class="card">
            <div class="card-header">
                <h4>Gestion des clients</h4>
            </div>
            <div class="card-body">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Ajouter un client
                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="POST" action="{{ route('personnel_store') }}">
                                @csrf()
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ajouter personnel</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="nom" class="form-label">Nom</label>
                                        <input type="text" class="form-control" id="nom" name="nom">
                                    </div>
                                    <div class="mb-3">
                                        <label for="prenom" class="form-label">Prénom</label>
                                        <input type="text" class="form-control" id="prenom" name="prenom">
                                    </div>
                                    <div class="mb-3">
                                    </div>
                                    <div class="mb-3">
                                        <label for="numTel" class="form-label">Numéro</label>
                                        <input type="text" class="form-control" id="numTel" name="numTel">
                                    </div>
                                    <div class="mb-3">
                                        <label for="adresse" class="form-label">Adresse</label>
                                        <input type="text" class="form-control" id="adresse" name="adresse">
                                    </div>
                                    <div class="mb-3">
                                        <label for="typePoste" class="form-label">Type Poste</label>
                                        <select name="typePoste" id="typePoste">
                                            <option value="Directeur">Directeur</option>
                                            <option value="Manager">Manager</option>
                                            <option value="Receptionniste">Receptionniste</option>
                                            <option value="ValetDeChambre">ValetDeChambre</option>
                                            <option value="Serveur">Serveur</option>
                                            <option value="Employe">Employe</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <table class="table">
                    <thead>
                    <tr>
                        <th>Numéro</th>
                        <th>Disponibilité</th>
                        <th>Prix</th>
                        <th>Type personnel</th>
                        <th>Commodités</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clients as $client)
                        <tr>

                            <td>{{ $personnel->nom }}</td>
                            <td>{{ $personnel->prenom }}</td>
                            <td>{{$personnel->adresse}}</td>
                            <td>{{$personnel->numTel}}</td>
                            <td>{{$personnel->typePoste}}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalUpdate{{$personnel->id}}">
                                    Modifier
                                </button>
                                <div class="modal fade" id="exampleModalUpdate{{$personnel->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{ route('personnel_update',$personnel->id)}}" method="POST">
                                                <div class="modal-body">
                                                    {!! csrf_field() !!}
                                                    <div class="mb-3">
                                                        <label for="nom" class="form-label">Nom</label>
                                                        <input type="text" class="form-control" id="nom" name="nom" value="{{$personnel->nom}}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="prenom" class="form-label">Prénom</label>
                                                        <input type="text" class="form-control" id="prenom" name="prenom" value="{{$personnel->prenom}}">
                                                    </div>
                                                    <div class="mb-3">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="numTel" class="form-label">Numéro</label>
                                                        <input type="text" class="form-control" id="numTel" name="numTel" value="{{$personnel->numTel}}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="adresse" class="form-label">Adresse</label>
                                                        <input type="text" class="form-control" id="adresse" name="adresse" value="{{$personnel->adresse}}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="typePoste" class="form-label">Type Poste</label>
                                                        <select name="typePoste" id="typePoste">
                                                            <option value="Directeur" @if ($personnel->typePoste == 'Directeur') selected @endif>Directeur</option>
                                                            <option value="Manager" @if ($personnel->typePoste == 'Manager') selected @endif>Manager</option>
                                                            <option value="Receptionniste" @if ($personnel->typePoste == 'Receptionniste') selected @endif>Receptionniste</option>
                                                            <option value="ValetDeChambre" @if ($personnel->typePoste == 'ValetDeChambre') selected @endif>ValetDeChambre</option>
                                                            <option value="Serveur" @if ($personnel->typePoste == 'Serveur') selected @endif>Serveur</option>
                                                            <option value="Employe" @if ($personnel->typePoste == 'Employe') selected @endif>Employe</option>

                                                        </select>
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
            <form action="{{ route('personnel_delete', $personnel->id) }}" method="POST" style="display: inline;">
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
    </div>
@endsection
