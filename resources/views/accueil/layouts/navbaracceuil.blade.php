<title>Etudiant</title>
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
           
        }
    }

   
    @media (max-width: 575.98px) {

       
        .sidebar {
            width: 150px;
           
        }
    }

    /* Media queries for responsive design */

    /* Phones */
    @media (max-width: 320px) {
        .container {
            padding: 0 10px;
          
        }

    }

    @media (min-width: 321px) and (max-width: 375px) {
        .container {
            padding: 0 20px;
           
        }
    }

    @media (min-width: 376px) and (max-width: 425px) {
        .container {
            padding: 0 30px;
           
        }
    }

    @media (min-width: 426px) and (max-width: 768px) {
        .container {
            padding: 0 40px;
            
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
           
           
        }
        
    }

    @media (min-width: 1441px) and (max-width: 2560px) {
        .container {
            padding: 0 70px;
            
        }

    }
</style>

<body>
  
   
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
                <div class="col-md-4">
                    <div class="sidebar">
                        <ul class="list-unstyled">
                            <li class="p-2 mb-2 mt-5">
                                <svg class="icon-size icon-color" xmlns="http://www.w3.org/2000/svg" width="26"
                                    height="26" fill="currentColor" class="bi bi-mortarboard-fill"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917z" />
                                    <path
                                        d="M4.176 9.032a.5.5 0 0 1-.656.327l-.5 1.7a.5.5 0 0 1 .294.605l4.5 1.8a.5.5 0 0 1 .372 0l4.5-1.8a.5.5 0 0 1 .294-.605l-.5-1.7a.5.5 0 0 1-.656-.327L8 10.466z" />
                                </svg>&nbsp;&nbsp;&nbsp;
                                <a class="lien" href="{{ route('absence.accueil') }}"
                                    class="{{ Request::is('absence.accueil') ? 'active' : '' }}">Présence Enseignant</a>
                            </li>
                            
                           

                            
                           
                            
                            <li class="p-2 mb-2">
                                <svg class=" icon-color" xmlns="http://www.w3.org/2000/svg" width="26"
                                    height="26" fill="currentColor" class="bi bi-calendar-week" viewBox="0 0 16 16">
                                    <path
                                        d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z" />
                                    <path
                                        d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                                </svg>&nbsp;&nbsp;&nbsp;<a class="lien" href="{{ route('reclamation') }}"
                                    class="{{ Request::is('reclamation') ? 'active' : '' }}">Emploi du temps</a>
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