     @include ('admin/partials/header')
     @include ('admin/partials/sidebar')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                      
                    </div>

                
                       <!-- Content Row -->
                       <div class="row">

                
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Earnings (Completed Order)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">RM {{ $completed_booking_price }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Booking 
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $total_booking }}</div>
                                                </div>
                                               
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Total Completed Order</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $completed_booking_count }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Total Pending Booking</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_booking_in_progress}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                <div class="row">
                    
                  
                        
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Earnings (this month)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">RM {{ $completed_booking_sum_this_month }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-secondary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                            Total Settle Order Amount (this week)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">RM{{ $completed_booking_sum_this_week }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <!-- /.container-fluid -->



                
                <div class="row">
                    <div class="col-xl-10 m-auto col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                                    <div class="dropdown no-arrow">
                                    
                                        
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                   
                    </div>

                    <div class="row">
                        <div class="col-xl-5 m-auto col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Issues in Phone</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink" id="legendDropdown">
                                            <!-- Legend items will be dynamically added here -->
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 m-auto col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Issues in Laptop</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink1" id="legendDropdown1">
                                            <!-- Legend items will be dynamically added here -->
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-center">
                                    <div class="chart-area">
                                        <canvas id="myPieChart2"></canvas>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                


            </div>
            <!-- End of Main Content -->

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                 const ctx = document.getElementById('myPieChart').getContext('2d');
             const pieChartData = JSON.parse(`{!! $pieChartData !!}`); 
             
             const myPieChart = new Chart(ctx, {
                 type: 'pie',
                 data: {
                     labels: pieChartData.labels,
                     datasets: pieChartData.datasets
                 },
                 options: {
                     responsive: true,
                     plugins: {
                       
                         tooltip: {
                             callbacks: {
                                 label: function(context) {
                                     const label = context.label || '';
                                     const value = context.raw || 0;
                                     return `${label}: ${value}`;
                                 }
                             }
                         }
                     }
                 }
             });
             myPieChart.legend.options.display = false;
             const legendDropdown = document.getElementById('legendDropdown');
            pieChartData.labels.forEach((dataset, index) => {
                const legendItem = document.createElement('p');
                legendItem.classList.add('dropdown-item');
               
                legendItem.textContent = dataset + ' ';

                 const button = document.createElement('button');
        button.classList.add('legend-button');
        button.style.width = '15px';
        button.style.height = '15px';
        button.style.border = 'none';
        button.style.backgroundColor = pieChartData.datasets[0].backgroundColor[index]; 
        button.style.marginLeft = '10px'; 
        button.style.borderRadius = '50%';

        // Append button to legend item
        legendItem.appendChild(button);
   

                legendItem.addEventListener('click', function () {
                    // Toggle visibility of corresponding dataset
                    const meta = myPieChart.getDatasetMeta(index);
                    meta.hidden = !meta.hidden;

                    // Update chart to reflect changes
                    myPieChart.update();
                });

                legendDropdown.appendChild(legendItem);
            });
                        
             });
             </script>



                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                    const ctx = document.getElementById('myPieChart2').getContext('2d');
                const pieChartData = JSON.parse(`{!! $pieChartData1 !!}`); 
                
                const myPieChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: pieChartData.labels,
                        datasets: pieChartData.datasets
                    },
                    options: {
                        responsive: true,
                        plugins: {
                        
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        const label = context.label || '';
                                        const value = context.raw || 0;
                                        return `${label}: ${value}`;
                                    }
                                }
                            }
                        }
                    }
                });
                myPieChart.legend.options.display = false;
                const legendDropdown = document.getElementById('legendDropdown1');
                pieChartData.labels.forEach((dataset, index) => {
                    const legendItem = document.createElement('p');
                    legendItem.classList.add('dropdown-item');
                
                    legendItem.textContent = dataset + ' ';

                    const button = document.createElement('button');
                button.classList.add('legend-button');
                button.style.width = '15px';
                button.style.height = '15px';
                button.style.border = 'none';
                button.style.backgroundColor = pieChartData.datasets[0].backgroundColor[index]; 
                button.style.marginLeft = '10px'; 
                button.style.borderRadius = '50%';

                // Append button to legend item
                legendItem.appendChild(button);


                    legendItem.addEventListener('click', function () {
                        // Toggle visibility of corresponding dataset
                        const meta = myPieChart.getDatasetMeta(index);
                        meta.hidden = !meta.hidden;

                        // Update chart to reflect changes
                        myPieChart.update();
                    });

                    legendDropdown.appendChild(legendItem);
                });
                            
                });
                </script>

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                  const ctx = document.getElementById('myAreaChart').getContext('2d');
                  const chartData = JSON.parse(`{!! $chartData !!}`);
              
                  const myChart = new Chart(ctx, {
                      type: 'line',
                      data: {
                          labels: chartData.labels,
                          datasets: chartData.datasets
                      },
                      options: {
                          responsive: true,
                          scales: {
                              x: {
                                  type: 'category',
                                  labels: chartData.labels
                              },
                              y: {
                                  beginAtZero: true,
                                  title: {
                                    display: true,
                                    text: 'Price'
                    }
                              }
                          },
                          plugins: {
                              tooltip: {
                                  callbacks: {
                                      label: function(context) {
                                          const label = context.dataset.label || '';
                                          const value = context.raw || 0;
                                          return `${label}: RM ${value}`;
                                      }
                                  }
                              }
                          }
                      }
                  });
              });
</script>



         @include('admin/partials/footer')

