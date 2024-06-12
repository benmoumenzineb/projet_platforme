<link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">
    @extends('RH.layouts.navbarrh')

<style>
    .card {
        width:210px;
        border-radius: 15px;
        box-shadow: 0 6px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }
body{
    background-color: rgb(0, 0, 0);
}
    .card:hover {
        transform: translateY(-5px);
    }

    .card-body {
        padding: 20px;
        text-align: center rgb(235, 245, 87) rgb(255, 255, 255);
        box-shadow: 0 8px 14px rgba(16, 16, 16, 0.1);
    }

    .card-title, .card-text {
        font-size: 24px;
        font-weight: bold;
    }

    .content {
        margin-left: 230px;
        margin-top: 100px;
        overflow: hidden;
    }
    canvas{
        padding: 20px;
        margin: 20px;
        background-color: rgb(255, 250, 250);
        box-shadow: 0 6px 12px rgba(16, 16, 16, 0.1);
    }
    #doughnutChartEssaouira{
        height: 100px;
    }</style>
    @section('contenu')
    <body style="background-color: #f4f4f4;">
        <div style="margin-left:0px;margin-top:100px;">
        <div class="container">
            <div class="row mb-4">
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card text-white" style="background-color:rgb(255, 250, 250);">
                        <div class="card-body" style="color: rgb(26, 131, 160)">
                            <h5 class="card-title">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-mortarboard-fill" viewBox="0 0 16 16" style="color: rgb(26, 131, 160);">
                                    <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917z"/>
                                    <path d="M4.176 9.032a.5.5 0 0 1-.656.327l-.5 1.7a.5.5 0 0 1 .294.605l4.5 1.8a.5.5 0 0 1 .372 0l4.5-1.8a.5.5 0 0 1 .294-.605l-.5-1.7a.5.5 0 0 1-.656-.327L8 10.466z"/>
                                </svg>&nbsp;Personnel
                            </h5>
                            <p class="card-text">{{ $personnelsCount }}</p>
                        </div>
                    </div>
                </div></div></div>
               </div>
    @endsection
    
