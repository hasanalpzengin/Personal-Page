class Mode {
    constructor(name, power_consumption) {
        this.name = name;
        this.power_consumption = power_consumption
    }

    getName() {
        return this.name;
    }

    getPower_consumption() {
        return this.power_consumption;
    }

    setName(name) {
        this.name = name;
    }

    setPower_consumption(power_consumption) {
        this.power_consumption = power_consumption;
    }
}

class Component {
    constructor(name, modes) {
        this.name = name;
        this.modes = modes;
        this.currentMode = 0;
        this.activeStatus = true;
    }

    getMode() {
        return this.modes[this.currentMode];
    }

    setCurrentMode(i) {
        this.currentMode = i;
    }

    isActive() {
        this.activeStatus;
    }

    setActive(boolean) {
        this.setActive = boolean;
    }
}

var mq2 = new Component("mq2", [
    new Mode("heating", 0.9),
    new Mode("standart", 0.864)
]);

var tcrt5000_modes = [
    new Mode("standart", 0.2),
    new Mode("idle", 0.1)
];

var tcrt5000_left = new Component("tcrt5000_left", tcrt5000_modes);
var tcrt5000_right = new Component("tcrt5000_right", tcrt5000_modes);

var dcmotor_modes = [
    new Mode("standart", 30),
    new Mode("idle", 1.680)
];

var dcmotor_left = new Component("dc_motor_left", dcmotor_modes);
var dcmotor_right = new Component("dc_motor_right", dcmotor_modes);

var hcsr04 = new Component("hcsr04", [
    new Mode("standart", 0.75)
]);

var camera = new Component("camera", [
    new Mode("maximum", 0.6),
    new Mode("minimum", 0.520)
]);

var cortex_a53 = new Component("cortex a53", [
    new Mode("1300mhz 2core", 0.481),
    new Mode("1200mhz 2core", 0.396),
    new Mode("1100mhz 2core", 0.350),
    new Mode("1000mhz 2core", 0.287),
    new Mode("900mhz 2core", 0.199),
    new Mode("800mhz 2core", 0.179)
]);

var lpddr2 = new Component("lpddr2", [
    new Mode("standart", 0.089)
]);

var bcm43438 = new Component("bcm43438", [
    new Mode("idle", 0.002),
    new Mode("power_save", 0.036),
    new Mode("active", 1.476)
]);

//merge components
var components = [
    mq2,
    tcrt5000_left,
    tcrt5000_right,
    dcmotor_left,
    dcmotor_right,
    hcsr04,
    camera,
    cortex_a53,
    lpddr2,
    bcm43438
]

var chart, canvas;

var data = []

var interval = 2000;

$(document).ready(function (event) {
    canvas = $("#graph");
    chart = new Chart(canvas, {
        type: 'line',
        data: {
            labels: [],
            datasets: [{
                label: "Value",
                data: [],
                fill: false,
                borderColor: getRandomColor()
            }]
        },
        options: {
            elements: {
                line: {
                    tension: 0 // disables bezier curves
                }
            }
        }
    });


    $("#mq2-heating").click(function () {
        console.log("Clicked");
        components[0].setCurrentMode(0);
    });

    $('#mq2-standart').click(() => {
        components[0].setCurrentMode(1);
    });

    $('#1-trct5000-standart').click(() => {
        components[1].setCurrentMode(0);
    });

    $('#1-trct5000-idle').click(() => {
        components[1].setCurrentMode(1);
    });

    $('#2-trct5000-standart').click(() => {
        components[2].setCurrentMode(0);
    });

    $('#2-trct5000-idle').click(() => {
        components[2].setCurrentMode(1);
    });

    $('#1-dc-standart').click(() => {
        components[3].setCurrentMode(0);
    });

    $('#1-dc-idle').click(() => {
        components[3].setCurrentMode(1);
    });

    $('#2-dc-standart').click(() => {
        components[4].setCurrentMode(0);
    });

    $('#2-dc-idle').click(() => {
        components[4].setCurrentMode(1);
    });

    $('#camera-max').click(() => {
        components[6].setCurrentMode(0);
    });

    $('#camera-min').click(() => {
        components[6].setCurrentMode(1);
    });

    $('#cortex-1300mhz').click(() => {
        components[7].setCurrentMode(0);
    });

    $('#cortex-1200mhz').click(() => {
        components[7].setCurrentMode(1);
    });

    $('#cortex-1100mhz').click(() => {
        components[7].setCurrentMode(2);
    });

    $('#cortex-1000mhz').click(() => {
        components[7].setCurrentMode(3);
    });

    $('#cortex-900mhz').click(() => {
        components[7].setCurrentMode(4);
    });

    $('#cortex-800mhz').click(() => {
        components[7].setCurrentMode(5);
    });

    $('#bcm43438-idle').click(() => {
        components[9].setCurrentMode(0);
    });

    $('#bcm43438-powersave').click(() => {
        components[9].setCurrentMode(1);
    });

    $('#bcm43438-active').click(() => {
        components[9].setCurrentMode(2);
    });

    $("#stop-start").click(()=>{
        if(isWorking){clearInterval(updateInterval); isWorking = false;}
        else{updateInterval = setInterval(updateValue, interval); isWorking = true; }
    });
});

function getRandomColor() {
    var letters = '0123456789ABCDEF';
    var color = '#';
    for (var i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}

var isWorking = true;
var totalValue = 0;
var seconds = 0;

function updateValue() {
    value = calculatePower();
    chart.data.labels.push(chart.data.labels.length * 10);
    chart.data.datasets[0].data.push(value);
    chart.update();
    $("#value").text(value+" W");
    totalValue += value;
    $("#total").text(totalValue+" W");
    $("#average").text(totalValue/chart.data.labels.length+" W");
    seconds += interval/1000;
    $("#seconds").text(seconds+"s");
}

function calculatePower() {
    var total = 0;
    components.forEach(element => {
        total += element.getMode().getPower_consumption();
    });
    return total;
}

var updateInterval = setInterval(updateValue, interval);