<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dodu - Dompet Dhuwit</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>
    <div class="">
        <?php 
            $notInclude = ['login','register'];
            if(isset($view) && !empty($view)){
                if(!in_array($view, $notInclude)){ ?>
                    <nav>
                        <div class="nav-wrapper">
                            <div class="container"> 
                                <span class="left"> Login sebagai : <b><?= $username ?></b></span>
                            </div>
                            <a href="<?= $this->baseUrl('keuangan'); ?>" class="brand-logo center">Dodu</a>
                            <div class="container">
                                <ul id="nav-mobile" class="right hide-on-med-and-down">
                                    <?php
                                        function funcActive($page){
                                            $class = '';

                                            if(isset($view) && !empty($$view)){
                                                if($$view == $page){
                                                    $class="active";
                                                }
                                            }

                                            return $class;
                                        }
                                    ?>
                                    <li class="<?php echo funcActive('dashboard'); ?>"><a href="<?= $this->baseUrl('keuangan'); ?>">Keuangan</a></li>
                                    <li class="<?php echo funcActive('laporan'); ?>"><a href="<?= $this->baseUrl('laporan'); ?>">Laporan</a></li>
                                    <li class="<?php echo funcActive('tentang'); ?>"><a href="<?= $this->baseUrl('tentang'); ?>">Tentang</a></li>
                                    <li class="<?php echo funcActive('logout'); ?>"><a href="<?= $this->baseUrl('logout'); ?>">Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                <?php
                }
            }
        ?>
        <div class="row">
            <?php
                if(isset($view) && !empty($view)){
                    include('view/' . $view . '.php');
                }else{
                    include('view/login.php');
                }
            ?>
        </div>
    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
    <script>
         $(document).ready(function() {
            $('select').not('.disabled').formSelect();
            $('.collapsible').collapsible();
            $('.tooltipped').tooltip();
            function renderChart(data) {
                var ctx = document.getElementById("myChart").getContext('2d');
                var myPieChart = new Chart(ctx, {
                    type: 'pie',
                    data: data,
                    options: {
                        title: {
                            display: true,
                            text: "Colors election"
                        }
                    }
                });
            }
            data = {
                datasets: [{
                    data: [10, 20, 30],
                    borderColor: ['rgba(75, 192, 192, 1)', 'rgba(192, 0, 0, 1)', 'rgba(192, 192, 192, 1)'],
                    backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(192, 0, 0, 0.2)', 'rgba(192, 0, 192, 0.2)']
                }],

                labels: [
                    'Red',
                    'Yellow',
                    'Blue'
                ],
            };
            renderChart(data);
         });
    </script>
</body>
</html>