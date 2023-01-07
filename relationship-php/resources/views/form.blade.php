<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Simple Sidebar - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <a href="/"> <div class="sidebar-heading border-bottom bg-light">Home</div></a>
              
                
            
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                      
                        @auth
                        <form method="POST" action="/logout">
                            @csrf
                            <button type="submit" class="btn btn-primary" id="sidebarToggle">Log Out</button>
                            <a href="/"> <button class="btn btn-primary" id="sidebarToggle">Back</button></a>
                           

                        </form>
                        
                        @else
                        
                  
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li class="nav-item active"><a class="nav-link" href="/signup">signup</a></li>
                                <li class="nav-item active"><a class="nav-link" href="/login">logIn</a></li>
                               
                                
                             
                                </li>
                            </ul>
                        </div>
                        @endauth
                    </div>
                </nav>
               
                  
                     {{-- ---------------------------------- --}}
                       
                               
                              
                     <div class="border-end bg-white" id="sidebar-wrapper">
                        <div class="sidebar-heading border-bottom bg-light">  <h1>add doc</h1></div>
                     
                        
                        <div class="list-group list-group-flush">
                            <form method="POST" action="/projectname" enctype="multipart/form-data" >
                                @csrf
                                <label for="files" class="form-label mt-4"></label>
                           <input
                                type="text"
                                class="col-sm-3"
                                name="name"
                                value="{{old('name')}}"
                                multiple 
                               
                            />
                            <button class="ml-2">add</button>
                        </form>
                        </div>
                    </div>
                         
                
                       
                           
                          
                     
                    
                
            </div> 
            <div class="border-end bg-white" id="sidebar-wrapper">
                @auth
                <div class="sidebar-heading border-bottom bg-light">wellcome {{auth()->user()->name}}</div>
                
                @endauth
            </div>
           
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>