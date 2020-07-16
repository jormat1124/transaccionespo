<?php 

Class Layout
{

private $isPage;
private $directory;


function __construct($Page){
    $this->isPage = $Page;

    $this->directory = ($this->isPage)? "../" : "";
}




function printHeader()
{

    $header = <<<EOF
        <html lang="en"><head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
    
    
        <title>Heroe example for Bootstrap</title>
    
    
    
        <!-- Bootstrap core CSS -->
        <link href="{$this->directory}assets\css\bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="{$this->directory}assets\css\style.css" rel="stylesheet" type="text/css">
    
        <!-- Custom styles for this template -->
      
      </head>
    
      <body>
    
        <header>
          <div class="collapse bg-dark" id="navbarHeader">
            <div class="container">
              <div class="row">
                <div class="col-sm-8 col-md-7 py-4">
                  <h4 class="text-white">Estudiantes</h4>
                  <p class="text-muted">Crea y edita los estudiantes a tu gusto</p>
                </div>
                
              </div>
            </div>
          </div>
          <div class="navbar navbar-dark bg-dark box-shadow">
            <div class="container d-flex justify-content-between">
              <a href="{$this->directory}index.php" class="navbar-brand d-flex align-items-center">
                <strong>Index</strong>
              </a>
              
            </div>
          </div>
        </header>
EOF;

    echo $header;
  }

  public function printFooter()
  {


    $footer = <<<EOF
    
        
        <footer class="text-muted">
          <div class="container">
         
            <p>Crud de estudiantes orientado a objetos creado por Jorge Mata</p>
         
          </div>
        </footer>
    
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="{$this->directory}assets\css\bootstrap.min.css"></script>
    
        </body></html>
      
    
EOF;

    echo $footer;
  }


}






?>