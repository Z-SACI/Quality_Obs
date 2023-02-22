@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Dashboard')
@section('content')
<!-- background-color:#ed143d; -->
<div class="card col-12 p-0 mr-0 ml-0 bg-danger shadow-none rounded-0 " >
  <div class="card-body">
    <div class="d-flex align-items-center">
      <div class="col-5 text-dark">
        
      </div>
      <div class="col-7" >
        <div class="row float-right">
          <a type="button" href="{{ route('AddPvEssais') }}" class=" mr-2 btn btn-md btn-light btn-outline-danger border-danger btn-md btn-lg shadow-sm font-weight-bold text-danger"></i> Nouveau PV d'Essais d'Entreprise</a>
        <!-- </div>
        <div class="row mt-2"> -->
          <a type="button" href="{{ route('AddEprv') }}" class="float-right btn btn-md btn-light btn-outline-danger border-danger btn-md btn-lg shadow-sm font-weight-bold text-danger" ></i>Nouveau Prélèvement CTC</a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid pr-5 pl-5 mt-5">
  <!-- <div class="row mt-3">
    <div class="col-sm-4">
      <h1 class="text-danger" style="font-size: xxx-large;"><b>DASHBOARD</b></h1>
    </div>
  </div> -->

  <!-- <hr style="visibility: hidden;"> -->
  <!-- <div class="row">
    <div class="col-sm-4" style="float:right">
    </div>
    <div class="col-sm-8" style="float:right"> -->
  <!-- Button trigger modal -->
  <!-- <a type="button" href="{{ route('Eprouvettes') }}" class="btn btn-info btn-md btn-lg ml-2" style="float:right;"> Consulter la liste dElément</a> -->
  <!-- <a href="{{ route('AddEprv') }}" class="btn-md btn-lg ml-2" style="float:right;"></i>Renseigner Un Prélèvement CTC</a>
      <a href="{{ route('AddPvEssais') }}" class="btn-md btn-lg" style="float:right;"></i>Renseigner Un PV d'Essais d'Entreprise</a>
    </div>
  </div> -->
  <div class="row mt-0 mb-3">
    <div class="col-sm-6">
      <!-- <div class="card p-0 border-danger" style="border: 0px; border-left:3px solid red;">
        <div class="card-body">
          <div class="d-flex align-items-center"> -->
      <h2 class="text-danger m-2 mt-4"><b>ANALYSE QUANTITATIVE</b></h2>
      <!-- </div>
        </div>
      </div> -->
    </div>
  </div>
  <!-- <div class="row d-flex align-items"> -->
    <!-- <div class="col-lg-7 mt-2"> -->

      <div class="row card-deck align-items">
        <div class="card col-lg-4 p-0">
          <div class="card-header bg-danger p-0">
            <h5 class="m-2"><b>Dénombrement Global des Eprouvettes par Agences</b></h5>
          </div>
          <div class="card-body">
            <div>
              <canvas id="myChart"></canvas>
            </div>
          </div>
        </div>
        <div class="card col-lg-3 p-0">
          <div class="card-header p-0">
            <h5 class="m-2" style="text-align:center"><b>Classification des Projets Controlés par Catégorie de Chantier</b></h5>
          </div>
          <div class="card-body">
            <div>
              <canvas id="chantier"></canvas>
            </div>
          </div>
        </div>
      <!-- </div> -->
    <!-- </div> -->
    <!-- <div class="col-lg-5 mt-2" > -->
      <div class="card col-lg-5 p-0" style="overflow:hidden;">
        <div class="card-body m-0 p-0" style="background-color:transparent">
          <div id="map" class="col-12 m-0 p-0" >
            <div id="popup" class="ol-popup">
              <a href="#" id="popup-closer" class="ol-popup-closer"></a>
              <div id="popup-content"></div>
            </div>
          </div>
        </div>
      </div>
    <!-- </div> -->
  </div>
  <!-- <hr> -->
  <div class="row mt-5 mb-3">
    <div class="col-sm-6">
      <!-- <div class="card p-0 border-danger" style="border: 0px; border-left:3px solid red;">
        <div class="card-body">
          <div class="d-flex align-items-center"> -->
      <h2 class="text-danger m-2 mt-4"><b>RATIO QUALITE DU BETON "RQB"</b></h2>
      <!-- </div>
        </div>
      </div> -->
    </div>
    <div class="col-sm-6">
      <!-- <div class="row card-deck align-items">
        <div class="card col-6 p-0 border-danger" style="border: 0px; border-left:3px solid red;">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div class="col-8">
                <h5 class="m-0">Nombre Eprouvettes CTC </h5>
              </div>
              <div class="col-4">
                <h4><?php echo count($rqbs); ?></h4>
              </div>
            </div>
          </div>
        </div>
        <div class="card col-6 p-0 border-danger" style="border: 0px; border-left:3px solid red;">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div class="col-8">
                <h5 class="m-0">Nombre d'Eprouvettes Entreprises</h5>
              </div>
              <div class="col-4">
                <h4 class="m-0"><?php echo count($rqbse); ?></h4>
              </div>
            </div>
          </div>
        </div>
      </div> -->
    </div>
  </div>
  <div class="row card-deck align-items ">
    <div class="card col-6 p-0">
      <div class="card-header p-2">
        <h5 class="m-1"><b>Population Qualité du Béton CTC - {{Auth::user()->dr}}</b></h5>
      </div>
      <div class="card-body">
        <div>
          <canvas id="rqb"></canvas>
        </div>
      </div>
    </div>
    <div class="card col-6 p-0">
      <div class="card-header p-2">
        <h5 class="m-1"><b>Population Qualité du Béton Entreprise - {{Auth::user()->dr}}</b></h5>
      </div>
      <div class="card-body">
        <div>
          <canvas id="rqbe"></canvas>
        </div>
      </div>
    </div>
  </div>
  <!-- ICIIIIIIIIIIIII -->
  <!-- <div class="row card-deck align-items mt-3">
    <div class="card col-6 p-0">
      <div class="card-header p-2 bg-primary">
        <h5 class="m-1"><b>RQB Par mode de Production CTC - {{Auth::user()->dr}}</b></h5>
      </div>
      <div class="card-body">
        <div>
          <table class="table table-striped " id="myTable">
            <thead>
              <tr>
                <th scope="col">Code Agence</th>
                <th scope="col">Nom Agence</th>
                <th scope="col">Mode de Production</th>
                <th scope="col">Moyenne</th>
              </tr>
            </thead>
            <tbody>
              @foreach($mp_ctc as $mpctc)
              <tr>
                <th>{{$mpctc->agn_code}}</th>
                <th>{{$mpctc->agn_nom}}</th>
                <th>{{$mpctc->mode_prod}}</th>
                <th>{{$mpctc->moy}}</th>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="card col-6 p-0">
      <div class="card-header p-2 bg-primary">
        <h5 class="m-1"><b>RQB Par mode de Production Entreprise - {{Auth::user()->dr}}</b></h5>
      </div>
      <div class="card-body">
        <div>
          <table class="table table-striped" id="myTable2">
            <thead>
              <tr>
                <th scope="col">Code Agence</th>
                <th scope="col">Nom Agence</th>
                <th scope="col">Mode de Production</th>
                <th scope="col">Moyenne</th>
              </tr>
            </thead>
            <tbody>
              @foreach($mp_entrp as $mpentrp)
              <tr>
                <th>{{$mpentrp->agn_code}}</th>
                <th>{{$mpentrp->agn_nom}}</th>
                <th>{{$mpentrp->mode_prod}}</th>
                <th>{{$mpentrp->moy}}</th>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div> -->
  <!-- <hr> -->
  <div class="row align-items mt-5 mb-3">
    <div class="col-sm-6">
      <!-- <div class="card p-0 border-danger" style="border: 0px; border-left:3px solid red;">
        <div class="card-body">
          <div class="d-flex align-items-center"> -->
      <h2 class="text-danger m-2 mt-4"><b>ANALYSE DE LA SOURCE DES MATERIAUX</b></h2>
      <!-- </div>
        </div>
      </div> -->
    </div>
  </div>
  <div class="row card-deck align-items">
    <!-- <div class="row card-deck align-items "> -->
    <!-- <div class="card col-lg-6 mt-3 p-0">
          <div class="card-header bg-danger">
            Nombre d'Eprouvettes 28 Jrs
          </div>
          <div class="card-body">
            <canvas id="doughnut-chart"></canvas>
          </div>
          <div class="card-footer ">
            Par Rapport à l'Ecart de 28 Jrs (T3)
          </div>
        </div> -->
    <div class="card col-lg-4 mt-2 p-0">
      <div class="card-header bg-danger">
        Nombre d'affaires / type de Ciment
      </div>
      <div class="card-body">
        <canvas id="typcim"></canvas>
      </div>
    </div>
    <!-- </div>
      </div> -->
    <div class="card col-lg-4 mt-2 p-0">
      <div class="card-header p-2 bg-danger">
        <h5 class="m-1"><b>Nombre de Projets / Carrière Granulas</b></h5>
      </div>
      <div class="card-body">
        <canvas id="bar-chart2"></canvas>
      </div>
      <div class="card-footer ">
        Par Rapport à la Provenance (T3)
      </div>
    </div>
    <div class="card col-lg-4 mt-2 p-0">
      <div class="card-header p-2 bg-danger">
        <h5 class="m-1"><b>Nombre de Projets / Carrière Sable</b></h5>
      </div>
      <div class="card-body">
        <canvas id="bar-chart3" style="height:100%"></canvas>
      </div>
      <div class="card-footer ">
        Par Rapport à la Provenance (T3)
      </div>
    </div>
    <!-- </div> -->
  </div>
