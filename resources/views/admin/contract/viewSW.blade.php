@extends('layout.master')

@section('css')
    <style>
        table, th, td {
            border: 1px solid black;

        }

        table td, table th {
            padding: 10px 10px;
        }

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
            /*margin-top: 5px;*/
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

        <form action="" method="post">
            {{--            <input type="hidden" name="id" value="{{isset($info->id) ? $info->id: ''}}">--}}
            @csrf
            <table style="width: 88%" class="c42">
                <tr class="c26">
                    <td class="c76" colspan="6" rowspan="1"><p class="c2">
                            <strong>Bên A:</strong>
                            <span class="c7">{{$nameA}}</span>
                            <span class="c3">&nbsp;</span>
                            <span class="c35"></span></p></td>
                </tr>
                <tr class="c26">
                    <td class="c10" colspan="1" rowspan="1"><p class="c28"><span class="c27">Ng&#432;&#7901;i &#273;&#7841;i di&#7879;n: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </span>
                        </p></td>
                    <td class="c54" colspan="2" rowspan="1"><p class="c28">


                            {{--                       Thông tin bên A--}}
                            {{--                        tên--}}
                            <span class="c0">{{$name}}</span>
                        {{--                            <span>{{$a-}}</span>--}}


                        <p class="help-block text-danger"></p>


                    </td>
                    <td class="c19" colspan="2" rowspan="1"><p class="c28 c79"><span
                                class="c27">Ch&#7913;c v&#7909;: </span></p></td>
                    <td class="c13" colspan="1" rowspan="1"><p class="c28 c83">
                            {{--                       chức vụ--}}
                            {{--                        <span class="c7 c81">sinh viên</span>--}}
                            <span class="c0">{{$position}}</span>
                        </p></td>
                </tr>
                <tr class="c24">
                    <td class="c10" colspan="1" rowspan="1"><p class="c28">
                            <span class="c27">&#272;&#7883;a ch&#7881;:</span></p></td>
                    <td class="c6" colspan="5" rowspan="1"><p class="c28 c33">
                            {{--                       địa chỉ--}}
                            <span class="c0">{{$address}}</span>


                        </p></td>
                </tr>
                <tr class="c53">
                    <td class="c10" colspan="1" rowspan="1"><p class="c28"><span class="c27">&#272;i&#7879;n tho&#7841;i:</span>
                        </p></td>
                    <td class="c51" colspan="1" rowspan="1"><p class="c28">
                            {{--                      số điện thoại--}}
                            <span class="c0">{{$phone}}</span>
                        </p></td>
                    <td class="c15" colspan="2" rowspan="1"><p class="c2"><span
                                class="c3">&nbsp; &nbsp;S&#7889; Fax:</span></p></td>
                    <td class="c58" colspan="2" rowspan="1"><p class="c2">
                            {{--                   số  fax--}}

                            <span class="c0">{{$fax}}</span>
                        </p></td>
                </tr>
                <tr class="c53">
                    <td class="c10" colspan="1" rowspan="1"><p class="c28">
                            <span class="c27">S&#7889; t&agrave;i kho&#7843;n: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </span>
                        </p></td>
                    <td class="c51" colspan="1" rowspan="1"><p class="c2">
                            {{--                       số tài khoản--}}
                            <span class="c0">{{$account_number}}</span>

                        </p></td>
                    <td class="c15" colspan="2" rowspan="1"><p class="c2"><span class="c3">M&#7903; t&#7841;i:</span>
                        </p></td>
                    <td class="c58" colspan="2" rowspan="1"><p class="c2">
                            {{--                      Mở tại--}}
                            <span class="c0">{{$open_at}}</span>

                        </p></td>
                </tr>
                <tr class="c52">
                    <td class="c10" colspan="1" rowspan="1"><p class="c2"><span class="c3">M&atilde; s&#7889; thu&#7871;:</span><span
                                class="c0">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></p></td>
                    <td class="c51" colspan="1" rowspan="1"><p class="c2">
                            {{--                      số thuế--}}
                            <span class="c0">{{$tax_number}}</span>

                        </p></td>
                    <td class="c22" colspan="1" rowspan="1"><p class="c2"><span class="c3">Email</span></p></td>
                    <td class="c73" colspan="3" rowspan="1">
                        <p class="c2 c72">
                            {{--                    địa chỉ email--}}
                            <span class="c0">{{$email}}</span>


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
        </form>
        </html>
    </div>



    <p class="c28"><span class="c30"><br>Hai B&ecirc;n th&#7889;ng nh&#7845;t k&yacute; k&#7871;t H&#7907;p &#273;&#7891;ng v&#7899;i c&aacute;c &#273;i&#7873;u kho&#7843;n sau &#273;&acirc;y:</span>
    </p><h1 class="c9"><span class="c34 c45">&#272;I&#7872;U 1:</span><span class="c0">&nbsp;N&#7896;I DUNG CUNG C&#7844;P D&#7882;CH V&#7908;</span>
    </h1><p class="c9"><span class="c3">B&ecirc;n B cung c&#7845;p d&#7883;ch v&#7909; cho B&ecirc;n A v&#7899;i c&aacute;c kho&#7843;n m&#7909;c, s&#7889; l&#432;&#7907;ng, kinh ph&iacute; nh&#432; sau:</span>
    </p>
    <ol class="c1 lst-kix_list_7-1 start" start="1">
        <li class="c28 c47"><span class="c3">D&#7883;ch v&#7909; cung c&#7845;p: d&#7883;ch v&#7909; l&#432;u tr&#7919; website</span>
        </li>
        <li class="c28 c31 c44"><span class="c3">Gi&aacute; c&#432;&#7899;c: Hai b&ecirc;n th&#7889;ng nh&#7845;t th&#7887;a thu&#7853;n gi&aacute; c&#432;&#7899;c nh&#432; sau:<br></span>
        </li>
    </ol><p class="c18 c31"><span class="c3"></span></p><p class="c18 c31"><span class="c3"></span></p><a
        id="t.6e7bac4e419786072c86b10c973cea5a54a1dbe4"></a><a id="t.1"></a>



    <div class="">


        <table style="width: 88%" class="c42">

            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên hàng hóa, dịch vụ</th>
                <th scope="col">Đơn giá(VNĐ)</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Thành tiền(VNĐ)</th>
            </tr>
            <?php $stt = 0;$vat = 0;$sum = 0?>
            @foreach($list as $list)
                <tr>
                    <th>{{$stt++}}</th>
                    <th>{{$list[0]}}</th>
                    <th>{{$list[1]}}</th>
                    <th>{{$list[2]}}</th>
                    <th>{{$list[3]}}</th>
                </tr>
            @endforeach

            <tr class="c25">
                <td class="c59" colspan="4" rowspan="1">
                    {{--                    vat--}}
                    <p class="c39"><span class="c0">VAT 10%</span></p></td>
                <td class="c8" colspan="1" rowspan="1">
                    <span class="c0">{{$vat}}</span>
                </td>
            </tr>
            <tr class="c25">
                <td class="c59" colspan="4" rowspan="1">
                    {{--                    thanh toán--}}
                    <p class="c39"><span class="c0">Th&agrave;nh ti&#7873;n</span></p></td>
                <td class="c8" colspan="1" rowspan="1">
     

                </td>
            </tr>
            <tr class="c63">
                <td class="c71" colspan="5" rowspan="1">
                    <p class="c39"><span class="c3">B&#7857;ng ch&#7919; : </span></p></td>
            </tr>
        </table>


    </div>





    <p class="c18"><span class="c3"></span></p><h1 class="c9"><span class="c16">&nbsp;</span><span class="c34 c45">&#272;I&#7872;U 2</span><span
            class="c0">: PH&#431;&#416;NG TH&#7912;C THANH TO&Aacute;N</span></h1><a id="id.30j0zll"></a>
    <ol class="c1 lst-kix_list_6-1 start" start="1">
        <li class="c23"><span class="c3">Sau khi k&yacute; H&#7907;p &#273;&#7891;ng, B&ecirc;n A thanh to&aacute;n ngay cho B&ecirc;n B to&agrave;n b&#7897; gi&aacute; tr&#7883; H&#7907;p &#273;&#7891;ng bao g&#7891;m c&aacute;c kho&#7843;n ph&iacute; d&#7883;ch v&#7909; sau:</span>
        </li>
    </ol>
    <ul class="c1 lst-kix_list_8-1 start">
        <li class="c69"><span class="c3">Ph&iacute; d&#7883;ch v&#7909; l&#432;u tr&#7919; website</span></li>
    </ul><p class="c28 c31 c37"><span class="c3">C&aacute;c kho&#7843;n ph&iacute; tr&ecirc;n s&#7869; kh&ocirc;ng &#273;&#432;&#7907;c ho&agrave;n l&#7841;i cho B&ecirc;n A trong tr&#432;&#7901;ng h&#7907;p B&ecirc;n A &#273;&#417;n ph&#432;&#417;ng ch&#7845;m d&#7913;t h&#7907;p &#273;&#7891;ng tr&aacute;i v&#7899;i quy &#273;&#7883;nh t&#7841;i h&#7907;p &#273;&#7891;ng n&agrave;y.</span>
    </p><a id="id.1fob9te"></a><a id="id.3znysh7"></a>
    <ol class="c1 lst-kix_list_6-1" start="2">
        <li class="c4"><span class="c3">Tr&#432;&#7901;ng h&#7907;p B&ecirc;n A thanh to&aacute;n kh&ocirc;ng &#273;&uacute;ng h&#7841;n, B&ecirc;n B ngay l&#7853;p t&#7913;c c&oacute; quy&#7873;n t&#7841;m ng&#7915;ng cung c&#7845;p d&#7883;ch v&#7909; m&agrave; kh&ocirc;ng c&#7847;n ph&#7843;i th&ocirc;ng b&aacute;o tr&#432;&#7899;c cho B&ecirc;n A cho &#273;&#7871;n khi b&ecirc;n A thanh to&aacute;n &#273;&#7911; v&agrave; &#273;&uacute;ng h&#7841;n theo quy &#273;&#7883;nh t&#7841;i &#273;i&#7873;u 2.1 h&#7907;p &#273;&#7891;ng n&agrave;y.</span>
        </li>
    </ol><a id="id.2et92p0"></a>
    <ol class="c1 lst-kix_list_6-1" start="3">
        <li class="c23"><span class="c3">B&ecirc;n B cung c&#7845;p h&oacute;a &#273;&#417;n h&#7907;p l&#7879; cho B&ecirc;n A cho vi&#7879;c thanh to&aacute;n ph&iacute; thu&ecirc; d&#7883;ch v&#7909; c&#7911;a H&#7907;p &#273;&#7891;ng n&agrave;y.</span>
        </li>
    </ol><p class="c18"><span class="c3"></span></p><a id="id.tyjcwt"></a><h1 class="c9"><span
            class="c34 c45">&nbsp;</span><span class="c34 c45">&#272;I&#7872;U 3</span><span class="c0">: TR&Aacute;CH NHI&#7878;M C&#7910;A B&Ecirc;N A</span>
    </h1><a id="id.3dy6vkm"></a>
    <ol class="c1 lst-kix_list_5-1 start" start="1">
        <li class="c23"><span class="c3">Cung c&#7845;p &#273;&#7847;y &#273;&#7911; th&ocirc;ng tin theo y&ecirc;u c&#7847;u c&#7911;a B&ecirc;n B trong v&ograve;ng 05 (n&#259;m) ng&agrave;y l&agrave;m vi&#7879;c k&#7875; t&#7915; ng&agrave;y H&#7907;p &#273;&#7891;ng k&yacute; k&#7871;t &#273;&#7875; B&ecirc;n B ti&#7871;n h&agrave;nh th&#7921;c hi&#7879;n H&#7907;p &#273;&#7891;ng. B&ecirc;n B kh&ocirc;ng ch&#7883;u tr&aacute;ch nhi&#7879;m n&#7871;u vi&#7879;c cung c&#7845;p th&ocirc;ng tin kh&ocirc;ng &#273;&uacute;ng h&#7841;n v&agrave; &#273;&#7847;y &#273;&#7911; c&#7911;a B&ecirc;n A l&agrave;m ch&#7853;m ti&#7871;n &#273;&#7897; H&#7907;p &#273;&#7891;ng.</span>
        </li>
    </ol><a id="id.1t3h5sf"></a>
    <ol class="c1 lst-kix_list_5-1" start="2">
        <li class="c28 c65 c80"><span class="c3">Ch&#7883;u tr&aacute;ch nhi&#7879;m v&#7873; n&#7897;i dung th&ocirc;ng tin thu&ecirc; B&ecirc;n B l&#432;u tr&#7919;, ho&#7863;c c&aacute;c th&ocirc;ng tin do B&ecirc;n A t&#7921; c&agrave;i &#273;&#7863;t tr&ecirc;n m&aacute;y ch&#7911; &#273;&#7863;t t&#7841;i &#273;&#7883;a &#273;i&#7875;m th&#7921;c hi&#7879;n d&#7883;ch v&#7909; c&#7911;a B&ecirc;n B, &#273;&#7843;m b&#7843;o c&aacute;c th&ocirc;ng tin n&agrave;y kh&ocirc;ng ch&#7913;a c&aacute;c ph&#7847;n m&#7873;m ph&aacute; ho&#7841;i v&agrave; kh&ocirc;ng tr&aacute;i v&#7899;i &#273;&#7841;o &#273;&#7913;c x&atilde; h&#7897;i, quy &#273;&#7883;nh c&#7911;a ph&aacute;p lu&#7853;t.</span>
        </li>
    </ol><a id="id.4d34og8"></a>
    <ol class="c1 lst-kix_list_5-1" start="3">
        <li class="c14"><span class="c3">Kh&ocirc;ng s&#7917; d&#7909;ng d&#7883;ch v&#7909; c&#7911;a B&ecirc;n B cung c&#7845;p cho m&#7909;c &#273;&iacute;ch SpamMail (g&#7917;i th&#432; r&aacute;c). Tr&#432;&#7901;ng h&#7907;p B&ecirc;n A vi ph&#7841;m ngh&#297;a v&#7909; n&agrave;y, B&ecirc;n A ho&agrave;n to&agrave;n t&#7921; m&igrave;nh ch&#7883;u tr&aacute;ch nhi&#7879;m. B&ecirc;n B kh&ocirc;ng ch&#7883;u tr&aacute;ch nhi&#7879;m hay li&ecirc;n quan &#273;&#7871;n nh&#7919;ng vi ph&#7841;m c&#7911;a B&ecirc;n A.</span>
        </li>
    </ol><a id="id.2s8eyo1"></a>
    <ol class="c1 lst-kix_list_5-1" start="4">
        <li class="c28 c65 c61"><span class="c3">C&oacute; tr&aacute;ch nhi&#7879;m b&#7843;o m&#7853;t quy&#7873;n &#273;&#259;ng nh&#7853;p v&agrave;o H&#7879; th&#7889;ng qu&#7843;n tr&#7883; t&ecirc;n mi&#7873;n v&agrave; l&#432;u tr&#7919; website (Cpanel), t&agrave;i kho&#7843;n c&#7853;p nh&#7853;t th&ocirc;ng tin (FTP &ndash; File Transfer Protocol), c&aacute;c t&agrave;i kho&#7843;n th&#432; &#273;i&#7879;n t&#7917; theo t&ecirc;n mi&#7873;n ri&ecirc;ng do B&ecirc;n B c&#7845;p. Tr&#432;&#7901;ng h&#7907;p b&ecirc;n A s&#7917; d&#7909;ng ho&#7863;c cung c&#7845;p cho b&ecirc;n th&#7913; ba (ngo&agrave;i h&#7907;p &#273;&#7891;ng n&agrave;y) quy&#7873;n &#273;&#259;ng nh&#7853;p v&agrave;o h&#7879; th&#7889;ng &#273;&#7875; th&#7921;c hi&#7879;n c&aacute;c h&agrave;nh vi vi ph&#7841;m ph&aacute;p lu&#7853;t th&igrave; B&ecirc;n A ho&agrave;n to&agrave;n ch&#7883;u tr&aacute;ch nhi&#7879;m.</span>
        </li>
    </ol><a id="id.17dp8vu"></a>
    <ol class="c1 lst-kix_list_5-1" start="5">
        <li class="c28 c65 c61"><span class="c3">Ch&#7883;u tr&aacute;ch nhi&#7879;m qu&#7843;n l&yacute; n&#7897;i dung c&aacute;c th&#432; &#273;i&#7879;n t&#7917; &#273;&#432;&#7907;c g&#7917;i &#273;i t&#7915; h&#7897;p th&#432; trong t&agrave;i kho&#7843;n c&#7911;a B&ecirc;n A.</span>
        </li>
    </ol><a id="id.3rdcrjn"></a>
    <ol class="c1 lst-kix_list_5-1" start="6">
        <li class="c28 c65 c57"><span class="c3">Tu&acirc;n th&#7911; theo &#273;&uacute;ng c&aacute;c quy &#273;&#7883;nh c&#7911;a Nh&agrave; n&#432;&#7899;c v&#7873; s&#7917; d&#7909;ng d&#7883;ch v&#7909; Internet, quy&#7873;n s&#7903; h&#7919;u c&ocirc;ng nghi&#7879;p, b&#7843;n quy&#7873;n ph&#7847;n m&#7873;m c&agrave;i &#273;&#7863;t tr&ecirc;n m&aacute;y ch&#7911; (n&#7871;u c&oacute;), b&iacute; m&#7853;t qu&#7889;c gia, an ninh, v&#259;n h&oacute;a.</span>
        </li>
    </ol><a id="id.26in1rg"></a>
    <ol class="c1 lst-kix_list_5-1" start="7">
        <li class="c28 c65 c31"><span class="c3">Thanh to&aacute;n &#273;&#7847;y &#273;&#7911; v&agrave; &#273;&uacute;ng h&#7841;n c&aacute;c kho&#7843;n &#273;&atilde; &#273;&#432;&#7907;c n&ecirc;u trong </span><span
                class="c0">&#272;i&#7873;u 1 </span><span class="c3">v&agrave; </span><span
                class="c0">&#272;i&#7873;u 2 </span><span
                class="c3">c&#7911;a H&#7907;p &#273;&#7891;ng n&agrave;y.</span></li>
    </ol><a id="id.lnxbz9"></a>
    <ol class="c1 lst-kix_list_5-1" start="8">
        <li class="c23"><span class="c3">Th&ocirc;ng b&aacute;o cho B&ecirc;n B v&#7873; s&#7921; thay &#273;&#7893;i t&ecirc;n, &#273;&#7883;a ch&#7881;, &#273;&#7883;a ch&#7881; g&#7917;i h&oacute;a &#273;&#417;n thanh to&aacute;n, s&#7889; t&agrave;i kho&#7843;n, th&#7901;i gian ng&#7915;ng d&#7883;ch v&#7909; (n&#7871;u c&oacute;) tr&#432;&#7899;c &iacute;t nh&#7845;t tr&#432;&#7899;c 15 (m&#432;&#7901;i l&#259;m) ng&agrave;y l&agrave;m vi&#7879;c.</span>
        </li>
    </ol><a id="id.35nkun2"></a>
    <ol class="c1 lst-kix_list_5-1" start="9">
        <li class="c28 c62"><span class="c3">&#272;&#7843;m b&#7843;o ng&#432;&#7901;i &#273;&#7841;i di&#7879;n k&yacute; h&#7907;p &#273;&#7891;ng n&agrave;y l&agrave; ng&#432;&#7901;i c&oacute; quy&#7873;n ho&#7863;c &#273;&atilde; &#273;&#432;&#7907;c &#7911;y quy&#7873;n c&#7911;a B&ecirc;n A &#273;&#7875; k&yacute; h&#7907;p &#273;&#7891;ng, ch&#7913;ng t&#7915;.</span>
        </li>
    </ol><a id="id.1ksv4uv"></a>
    <ol class="c1 lst-kix_list_5-1" start="10">
        <li class="c28 c65"><span class="c3">&#272;&#432;&#7907;c quy&#7873;n khi&#7871;u n&#7841;i v&#7873; ch&#7845;t l&#432;&#7907;ng d&#7883;ch v&#7909; v&agrave; gi&aacute; c&#432;&#7899;c theo quy &#273;&#7883;nh c&#7911;a Ph&aacute;p lu&#7853;t</span>
        </li>
    </ol><a id="id.44sinio"></a><h1 class="c9"><span class="c34 c45">&nbsp;</span><span class="c34 c45">&#272;I&#7872;U 4</span><span
            class="c0">: TR&Aacute;CH NHI&#7878;M C&#7910;A B&Ecirc;N B</span></h1><a id="id.2jxsxqh"></a>
    <ol class="c1 lst-kix_list_4-1 start" start="1">
        <li class="c28 c38 c61"><span class="c3">Cung c&#7845;p d&#7883;ch v&#7909; theo &#273;&uacute;ng n&#7897;i dung &#273;&atilde; tho&#7843; thu&#7853;n t&#7841;i </span><span
                class="c0">&#272;i&#7873;u 1 </span><span class="c3">c&#7911;a H&#7907;p &#273;&#7891;ng n&agrave;y v&agrave; b&#7843;o &#273;&#7843;m ch&#7845;t l&#432;&#7907;ng d&#7883;ch v&#7909; theo &#273;&uacute;ng c&aacute;c quy &#273;&#7883;nh v&#7873; ti&ecirc;u chu&#7849;n ch&#7845;t l&#432;&#7907;ng d&#7883;ch v&#7909;.</span>
        </li>
    </ol><a id="id.z337ya"></a>
    <ol class="c1 lst-kix_list_4-1" start="2">
        <li class="c28 c38"><span class="c3">Cung c&#7845;p h&oacute;a &#273;&#417;n t&agrave;i ch&iacute;nh sau khi b&ecirc;n A thanh to&aacute;n xong to&agrave;n b&#7897; gi&aacute; tr&#7883; H&#7907;p &#273;&#7891;ng.</span>
        </li>
    </ol><a id="id.3j2qqm3"></a>
    <ol class="c1 lst-kix_list_4-1" start="3">
        <li class="c28 c38 c57"><span class="c3">H&#432;&#7899;ng d&#7851;n B&ecirc;n A th&#7921;c hi&#7879;n &#273;&uacute;ng quy tr&igrave;nh khai th&aacute;c d&#7883;ch v&#7909; v&agrave; c&aacute;c quy &#273;&#7883;nh ph&aacute;p lu&#7853;t hi&#7879;n h&agrave;nh.</span>
        </li>
    </ol><a id="id.1y810tw"></a>
    <ol class="c1 lst-kix_list_4-1" start="4">
        <li class="c28 c38"><span class="c3">Tu&acirc;n th&#7911; c&aacute;c quy &#273;&#7883;nh ph&aacute;p lu&#7853;t v&#7873; quy&#7873;n s&#7903; h&#7919;u c&ocirc;ng nghi&#7879;p, b&#7843;n quy&#7873;n.</span>
        </li>
    </ol><a id="id.4i7ojhp"></a>
    <ol class="c1 lst-kix_list_4-1" start="5">
        <li class="c28 c38 c57"><span class="c3">Kh&ocirc;ng ch&#7883;u tr&aacute;ch nhi&#7879;m ho&#7863;c b&#7891;i th&#432;&#7901;ng thi&#7879;t h&#7841;i n&agrave;o v&#7873; vi&#7879;c m&#7845;t m&aacute;t hay h&#432; h&#7887;ng &#273;&#7889;i v&#7899;i d&#7919; li&#7879;u c&#7911;a B&ecirc;n A &#273;&#432;&#7907;c l&#432;u tr&#7919; tr&ecirc;n m&aacute;y ch&#7911; trong c&aacute;c tr&#432;&#7901;ng h&#7907;p do l&#7895;i c&#7911;a B&ecirc;n A.</span>
        </li>
    </ol><a id="id.2xcytpi"></a>
    <ol class="c1 lst-kix_list_4-1" start="6">
        <li class="c28 c38 c57"><span class="c3">Kh&ocirc;ng ch&#7883;u b&#7845;t c&#7913; tr&aacute;ch nhi&#7879;m n&agrave;o v&agrave; kh&ocirc;ng ph&#7843;i b&#7891;i th&#432;&#7901;ng cho B&ecirc;n A trong tr&#432;&#7901;ng h&#7907;p d&#7919; li&#7879;u c&#7911;a B&ecirc;n A thu&ecirc; B&ecirc;n B l&#432;u gi&#7919; ho&#7863;c h&#7879; th&#7889;ng l&#432;u tr&#7919; b&#7883; gi&aacute;n &#273;o&#7841;n do l&#7895;i c&#7911;a b&ecirc;n A ho&#7863;c do website (trang th&ocirc;ng tin &#273;i&#7879;n t&#7917;) b&#7883; t&#7845;n c&ocirc;ng (tr&#7921;c ti&#7871;p ho&#7863;c gi&aacute;n ti&#7871;p) ho&#7863;c do s&#7921; c&#7889; b&#7845;t kh&#7843; kh&aacute;ng theo quy &#273;&#7883;nh t&#7841;i &#272;i&#7873;u 6 d&#432;&#7899;i &#273;&acirc;y.</span>
        </li>
    </ol><a id="id.1ci93xb"></a>
    <ol class="c1 lst-kix_list_4-1" start="7">
        <li class="c28 c65 c61"><span class="c3">Nhanh ch&oacute;ng gi&#7843;i quy&#7871;t c&aacute;c khi&#7871;u n&#7841;i c&#7911;a B&ecirc;n A v&#7873; ch&#7845;t l&#432;&#7907;ng d&#7883;ch v&#7909;, c&#432;&#7899;c ph&iacute; nh&#432;ng kh&ocirc;ng &#273;&#432;&#7907;c qu&aacute; 20 (Hai m&#432;&#417;i) ng&agrave;y l&agrave;m vi&#7879;c k&#7875; t&#7915; ng&agrave;y nh&#7853;n &#273;&#432;&#7907;c khi&#7871;u n&#7841;i. Tr&#432;&#7901;ng h&#7907;p ph&aacute;p lu&#7853;t c&oacute; thay &#273;&#7893;i v&#7873; th&#7901;i h&#7841;n gi&#7843;i quy&#7871;t khi&#7871;u n&#7841;i n&ecirc;u tr&ecirc;n th&igrave; Hai b&ecirc;n s&#7869; th&#7921;c hi&#7879;n theo quy &#273;&#7883;nh c&#7911;a ph&aacute;p lu&#7853;t hi&#7879;n h&agrave;nh t&#7841;i th&#7901;i &#273;i&#7875;m &#273;&oacute;</span>
        </li>
    </ol><h1 class="c9"><span class="c16">&nbsp;</span><span class="c34 c45">&#272;I&#7872;U 5</span><span
            class="c16">: </span><span class="c0">T&#7840;M NG&#7914;NG D&#7882;CH V&#7908; V&Agrave; &#272;&#416;N PH&#431;&#416;NG CH&#7844;M D&#7912;T H&#7906;P &#272;&#7890;NG</span>
    </h1>
    <ol class="c1 lst-kix_list_3-1 start" start="1">
        <li class="c28 c38"><span class="c3">D&#7883;ch v&#7909; &#273;&#432;&#7907;c t&#7841;m ng&#7915;ng trong c&aacute;c tr&#432;&#7901;ng h&#7907;p sau:</span>
        </li>
    </ol>
    <ol class="c1 lst-kix_list_3-2 start" start="1">
        <li class="c4"><span class="c3">Khi nh&#7853;n &#273;&#432;&#7907;c y&ecirc;u c&#7847;u b&#7857;ng v&#259;n b&#7843;n c&#7911;a B&ecirc;n A. Tr&#432;&#7901;ng h&#7907;p n&agrave;y B&ecirc;n A v&#7851;n ph&#7843;i thanh to&aacute;n ph&iacute; thu&ecirc; bao d&#7883;ch v&#7909; cho B&ecirc;n B. Th&#7901;i gian t&#7841;m ng&#7915;ng d&#7883;ch v&#7909; kh&ocirc;ng qu&aacute; 30 (ba m&#432;&#417;i) ng&agrave;y t&iacute;nh t&#7915; ng&agrave;y B&ecirc;n B nh&#7853;n &#273;&#432;&#7907;c v&#259;n b&#7843;n c&#7911;a B&ecirc;n A.</span>
        </li>
        <li class="c28 c38"><span class="c3">B&ecirc;n A vi ph&#7841;m c&aacute;c &#273;i&#7873;u kho&#7843;n &#273;&atilde; cam k&#7871;t trong H&#7907;p &#273;&#7891;ng.</span>
        </li>
        <li class="c28 c38 c31"><span class="c3">B&ecirc;n A d&ugrave;ng m&aacute;y ch&#7911; v&agrave;o b&#7845;t k&igrave; m&#7909;c &#273;&iacute;ch/h&igrave;nh th&#7913;c n&agrave;o tr&aacute;i v&#7899;i quy &#273;&#7883;nh c&#7911;a ph&aacute;p lu&#7853;t Vi&#7879;t Nam.</span>
        </li>
        <li class="c14"><span class="c3">B&ecirc;n A l&#432;u tr&#7919;, truy&#7873;n b&aacute; c&aacute;c d&#7919; li&#7879;u c&#7845;u th&agrave;nh ho&#7863;c khuy&#7871;n kh&iacute;ch c&aacute;c h&igrave;nh th&#7913;c ph&#7841;m t&#7897;i; ho&#7863;c c&aacute;c d&#7919; li&#7879;u mang t&iacute;nh vi ph&#7841;m lu&#7853;t s&aacute;ng ch&#7871;, nh&atilde;n hi&#7879;u, quy&#7873;n thi&#7871;t k&#7871;, b&#7843;n quy&#7873;n hay b&#7845;t k&igrave; quy&#7873;n s&#7903; h&#7919;u tr&iacute; tu&#7879; ho&#7863;c b&#7845;t k&#7923; quy &#273;&#7883;nh n&agrave;o kh&aacute;c c&#7911;a ph&aacute;p lu&#7853;t.</span>
        </li>
        <li class="c28 c38"><span class="c3">B&ecirc;n A s&#7917; d&#7909;ng m&aacute;y ch&#7911; c&#7911;a m&igrave;nh &#273;&#7875; g&#7917;i th&#432; r&aacute;c.</span>
        </li>
        <li class="c28 c38 c41"><span class="c3">B&ecirc;n A kh&ocirc;ng thanh to&aacute;n c&aacute;c chi ph&iacute; &#273;&#7847;y &#273;&#7911; v&agrave; &#273;&uacute;ng h&#7841;n theo quy &#273;&#7883;nh t&#7841;i &#273;i&#7873;u 1 v&agrave; &#273;i&#7873;u 2 H&#7907;p &#273;&#7891;ng n&agrave;y.</span>
        </li>
        <li class="c14"><span class="c3">Tr&#432;&#7901;ng h&#7907;p c&oacute; y&ecirc;u c&#7847;u c&#7911;a c&#417; quan Nh&agrave; n&#432;&#7899;c c&oacute; th&#7849;m quy&#7873;n; ho&#7863;c tr&#432;&#7901;ng h&#7907;p B&#7845;t kh&#7843; kh&aacute;ng theo quy &#273;&#7883;nh t&#7841;i &#272;i&#7873;u 6 d&#432;&#7899;i &#273;&acirc;y. Tr&#432;&#7901;ng h&#7907;p n&agrave;y, B&ecirc;n B kh&ocirc;ng c&oacute; tr&aacute;ch nhi&#7879;m th&ocirc;ng b&aacute;o tr&#432;&#7899;c cho B&ecirc;n A.</span>
        </li>
    </ol>
    <ol class="c1 lst-kix_list_3-1" start="2">
        <li class="c14"><span class="c3">B&ecirc;n B kh&ocirc;ng c&oacute; tr&aacute;ch nhi&#7879;m th&ocirc;ng b&aacute;o cho B&ecirc;n A v&agrave; B&ecirc;n A ph&#7843;i thanh to&aacute;n ph&iacute; thu&ecirc; bao d&#7883;ch v&#7909; trong th&#7901;i gian t&#7841;m ng&#7915;ng d&#7883;ch v&#7909; theo quy &#273;&#7883;nh t&#7841;i &#273;i&#7873;u 5.1.2, &#273;i&#7873;u 5.1.3, &#273;i&#7873;u 5.1.4, &#273;i&#7873;u 5.1.5, v&agrave; &#273;i&#7873;u 5.1.6 c&#7911;a H&#7907;p &#273;&#7891;ng n&agrave;y. D&#7883;ch v&#7909; ch&#7881; &#273;&#432;&#7907;c B&ecirc;n B m&#7903; l&#7841;i sau khi B&ecirc;n A ch&#7845;m d&#7913;t vi&#7879;c vi ph&#7841;m c&aacute;c &#273;i&#7873;u kho&#7843;n quy &#273;&#7883;nh trong H&#7907;p &#273;&#7891;ng n&agrave;y v&agrave; n&#7897;p &#273;&#7847;y &#273;&#7911; c&aacute;c kho&#7843;n ph&iacute; ph&aacute;t sinh do vi&#7879;c vi ph&#7841;m (n&#7871;u c&oacute;).</span>
        </li>
        <li class="c28 c65"><span class="c3">&#272;&#417;n ph&#432;&#417;ng ch&#7845;m d&#7913;t H&#7907;p &#273;&#7891;ng:</span>
        </li>
    </ol>
    <ol class="c1 lst-kix_list_3-2 start" start="1">
        <li class="c28 c65 c80"><span class="c3">B&ecirc;n B c&oacute; quy&#7873;n &#273;&#417;n ph&#432;&#417;ng ch&#7845;m d&#7913;t H&#7907;p &#273;&#7891;ng khi B&ecirc;n A t&#7841;m ng&#7915;ng d&#7883;ch v&#7909; theo &#273;i&#7873;u 5.1.2, &#273;i&#7873;u 5.1.3, &#273;i&#7873;u 5.1.4, &#273;i&#7873;u 5.1.5 v&agrave; &#273;i&#7873;u 5.1.6 H&#7907;p &#273;&#7891;ng n&agrave;y m&agrave; B&ecirc;n A v&#7851;n kh&ocirc;ng kh&#7855;c ph&#7909;c trong th&#7901;i gian 30 (ba m&#432;&#417;i) ng&agrave;y l&agrave;m vi&#7879;c k&#7875; t&#7915; ng&agrave;y B&ecirc;n B ng&#7915;ng cung c&#7845;p d&#7883;ch v&#7909;.</span>
        </li>
    </ol>
    <ol class="c1 lst-kix_list_3-3 start" start="1">
        <li class="c28 c48"><span class="c3">Tr&#432;&#7901;ng h&#7907;p n&agrave;y B&ecirc;n A c&oacute; ngh&#297;a v&#7909; thanh to&aacute;n c&#432;&#7899;c ph&iacute; c&#7911;a k&#7923; thu&ecirc; bao v&agrave; c&aacute;c kho&#7843;n n&#7907; kh&aacute;c (n&#7871;u c&oacute;) cho &#273;&#7871;n th&#7901;i &#273;i&#7875;m B&ecirc;n B &#273;&#417;n ph&#432;&#417;ng ch&#7845;m d&#7913;t H&#7907;p &#273;&#7891;ng trong v&ograve;ng 10 (m&#432;&#7901;i) ng&agrave;y l&agrave;m vi&#7879;c, k&#7875; t&#7915; ng&agrave;y nh&#7853;n &#273;&#432;&#7907;c th&ocirc;ng b&aacute;o c&#7911;a B&ecirc;n B.</span>
        </li>
        <li class="c28 c68"><span class="c3">B&ecirc;n A b&#7883; ph&#7841;t kho&#7843;n ti&#7873;n b&#7857;ng 8% ph&#7847;n gi&aacute; tr&#7883; vi ph&#7841;m v&agrave; b&#7891;i th&#432;&#7901;ng 50% gi&aacute; tr&#7883; H&#7907;p &#273;&#7891;ng cho b&ecirc;n B.</span>
        </li>
    </ol>
    <ol class="c1 lst-kix_list_3-2" start="2">
        <li class="c28 c65"><span class="c3">B&ecirc;n A &#273;&#417;n ph&#432;&#417;ng ch&#7845;m d&#7913;t H&#7907;p &#273;&#7891;ng khi:</span>
        </li>
    </ol>
    <ol class="c1 lst-kix_list_3-3 start" start="1">
        <li class="c28 c77"><span class="c3">Tr&#432;&#7901;ng h&#7907;p B&ecirc;n B kh&ocirc;ng vi ph&#7841;m ngh&#297;a v&#7909; trong H&#7907;p &#273;&#7891;ng n&agrave;y th&igrave; B&ecirc;n A b&#7891;i th&#432;&#7901;ng cho B&ecirc;n B chi ph&iacute; t&#432;&#417;ng &#273;&#432;&#417;ng v&#7899;i 50% gi&aacute; tr&#7883; c&#7911;a H&#7907;p &#273;&#7891;ng.</span>
        </li>
        <li class="c28 c61 c82"><span class="c3">Tr&#432;&#7901;ng h&#7907;p n&#7871;u B&ecirc;n A l&#7921;a ch&#7885;n c&aacute;c g&oacute;i d&#7883;ch v&#7909; &#432;u &#273;&atilde;i theo ch&#432;&#417;ng tr&igrave;nh khuy&#7871;n m&#7841;i v&agrave; theo &#273;&oacute; &#273;&atilde; cam k&#7871;t s&#7917; d&#7909;ng d&#7883;ch v&#7909; trong m&#7897;t th&#7901;i h&#7841;n nh&#7845;t &#273;&#7883;nh m&agrave; &#273;&#417;n ph&#432;&#417;ng ch&#7845;m d&#7913;t h&#7907;p &#273;&#7891;ng tr&#432;&#7899;c th&#7901;i h&#7841;n &#273;&atilde; cam k&#7871;t th&igrave; ph&#7843;i ho&agrave;n tr&#7843; l&#7841;i c&#432;&#7899;c ph&iacute; cho b&ecirc;n B c&aacute;c &#432;u &#273;&atilde;i, c&aacute;c n&#7897;i dung (s&#7843;n ph&#7849;m) khuy&#7871;n m&#7841;i &#273;&oacute; (bao g&#7891;m c&#7843; vi&#7879;c ho&agrave;n tr&#7843; l&#7841;i ti&#7873;n c&#432;&#7899;c &#273;&atilde; &#273;&#432;&#7907;c gi&#7843;m tr&#7915; t&#432;&#417;ng &#7913;ng).</span>
        </li>
        <li class="c28 c82 c80"><span class="c3">B&ecirc;n B vi ph&#7841;m b&#7845;t k&#7923; ngh&#297;a v&#7909; n&agrave;o trong H&#7907;p &#273;&#7891;ng n&agrave;y m&agrave; kh&ocirc;ng th&#7875; kh&#7855;c ph&#7909;c trong v&ograve;ng 30 (ba m&#432;&#417;i) ng&agrave;y l&agrave;m vi&#7879;c k&#7875; t&#7915; ng&agrave;y B&ecirc;n B nh&#7853;n &#273;&#432;&#7907;c th&ocirc;ng b&aacute;o vi ph&#7841;m. Tr&#432;&#7901;ng h&#7907;p n&agrave;y b&ecirc;n B c&oacute; ngh&#297;a v&#7909; &#273;&#432;a ra ph&#432;&#417;ng &aacute;n d&#7883;ch v&#7909; ho&#7863;c s&#7843;n ph&#7849;m thay th&#7871; do b&ecirc;n B cung c&#7845;p cho b&ecirc;n A, &#273;&#7891;ng th&#7901;i b&ecirc;n A &#273;&#432;&#7907;c h&#432;&#7903;ng &#273;&#7873;n b&ugrave; b&#7857;ng d&#7883;ch v&#7909;, gi&aacute; tr&#7883; ph&#7847;n &#273;&#7873;n b&ugrave; b&#7857;ng 150% gi&aacute; tr&#7883; th&#7901;i gian d&#7883;ch v&#7909; b&#7883; gi&aacute;n &#273;o&#7841;n, quy &#273;&#7893;i theo b&aacute;o gi&aacute; hi&#7879;n h&agrave;nh b&ecirc;n B &#273;ang &aacute;p d&#7909;ng.</span>
        </li>
    </ol><h1 class="c28 c49"><span class="c16">&nbsp;</span><span class="c34 c45">&#272;I&#7872;U 6</span><span
            class="c0">: B&#7844;T KH&#7842; KH&Aacute;NG</span></h1>
    <ol class="c1 lst-kix_list_2-1 start" start="1">
        <li class="c23"><span class="c3">N&#7871;u m&#7897;t trong hai B&ecirc;n ch&#7883;u &#7843;nh h&#432;&#7903;ng c&#7911;a c&aacute;c s&#7921; ki&#7879;n b&#7845;t kh&#7843; kh&aacute;ng (nh&#432;: thi&ecirc;n tai, &#273;&#7883;ch h&#7885;a, l&#361; l&#7909;t, b&atilde;o, ho&#7843; ho&#7841;n, &#273;&#7897;ng &#273;&#7845;t ho&#7863;c c&aacute;c hi&#7875;m h&#7885;a thi&ecirc;n tai kh&aacute;c; ho&#7863;c vi&#7879;c &#273;&igrave;nh c&ocirc;ng hay can thi&#7879;p c&#7911;a Nh&agrave; n&#432;&#7899;c; hay b&#7845;t k&#7923; s&#7921; ki&#7879;n n&agrave;o kh&aacute;c x&#7843;y ra ngo&agrave;i t&#7847;m ki&#7875;m so&aacute;t c&#7911;a b&#7845;t k&#7923; B&ecirc;n n&agrave;o v&agrave; kh&ocirc;ng th&#7875; l&#432;&#7901;ng tr&#432;&#7899;c &#273;&#432;&#7907;c), th&igrave; &#273;&#432;&#7907;c t&#7841;m ho&atilde;n th&#7921;c hi&#7879;n ngh&#297;a v&#7909; c&#7911;a h&#7907;p &#273;&#7891;ng, v&#7899;i &#273;i&#7873;u ki&#7879;n l&agrave; B&ecirc;n b&#7883; &#7843;nh h&#432;&#7903;ng &#273;&oacute; &#273;&atilde; &aacute;p d&#7909;ng m&#7885;i bi&#7879;n ph&aacute;p c&#7847;n thi&#7871;t v&agrave; c&oacute; th&#7875; &#273;&#7875; ng&#259;n ng&#7915;a, h&#7841;n ch&#7871; ho&#7863;c kh&#7855;c ph&#7909;c h&#7853;u qu&#7843; c&#7911;a s&#7921; ki&#7879;n &#273;&oacute;.</span>
        </li>
        <li class="c23"><span class="c3">B&ecirc;n b&#7883; &#7843;nh h&#432;&#7903;ng b&#7903;i s&#7921; ki&#7879;n b&#7845;t kh&#7843; kh&aacute;ng c&oacute; ngh&#297;a v&#7909; th&ocirc;ng b&aacute;o cho b&ecirc;n c&ograve;n l&#7841;i. Trong tr&#432;&#7901;ng h&#7907;p s&#7921; ki&#7879;n b&#7845;t kh&#7843; kh&aacute;ng x&#7843;y ra, c&aacute;c B&ecirc;n &#273;&#432;&#7907;c mi&#7877;n tr&aacute;ch nhi&#7879;m b&#7891;i th&#432;&#7901;ng thi&#7879;t h&#7841;i.</span>
        </li>
        <li class="c23"><span class="c3">N&#7871;u s&#7921; ki&#7879;n b&#7845;t kh&#7843; kh&aacute;ng kh&ocirc;ng ch&#7845;m d&#7913;t trong v&ograve;ng 40 (b&#7889;n m&#432;&#417;i) ng&agrave;y l&agrave;m vi&#7879;c ho&#7863;c m&#7897;t kho&#7843;ng th&#7901;i gian l&acirc;u h&#417;n v&agrave; v&#7851;n ti&#7871;p t&#7909;c &#7843;nh h&#432;&#7899;ng &#273;&#7871;n vi&#7879;c th&#7921;c hi&#7879;n H&#7907;p &#273;&#7891;ng th&igrave; b&ecirc;n n&agrave;o c&#361;ng c&oacute; quy&#7873;n &#273;&#417;n ph&#432;&#417;ng ch&#7845;m d&#7913;t H&#7907;p &#273;&#7891;ng v&agrave; th&ocirc;ng b&aacute;o cho b&ecirc;n c&ograve;n l&#7841;i b&#7857;ng v&#259;n b&#7843;n trong v&ograve;ng 10 (m&#432;&#7901;i) ng&agrave;y l&agrave;m vi&#7879;c k&#7875; t&#7915; ng&agrave;y d&#7921; &#273;&#7883;nh ch&#7845;m d&#7913;t.</span>
        </li>
        <li class="c28 c61 c65"><span class="c3">Khi s&#7921; ki&#7879;n b&#7845;t kh&#7843; kh&aacute;ng ch&#7845;m d&#7913;t, c&aacute;c B&ecirc;n s&#7869; ti&#7871;p t&#7909;c th&#7921;c hi&#7879;n H&#7907;p &#273;&#7891;ng n&#7871;u vi&#7879;c ti&#7871;p t&#7909;c th&#7921;c hi&#7879;n H&#7907;p &#273;&#7891;ng l&agrave; c&oacute; th&#7875; &#273;&#432;&#7907;c.</span>
        </li>
    </ol><h1 class="c9"><span class="c16">&nbsp;</span><span class="c34 c45">&#272;I&#7872;U 7:</span><span class="c0">&nbsp;TH&#7900;I H&#7840;N H&#7906;P &#272;&#7890;NG</span>
    </h1><p class="c28 c84"><span class="c3">H&#7907;p &#273;&#7891;ng n&agrave;y c&oacute; hi&#7879;u l&#7921;c k&#7875; t&#7915; ng&agrave;y k&yacute;. H&#7907;p &#273;&#7891;ng c&oacute; th&#7901;i h&#7841;n 12 th&aacute;ng k&#7875; t&#7915; ng&agrave;y k&yacute; h&#7907;p &#273;&#7891;ng n&agrave;y. Tr&#432;&#7899;c khi h&#7871;t h&#7841;n h&#7907;p &#273;&#7891;ng 30 (ba m&#432;&#417;i) ng&agrave;y l&agrave;m vi&#7879;c, B&ecirc;n B g&#7917;i th&ocirc;ng b&aacute;o cho B&ecirc;n A v&agrave; &#273;&#7873; ngh&#7883; gia h&#7841;n. Tr&#432;&#7901;ng h&#7907;p ti&#7871;p t&#7909;c gia h&#7841;n H&#7907;p &#273;&#7891;ng, B&ecirc;n A k&yacute; x&aacute;c nh&#7853;n v&agrave;o th&ocirc;ng b&aacute;o gia h&#7841;n H&#7907;p &#273;&#7891;ng v&agrave; n&#7897;p &#273;&#7847;y &#273;&#7911; c&aacute;c kho&#7843;n ph&iacute; m&agrave; B&ecirc;n B quy &#273;&#7883;nh trong th&ocirc;ng b&aacute;o gia h&#7841;n H&#7907;p &#273;&#7891;ng.</span>
    </p><h1 class="c9"><span class="c16">&nbsp;</span><span class="c34 c45">&#272;I&#7872;U 8</span><span class="c0">: &#272;I&#7872;U KHO&#7842;N CHUNG</span>
    </h1>
    <ol class="c1 lst-kix_list_1-1 start" start="1">
        <li class="c28 c65 c61"><span class="c3">Hai B&ecirc;n cam k&#7871;t th&#7921;c hi&#7879;n &#273;&uacute;ng c&aacute;c &#273;i&#7873;u kho&#7843;n c&#7911;a H&#7907;p &#273;&#7891;ng, B&ecirc;n n&agrave;o vi ph&#7841;m s&#7869; ph&#7843;i ch&#7883;u tr&aacute;ch nhi&#7879;m theo quy &#273;&#7883;nh t&#7841;i H&#7907;p &#273;&#7891;ng v&agrave; ph&aacute;p lu&#7853;t.</span>
        </li>
        <li class="c23"><span class="c3">Tr&#432;&#7901;ng h&#7907;p m&#7897;t B&ecirc;n mu&#7889;n thay &#273;&#7893;i b&#7845;t k&#7923; n&#7897;i dung n&agrave;o c&#7911;a H&#7907;p &#273;&#7891;ng ph&#7843;i th&ocirc;ng b&aacute;o b&#7857;ng v&#259;n b&#7843;n cho B&ecirc;n c&ograve;n l&#7841;i &iacute;t nh&#7845;t tr&#432;&#7899;c 15 (m&#432;&#7901;i l&#259;m) ng&agrave;y l&agrave;m vi&#7879;c. N&#7871;u Hai B&ecirc;n th&#7889;ng nh&#7845;t &#273;&#432;&#7907;c &nbsp;n&#7897;i dung thay &#273;&#7893;i th&igrave; c&aacute;c thay &#273;&#7893;i ph&#7843;i &#273;&#432;&#7907;c l&#7853;p b&#7857;ng v&#259;n b&#7843;n v&agrave; &#273;&#432;&#7907;c k&yacute;, &#273;&oacute;ng d&#7845;u h&#7907;p ph&aacute;p c&#7911;a hai b&ecirc;n. M&#7885;i chi ph&iacute; ph&aacute;t sinh li&ecirc;n quan &#273;&#7871;n vi&#7879;c thay &#273;&#7893;i n&#7897;i dung H&#7907;p &#273;&#7891;ng do B&ecirc;n n&agrave;o th&igrave; B&ecirc;n &#273;&oacute; c&oacute; tr&aacute;ch nhi&#7879;m thanh to&aacute;n.</span>
        </li>
        <li class="c23"><span class="c3">M&#7885;i tranh ch&#7845;p ph&aacute;t sinh trong qu&aacute; tr&igrave;nh th&#7921;c hi&#7879;n H&#7907;p &#273;&#7891;ng n&agrave;y (n&#7871;u c&oacute;) s&#7869; &#273;&#432;&#7907;c Hai B&ecirc;n th&#432;&#417;ng l&#432;&#7907;ng gi&#7843;i quy&#7871;t tr&ecirc;n tinh th&#7847;n h&#7907;p t&aacute;c, t&ocirc;n tr&#7885;ng l&#7851;n nhau. Tr&#432;&#7901;ng h&#7907;p Hai B&ecirc;n kh&ocirc;ng th&#7889;ng nh&#7845;t, B&ecirc;n b&#7883; vi ph&#7841;m c&oacute; quy&#7873;n kh&#7903;i ki&#7879;n ra T&ograve;a &aacute;n, ph&aacute;n quy&#7871;t c&#7911;a T&ograve;a &aacute;n l&agrave; quy&#7871;t &#273;&#7883;nh cu&#7889;i c&ugrave;ng bu&#7897;c C&aacute;c B&ecirc;n ph&#7843;i ch&#7845;p h&agrave;nh.</span>
        </li>
        <li class="c28 c65 c61"><span class="c3">H&#7907;p &#273;&#7891;ng n&agrave;y &#273;&#432;&#7907;c l&#7853;p th&agrave;nh 02 (ba) b&#7843;n c&oacute; gi&aacute; tr&#7883; ph&aacute;p l&yacute; nh&#432; nhau, B&ecirc;n A gi&#7919; 01 (m&#7897;t) b&#7843;n v&agrave; B&ecirc;n B gi&#7919; 01 (m&#7897;t) b&#7843;n.</span>
        </li>
    </ol><p class="c18"><span class="c3"></span></p><h1 class="c28 c90"><span class="c0">&#272;&#7840;I DI&#7878;N B&Ecirc;N A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#272;&#7840;I DI&#7878;N B&Ecirc;N B</span>
    </h1><p class="c18"><span class="c0"></span></p><p class="c18"><span class="c0"></span></p><p class="c18"><span
            class="c0"></span></p><p class="c18"><span class="c0"></span></p><p class="c18"><span class="c0"></span></p>
    <p class="c18"><span class="c0"></span></p><p class="c28"><span class="c0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
    </p>
    <div><p class="c40"><span class="c81 c86"></span></p></div>


@stop

