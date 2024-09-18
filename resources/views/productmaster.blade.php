<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
  data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Product Master</title>

  <meta name="description" content="" />


  <link rel="icon" type="image/x-icon" href="{{  asset('assets/img/favicon/favicon.ico') }}" />


  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />


  <link rel="stylesheet" href="{{  asset('assets/vendor/fonts/boxicons.css') }}" />


  <link rel="stylesheet" href="{{  asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
  <link rel="stylesheet" href="{{  asset('assets/vendor/css/theme-default.css') }}"
    class="template-customizer-theme-css" />
  <link rel="stylesheet" href="{{  asset('assets/css/demo.css') }}" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


  <link rel="stylesheet" href="{{  asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />


  <script src="{{  asset('assets/vendor/js/helpers.js') }}"></script>

  <script src="{{  asset('assets/js/config.js') }}"></script>
</head>

<body>
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

      </aside>

      <div class="layout-page">
        <nav
          class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
          id="layout-navbar">
          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            Product/<b>Product Master</b>
          </div>
        </nav>


        <div class="container-xxl flex-grow-1 container-p-y">
          <div class="row">
            <div class="col-lg-12 mb-4 order-0">
              <div class="card">

              </div>
            </div>

            <div class="col-lg-12 mb-4 order-0">
              <div class="card">
                <div class="row justify-content-center align-items-center p-4">
                  <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                      <thead>
                        <tr>
                          <th scope="col" style="width: 12%;">ID</th>
                          <th scope="col" style="width: 16%;">NAME</th>
                          <th scope="col" style="width: 16%;">DESC</th>
                          <th scope="col" style="width: 12%;">CATEGORY</th>
                          <th scope="col" style="width: 12%;">STATUS</th>
                          <th scope="col" style="width: 12%;">PRICE</th>
                          <th scope="col" style="width: 12%;">STOCK</th>
                          <th scope="col" style="width: 8%;"></th>
                        </tr>
                      <tbody class="trans-table">

                        <tr>
                          <th scope="row">P-001</th>
                          <td>Example Product</td>
                          <td>Product description...</td>
                          <td>Category</td>
                          <td>Available</td>
                          <td class="text-end">100.00</td>
                          <td class="text-end">10</td>
                          <td scope="col" style="text-align: center;">
                            <i class="bi bi-pencil-square px-2"></i>
                            <i class="bi bi-trash text-danger px-2"></i>
                          </td>
                        </tr>
                      </tbody>
                      </thead>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


        <footer class="content-footer footer bg-footer-theme">
          <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
            <div class="mb-2 mb-md-0">
              ©
              <script>
                document.write(new Date().getFullYear());
              </script>
              , made by MonoMode
            </div>
          </div>
        </footer>

        <div class="content-backdrop fade"></div>
      </div>
    </div>

    <div class="layout-overlay layout-menu-toggle"></div>
  </div>


  <script src="{{  asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
  <script src="{{  asset('assets/vendor/libs/popper/popper.js') }}"></script>
  <script src="{{  asset('assets/vendor/js/bootstrap.js') }}"></script>
  <script src="{{  asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

  <script src="{{  asset('assets/vendor/js/menu.js') }}"></script>
  <script src="{{  asset('assets/js/main.js') }}"></script>

  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>