</div>

<hr>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  // nbr de projets par dr
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: <?php echo json_encode($agns); ?>,
      datasets: [{
        label: 'Nombre d\'Eprouvettes CTC',
        data: <?php echo json_encode($eprv_agence_ctc); ?>,
        backgroundColor: [
          'rgba(75, 192,192,0.6)'
        ],
        borderColor: 'rgba(75, 192,192,1)',
        borderWidth: 1
      }, {
        label: 'Nombre d\'Eprouvettes Entreprise',
        data: <?php echo json_encode($eprv_agence_entrp); ?>,
        backgroundColor: [
          'rgba(255, 159, 64, 0.5)',
        ],
        borderColor: 'rgba(255, 159, 64, 1)',
        borderWidth: 1
      }]
    },
    options: {
      // indexAxis: 'y',
      scales: {
        y: {
          // stacked: true,
          beginAtZero: true,
          // stepSize: 250,
        },
        x: {
          // stacked: true,
          ticks: {
            autoSkip: false,
          
            // sampleSize:2,
          }
        },
      },
      categoryPercentage: 1,
      barPercentage: 0.8,
      responsive: true,
    }
  });

  // nbr de prjet par catégorie de chantier
  const catchantier = document.getElementById('chantier');
  new Chart(catchantier, {
    type: 'pie',
    data: {
      labels: <?php echo json_encode($cats); ?>,
      datasets: [{
        label: "Nombre d'Affaires",
        data: <?php echo json_encode($prj_cat); ?>,
        backgroundColor: [
          'rgba(255, 99,132,0.6)',
          'rgba(75, 192,192,0.6)',
          'rgba(255,205, 86,0.6)',
          'rgba(201,203,207,0.6)',
          'rgba(54, 162,235,0.6)',
          'rgba(255, 99,132,0.6)',
          'rgba(75, 192,192,0.6)',
          'rgba(255,205, 86,0.6)',
          'rgba(201,203,207,0.6)',
          'rgba(54, 162,235,0.6)',
        ]
      }]
    },
    options: {}
  });

  // test
  const sbgran = document.getElementById('sable_gran');
  new Chart(sbgran, {
    type: 'bar',
    data: {
      labels: <?php echo json_encode($agns); ?>,
      datasets: [{
        label: 'Nombre d\'Eprouvettes',
        data: <?php echo json_encode($eprv_agence); ?>,
        backgroundColor: [
          'rgba(255, 159, 64, 0.6)',
          'rgba(255, 205, 86, 0.6)',
          'rgba(75, 192, 192, 0.6)',
          'rgba(54, 162, 235, 0.6)',
          'rgba(153, 102,255, 0.6)',
          'rgba(201, 203,207, 0.6)',
          'rgba(255, 159, 64, 0.6)',
          'rgba(255, 205, 86, 0.6)',
          'rgba(75, 192, 192, 0.6)',
          'rgba(54, 162, 235, 0.6)',
          'rgba(153, 102,255, 0.6)',
          'rgba(201, 203,207, 0.6)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      indexAxis: 'y',
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  // new Chart(document.getElementById("doughnut-chart"), {
  //   type: 'doughnut',
  //   data: {
  //     labels: ["CTC", "Entreprise"],
  //     datasets: [{
  //       label: "Nombre d'eprouvettes réalisées",
  //       backgroundColor: ['rgba(75, 192,192,0.6)',
  //         'rgba(255,205, 86,0.6)',
  //         'rgba(201,203,207,0.6)',
  //         'rgba(54, 162,235,0.6)'
  //       ],
  //       data: <?php echo json_encode($nbr3); ?>
  //     }]
  //   },
  //   options: {
  //     title: {
  //       display: true,
  //       text: 'Predicted world population (millions) in 2050'
  //     }
  //   }
  // });

  new Chart(document.getElementById("bar-chart3"), {
    type: 'bar',
    data: {
      labels: <?php echo json_encode($carrsab); ?>,
      datasets: [{
        label: "Nombre de Projets",
        data: <?php echo json_encode($nbrsab); ?>,
        backgroundColor: ['rgba(75, 192, 192, 0.6)',
          'rgba(54, 162, 235, 0.6)',
          'rgba(153, 102,255, 0.6)',
          'rgba(201, 203,207, 0.6)',
          'rgba(255, 159, 64, 0.6)',
          'rgba(255, 205, 86, 0.6)',
          'rgba(75, 192, 192, 0.6)',
          'rgba(54, 162, 235, 0.6)',
          'rgba(153, 102,255, 0.6)',
          'rgba(201, 203,207, 0.6)'
        ],
      }]
    },
    options: {
      legend: {
        display: false,
      },

      indexAxis: 'y',
      barPercentage: 0.6,
    }
  });


  new Chart(document.getElementById("bar-chart2"), {
    type: 'bar',
    data: {
      labels: <?php echo json_encode($carrs); ?>,
      datasets: [{
        label: "Nombre de Projets",
        backgroundColor: ['rgba(75, 192, 192, 0.6)',
          'rgba(54, 162, 235, 0.6)',
          'rgba(153, 102,255, 0.6)',
          'rgba(201, 203,207, 0.6)',
          'rgba(255, 159, 64, 0.6)',
          'rgba(255, 205, 86, 0.6)',
          'rgba(75, 192, 192, 0.6)',
          'rgba(54, 162, 235, 0.6)',
          'rgba(153, 102,255, 0.6)',
          'rgba(201, 203,207, 0.6)'
        ],
        data: <?php echo json_encode($nbrgran); ?>,
      }]
    },
    options: {
      legend: {
        display: true,
      },
      ticks: {
        autoSkip: false,
        // sampleSize:2,


      },
      responsive: true,
      indexAxis: 'y',
      barPercentage: 0.6,
    }
  });

  new Chart(document.getElementById("typcim"), {
    type: 'bar',
    data: {
      labels: <?php echo json_encode($typcim); ?>,
      datasets: [{
        label: "",
        backgroundColor: ['rgba(75, 192, 192, 0.6)',
          'rgba(54, 162, 235, 0.6)',
          'rgba(153, 102,255, 0.6)',
          'rgba(201, 203,207, 0.6)',
          'rgba(255, 159, 64, 0.6)',
          'rgba(255, 205, 86, 0.6)',
          'rgba(75, 192, 192, 0.6)',
          'rgba(54, 162, 235, 0.6)',
          'rgba(153, 102,255, 0.6)',
          'rgba(201, 203,207, 0.6)'
        ],
        data: <?php echo json_encode($prj_typ); ?>,
      }]
    },
    options: {
      legend: {
        display: true,
      },
      ticks: {
        autoSkip: false,
        // sampleSize:2,


      },
      responsive: true,
      // indexAxis: 'y',
    }
  });

  // RQB CTC
  const rqb = document.getElementById('rqb');
  new Chart(rqb, {
    type: 'bar',
    data: {
      datasets: [{
        label: "nombre d'éprouvettes",
        data: <?php echo json_encode($nrqbs); ?>,
        // this dataset is drawn below
        order: 2,
        barPercentage: 0.5,
      }, {
        label: '',
        data: <?php echo json_encode($nrqbs); ?>,
        fill: false,
        // fill: {value: "[0.8 - 1]"},
        type: 'line',
        // this dataset is drawn on top
        order: 1,
        tension: 0.5,
      }, {
        label: 'RQB < 1',
        data: <?php echo json_encode($nrqbs5); ?>,
        fill: true,
        // fill: {value: "[0.8 - 1]"},
        type: 'line',
        // this dataset is drawn on top
        order: 1,
        tension: 0.5,
      }, {
        label: 'Moyenne',
        data: <?php echo json_encode($nbr); ?>,
        type: 'bar',
        // this dataset is drawn on top
        order: 1,
        barPercentage: 0.1,
        legend: false,
      }],

      labels: <?php echo json_encode($int); ?>,
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        },
        x: {
          stacked: true,
        }
      }
    }
  });
  // RQB Entreprise
  const rqbe = document.getElementById('rqbe');
  new Chart(rqbe, {
    type: 'bar',
    data: {
      datasets: [{
        label: "nombre d'éprouvettes",
        data: <?php echo json_encode($nrqbse); ?>,
        // this dataset is drawn below
        barPercentage: 0.5,
        order: 2
      }, {
        label: '',
        data: <?php echo json_encode($nrqbse); ?>,
        fill: false,
        // fill: {value: "[0.8 - 1]"},
        type: 'line',
        // this dataset is drawn on top
        order: 1,
        tension: 0.5,
      }, {
        label: 'RQB < 1',
        data: <?php echo json_encode($nrqbse5); ?>,
        fill: true,
        // fill: {value: "[0.8 - 1]"},
        type: 'line',
        // this dataset is drawn on top
        order: 1,
        tension: 0.5,
      }, {
        label: 'Moyenne',
        data: <?php echo json_encode($nbrentrp); ?>,
        type: 'bar',
        // this dataset is drawn on top
        order: 1,
        barPercentage: 0.1,
      }],

      labels: <?php echo json_encode($intentrp); ?>,
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        },
        x: {
          stacked: true,
        }
      }
    }
  });
  //   RQB MOY
</script>
<!-- map scripts -->
<script src="css/map/resources/qgis2web_expressions.js"></script>
<script src="css/map/resources/proj4.js"></script>
<script>
  proj4.defs('EPSG:4326', '+proj=longlat +datum=WGS84 +no_defs');
</script>
<script src="css/map/resources/polyfills.js"></script>
<script src="css/map/resources/functions.js"></script>
<script src="css/map/resources/ol.js"></script>
<script src="http://cdn.polyfill.io/v2/polyfill.min.js?features=Element.prototype.classList,URL"></script>
<script src="css/map/resources/horsey.min.js"></script>
<script src="css/map/resources/ol3-search-layer.js"></script>
<script src="css/map/resources/ol-layerswitcher.js"></script>
<script src="css/map/resources/ol-geocoder.js"></script>
<script src="css/map/layers/sabl_1.js"></script>
<script src="css/map/styles/sabl_1_style.js"></script>
<script src="css/map/layers/layers.js" type="text/javascript"></script>
<script src="css/map/resources/Autolinker.min.js"></script>
<script src="css/map/resources/qgis2web.js"></script>
@endsection