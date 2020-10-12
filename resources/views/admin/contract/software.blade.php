@extends('layout.master')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
@section('css')
    <style>
        /*table, th, td {*/
        /*    border: 1px solid black;*/

        /*}*/
        p {
            color: #c2c7d0 !important;
        }

        .c42 {
            margin: auto;
        }

        .c74 {
            border-bottom-style: none !important;
        }

        .c42 p {
            color: #000000 !important;
        }

        .c7 {
            color: #000000;
        }

        button {
            border: none;
            background: #779cb7;
            color: white;
        }

        input {
            height: 30px;
            background: #f4f6f9;
            border: none;
        }
    </style>
@stop
@section('content')
    <div style="margin:auto;" class="content">
        <html>
        <head>
            <meta content="text/html; charset=UTF-8" http-equiv="content-type">
            <style
                type="text/css">@import url(https://themes.googleusercontent.com/fonts/css?kit=sDU-RIIs3Wq_4pUcDwWu-05zdwzqyXAFhQ3EpAK6bTA);

                .lst-kix_list_4-1 > li {
                    counter-increment: lst-ctn-kix_list_4-1
                }

                ol.lst-kix_list_3-1 {
                    list-style-type: none
                }

                ol.lst-kix_list_3-2 {
                    list-style-type: none
                }

                .lst-kix_list_3-1 > li {
                    counter-increment: lst-ctn-kix_list_3-1
                }

                ol.lst-kix_list_3-3 {
                    list-style-type: none
                }

                .lst-kix_list_5-1 > li {
                    counter-increment: lst-ctn-kix_list_5-1
                }

                ol.lst-kix_list_7-0 {
                    list-style-type: none
                }

                .lst-kix_list_2-1 > li {
                    counter-increment: lst-ctn-kix_list_2-1
                }

                ol.lst-kix_list_3-0 {
                    list-style-type: none
                }

                .lst-kix_list_1-1 > li {
                    counter-increment: lst-ctn-kix_list_1-1
                }

                .lst-kix_list_6-1 > li {
                    counter-increment: lst-ctn-kix_list_6-1
                }

                .lst-kix_list_7-1 > li {
                    counter-increment: lst-ctn-kix_list_7-1
                }

                .lst-kix_list_3-0 > li:before {
                    content: "" counter(lst-ctn-kix_list_3-0, decimal) " "
                }

                ol.lst-kix_list_3-1.start {
                    counter-reset: lst-ctn-kix_list_3-1 0
                }

                ul.lst-kix_list_5-7 {
                    list-style-type: none
                }

                ul.lst-kix_list_5-8 {
                    list-style-type: none
                }

                .lst-kix_list_3-1 > li:before {
                    content: "" counter(lst-ctn-kix_list_3-0, decimal) "." counter(lst-ctn-kix_list_3-1, decimal) ". "
                }

                .lst-kix_list_3-2 > li:before {
                    content: "" counter(lst-ctn-kix_list_3-0, decimal) "." counter(lst-ctn-kix_list_3-1, decimal) "." counter(lst-ctn-kix_list_3-2, decimal) ". "
                }

                ul.lst-kix_list_5-5 {
                    list-style-type: none
                }

                ul.lst-kix_list_5-6 {
                    list-style-type: none
                }

                .lst-kix_list_8-1 > li:before {
                    content: "\002022   "
                }

                .lst-kix_list_4-0 > li {
                    counter-increment: lst-ctn-kix_list_4-0
                }

                .lst-kix_list_8-2 > li:before {
                    content: "\002022   "
                }

                .lst-kix_list_5-0 > li {
                    counter-increment: lst-ctn-kix_list_5-0
                }

                .lst-kix_list_6-0 > li {
                    counter-increment: lst-ctn-kix_list_6-0
                }

                .lst-kix_list_7-0 > li {
                    counter-increment: lst-ctn-kix_list_7-0
                }

                ul.lst-kix_list_1-3 {
                    list-style-type: none
                }

                .lst-kix_list_3-5 > li:before {
                    content: "\002022   "
                }

                ul.lst-kix_list_1-4 {
                    list-style-type: none
                }

                .lst-kix_list_3-4 > li:before {
                    content: "\002022   "
                }

                ul.lst-kix_list_1-2 {
                    list-style-type: none
                }

                ul.lst-kix_list_5-3 {
                    list-style-type: none
                }

                ol.lst-kix_list_7-1 {
                    list-style-type: none
                }

                ul.lst-kix_list_1-7 {
                    list-style-type: none
                }

                .lst-kix_list_3-3 > li:before {
                    content: "(" counter(lst-ctn-kix_list_3-3, lower-latin) ") "
                }

                ul.lst-kix_list_5-4 {
                    list-style-type: none
                }

                ul.lst-kix_list_1-8 {
                    list-style-type: none
                }

                .lst-kix_list_8-0 > li:before {
                    content: "-  "
                }

                ul.lst-kix_list_1-5 {
                    list-style-type: none
                }

                ul.lst-kix_list_5-2 {
                    list-style-type: none
                }

                ul.lst-kix_list_1-6 {
                    list-style-type: none
                }

                .lst-kix_list_8-7 > li:before {
                    content: "\002022   "
                }

                .lst-kix_list_3-8 > li:before {
                    content: "\002022   "
                }

                .lst-kix_list_8-5 > li:before {
                    content: "\002022   "
                }

                .lst-kix_list_8-6 > li:before {
                    content: "\002022   "
                }

                .lst-kix_list_2-0 > li {
                    counter-increment: lst-ctn-kix_list_2-0
                }

                .lst-kix_list_8-3 > li:before {
                    content: "\002022   "
                }

                .lst-kix_list_3-6 > li:before {
                    content: "\002022   "
                }

                .lst-kix_list_3-7 > li:before {
                    content: "\002022   "
                }

                .lst-kix_list_8-4 > li:before {
                    content: "\002022   "
                }

                ol.lst-kix_list_5-0.start {
                    counter-reset: lst-ctn-kix_list_5-0 2
                }

                .lst-kix_list_3-2 > li {
                    counter-increment: lst-ctn-kix_list_3-2
                }

                .lst-kix_list_8-8 > li:before {
                    content: "\002022   "
                }

                .lst-kix_list_5-0 > li:before {
                    content: "" counter(lst-ctn-kix_list_5-0, decimal) " "
                }

                ol.lst-kix_list_6-0 {
                    list-style-type: none
                }

                ol.lst-kix_list_6-1 {
                    list-style-type: none
                }

                ol.lst-kix_list_2-0 {
                    list-style-type: none
                }

                ol.lst-kix_list_2-1 {
                    list-style-type: none
                }

                .lst-kix_list_4-8 > li:before {
                    content: "\002022   "
                }

                .lst-kix_list_5-3 > li:before {
                    content: "\002022   "
                }

                .lst-kix_list_4-7 > li:before {
                    content: "\002022   "
                }

                .lst-kix_list_5-2 > li:before {
                    content: "\002022   "
                }

                .lst-kix_list_5-1 > li:before {
                    content: "" counter(lst-ctn-kix_list_5-0, decimal) "." counter(lst-ctn-kix_list_5-1, decimal) ". "
                }

                ul.lst-kix_list_4-8 {
                    list-style-type: none
                }

                .lst-kix_list_5-7 > li:before {
                    content: "\002022   "
                }

                ul.lst-kix_list_8-4 {
                    list-style-type: none
                }

                ul.lst-kix_list_8-5 {
                    list-style-type: none
                }

                ul.lst-kix_list_4-6 {
                    list-style-type: none
                }

                .lst-kix_list_5-6 > li:before {
                    content: "\002022   "
                }

                .lst-kix_list_5-8 > li:before {
                    content: "\002022   "
                }

                ul.lst-kix_list_8-2 {
                    list-style-type: none
                }

                ol.lst-kix_list_4-1.start {
                    counter-reset: lst-ctn-kix_list_4-1 0
                }

                ul.lst-kix_list_4-7 {
                    list-style-type: none
                }

                ul.lst-kix_list_8-3 {
                    list-style-type: none
                }

                ul.lst-kix_list_8-8 {
                    list-style-type: none
                }

                ul.lst-kix_list_8-6 {
                    list-style-type: none
                }

                ul.lst-kix_list_8-7 {
                    list-style-type: none
                }

                ol.lst-kix_list_3-3.start {
                    counter-reset: lst-ctn-kix_list_3-3 0
                }

                .lst-kix_list_5-4 > li:before {
                    content: "\002022   "
                }

                ul.lst-kix_list_4-4 {
                    list-style-type: none
                }

                .lst-kix_list_5-5 > li:before {
                    content: "\002022   "
                }

                ol.lst-kix_list_6-2 {
                    list-style-type: none
                }

                ul.lst-kix_list_8-0 {
                    list-style-type: none
                }

                ul.lst-kix_list_4-5 {
                    list-style-type: none
                }

                ul.lst-kix_list_8-1 {
                    list-style-type: none
                }

                ul.lst-kix_list_4-2 {
                    list-style-type: none
                }

                ul.lst-kix_list_4-3 {
                    list-style-type: none
                }

                ol.lst-kix_list_1-0.start {
                    counter-reset: lst-ctn-kix_list_1-0 7
                }

                .lst-kix_list_6-1 > li:before {
                    content: "" counter(lst-ctn-kix_list_6-0, decimal) "." counter(lst-ctn-kix_list_6-1, decimal) ". "
                }

                .lst-kix_list_6-3 > li:before {
                    content: "\002022   "
                }

                ol.lst-kix_list_7-1.start {
                    counter-reset: lst-ctn-kix_list_7-1 0
                }

                .lst-kix_list_6-0 > li:before {
                    content: "" counter(lst-ctn-kix_list_6-0, decimal) " "
                }

                .lst-kix_list_6-4 > li:before {
                    content: "\002022   "
                }

                .lst-kix_list_3-0 > li {
                    counter-increment: lst-ctn-kix_list_3-0
                }

                .lst-kix_list_3-3 > li {
                    counter-increment: lst-ctn-kix_list_3-3
                }

                ol.lst-kix_list_4-0.start {
                    counter-reset: lst-ctn-kix_list_4-0 3
                }

                .lst-kix_list_6-2 > li:before {
                    content: "" counter(lst-ctn-kix_list_6-2, lower-latin) ". "
                }

                ol.lst-kix_list_3-2.start {
                    counter-reset: lst-ctn-kix_list_3-2 0
                }

                .lst-kix_list_6-8 > li:before {
                    content: "\002022   "
                }

                .lst-kix_list_6-5 > li:before {
                    content: "\002022   "
                }

                .lst-kix_list_6-7 > li:before {
                    content: "\002022   "
                }

                .lst-kix_list_7-0 > li:before {
                    content: "" counter(lst-ctn-kix_list_7-0, decimal) " "
                }

                .lst-kix_list_6-2 > li {
                    counter-increment: lst-ctn-kix_list_6-2
                }

                .lst-kix_list_6-6 > li:before {
                    content: "\002022   "
                }

                ol.lst-kix_list_5-0 {
                    list-style-type: none
                }

                .lst-kix_list_2-6 > li:before {
                    content: "\002022   "
                }

                .lst-kix_list_2-7 > li:before {
                    content: "\002022   "
                }

                ol.lst-kix_list_5-1 {
                    list-style-type: none
                }

                .lst-kix_list_7-4 > li:before {
                    content: "\002022   "
                }

                .lst-kix_list_7-6 > li:before {
                    content: "\002022   "
                }

                ol.lst-kix_list_1-0 {
                    list-style-type: none
                }

                .lst-kix_list_2-4 > li:before {
                    content: "\002022   "
                }

                .lst-kix_list_2-5 > li:before {
                    content: "\002022   "
                }

                .lst-kix_list_2-8 > li:before {
                    content: "\002022   "
                }

                ol.lst-kix_list_6-2.start {
                    counter-reset: lst-ctn-kix_list_6-2 0
                }

                ol.lst-kix_list_1-1 {
                    list-style-type: none
                }

                .lst-kix_list_7-1 > li:before {
                    content: "" counter(lst-ctn-kix_list_7-0, decimal) "." counter(lst-ctn-kix_list_7-1, decimal) ". "
                }

                .lst-kix_list_7-5 > li:before {
                    content: "\002022   "
                }

                .lst-kix_list_7-2 > li:before {
                    content: "\0025fb   "
                }

                .lst-kix_list_7-3 > li:before {
                    content: "\002022   "
                }

                ul.lst-kix_list_7-5 {
                    list-style-type: none
                }

                ul.lst-kix_list_7-6 {
                    list-style-type: none
                }

                ul.lst-kix_list_7-3 {
                    list-style-type: none
                }

                ul.lst-kix_list_3-7 {
                    list-style-type: none
                }

                ul.lst-kix_list_7-4 {
                    list-style-type: none
                }

                ul.lst-kix_list_3-8 {
                    list-style-type: none
                }

                ol.lst-kix_list_5-1.start {
                    counter-reset: lst-ctn-kix_list_5-1 0
                }

                ul.lst-kix_list_7-7 {
                    list-style-type: none
                }

                ul.lst-kix_list_7-8 {
                    list-style-type: none
                }

                ol.lst-kix_list_3-0.start {
                    counter-reset: lst-ctn-kix_list_3-0 4
                }

                .lst-kix_list_7-8 > li:before {
                    content: "\002022   "
                }

                ul.lst-kix_list_3-5 {
                    list-style-type: none
                }

                ul.lst-kix_list_7-2 {
                    list-style-type: none
                }

                ul.lst-kix_list_3-6 {
                    list-style-type: none
                }

                .lst-kix_list_7-7 > li:before {
                    content: "\002022   "
                }

                ul.lst-kix_list_3-4 {
                    list-style-type: none
                }

                .lst-kix_list_4-0 > li:before {
                    content: "" counter(lst-ctn-kix_list_4-0, decimal) " "
                }

                .lst-kix_list_4-1 > li:before {
                    content: "" counter(lst-ctn-kix_list_4-0, decimal) "." counter(lst-ctn-kix_list_4-1, decimal) ". "
                }

                .lst-kix_list_4-4 > li:before {
                    content: "\002022   "
                }

                .lst-kix_list_4-3 > li:before {
                    content: "\002022   "
                }

                .lst-kix_list_4-5 > li:before {
                    content: "\002022   "
                }

                .lst-kix_list_4-2 > li:before {
                    content: "\002022   "
                }

                .lst-kix_list_4-6 > li:before {
                    content: "\002022   "
                }

                ol.lst-kix_list_7-0.start {
                    counter-reset: lst-ctn-kix_list_7-0 0
                }

                ol.lst-kix_list_1-1.start {
                    counter-reset: lst-ctn-kix_list_1-1 0
                }

                ol.lst-kix_list_4-0 {
                    list-style-type: none
                }

                ol.lst-kix_list_4-1 {
                    list-style-type: none
                }

                ul.lst-kix_list_6-6 {
                    list-style-type: none
                }

                ul.lst-kix_list_6-7 {
                    list-style-type: none
                }

                ul.lst-kix_list_6-4 {
                    list-style-type: none
                }

                ul.lst-kix_list_2-8 {
                    list-style-type: none
                }

                ul.lst-kix_list_6-5 {
                    list-style-type: none
                }

                ul.lst-kix_list_6-8 {
                    list-style-type: none
                }

                ol.lst-kix_list_6-1.start {
                    counter-reset: lst-ctn-kix_list_6-1 0
                }

                ul.lst-kix_list_2-2 {
                    list-style-type: none
                }

                .lst-kix_list_1-0 > li:before {
                    content: "" counter(lst-ctn-kix_list_1-0, decimal) " "
                }

                ul.lst-kix_list_2-3 {
                    list-style-type: none
                }

                ul.lst-kix_list_2-6 {
                    list-style-type: none
                }

                ul.lst-kix_list_6-3 {
                    list-style-type: none
                }

                .lst-kix_list_1-1 > li:before {
                    content: "" counter(lst-ctn-kix_list_1-0, decimal) "." counter(lst-ctn-kix_list_1-1, decimal) ". "
                }

                .lst-kix_list_1-2 > li:before {
                    content: "\002022   "
                }

                ol.lst-kix_list_2-0.start {
                    counter-reset: lst-ctn-kix_list_2-0 5
                }

                ul.lst-kix_list_2-7 {
                    list-style-type: none
                }

                ul.lst-kix_list_2-4 {
                    list-style-type: none
                }

                ul.lst-kix_list_2-5 {
                    list-style-type: none
                }

                .lst-kix_list_1-3 > li:before {
                    content: "\002022   "
                }

                .lst-kix_list_1-4 > li:before {
                    content: "\002022   "
                }

                .lst-kix_list_1-0 > li {
                    counter-increment: lst-ctn-kix_list_1-0
                }

                .lst-kix_list_1-7 > li:before {
                    content: "\002022   "
                }

                .lst-kix_list_1-5 > li:before {
                    content: "\002022   "
                }

                .lst-kix_list_1-6 > li:before {
                    content: "\002022   "
                }

                .lst-kix_list_2-0 > li:before {
                    content: "" counter(lst-ctn-kix_list_2-0, decimal) " "
                }

                .lst-kix_list_2-1 > li:before {
                    content: "" counter(lst-ctn-kix_list_2-0, decimal) "." counter(lst-ctn-kix_list_2-1, decimal) ". "
                }

                ol.lst-kix_list_2-1.start {
                    counter-reset: lst-ctn-kix_list_2-1 0
                }

                ol.lst-kix_list_6-0.start {
                    counter-reset: lst-ctn-kix_list_6-0 1
                }

                .lst-kix_list_1-8 > li:before {
                    content: "\002022   "
                }

                .lst-kix_list_2-2 > li:before {
                    content: "\002022   "
                }

                .lst-kix_list_2-3 > li:before {
                    content: "\002022   "
                }

                ol {
                    margin: 0;
                    padding: 0
                }

                table td, table th {
                    padding: 0
                }

                .c71 {
                    border-right-style: solid;
                    padding: 0pt 5.8pt 0pt 5.8pt;
                    border-bottom-color: #000000;
                    border-top-width: 1pt;
                    border-right-width: 1pt;
                    border-left-color: #000000;
                    vertical-align: middle;
                    border-right-color: #000000;
                    border-left-width: 1pt;
                    border-top-style: solid;
                    border-left-style: solid;
                    border-bottom-width: 1pt;
                    width: 500.2pt;
                    border-top-color: #000000;
                    border-bottom-style: solid
                }

                .c51 {
                    border-right-style: solid;
                    padding: 0pt 5.8pt 0pt 5.8pt;
                    border-bottom-color: #000000;
                    border-top-width: 1pt;
                    border-right-width: 1pt;
                    border-left-color: #000000;
                    vertical-align: top;
                    border-right-color: #000000;
                    border-left-width: 1pt;
                    border-top-style: solid;
                    border-left-style: solid;
                    border-bottom-width: 1pt;
                    width: 112.5pt;
                    border-top-color: #000000;
                    border-bottom-style: solid
                }

                .c54 {
                    border-right-style: solid;
                    padding: 0pt 5.8pt 0pt 5.8pt;
                    border-bottom-color: #000000;
                    border-top-width: 1pt;
                    border-right-width: 1pt;
                    border-left-color: #000000;
                    vertical-align: top;
                    border-right-color: #000000;
                    border-left-width: 1pt;
                    border-top-style: solid;
                    border-left-style: solid;
                    border-bottom-width: 1pt;
                    width: 184.5pt;
                    border-top-color: #000000;
                    border-bottom-style: solid
                }

                .c19 {
                    border-right-style: solid;
                    padding: 0pt 5.8pt 0pt 5.8pt;
                    border-bottom-color: #000000;
                    border-top-width: 1pt;
                    border-right-width: 1pt;
                    border-left-color: #000000;
                    vertical-align: top;
                    border-right-color: #000000;
                    border-left-width: 1pt;
                    border-top-style: solid;
                    border-left-style: solid;
                    border-bottom-width: 1pt;
                    width: 85.5pt;
                    border-top-color: #000000;
                    border-bottom-style: solid
                }

                .c10 {
                    border-right-style: solid;
                    padding: 0pt 5.8pt 0pt 5.8pt;
                    border-bottom-color: #000000;
                    border-top-width: 1pt;
                    border-right-width: 1pt;
                    border-left-color: #000000;
                    vertical-align: top;
                    border-right-color: #000000;
                    border-left-width: 1pt;
                    border-top-style: solid;
                    border-left-style: solid;
                    border-bottom-width: 1pt;
                    width: 99pt;
                    border-top-color: #000000;
                    border-bottom-style: solid
                }

                .c73 {
                    border-right-style: solid;
                    padding: 0pt 5.8pt 0pt 5.8pt;
                    border-bottom-color: #000000;
                    border-top-width: 1pt;
                    border-right-width: 1pt;
                    border-left-color: #000000;
                    vertical-align: top;
                    border-right-color: #000000;
                    border-left-width: 1pt;
                    border-top-style: solid;
                    border-left-style: solid;
                    border-bottom-width: 1pt;
                    width: 212pt;
                    border-top-color: #000000;
                    border-bottom-style: solid
                }

                .c55 {
                    border-right-style: solid;
                    padding: 0pt 5.8pt 0pt 5.8pt;
                    border-bottom-color: #000000;
                    border-top-width: 1pt;
                    border-right-width: 1pt;
                    border-left-color: #000000;
                    vertical-align: middle;
                    border-right-color: #000000;
                    border-left-width: 1pt;
                    border-top-style: solid;
                    border-left-style: solid;
                    border-bottom-width: 1pt;
                    width: 162.4pt;
                    border-top-color: #000000;
                    border-bottom-style: solid
                }

                .c58 {
                    border-right-style: solid;
                    padding: 0pt 5.8pt 0pt 5.8pt;
                    border-bottom-color: #000000;
                    border-top-width: 1pt;
                    border-right-width: 1pt;
                    border-left-color: #000000;
                    vertical-align: top;
                    border-right-color: #000000;
                    border-left-width: 1pt;
                    border-top-style: solid;
                    border-left-style: solid;
                    border-bottom-width: 1pt;
                    width: 140pt;
                    border-top-color: #000000;
                    border-bottom-style: solid
                }

                .c36 {
                    border-right-style: solid;
                    padding: 0pt 5.8pt 0pt 5.8pt;
                    border-bottom-color: #000000;
                    border-top-width: 1pt;
                    border-right-width: 1pt;
                    border-left-color: #000000;
                    vertical-align: top;
                    border-right-color: #000000;
                    border-left-width: 1pt;
                    border-top-style: solid;
                    border-left-style: solid;
                    border-bottom-width: 1pt;
                    width: 13.5pt;
                    border-top-color: #000000;
                    border-bottom-style: solid
                }

                .c6 {
                    border-right-style: solid;
                    padding: 0pt 5.8pt 0pt 5.8pt;
                    border-bottom-color: #000000;
                    border-top-width: 1pt;
                    border-right-width: 1pt;
                    border-left-color: #000000;
                    vertical-align: top;
                    border-right-color: #000000;
                    border-left-width: 1pt;
                    border-top-style: solid;
                    border-left-style: solid;
                    border-bottom-width: 1pt;
                    width: 396.5pt;
                    border-top-color: #000000;
                    border-bottom-style: solid
                }

                .c13 {
                    border-right-style: solid;
                    padding: 0pt 5.8pt 0pt 5.8pt;
                    border-bottom-color: #000000;
                    border-top-width: 1pt;
                    border-right-width: 1pt;
                    border-left-color: #000000;
                    vertical-align: top;
                    border-right-color: #000000;
                    border-left-width: 1pt;
                    border-top-style: solid;
                    border-left-style: solid;
                    border-bottom-width: 1pt;
                    width: 126.5pt;
                    border-top-color: #000000;
                    border-bottom-style: solid
                }

                .c12 {
                    border-right-style: solid;
                    padding: 0pt 5.8pt 0pt 5.8pt;
                    border-bottom-color: #000000;
                    border-top-width: 1pt;
                    border-right-width: 1pt;
                    border-left-color: #000000;
                    vertical-align: middle;
                    border-right-color: #000000;
                    border-left-width: 1pt;
                    border-top-style: solid;
                    border-left-style: solid;
                    border-bottom-width: 1pt;
                    width: 49.5pt;
                    border-top-color: #000000;
                    border-bottom-style: solid
                }

                .c76 {
                    border-right-style: solid;
                    padding: 0pt 5.8pt 0pt 5.8pt;
                    border-bottom-color: #000000;
                    border-top-width: 1pt;
                    border-right-width: 1pt;
                    border-left-color: #000000;
                    vertical-align: top;
                    border-right-color: #000000;
                    border-left-width: 1pt;
                    border-top-style: solid;
                    border-left-style: solid;
                    border-bottom-width: 1pt;
                    width: 495.5pt;
                    border-top-color: #000000;
                    border-bottom-style: solid
                }

                .c15 {
                    border-right-style: solid;
                    padding: 0pt 5.8pt 0pt 5.8pt;
                    border-bottom-color: #000000;
                    border-top-width: 1pt;
                    border-right-width: 1pt;
                    border-left-color: #000000;
                    vertical-align: top;
                    border-right-color: #000000;
                    border-left-width: 1pt;
                    border-top-style: solid;
                    border-left-style: solid;
                    border-bottom-width: 1pt;
                    width: 144pt;
                    border-top-color: #000000;
                    border-bottom-style: solid
                }

                .c64 {
                    border-right-style: solid;
                    padding: 0pt 5.8pt 0pt 5.8pt;
                    border-bottom-color: #000000;
                    border-top-width: 1pt;
                    border-right-width: 1pt;
                    border-left-color: #000000;
                    vertical-align: middle;
                    border-right-color: #000000;
                    border-left-width: 1pt;
                    border-top-style: solid;
                    border-left-style: solid;
                    border-bottom-width: 1pt;
                    width: 139.1pt;
                    border-top-color: #000000;
                    border-bottom-style: solid
                }

                .c8 {
                    border-right-style: solid;
                    padding: 0pt 5.8pt 0pt 5.8pt;
                    border-bottom-color: #000000;
                    border-top-width: 1pt;
                    border-right-width: 1pt;
                    border-left-color: #000000;
                    vertical-align: middle;
                    border-right-color: #000000;
                    border-left-width: 1pt;
                    border-top-style: solid;
                    border-left-style: solid;
                    border-bottom-width: 1pt;
                    width: 113.2pt;
                    border-top-color: #000000;
                    border-bottom-style: solid
                }

                .c59 {
                    border-right-style: solid;
                    padding: 0pt 5.8pt 0pt 5.8pt;
                    border-bottom-color: #000000;
                    border-top-width: 1pt;
                    border-right-width: 1pt;
                    border-left-color: #000000;
                    vertical-align: middle;
                    border-right-color: #000000;
                    border-left-width: 1pt;
                    border-top-style: solid;
                    border-left-style: solid;
                    border-bottom-width: 1pt;
                    width: 387pt;
                    border-top-color: #000000;
                    border-bottom-style: solid
                }

                .c22 {
                    border-right-style: solid;
                    padding: 0pt 5.8pt 0pt 5.8pt;
                    border-bottom-color: #000000;
                    border-top-width: 1pt;
                    border-right-width: 1pt;
                    border-left-color: #000000;
                    vertical-align: top;
                    border-right-color: #000000;
                    border-left-width: 1pt;
                    border-top-style: solid;
                    border-left-style: solid;
                    border-bottom-width: 1pt;
                    width: 72pt;
                    border-top-color: #000000;
                    border-bottom-style: solid
                }

                .c43 {
                    border-right-style: solid;
                    padding: 0pt 5.8pt 0pt 5.8pt;
                    border-bottom-color: #000000;
                    border-top-width: 1pt;
                    border-right-width: 1pt;
                    border-left-color: #000000;
                    vertical-align: middle;
                    border-right-color: #000000;
                    border-left-width: 1pt;
                    border-top-style: solid;
                    border-left-style: solid;
                    border-bottom-width: 1pt;
                    width: 36pt;
                    border-top-color: #000000;
                    border-bottom-style: solid
                }

                .c74 {
                    margin-left: 108pt;
                    padding-top: 0pt;
                    border-bottom-color: #000000;
                    border-bottom-width: 0.5pt;
                    padding-bottom: 1pt;
                    line-height: 1.5;
                    border-bottom-style: solid;
                    orphans: 2;
                    widows: 2;
                    text-align: left
                }

                .c30 {
                    -webkit-text-decoration-skip: none;
                    color: #000000;
                    font-weight: 700;
                    text-decoration: underline;
                    vertical-align: baseline;
                    text-decoration-skip-ink: none;
                    font-size: 12pt;
                    font-family: "Cambria";
                    font-style: italic
                }

                .c14 {
                    margin-left: 31.3pt;
                    padding-top: 0pt;
                    padding-left: 22.6pt;
                    padding-bottom: 0pt;
                    line-height: 1.5;
                    text-align: justify;
                    margin-right: 25.4pt
                }

                .c29 {
                    color: #000000;
                    font-weight: 700;
                    text-decoration: none;
                    vertical-align: baseline;
                    font-size: 13pt;
                    font-family: "Arial";
                    font-style: normal
                }

                .c0 {
                    color: #000000;
                    font-weight: 700;
                    text-decoration: none;
                    vertical-align: baseline;
                    font-size: 13pt;
                    font-family: "Cambria";
                    font-style: normal
                }

                .c50 {
                    color: #000000;
                    font-weight: 700;
                    text-decoration: none;
                    vertical-align: baseline;
                    font-size: 10pt;
                    font-family: "Cambria";
                    font-style: normal
                }

                .c17 {
                    color: #000000;
                    font-weight: 400;
                    text-decoration: none;
                    vertical-align: baseline;
                    font-size: 11pt;
                    font-family: "Cambria";
                    font-style: normal
                }

                .c5 {
                    color: #000000;
                    font-weight: 400;
                    text-decoration: none;
                    vertical-align: baseline;
                    font-size: 10pt;
                    font-family: "Cambria";
                    font-style: normal
                }

                .c35 {
                    color: #000000;
                    font-weight: 700;
                    text-decoration: none;
                    vertical-align: baseline;
                    font-size: 12pt;
                    font-family: "Cambria";
                    font-style: normal
                }

                .c3 {
                    color: #000000;
                    font-weight: 400;
                    text-decoration: none;
                    vertical-align: baseline;
                    font-size: 13pt;
                    font-family: "Cambria";
                    font-style: normal
                }

                .c23 {
                    margin-left: 35.9pt;
                    padding-top: 0pt;
                    padding-left: 18pt;
                    padding-bottom: 0pt;
                    line-height: 1.5;
                    text-align: justify;
                    margin-right: 25.4pt
                }

                .c4 {
                    margin-left: 31.3pt;
                    padding-top: 0pt;
                    padding-left: 22.6pt;
                    padding-bottom: 0pt;
                    line-height: 1.5;
                    text-align: justify;
                    margin-right: 25.9pt
                }

                .c85 {
                    font-weight: 700;
                    text-decoration: none;
                    vertical-align: baseline;
                    font-size: 11pt;
                    font-family: "Cambria";
                    font-style: normal
                }

                .c86 {
                    font-weight: 400;
                    text-decoration: none;
                    vertical-align: baseline;
                    font-size: 10pt;
                    font-family: "Arial";
                    font-style: normal
                }

                .c2 {
                    padding-top: 0pt;
                    padding-bottom: 0pt;
                    line-height: 1.5;
                    orphans: 2;
                    widows: 2;
                    text-align: justify
                }

                .c21 {
                    padding-top: 0pt;
                    padding-bottom: 0pt;
                    line-height: 1.1500000000000001;
                    orphans: 2;
                    widows: 2;
                    text-align: justify
                }

                .c69 {
                    margin-left: 98.1pt;
                    padding-top: 4.8pt;
                    padding-left: 0pt;
                    padding-bottom: 0pt;
                    line-height: 1.5;
                    text-align: justify
                }

                .c78 {
                    padding-top: 0pt;
                    text-indent: 32.3pt;
                    padding-bottom: 0pt;
                    line-height: 1.5;
                    text-align: center;
                    margin-right: 84pt
                }

                .c92 {
                    padding-top: 0pt;
                    text-indent: 32.3pt;
                    padding-bottom: 0pt;
                    line-height: 1.5;
                    text-align: center;
                    margin-right: -0.6pt
                }

                .c11 {
                    padding-top: 0pt;
                    padding-bottom: 0pt;
                    line-height: 1.15;
                    text-align: left;
                    height: 11pt
                }

                .c18 {
                    padding-top: 0pt;
                    padding-bottom: 0pt;
                    line-height: 1.5;
                    text-align: justify;
                    height: 11pt
                }

                .c60 {
                    padding-top: 0pt;
                    padding-bottom: 0pt;
                    line-height: 1.0;
                    text-align: left;
                    height: 11pt
                }

                .c40 {
                    padding-top: 0pt;
                    padding-bottom: 0pt;
                    line-height: 0.06;
                    text-align: left;
                    height: 11pt
                }

                .c9 {
                    margin-left: 17.9pt;
                    padding-top: 0pt;
                    padding-bottom: 0pt;
                    line-height: 1.5;
                    text-align: justify
                }

                .c75 {
                    padding-top: 0pt;
                    padding-bottom: 0pt;
                    line-height: 1.5;
                    text-align: left
                }

                .c28 {
                    padding-top: 0pt;
                    padding-bottom: 0pt;
                    line-height: 1.5;
                    text-align: justify
                }

                .c46 {
                    padding-top: 0pt;
                    padding-bottom: 0pt;
                    line-height: 1.1500000000000001;
                    text-align: center
                }

                .c20 {
                    color: #000000;
                    text-decoration: none;
                    vertical-align: baseline;
                    font-style: italic
                }

                .c39 {
                    padding-top: 0pt;
                    padding-bottom: 0pt;
                    line-height: 1.1500000000000001;
                    text-align: justify
                }

                .c42 {
                    margin-left: -0.3pt;
                    border-spacing: 0;
                    border-collapse: collapse;
                    margin-right: auto
                }

                .c16 {
                    font-size: 13pt;
                    font-family: "Cambria";
                    font-weight: 400;
                    text-decoration: none
                }

                .c27 {
                    font-size: 13pt;
                    font-family: "Cambria";
                    color: #000000;
                    font-weight: 400
                }

                .c34 {
                    font-size: 13pt;
                    font-family: "Cambria";
                    font-weight: 400
                }

                .c66 {
                    background-color: #ffffff;
                    max-width: 502.6pt;
                    padding: 29pt 56.9pt 30pt 36pt
                }

                .c83 {
                    margin-left: -5.8pt;
                    text-indent: 5.8pt;
                    margin-right: 28.9pt
                }

                .c62 {
                    margin-left: 35.9pt;
                    padding-left: 18pt;
                    margin-right: 26.1pt
                }

                .c88 {
                    font-weight: 400;
                    font-size: 10pt;
                    font-family: "Cambria"
                }

                .c7 {
                    font-size: 13pt;
                    font-family: "Cambria";
                    font-weight: 700
                }

                .c45 {
                    -webkit-text-decoration-skip: none;
                    text-decoration: underline;
                    text-decoration-skip-ink: none
                }

                .c77 {
                    margin-left: 53.9pt;
                    padding-left: 0pt;
                    margin-right: 25.9pt
                }

                .c48 {
                    margin-left: 71.9pt;
                    padding-left: 0pt;
                    margin-right: 25.6pt
                }

                .c68 {
                    margin-left: 71.9pt;
                    padding-left: 0pt;
                    margin-right: 25.5pt
                }

                .c33 {
                    margin-left: 54pt;
                    text-indent: -54pt
                }

                .c47 {
                    margin-left: 35.9pt;
                    padding-left: 27pt
                }

                .c44 {
                    margin-left: 35.9pt;
                    padding-left: 29.9pt
                }

                .c65 {
                    margin-left: 35.9pt;
                    padding-left: 18pt
                }

                .c32 {
                    margin-left: 50.3pt;
                    padding-left: 0pt
                }

                .c38 {
                    margin-left: 31.3pt;
                    padding-left: 22.6pt
                }

                .c82 {
                    margin-left: 53.9pt;
                    padding-left: 0pt
                }

                .c84 {
                    margin-left: 53.9pt;
                    margin-right: 25.4pt
                }

                .c1 {
                    padding: 0;
                    margin: 0
                }

                .c87 {
                    font-weight: 700;
                    font-family: "Cambria"
                }

                .c70 {
                    height: 21.1pt
                }

                .c49 {
                    margin-left: 20.8pt
                }

                .c67 {
                    height: 18.6pt
                }

                .c24 {
                    height: 17.5pt
                }

                .c57 {
                    margin-right: 25.8pt
                }

                .c91 {
                    margin-left: 50.3pt
                }

                .c26 {
                    height: 0pt
                }

                .c90 {
                    margin-left: 89.7pt
                }

                .c61 {
                    margin-right: 25.6pt
                }

                .c81 {
                    color: #000000
                }

                .c63 {
                    height: 21.9pt
                }

                .c89 {
                    height: 19.8pt
                }

                .c41 {
                    margin-right: 25.2pt
                }

                .c53 {
                    height: 9.8pt
                }

                .c56 {
                    height: 27.1pt
                }

                .c25 {
                    height: 22.6pt
                }

                .c80 {
                    margin-right: 25.5pt
                }

                .c79 {
                    margin-right: 8.1pt
                }

                .c52 {
                    height: 3.5pt
                }

                .c37 {
                    margin-left: 56.7pt
                }

                .c31 {
                    margin-right: 28.2pt
                }

                .c72 {
                    height: 11pt
                }

                .title {
                    padding-top: 24pt;
                    color: #000000;
                    font-weight: 700;
                    font-size: 36pt;
                    padding-bottom: 6pt;
                    font-family: "Arial";
                    line-height: 1.0;
                    page-break-after: avoid;
                    text-align: left
                }

                .subtitle {
                    padding-top: 18pt;
                    color: #666666;
                    font-size: 24pt;
                    padding-bottom: 4pt;
                    font-family: "Georgia";
                    line-height: 1.0;
                    page-break-after: avoid;
                    font-style: italic;
                    text-align: left
                }

                li {
                    color: #000000;
                    font-size: 11pt;
                    font-family: "Arial"
                }

                p {
                    margin: 0;
                    color: #000000;
                    font-size: 11pt;
                    font-family: "Arial"
                }

                h1 {
                    padding-top: 0pt;
                    -webkit-text-decoration-skip: none;
                    color: #000000;
                    font-weight: 700;
                    text-decoration: underline;
                    text-decoration-skip-ink: none;
                    font-size: 10.5pt;
                    padding-bottom: 0pt;
                    font-family: "Arial";
                    line-height: 1.0;
                    text-align: left
                }

                h2 {
                    padding-top: 18pt;
                    color: #000000;
                    font-weight: 700;
                    font-size: 18pt;
                    padding-bottom: 4pt;
                    font-family: "Arial";
                    line-height: 1.0;
                    page-break-after: avoid;
                    text-align: left
                }

                h3 {
                    padding-top: 14pt;
                    color: #000000;
                    font-weight: 700;
                    font-size: 14pt;
                    padding-bottom: 4pt;
                    font-family: "Arial";
                    line-height: 1.0;
                    page-break-after: avoid;
                    text-align: left
                }

                h4 {
                    padding-top: 12pt;
                    color: #000000;
                    font-weight: 700;
                    font-size: 12pt;
                    padding-bottom: 2pt;
                    font-family: "Arial";
                    line-height: 1.0;
                    page-break-after: avoid;
                    text-align: left
                }

                h5 {
                    padding-top: 11pt;
                    color: #000000;
                    font-weight: 700;
                    font-size: 11pt;
                    padding-bottom: 2pt;
                    font-family: "Arial";
                    line-height: 1.0;
                    page-break-after: avoid;
                    text-align: left
                }

                h6 {
                    padding-top: 10pt;
                    color: #000000;
                    font-weight: 700;
                    font-size: 10pt;
                    padding-bottom: 2pt;
                    font-family: "Arial";
                    line-height: 1.0;
                    page-break-after: avoid;
                    text-align: left
                }</style>
        </head>

        <div style="height:120px;"><p class="c74">
                 <span
                     style="float: left;overflow: hidden; display: inline-block; margin: 0.00px 0.00px; border: 0.00px solid #000000; transform: rotate(0.00rad) translateZ(0px); -webkit-transform: rotate(0.00rad) translateZ(0px); width: 89.73px; height: 101.20px;">
                    <img alt="" src="images/image1.png"
                         style="width: 89.73px; height: 101.20px; margin-left: -0.00px; margin-top: -0.00px; transform: rotate(0.00rad) translateZ(0px); -webkit-transform: rotate(0.00rad) translateZ(0px);"
                         title=""></span></p>

            <span class="c5">&#272;c: 102B, T&#259;ng Nh&#417;n Ph&uacute;, Ph&#432;&#7901;ng T&#259;ng Nh&#417;n Ph&uacute; B, Qu&#7853;n 9, Tp HCM</span>
            <span class="c5"><br>C&Ocirc;NG TY TNHH TH&#431;&#416;NG M&#7840;I D&#7882;CH V&#7908; HOA TECHNOLOGY</span>
            <span class="c35"><br></span>
            <p class="c75"><span class="c5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&#272;i&#7879;n tho&#7841;i:&nbsp;</span><span
                    class="c50">0988.196. 169 &nbsp;- Website: &nbsp;www.hoatech.vn &nbsp; - &nbsp; Email :&nbsp;</span><span
                    class="c5">contact@hoatech.vn</span></p>
            <p class="c60"><span class="c17"></span></p></div>
        <p class="c46"><span
                class="c0">C&#7896;NG H&Ograve;A X&Atilde; H&#7896;I CH&#7910; NGH&#296;A VI&#7878;T NAM</span></p>
        <p class="c46"><span
                class="c7">&#272;&#7897;c l&#7853;p &ndash; T&#7921; do &ndash; H&#7841;nh Ph&uacute;c</span></p>
        <p class="c46"><span class="c3">---------o0o--------</span></p>
        <p class="c46 c72"><span class="c29"></span></p>
        <p class="c92">
            <span class="c35">&nbsp; &nbsp; &nbsp;H&#7906;P &#272;&#7890;NG CUNG C&#7844;P D&#7882;CH V&#7908; L&#431;U TR&#7918; D&#7918; LI&#7878;U TR&Ecirc;N INTERNET</span>
        </p>
        <p class="c78">
            <span class="c35">MA:&hellip;..</span></p>
        <ul class="c1 lst-kix_list_8-0 start">
            <li class="c28 c32"><span class="c20 c34">C&#259;n c&#7913; B&#7897; Lu&#7853;t D&acirc;n S&#7921; c&#7911;a n&#432;&#7899;c CHXHCNVN n&#259;m 2005;</span>
            </li>
            <li class="c28 c32"><span class="c20 c34">C&#259;n c&#7913; Lu&#7853;t Th&#432;&#417;ng m&#7841;i Vi&#7879;t Nam n&#259;m 2005;</span>
            </li>
            <li class="c28 c32"><span class="c20 c34">C&#259;n c&#7913; c&aacute;c v&#259;n b&#7843;n ph&aacute;p lu&#7853;t v&#7873; vi&#7877;n th&ocirc;ng;</span>
            </li>
            <li class="c28 c32"><span class="c20 c34">H&ocirc;m nay, ng&agrave;y &hellip; th&aacute;ng &hellip; n&#259;m &hellip;.., t&#7841;i c&ocirc;ng ty </span><span
                    class="c20 c88">TNHH TH&#431;&#416;NG M&#7840;I D&#7882;CH V&#7908; HOA TECHNOLOGY</span><span
                    class="c20 c34">&nbsp;ch&uacute;ng t&ocirc;i g&#7891;m c&oacute;:</span><span
                    class="c0">&nbsp;</span></li>
        </ul>
        <p class="c18 c91"><span class="c0"></span></p><a id="t.6416bbd2cfdbb79d2e0714aedbd3f22009061874"></a><a
            id="t.0"></a>

        <form action="{{route("admin.contract.viewSW")}}" method="POST" enctype="multipart/form-data" id="form_dk">
            {{--            <input type="hidden" name="id" value="{{isset($info->id) ? $info->id: ''}}">--}}
            @csrf
            <table style="width: 88%" class="c42">
                <tr class="c26">
                    <td class="c76" colspan="6" rowspan="1"><p class="c2">
                            <strong>Bên A:</strong>
                            <input style="width: 300px;" type="text" id="nameA" name="nameA">
                            <span class="c3">&nbsp;</span>
                            <span class="c35"></span></p></td>
                </tr>
                <tr class="c26">
                    <td class="c10" colspan="1" rowspan="1"><p class="c28"><span class="c27">Ng&#432;&#7901;i &#273;&#7841;i di&#7879;n: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </span>
                        </p></td>
                    <td class="c54" colspan="2" rowspan="1">
                        <p class="c28">


                            {{--                       Thông tin bên A--}}
                            {{--                        tên--}}
                            <span></span>
                            <select onchange="selectName(this)" type="text"
                                    class="form-control"
                                    name="name"
                                    value=" ">
                                <option value=" ">Choose Name</option>
                                @foreach($info as $ht)
                                    <option value="{{$ht->name}}"
                                            @if(isset($ht->id))
                                            selected
                                            @endif
                                            data-email="{{$ht->email}}"
                                            data-address="{{$ht->address}}"
                                            data-phone="{{$ht->phone_number}}"
                                    >{{$ht->name}}</option>
                                @endforeach
                            </select>
                        <p class="help-block text-danger"></p>
                        @if($errors->has('name'))
                            <p class="help-block text-danger">
                                {{ $errors->first('name') }}
                            </p>
                        @endif

                        <p class="help-block text-danger"></p>


                    </td>
                    <td class="c19" colspan="2" rowspan="1"><p class="c28 c79"><span
                                class="c27">Ch&#7913;c v&#7909;: </span></p></td>
                    <td class="c13" colspan="1" rowspan="1"><p class="c28 c83">
                            {{--                       chức vụ--}}
                            {{--                        <span class="c7 c81">sinh viên</span>--}}
                            <input type="text" id="position" name="position" value="">
                        </p></td>
                </tr>
                <tr class="c24">
                    <td class="c10" colspan="1" rowspan="1"><p class="c28">
                            <span class="c27">&#272;&#7883;a ch&#7881;:</span></p></td>
                    <td class="c6" colspan="5" rowspan="1"><p class="c28 c33">
                            {{--địa chỉ--}}
                            <input id="address" type="text" style="width: 500px;"
                                   name="address" readonly
                                   value="">
                        <p class="help-block text-danger"></p>
                        @if($errors->has('address'))
                        </p>
                        <p class="help-block text-danger">
                            {{ $errors->first('address') }}
                            @endif
                        </p></td>
                </tr>
                <tr class="c53">
                    <td class="c10" colspan="1" rowspan="1"><p class="c28"><span class="c27">&#272;i&#7879;n tho&#7841;i:</span>
                        </p></td>
                    <td class="c51" colspan="1" rowspan="1"><p class="c28">
                            {{--số điện thoại--}}
                            <input id="telephone" type="text"
                                   name="telephone" readonly
                                   value="">
                        <p class="help-block text-danger"></p>
                        @if($errors->has('telephone'))
                            <p class="help-block text-danger">
                                {{ $errors->first('telephone') }}
                            </p>
                            @endif
                            </p></td>
                    <td class="c15" colspan="2" rowspan="1"><p class="c2"><span
                                class="c3">&nbsp; &nbsp;S&#7889; Fax:</span></p></td>
                    <td class="c58" colspan="2" rowspan="1"><p class="c2">
                            {{--số  fax--}}
                            <input type="text" id="fax" name="fax" value="">

                        </p></td>
                </tr>
                <tr class="c53">
                    <td class="c10" colspan="1" rowspan="1"><p class="c28">
                            <span class="c27">S&#7889; t&agrave;i kho&#7843;n: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </span>
                        </p></td>
                    <td class="c51" colspan="1" rowspan="1"><p class="c2">
                            {{--                       số tài khoản--}}
                            {{--                        <span class="c0">số tài khoản</span>--}}
                            <input type="text" id="account_number" name="account_number" value="">
                        </p></td>
                    <td class="c15" colspan="2" rowspan="1"><p class="c2"><span class="c3">M&#7903; t&#7841;i:</span>
                        </p></td>
                    <td class="c58" colspan="2" rowspan="1"><p class="c2">
                            {{-- Mở tại--}}

                            <input type="text" id="open_at" name="open_at" value="">
                        </p></td>
                </tr>
                <tr class="c52">
                    <td class="c10" colspan="1" rowspan="1"><p class="c2"><span class="c3">M&atilde; s&#7889; thu&#7871;:</span><span
                                class="c0">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></p></td>
                    <td class="c51" colspan="1" rowspan="1"><p class="c2">
                            {{--số thuế--}}
                            <input type="text" id="tax_number" name="tax_number" value="">
                        </p></td>
                    <td class="c22" colspan="1" rowspan="1"><p class="c2"><span class="c3">Email</span></p></td>
                    <td class="c73" colspan="3" rowspan="1">
                        <p class="c2 c72">
                            {{-- địa chỉ email--}}
                            <input id="email" type="text"
                                   name="email" readonly
                                   value="">
                        <p class="help-block text-danger"></p>
                        @if($errors->has('price'))
                            <p class="help-block text-danger">
                                {{ $errors->first('price') }}
                            </p>
                            @endif


                            </p></td>
                </tr>
                <tr class="c70">
                    <td class="c76" colspan="6" rowspan="1"><p class="c28 c79">


                            <span class="c7">B&ecirc;n B: C&Ocirc;NG TY TNHH TH&#431;&#416;NG M&#7840;I D&#7882;CH V&#7908; HOA TECHNOLOGY</span>
                        </p></td>
                </tr>
                <tr class="c89">
                    <td class="c10" colspan="1" rowspan="1"><p class="c28"><span class="c34">Ng&#432;&#7901;i &#273;&#7841;i di&#7879;n:</span>
                        </p></td>
                    <td class="c54" colspan="2" rowspan="1"><p class="c28"><span
                                class="c7">L&ecirc; Thanh Ho&agrave;</span></p></td>
                    <td class="c19" colspan="2" rowspan="1"><p class="c28"><span
                                class="c34">Ch&#7913;c v&#7909;: </span></p></td>
                    <td class="c13" colspan="1" rowspan="1"><p class="c28"><span
                                class="c7">Gi&aacute;m &#273;&#7889;c</span></p></td>
                </tr>
                <tr class="c26">
                    <td class="c10" colspan="1" rowspan="1"><p class="c28"><span
                                class="c34">&#272;&#7883;a ch&#7881;:</span></p></td>
                    <td class="c6" colspan="5" rowspan="1"><p class="c28 c33"><span class="c7">102B T&#259;ng Nh&#417;n Ph&uacute;, Ph&#432;&#7901;ng T&#259;ng Nh&#417;n Ph&uacute;, Qu&#7853;n 9, TPHCM</span>
                        </p></td>
                </tr>
                <tr class="c26">
                    <td class="c10" colspan="1" rowspan="1"><p class="c28"><span class="c34">S&#7889; &#273;i&#7879;n tho&#7841;i:</span>
                        </p></td>
                    <td class="c51" colspan="1" rowspan="1"><p class="c28"><span class="c7">0988 196 169</span></p></td>
                    <td class="c15" colspan="2" rowspan="1"><p class="c28"><span
                                class="c3">&nbsp; &nbsp;S&#7889; Fax: </span></p></td>
                    <td class="c58" colspan="2" rowspan="1"><p class="c18"><span class="c3"></span></p></td>
                </tr>
                <tr class="c26">
                    <td class="c10" colspan="1" rowspan="1"><p class="c28"><span class="c34">S&#7889; t&agrave;i kho&#7843;n: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </span>
                        </p></td>
                    <td class="c51" colspan="1" rowspan="1"><p class="c28"><span class="c7">130813888</span></p></td>
                    <td class="c15" colspan="2" rowspan="1"><p class="c28"><span class="c34">&nbsp; &nbsp;M&#7903; t&#7841;i Ng&acirc;n h&agrave;ng:</span>
                        </p></td>
                    <td class="c58" colspan="2" rowspan="1"><p class="c28"><span class="c7">&Aacute; Ch&acirc;u ACB &ndash; Qu&#7853;n 9</span>
                        </p></td>
                </tr>
                <tr class="c26">
                    <td class="c10" colspan="1" rowspan="1"><p class="c28"><span class="c34">M&atilde; s&#7889; thu&#7871;:</span>
                        </p></td>
                    <td class="c51" colspan="1" rowspan="1"><p class="c28"><span class="c7">0313275605</span></p></td>
                    <td class="c22" colspan="1" rowspan="1"><p class="c28"><span class="c34">Email</span></p></td>
                    <td class="c73" colspan="3" rowspan="1"><p class="c28"><span class="c7">contact@hoatech.vn</span>
                        </p></td>
                </tr>
            </table>



            <h4 style="text-align: center"><b>CHI TIẾT HỢP ĐỒNG</b></h4>
            <p class="c18 c31"><span class="c3"></span></p><a id="t.6e7bac4e419786072c86b10c973cea5a54a1dbe4"></a><a
                id="t.1"></a>

            <div class="tdhv">
                <div style="margin-left: 20px;" class="row">

                    <div class="form-group col-md-3">
                        <div class="col-xs-12 form-group">
                            <label>Tên hang hóa, dịch vụ *</label>
                            <select onchange="selectSWare(this)" type="text"
                                    class="form-control"
                                    id="nameSW"
                                    name="nameSW[]"
                                    value=" ">
                                <option value=" ">Chọn phần mềm</option>
                                @foreach($software as $sw)
                                    <option value="{{$sw->id}}"
                                            @if(isset($sw->id))
                                            selected
                                            @endif
                                            data-price="{{$sw->price}}"
                                    >{{$sw->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group col-md-3">
                        <div class="col-xs-12 form-group">
                            <label>Đơn giá(VNĐ) *</label>
                            <input id="price" type="text"
                                   name="price" readonly
                                   value="">
                        </div>
                    </div>

                    <div class="form-group col-md-3">
                        <div class="col-xs-12 form-group">
                            <label>Số lượng *</label><br>
                            <input id="quantity" type="text" name="quantity" data-id="quantity" value="">
                        </div>
                    </div>


                    <div class="form-group col-md-3">
                        <label>Thành tiền(VNĐ) *</label>
                        <div class="col-xs-12 form-group">
                            <input id="total" type="text" name="total" readonly value="">
                        </div>
                    </div>

                </div>

                <div class="row event" STYLE="float: right" style="margin-bottom: 5px">
                    <a id="bt_contract_sw" class="btn btn-default">Thêm</a>
                </div>
            </div>


            <div class="">
                <div class="content-content">
                    <h4 style="text-align: center"><b>BẢNG HỢP ĐỒNG</b></h4>
                    <table
                        id="tb_hopdong" class="table table-hover tm-table-small ">
                        <tr>
                            <th scope="col">&nbsp;</th>
                            <th scope="col">Tên hàng hóa, dịch vụ</th>
                            <th scope="col">Đơn giá(VNĐ)</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Thành tiền(VNĐ)</th>
                        </tr>

                    </table>
                </div>
            </div>
            <button class="btn btn-info">{{ __('general.save') }}</button>
        </form>
        </html>
    </div>
@stop

<script>
    function selectName(obj) {
        var data_price = $(obj).find(':selected').data('email');
        var data_capacity = $(obj).find(':selected').data('address');
        var data_bandwith = $(obj).find(':selected').data('phone');

        var email = document.getElementById('email');
        var address = document.getElementById('address');
        var telephone = document.getElementById('telephone');

        email.value = data_price;
        address.value = data_capacity;
        telephone.value = data_bandwith;
    };

    function selectSWare(obj) {
        var data_price = $(obj).find(':selected').data('price');
        // var price = document.getElementById('price');

        $('#quantity').keyup(function () {
            var quantity = $('input[data-id="quantity"]').val();
            total.value = data_price * parseInt(quantity);
        });
        price.value = data_price;

    };

    $(document).ready(function () {
        var list_hopdong_phanmem = [];
        var list = [];
        var i = 1;
        $('#bt_contract_sw').click(function () {
            var tdhv = {
                id: i,
                tenhopdong: $('#nameSW option:selected').text(),
                gia: $('#price').val(),
                soluong: $('#quantity').val(),
                thanhtien: $('#total').val(),
            };
            list_hopdong_phanmem.push(tdhv);



            message = "<tr><td><a class='remove' id =" + tdhv.id + "><i class='fa fa-trash'></i></a></td>" +
                "<td> " + "<input class='list_hopdong' type='hidden' name='list_hopdong[]' " +
                "value='"
                + tdhv.tenhopdong + ","
                + tdhv.gia + ","
                + tdhv.soluong + ","
                + tdhv.thanhtien + "'>"
                + tdhv.tenhopdong + "</td>" +
                "<td>" + tdhv.gia + "</td>" +
                "<td>" + tdhv.soluong + "</td>" +
                "<td>" + tdhv.thanhtien + "</td></tr>";
            $('#tb_hopdong').append(message);
            i++;
        })
        $("#tb_hopdong").on("click", ".remove", function () {
            z = list_hopdong_phanmem.findIndex(obj => obj.id == $(this).attr("id"));
            list_hopdong_phanmem.splice(z, 1);
            $(this).closest("tr").remove();
        });
    });
</script>
