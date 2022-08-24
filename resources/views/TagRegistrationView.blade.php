<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>タグ登録画面</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{ asset('css/registration.css') }}">
        <script language="javascript" type="text/javascript">
        //追加ボタン
        var table_tab = document.getElementsByClassName("form-table");
        function BtnAddClick() {
            //要素数
            var add_table = table_tab.length + 1;
            //追加する要素の文字列
            var elem = "<table class='form-table' id='form-" + add_table + "'>";
            elem += "<tbody>  <th class='number'>" + add_table + "</th>";
            elem += "<tr> <th>URL</th> <td> <input type='url' name='url_text[]'> </td> </tr>";
            elem += "<tr> <th>見出し</th> <td>  <input type='text' name='headline_text[]'> </td> </tr>";
            elem += "<tr> <th>あらすじ</th> <td> <textarea name='sub_text[]' rows='5' style='width: 100%;  box-sizing: border-box;'></textarea> </td> </tr>";
            elem += "<tr> <th>イメージ画像</th> <td> <input type='file' name='img_file[]'> </td> </tr> </tbody> </table>";
            var table_id = document.getElementById("dvContentArea");
            table_id.insertAdjacentHTML('beforeend', elem);
           
        }
        //削除ボタン
        function BtnDelClick() {
            var del_table = table_tab.length;
            console.log(del_table);
            if (del_table<= 1)return;
            var del_id = "form-" + del_table;
            var del = document.getElementById(del_id); 
            del.remove();
            console.log("aa");
        }
    </script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Tag Mane</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="{{ route('dashboard') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="{{ route('tagRegister') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                入稿
                            </a>
                            <a class="nav-link" href="{{ route('dashboard') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                入稿のデータ
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        {{$name}}さん
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">入稿画面</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">タグを入稿してください</li>
                        </ol>
                           
                        <div class="card mb-4">
                            <form action="http://localhost/TagRegistration" method="post" enctype="multipart/form-data" >
                                @csrf
                                <div>
                                    スタイルの種類を選択してください
                                    <input type="text" name="style_select" size="20" list="mylist1" id="selct">
                                    <datalist id="mylist1">
                                    <option>1</option>
                                    <option>2</option>
                                    </datalist>
                                </div>
                                <div id = "dvContentArea">
                                    <table>

                                    </table>
                                    <table class="form-table" id="form-1">
                                        <tbody>
                                            <th class="number">
                                                1
                                            </th>
                                            <tr>
                                                <th>URL</th>
                                                <td>
                                                    <input type="url" name="url_text[]">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>見出し</th>
                                                <td>
                                                    <input type="text" name="headline_text[]">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>あらすじ</th>
                                                <td>
                                                    <textarea name="sub_text[]" rows="5" style="width: 100%;  box-sizing: border-box;"></textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>イメージ画像</th>
                                                <td>
                                                    <input type="file" name="img_file[]">
                                                </td>
                                            </tr>
                                        </tbody>     
                                    </table>
                                </div>
                                
                                <div>
                                    <input type="button" id="btnAdd" value="追加" onclick="BtnAddClick();">
                                    <input type="button" id="btnDel" value="削除" onclick="BtnDelClick();">
                                </div>
                                <div>
                                    <input type="submit" name="a"value="登録する">
                                </div>
                            </form>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
