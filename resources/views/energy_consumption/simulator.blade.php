<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Emergency Robot</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/energy_consumption/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/energy_consumption/css/main.css" />
    <script src="/energy_consumption/js/jquery.js"></script>
    <script src="/energy_consumption/js/popper.js"></script>
    <script src="/energy_consumption/js/bootstrap.js"></script>
    <script src="/energy_consumption/js/chart.js"></script>
    <script src="/energy_consumption/js/main.js"></script>
</head>
<body>
    <div class="container bg-light p-0" id="main">
        <header class="text-center bg-danger">
            <h1 class="m-0 p-3 text-light">Emergency Robot</h1>
        </header>
        <section>
            <div class="container my-2">
                <div class="row">
                    <div class="col-12 col-md-6 bg-danger text-center">
                        <h4 class="text-white mt-2">Components</h4>
                        <ul class="list-group text-black col-6 pr-0 my-2 float-left">
                           <li class="list-group-item">MQ2</li>
                           <li class="list-group-item">TCRT5000 Left</li>
                           <li class="list-group-item">TCRT5000 Right</li>
                           <li class="list-group-item">DC-Motor Left</li>
                           <li class="list-group-item">DC-Motor Right</li>
                           <li class="list-group-item">HCSR04</li>
                           <li class="list-group-item">Camera</li>
                           <li class="list-group-item">Cortex A53</li>
                           <li class="list-group-item">Cortex A53</li>
                           <li class="list-group-item">Cortex A53</li>
                           <li class="list-group-item">Cortex A53</li>
                           <li class="list-group-item">Cortex A53</li>
                           <li class="list-group-item">Cortex A53</li>
                           <li class="list-group-item">1GB LPDDR2</li>
                           <li class="list-group-item">BCM43438</li>
                        </ul>
                        <div class="btn-group-vertical mx-auto my-2 col-6 pl-0">
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-light active" id="mq2-heating">
                                    <input type="radio" name="mq-2" autocomplete="off" checked> Heating
                                </label>
                                <label class="btn btn-light" id="mq2-standart">
                                    <input type="radio" name="mq-2" autocomplete="off"> Standart
                                </label>
                            </div>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-light active" id="1-tcrt5000-standart">
                                    <input type="radio" name="1-tcrt5000" autocomplete="off" checked> Standart
                                </label>
                                <label class="btn btn-light" id="1-tcrt5000-idle">
                                    <input type="radio" name="1-tcrt5000" autocomplete="off"> Idle
                                </label>
                            </div>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-light active" id="2-tcrt5000-standart">
                                    <input type="radio" name="2-tcrt5000" autocomplete="off" checked> Standart
                                </label>
                                <label class="btn btn-light" id="2-tcrt5000-idle">
                                    <input type="radio" name="2-tcrt5000" autocomplete="off"> Idle
                                </label>
                            </div>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-light active" id="1-dc-standart">
                                    <input type="radio" name="1-dc" autocomplete="off" checked> Standart
                                </label>
                                <label class="btn btn-light" id="1-dc-idle">
                                    <input type="radio" name="1-dc" autocomplete="off"> Idle
                                </label>
                            </div>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-light active" id="2-dc-standart">
                                    <input type="radio" name="2-dc" autocomplete="off" checked> Standart
                                </label>
                                <label class="btn btn-light" id="2-dc-idle">
                                    <input type="radio" name="2-dc" autocomplete="off"> Idle
                                </label>
                            </div>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-light active" id="hcsr04-standart">
                                    <input type="radio" name="hcsr04" autocomplete="off" checked> Standart
                                </label>
                            </div>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-light active"  id="camera-max">
                                    <input type="radio" name="camera" autocomplete="off" checked> Max
                                </label>
                                <label class="btn btn-light" id="camera-min">
                                    <input type="radio" name="camera" autocomplete="off"> Min
                                </label>
                            </div>
                            <div class="btn-group-vertical w-100 btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-light active" id="cortex-1300mhz">
                                    <input type="radio" name="cortex-a53" autocomplete="off" checked> 1300mhz 2core
                                </label>
                                <label class="btn btn-light" id="cortex-1200mhz">
                                    <input type="radio" name="cortex-a53" autocomplete="off"> 1200mhz 2core
                                </label>
                                <label class="btn btn-light" id="cortex-1100mhz">
                                    <input type="radio" name="cortex-a53" autocomplete="off"> 1100mhz 2core
                                </label>
                                <label class="btn btn-light" id="cortex-1000mhz">
                                    <input type="radio" name="cortex-a53" autocomplete="off"> 1000mhz 2core
                                </label>
                                <label class="btn btn-light" id="cortex-900mhz">
                                    <input type="radio" name="cortex-a53" autocomplete="off"> 900mhz 2core
                                </label>
                                <label class="btn btn-light" id="cortex-800mhz">
                                    <input type="radio" name="cortex-a53" autocomplete="off"> 800mhz 2core
                                </label>
                            </div>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-light active" id="ram-standart">
                                    <input type="radio" name="ram" autocomplete="off" checked> Standart
                                </label>
                            </div>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-light active" id="bcm43438-idle">
                                    <input type="radio" name="bcm43438" autocomplete="off" checked> Idle
                                </label>
                                <label class="btn btn-light" id="bcm43438-powersave">
                                    <input type="radio" name="bcm43438" autocomplete="off"> Power Save
                                </label>
                                <label class="btn btn-light" id="bcm43438-active">
                                    <input type="radio" name="bcm43438" autocomplete="off"> Active
                                </label>
                            </div>
                        </div>
                        <button class="btn btn-warning w-100" id="stop-start">Stop/Start</button>
                    </div>
                    <div class="col-12 col-md-6 d-flex align-items-center">
                        <canvas class="w-100 justify-" id="graph">
                        </canvas>
                    </div>
                </div>
                <div class="row bg-danger">
                    <div class="col-3">
                        <h5>Current Consumption: <span id="value"></span></h5>
                    </div>
                    <div class="col-3">
                        <h5>Average Consumption: <span id="average"></span></h5>
                    </div>
                    <div class="col-3">
                        <h5>Total Consumption: <span id="total"></span></h5>
                    </div>
                    <div class="col-3">
                        <h5>Seconds: <span id="seconds"></span></h5>
                    </div>
                </div>
            </div>
        </section>
        <footer class="text-center bg-dark">
            <h5 class="text-white p-1"><small>@Hasan Alp Zengin</small></h5>
        </footer>
    </div>
</body>
</html>