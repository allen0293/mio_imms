<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<title>

@yield('title')

</title>

<style>

body{

    font-family: Arial, Helvetica, sans-serif;

    font-size:12px;

    color:#000;

    margin:30px;

}

table{

    width:100%;

    border-collapse:collapse;

}

th,td{

    border:1px solid #000;

    padding:6px;

}

th{

    background:#efefef;

}

.text-center{

    text-align:center;

}

.text-right{

    text-align:right;

}

.mt-3{

    margin-top:20px;

}

.mt-5{

    margin-top:50px;

}

.signature{

    margin-top:60px;

}

</style>

</head>

<body>

@include('components.print.header')

@yield('content')

@include('components.print.footer')

</body>

</html>