@extends('layouts.app')

@section('content')
    <div class="container-lg">
        <div class="card">
            <div class="card-header">
                <h4>Gestion des chambres</h4>
            </div>
            <div class="card-body">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Ajouter une chambre
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="POST" action="{{ route('chambre_store') }}">
                                @csrf()
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="numChambre" class="form-label">Numéro Chambre</label>
                                        <input type="text" class="form-control" id="numChambre" name="numChambre">
                                    </div>
                                    <div class="mb-3">
                                        <label for="dispo" class="form-label">Disponibilité</label>
                                        {{--Ajouter un switch pour dispo--}}
                                        <input type="text" class="form-control" id="dispo" name="dispo">
                                    </div>
                                    <div class="mb-3">
                                    </div>
                                    <div class="mb-3">
                                        <label for="prix" class="form-label">Prix</label>
                                        <input type="text" class="form-control" id="prix" name="prix">
                                    </div>
                                    <div class="mb-3">
                                        <label for="typeChambre" class="form-label">Type Chambre</label>
                                        <select name="typeChambre" id="typeChambre">
                                            <option value="Simple">Simple</option>
                                            <option value="Double">Double</option>
                                            <option value="Suite">Suite</option>
                                            <option value="Vip">Vip</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="commodite" class="form-label">Commodité</label>
                                            <select multiple name="commodite[]" class="form-select">
                                                <option value="Wifi">Wifi</option>
                                                <option value="Tv">Tv</option>
                                                <option value="Mini-Bar">Mini-Bar</option>
                                                <option value="Climatisation">Climatisation</option>
                                                <option value="Coffre-fort">Cofrre-fort</option>
                                            </select>
                                        </div>
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
                        <th>Type Chambre</th>
                        <th>Commodités</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($chambres as $chambre)
                        <tr>

                            <td>{{ $chambre->numChambre }}</td>
                            <td>{{ $chambre->dispo }}</td>
                            <td>{{$chambre->prix}}</td>
                            <td>{{$chambre->typeChambre}}</td>
                            <td>{{$chambre->commodite}}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalUpdate{{$chambre->id}}">
                                   Modifier
                                </button>
                                <div class="modal fade" id="exampleModalUpdate{{$chambre->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{ route('chambre_update',$chambre->id)}}" method="POST">
                                                <div class="modal-body">
                                                    {!! csrf_field() !!}
                                                    <div class="mb-3">
                                                        <label for="numChambre" class="form-label">Numéo Chambre</label>
                                                        <input type="text" class="form-control" id="numChambre" name="numChambre" value="{{$chambre->numChambre}}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="dispo" class="form-label">Disponibilité</label>
                                                        <input type="text" class="form-control" id="dispo" name="dispo" value="{{$chambre->dispo}}">
                                                    </div>
                                                    <div class="mb-3">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="prix" class="form-label">Prix</label>
                                                        <input type="text" class="form-control" id="prix" name="prix" value="{{$chambre->prix}}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="typeChambre" class="form-label">Type Chambre</label>
                                                        <select name="typeChambre" id="typeChambre">
                                                            <option value="Simple" @if ($chambre->typeChambre == 'Simple') selected @endif>Simple</option>
                                                            <option value="Double" @if ($chambre->typeChambre == 'Double') selected @endif>Double</option>
                                                            <option value="Suite" @if ($chambre->typeChambre == 'Suite') selected @endif>Suite</option>
                                                            <option value="Vip" @if ($chambre->typeChambre == 'Vip') selected @endif>Vip</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="form-group">
                                                            <label for="commodite" class="form-label">Commodité</label>
                                                            <select multiple name="commodite[]" id="commodite" class="form-control">
                                                                <option value="Wifi"@if ($chambre->commodite == 'Wi-Fi') selected @endif>Wifi</option>
                                                                <option value="Tv" @if ($chambre->commodite == 'Tv') selected @endif>Tv</option>
                                                                <option value="Mini-Bar" @if ($chambre->commodite == 'Mini-Bar') selected @endif>Mini-Bar</option>
                                                                <option value="Climatisation" @if ($chambre->commodite == 'Climatisation') selected @endif>Climatisation</option>
                                                                <option value="Coffre-fort" @if ($chambre->commodite == 'Coffre-fort') selected @endif>Coffre-fort</option>
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
                                <form action="{{ route('chambre_delete', $chambre->id) }}" method="POST" style="display: inline;">
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
