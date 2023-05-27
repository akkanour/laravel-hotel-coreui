@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
    @if(auth()->user()->role == 'admin')
        <div class="col-md-12 ">
            <div class="row">
                <div class="col-xl-3 col-lg-6">
                    <div class="card l-bg-cherry">
                        <div class="card-statistic-3 p-4">
                            <div class="card-icon card-icon-large"><i class="fas fa-users" style="margin-right: 20px";></i></div>
                            <div class="mb-4">
                                <h5 class="card-title mb-0">Client</h5>
                            </div>
                            <div class="row align-items-center mb-2 d-flex">
                                <div class="col-8">
                                    <h2 class="d-flex align-items-center mb-0">
                                        {{ App\Models\Client::count() }}
                                    </h2>
                                </div>
                            </div>
                            <div class="progress mt-1" data-height="8" style="height: 8px;">
                                    <?php
                                    $clientCount = App\Models\Client::count(); // Nombre de clients actuel
                                    $previousClientCount = 1; // Nombre de clients précédent

                                    $growthPercentage = ($clientCount - $previousClientCount) / $previousClientCount * 100;
                                    ?>
                                <div class="progress-bar l-bg-cyan" role="progressbar" data-width="<?php echo $clientCount; ?>" aria-valuenow="<?php echo $clientCount; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $clientCount; ?>%;"></div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card l-bg-cyan">
                        <div class="card-statistic-3 p-4">
                            <div class="card-icon card-icon-large"><i class="fas fa-user-tie" style="margin-right: 20px";></i></div>
                            <div class="mb-4">
                                <h5 class="card-title mb-0">Personnel</h5>
                            </div>
                            <div class="row align-items-center mb-2 d-flex">
                                <div class="col-8">
                                    <h2 class="d-flex align-items-center mb-0">
                                        {{ App\Models\Personnel::count() }}
                                    </h2>
                                </div>
                            </div>
                            <div class="progress mt-1" data-height="8" style="height: 8px;">
                                    <?php
                                    $personnelCount = App\Models\Personnel::count(); // Nombre de clients actuel
                                    $previousPersonnelCount = 1; // Nombre de clients précédent

                                    $growthPercentage = ($personnelCount - $previousPersonnelCount) / $previousPersonnelCount * 100;
                                    ?>
                                <div class="progress-bar l-bg-cyan" role="progressbar" data-width="<?php echo $personnelCount; ?>" aria-valuenow="<?php echo $personnelCount; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $personnelCount; ?>%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card l-bg-green-dark">
                        <div class="card-statistic-3 p-4">
                            <div class="card-icon card-icon-large"><i class=" fas fa-solid fa-bed" style="margin-right: 20px";></i></div>
                            <div class="mb-4">
                                <h5 class="card-title mb-0">Chambre</h5>
                            </div>
                            <div class="row align-items-center mb-2 d-flex">
                                <div class="col-8">
                                    <h2 class="d-flex align-items-center mb-0">
                                        {{ App\Models\Chambre::count() }}
                                    </h2>
                                </div>
                            </div>
                            <div class="progress mt-1" data-height="8" style="height: 8px;">
                                    <?php
                                    $chambreCount = App\Models\Chambre::count(); // Nombre de clients actuel
                                    $previousChambreCount = 1; // Nombre de clients précédent

                                    $growthPercentage = ($chambreCount - $previousChambreCount) / $previousChambreCount * 100;
                                    ?>
                                <div class="progress-bar l-bg-cyan" role="progressbar" data-width="<?php echo $chambreCount; ?>" aria-valuenow="<?php echo $chambreCount; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $chambreCount; ?>%;"></div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card l-bg-orange-dark">
                        <div class="card-statistic-3 p-4">
                            <div class="card-icon card-icon-large"><i class="fas fa-solid fa-calendar" style="margin-right: 20px";></i></div>
                            <div class="mb-4">
                                <h5 class="card-title mb-0">Reservation</h5>
                            </div>
                            <div class="row align-items-center mb-2 d-flex">
                                <div class="col-8">
                                    <h2 class="d-flex align-items-center mb-0">
                                        {{ App\Models\Reservation::count() }}
                                    </h2>
                                </div>
                                <div class="progress mt-1" data-height="8" style="height: 8px;">
                                        <?php
                                        $reservationCount = App\Models\Reservation::count(); // Nombre de clients actuel
                                        $previousReservationCount = 1; // Nombre de clients précédent

                                        $growthPercentage = ($reservationCount - $previousReservationCount) / $previousReservationCount * 100;
                                        ?>
                                    <div class="progress-bar l-bg-cyan" role="progressbar" data-width="<?php echo $reservationCount; ?>" aria-valuenow="<?php echo $reservationCount; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $reservationCount; ?>%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
