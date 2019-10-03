<!DOCTYPE html>
<html lang="en">
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>{{ $title }}</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('app/css/styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app/css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
    <style>
        .padded-50{
            padding: 40px;
        }
        .text-center{
            text-align: center;
        }
    </style>

</head>


<body class=" ">

<div class="content-wrapper">

    <div class="container">
        <div class="header">
            <div class="full-name">
                <span class="first-name">Muhammad</span>
                <span class="last-name">Bilal</span>
            </div>
            <div class="contact-info">
                <span class="email">Email: </span>
                <span class="email-val">ahmad_4al@hotmail.com</span>
                <span class="separator"></span>
                <span class="phone">Phone: </span>
                <span class="phone-val">+92-3224278878</span>
            </div>

            <div class="about">
                <span class="position">Full-stack Developer (Php + Javascript) </span>
                <span class="desc">
                    I am a full-stack developer with more than 5 years of experience. I'm motivated, result-focused and seeking a successful team-oriented company with opportunity to grow.
                </span>
            </div>
        </div>
        <div class="details">
            <a style="margin: 20px 0px" class="btn btn-primary"  href="{{ route('home')}}">Evaluate Exercise</a>
        </div>
        <div class="details">
            <div class="section">
                <div class="section__title">Skills</div>
                <div class="skills">
                    <div class="skills__item">
                        <div class="left">
                            <div class="name">
                                Javascript and Frameworks
                            </div>
                        </div>
                        <div class="right">
                            <input  id="ck1" type="checkbox" checked/>

                            <label for="ck1"></label>
                            <input id="ck2" type="checkbox" checked/>

                            <label for="ck2"></label>
                            <input id="ck3" type="checkbox" checked/>

                            <label for="ck3"></label>
                            <input id="ck4" type="checkbox" checked/>
                            <label for="ck4"></label>
                            <input id="ck5" type="checkbox"checked />
                            <label for="ck5"></label>
                        </div>
                    </div>

                    <div class="skills__item">
                        <div class="left">
                            <div class="name">
                                Php and MVC fromeworks
                            </div>
                        </div>
                        <div class="right">
                            <input  id="ck1" type="checkbox" checked/>

                            <label for="ck1"></label>
                            <input id="ck2" type="checkbox" checked/>

                            <label for="ck2"></label>
                            <input id="ck3" type="checkbox" checked/>

                            <label for="ck3"></label>
                            <input id="ck4" type="checkbox" checked/>
                            <label for="ck4"></label>
                            <input id="ck5" type="checkbox"checked />
                            <label for="ck5"></label>
                        </div>
                    </div>

                    <div class="skills__item">
                        <div class="left">
                            <div class="name">
                                Html/Css/Bootstrap
                            </div>
                        </div>
                        <div class="right">
                            <input  id="ck1" type="checkbox" checked/>

                            <label for="ck1"></label>
                            <input id="ck2" type="checkbox" checked/>

                            <label for="ck2"></label>
                            <input id="ck3" type="checkbox" checked/>

                            <label for="ck3"></label>
                            <input id="ck4" type="checkbox" checked/>
                            <label for="ck4"></label>
                            <input id="ck5" type="checkbox"/>
                            <label for="ck5"></label>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script src="{{ asset('js/toastr.min.js') }}"></script>

</body>
</html>
