<title>Proff</title>

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
    .navbar {
        box-shadow: 0 10px 6px rgba(0, 0, 0, 0.1);
        font-family: Arial, sans-serif;
        height: auto;
        z-index: 1000;
        position: fixed;
        top: 0;
        width: 100%;
        background-color: #fff;
    }

    .sidebar {
        transition: left 0.3s ease;
        background-color: #173165;
        font-family: Arial, sans-serif;
      width: auto;
        height: 100%;
        position: fixed;
        top: 40px;
        left: 0;
        overflow-y: hidden;

    }





    #vertical-sidebar ul li {
        padding: 15px;
        transition: all 0.3s ease;
       width: 100%; 
       display: block;      
       
        /* Set width to 100% for all sidebar items */
    }

    #vertical-sidebar ul li a {
        color: #ffffff;
        text-decoration: none;
        
    }

    #vertical-sidebar ul li.active {
        background-color: #3966c2;
        width:250%;
    }

    #vertical-sidebar ul li.active a {
        color: #ffffff;
        width: 250px;
    }

    #vertical-sidebar ul {
        list-style-type: none;
        
        color: #e9ecef;
       
    }



    /* Default styles for the sidebar */
    .sidebar {
        background-color: #173165;
        border-right: 0px solid #ffffff;
        
        width: 250px;
    }

    

    .navbar-item {
        text-decoration: none;
        color: #173165;
    }

    /* Media query for screens smaller than 768px */
    @media (max-width: 768px) {
        .sidebar {
            width: 250px;
            /* Hide the sidebar by default on smaller screens */
        }

    }

    /* Media query for screens larger than 768px */

    /* Responsive styles */
    @media (max-width: 991.98px) {

        /* Tablets */
        .sidebar {
            width: 200px;
            /* Adjust the width for tablet screens */
        }
    }

    /* Responsive styles */
    @media (max-width: 575.98px) {

        /* Phones */
        .sidebar {
            width: 150px;
            /* Adjust the width for phones */
        }
    }

    /* Media queries for responsive design */

    /* Phones */
    @media (max-width: 320px) {
        .container {
            padding: 0 10px;
            /* Adjust padding for smaller screens */
        }

    }

    @media (min-width: 321px) and (max-width: 375px) {
        .container {
            padding: 0 20px;
            /* Adjust padding for slightly larger screens */
        }
    }

    @media (min-width: 376px) and (max-width: 425px) {
        .container {
            padding: 0 30px;
            /* Adjust padding for larger screens */
        }
    }

    @media (min-width: 426px) and (max-width: 768px) {
        .container {
            padding: 0 40px;
            /* Adjust padding for tablets */
        }
    }

    @media (min-width: 769px) and (max-width: 1024px) {
        .container {
            padding: 0 50px;
        }
    }

    @media (min-width: 1025px) and (max-width: 1440px) {
        .container {
            padding: 0 60px;
           
            /* Adjust padding for laptops */
        }
        
    }

    @media (min-width: 1441px) and (max-width: 2560px) {
        .container {
            padding: 0 70px;
            /* Adjust padding for larger screens */
        }

    }
</style>

<body>
    <!--sidebar horizontal
   
    
    
=======
    sidebar Vertical-->
    <nav class="navbar">
        <div class="container">
            <img class="m-0 p-0 img-logo" src="{{ asset('asset/images/logo.webp') }}" alt="suptech logo" width="15%">
            <div class="navbar-left">
                <a class="navbar-item p-5" href="#" style="text-decoration: none;">Nom utilisateur</a>
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                    class="bi bi-person-fill icon-style" viewBox="0 0 16 16" style="color: #173165;">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                </svg>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div id="vertical-sidebar">

            <div class="row">
                <div class="col-md-3">
                    <div class="sidebar">
                        <ul class="list-unstyled" style="margin-top: 100px; font-size:17px;">
                            <li class="p-2  mt-5" >
                                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-clipboard2-check-fill" viewBox="0 0 16 16">
                                    <path d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5"/>
                                    <path d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585q.084.236.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5q.001-.264.085-.5m6.769 6.854-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708.708"/>
                                  </svg>&nbsp;&nbsp;&nbsp;
                                <a class="lien" href="{{ route('Profil_etudiant') }}"
                                    class="{{ Request::is('Profil_etudiant') ? 'active' : '' }}">Présence</a>
                            </li>
                            <li class="p-2 ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-book-fill" viewBox="0 0 16 16">
                                    <path d="M8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/>
                                  </svg>&nbsp;&nbsp;&nbsp;&nbsp;<a class="lien" href="{{ route('emploi') }}"
                                    class="{{ Request::is('emploi') ? 'active' : '' }}">Cahier de textes</a>
                            </li>
                            <li class="p-2 ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-hourglass-split" viewBox="0 0 16 16">
                                    <path d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z"/>
                                  </svg>&nbsp;&nbsp;&nbsp;<a class="lien" href="{{ route('reclamation') }}"
                                    class="{{ Request::is('reclamation') ? 'active' : '' }}">Historique</a>
                                </li>
                        </ul>
                    </div>
                </div>

                @yield('contenu')

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarItems = document.querySelectorAll('#vertical-sidebar ul li');

            sidebarItems.forEach(item => {

                if (item.querySelector('a').href === window.location.href) {
                    item.classList.add('active');
                }

                item.addEventListener('click', function() {
                    // Remove the 'active' class from all sidebar items
                    sidebarItems.forEach(i => i.classList.remove('active'));
                    // Add the 'active' class to the clicked item
                    this.classList.add('active');
                });
            });
        });
    </script>