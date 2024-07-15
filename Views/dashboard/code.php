  <?php
session_start();
/**
 * Author: Milton Vafana
 * Email : miltonhyndrex@gmail.com
 * Github: https://github.com/nia-cloud-official
 */
$username = $_SESSION['name'];
$name = $_SESSION['fullname'];
$email = $_SESSION['email'];
include './../../Controllers/site.config.php';
?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo SITENAME . " | Dashboard" ?></title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/codemirror.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/theme/dracula.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/codemirror.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/mode/sql/sql.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/addon/hint/show-hint.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/addon/hint/sql-hint.min.js"></script>
  <link rel="stylesheet" href="./../codemirror/dracula.min.css">
    <link rel="stylesheet" href="./../codemirror/codemirror.min.css">
  <script src="./../codemirror/codemirror.min.js"></script>
  <script src="./../codemirror/sql.min.js"></script>
  <script src="./../codemirror/sql-hint.min.js"></script>
  <script src="./../codemirror/show-hint.min.js"></script>
<style>
    .CodeMirror {
      height: 60%;
      width: 100%;
    }
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
    }
    #editor-container {
      height: 80%;
    }
    #output-container {
      height: 20%;
    }
  </style>
  </head>

  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <!-- <img src="../../assets/logo-small.png" style="width:30px;" alt="logo" /> -->
          <a class="navbar-brand brand-logo" href="../../index.html"><img src="../../assets/logo.webp" alt="logo" style="width: 110px; height:50px"/></a>
          <a class="navbar-brand brand-logo-mini" href="../../index.html"><img src="../../assets/logo-small.png" style="width:30px;" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="search-field d-none d-md-block">
            <form class="d-flex align-items-center h-100" action="#">
              <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control bg-transparent border-0" placeholder="search lesson">
              </div>
            </form>
          </div>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="../../assets/images/faces/face1.jpg" alt="image">
                  <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black"><?php echo $name; ?></p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="#">
                  <i class="mdi mdi-cached me-2 text-success"></i> Refresh Page</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="./../logout.php">
                  <i class="mdi mdi-logout me-2 text-primary"></i> Signout </a>
              </div>
            </li>
            <li class="nav-item d-none d-lg-block full-screen-link">
              <a class="nav-link">
                <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
              </a>
            </li>
            <li class="nav-item nav-settings d-none d-lg-block">
              <button class="btn btn-success" href="#">
                <i class=" mdi mdi-content-save"></i>
                  Save
              </button>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="../../assets/images/faces/face1.jpg" alt="profile">
                  <span class="login-status offline"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2"><?php echo $name ?></span>
                  <span class="text-secondary text-small"><?php echo $username; ?></span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./index.php">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../pages/icons/mdi.html">
                <span class="menu-title">Projects</span>
                <i class=" mdi mdi-box-shadow  menu-icon"></i>
              </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#">
                <span class="menu-title">Code Editor</span>
                <i class="mdi mdi-code-greater-than menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../pages/forms/basic_elements.html">
                <span class="menu-title">Import</span>
                <i class="mdi mdi-upload menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../pages/forms/basic_elements.html">
                <span class="menu-title">Export</span>
                <i class="mdi mdi-download menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../pages/forms/basic_elements.html">
                <span class="menu-title">Visual Scripting</span>
                <i class=" mdi mdi-pencil-box-outline menu-icon"></i>
              </a>
            </li>
          </ul>
        </nav>
         <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
   <div id="button-container">
    <button style="padding:20px;justify-content:center;" class="btn btn-success btn-group-lg" onclick="runSQL()"><i class="mdi mdi-play"></i> Run</button>
    <button style="padding:20px;justify-content:center;" class="btn btn-warning btn-group-lg" onclick="generateSQLVisual()"><i class="mdi mdi-eye"></i> Render</button>
    <button style="padding:20px;justify-content:center;" class="btn btn-danger btn-group-lg" onclick="exportFile.showModal()"><i class="mdi mdi-upload"></i> Export</button>
        <button style="padding:20px;justify-content:center;" class="btn btn-danger btn-group-lg" onclick="generateSQL()"><i class="mdi mdi-script"></i> Generate</button>
    <button style="padding:20px;justify-content:center;" class="btn btn-danger btn-group-lg" onclick=""><i class="mdi mdi-download"></i> Import</button>
    <button style="padding:20px;justify-content:center;" class="btn btn-success btn-group-lg" onclick=""><i class="mdi mdi-save"></i> Save</button>
  </div>
  <div id="editor-container">
    <textarea class="pizza" id="editor"></textarea>
    <pre class="formal-control" id="output"></pre>
  </div>


  <style>
   #exportFile {
       border:none;
       box-shadow: 2px 2px 3px 1px lightgrey;
       border-radius: 10px;
   }
  </style>

 <!-- Export Dialog -->
<dialog class="dialog"  id="exportFile">

  <?php
  if (isset($_POST['name'])) {
    $extention = $_POST['ext'];
    $content = $_POST['content'];
    $file = $_POST['name'] . $extention;
    file_put_contents($file, $content);
} else {
    error_reporting(0);
}
?>
  <form action="#" method="post">
   <div class="card">
    <div class="card-header">
      <button title="Close" alt="Closse" class="btn btn-danger" onclick="exportFile.hide()">
        x
      </button>
    </div>
    <?php error_reporting(0);
error_clear_last()?>
                  <div class="card-body">
                    <h4 class="card-title">Export file</h4>
                    <p class="card-description">Export your file as whatever you prefer!</p>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="mdi mdi-pen"></i>
                          </span>
                        </div>
                        <input type="text" name="name" class="form-control" placeholder="Untitled" aria-label="Untitled" aria-describedby="basic-addon1">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="mdi mdi-file"></i>
                          </span>
                        </div>
                        <select class="form-control active" active name="ext" id="">
                          <option value=".sql">SQLL File | *.sql</option>
                          <option value=".json">JSON File | *.json</option>
                          <option value=".xml">XML File | *.xml</option>
                          <option value=".html">HTML File | *.html</option>
                          <option value=".php">PHP File | *.phpl</option>
                        </select>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-github">
                      Export
                    </button>
                  </div>
                </div>
  </form>

</dialog>

  <script>
    // Initialize CodeMirror
    var editor = CodeMirror.fromTextArea(document.getElementById("editor"), {
      mode: "text/x-sql",
      theme: "dracula",
      lineNumbers: true,
      lineWrapping: true,
      extraKeys: {
        "Ctrl-Space": "autocomplete"
      },
      hintOptions: {
        tables: {
          users: ["name", "score", "birthDate"],
          countries: ["name", "population", "size"]
        }
      }
    });

   function runSQL() {
      var sqlCode = editor.getValue();
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "execute.php", true);
      xhr.setRequestHeader("Content-Type", "application/json");
      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
          var response = JSON.parse(xhr.responseText);
          document.getElementById("output").innerText = JSON.stringify(response, null, 2);
        }
      };
      xhr.send(JSON.stringify({ sql: sqlCode }));
    }

    function generateSQL() {
      var generatedSQL = "SELECT * FROM table_name;";
      editor.setValue(generatedSQL);
    }
  </script>
<?php
include './../footer.php';
?>
