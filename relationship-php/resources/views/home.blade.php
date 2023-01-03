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
                <div class="sidebar-heading border-bottom bg-light">Upload Document</div>
                <div class="list-group list-group-flush">
                    <form method="POST" action="/upload" enctype="multipart/form-data" >
                        @csrf
                   <input
                        type="file"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="title"
                        value="{{old('title')}}"
                        {{-- accept="title/*"
                        multiple --}}
                       
                    />
                    <button class="ml-2">add</button>
                </form>
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <button class="btn btn-primary" id="sidebarToggle">Toggle Menu</button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li class="nav-item active"><a class="nav-link" href="/signup">signup</a></li>
                                <li class="nav-item"><a class="nav-link" href="#!">Link</a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#!">Action</a>
                                        <a class="dropdown-item" href="#!">Another action</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#!">Something else here</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Page content-->
                <div class="container-fluid">
                    <h1 class="mt-4">Uploaded File</h1>
                    
                      
                     
                            @unless($pdfs->isEmpty())
                           
                            <table class="table table-striped">
                              <thead>
                                  <tr>
                                    
                                    <th>File</th>
                                    
                                    <th>View</th>
                                    <th>Download</th>
                                    <th>Delete</th>
                                   
                                    <th>Created By</th>
                                    
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach($pdfs as $pdf)
                                    <tr>
                                        <td>{{$pdf->title}}</td>
                                        {{-- <td>{{$pdf->title->count()}}</td> --}}
                                        <td><a href={{"/view/$pdf->id"}}>View</a></td>
                                        <td><a href={{"/download/$pdf->title"}}>Download</a></td>
                                        
                                        <td>  <form method="POST" action="/download/{{$pdf->id}}" >
                                            @csrf
                                            @method("DELETE")
                                            
                                            <button style="min-width: 6rem" class="btn btn-danger ml-5 ">Delete</button>
                                        </form></td>
                                        <td>{{$pdf->user_id}}</td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr >
                                        <td colspan="5">
                                            <p class="text-center">No content</p>
                                        </td>
                                    </tr>
        
                                    @endunless
                                </tbody>
                               
                              
                             
                         
                        </table>
                       
                           
                          
                     
                    
                </div>
            </div>
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light">{{auth()->user()->name}}  </div>
                <div class="list-group list-group-flush">
                    @foreach ($pdfs as $pdf)
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">{{$pdf->user_id}}</a>
                    @endforeach
                   
                 
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>