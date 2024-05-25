<title>Ressources Humaines</title>
<link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">
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
        padding: 0;
        color: #e9ecef;
       
    }



    /* Default styles for the sidebar */
    .sidebar {
        background-color: #173165;
        border-right: 0px solid #ffffff;
       z-index:  999;
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
                        <ul class="list-unstyled">
                          
                            
                            <li class="p-2 mb-2 mt-5 ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
                                  </svg>&nbsp;&nbsp;&nbsp;&nbsp;<a class="lien" href="{{ route('listPersonnel') }}"
                                    class="{{ Request::is('listPersonnel') ? 'active' : '' }}">Personnel</a>
                            </li>
                            <li class="p-2 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                    fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8m5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0" />
                                    <path
                                        d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195z" />
                                    <path
                                        d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083q.088-.517.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1z" />
                                    <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 6 6 0 0 1 3.13-1.567" />
                                </svg></svg>&nbsp;&nbsp;&nbsp;<a class="" href="{{ route('paiement') }}"
                                    class="{{ Request::is('paiement') ? 'active' : '' }}"></a>
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
</body>