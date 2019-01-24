@extends('layouts.simple')

@section('title','About Me')

@section('external_resources')
    <script src="/js/intense.min.js"></script>
@stop

@section('content')
    <div class="mx-auto my-4">
        <h2><span><i class="fas fa-info"></i></span> About Me</h2>
        <hr>
        <div style="height: 400px; overflow: hidden;">
            <img alt="about me hasan alp zengin india" src="/image/aimage.jpg">
        </div>
        <br>
        <p>
        I am final year student of Computer Engineering program at the Mehmet Akif Ersoy University in Burdur, Turkey.<br>Currently, I am working on 2 projects which is about IoT dashboard implementation and Robotic project. In IoT project i'm using node.js and socket.io to manage devices and in robotic project i'm using raspberry pi and plenty of sensors with computer vision. I have the knowledge of PHP, Codeigniter, JSP, RubyOnRails, Laravel and Node.js on back-end part and Android App Development with Java. Also I have some front-end skills like Html, CSS, Javascript, Jquery. I am using MongoDB, Mysql and Postgresql on database part.<br> My CV comprised of courses like Object Oriented Programming (JAVA), Programming in C, Computer Graphics, Microprocessors, Artifical Intelligence, Security in Information Systems, Multithread and Parallel Programming, Electronic Circuits and Measurements, Information Technologies (PHP-HTML), Database Management, Data Mining, Computer Architecture, Mobile Programming, Modelling and Simulation, Software Engineering, Web Programming and Security in Information Systems has assisted me to gain profound knowledge in the field of Computer Engineering.<br>
        I devote myself to software development and IoT technologies. I am planning a career about mobile app development and back-end web development or working on IoT technologies in another country. I would like to being in it.
        My internship was about implementing application layer for IoT systems. I wrote MQTT protocol from the beginning in Manipal Institute of Technology with IAESTE program. I had 2 months working experience as Research Asistant and turned back to Turkey with awesome memories.<br>
        I love to beginning in new cultures. I went to Poland as a Erasmus+ Student in 2016-2017 and 've experienced new things like i did in India. Also i gained Erasmus+ scholarship again as exchange student in Portugal for my last semester. I love to learning new things. Always trying to do that. like I do in software development. I have good GPA which is 3,72. I think “a human without learning new things is not a human”. My enclosed resume provides additional details about my background.
        </p>
    </div>
@stop

<script>
    window.onload = function(){
        var image = document.querySelectorAll('img');
        Intense(image);
    }
</script>

<style>
    img{
        cursor: url("http://tholman.com/intense-images/img/plus_cursor.png") 25 25, auto;
        position: relative;
    }
</style>

@section('admin-panel')
    <ul class="list-group m-0 p-0">
        <li class="list-group-item"><a href="/logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
    </ul>
@stop