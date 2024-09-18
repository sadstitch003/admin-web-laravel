<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
  data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Profile</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />

  <!-- Icons -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
  <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}"
    class="template-customizer-theme-css" />
  <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

  <!-- Helpers -->
  <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>

  <!-- Config -->
  <script src="{{ asset('assets/js/config.js') }}"></script>
</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->
      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="{{ route('dashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
              <!-- SVG logo -->
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">MonoMode</span>
          </a>

          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
          </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">
          <!-- Dashboard -->
          <li class="menu-item">
            <a href="{{ route('dashboard') }}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-home-circle"></i>
              <div data-i18n="Analytics">Dashboard</div>
            </a>
          </li>

          <!-- Forms & Tables -->
          <li class="menu-header small text-uppercase"><span class="menu-header-text">Data</span></li>
          <!-- Forms -->
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-detail"></i>
              <div data-i18n="Form Layouts">Product</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="{{ route('productMaster') }}" class="menu-link">
                  <div data-i18n="Vertical Form">Product Master</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="{{ route('productInsert') }}" class="menu-link">
                  <div data-i18n="Horizontal Form">Input/Update Product</div>
                </a>
              </li>
            </ul>
          </li>
          <li class="menu-item active">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-detail"></i>
              <div data-i18n="Form Layouts">Transactions</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="{{ route('transaction') }}" class="menu-link">
                  <div data-i18n="Vertical Form">Transaction Header</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="{{ route('transactionProduct') }}" class="menu-link">
                  <div data-i18n="Horizontal Form">Transaction Detail</div>
                </a>
              </li>
            </ul>
          </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-detail"></i>
              <div data-i18n="Form Layouts">Customer</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="{{ route('customerData') }}" class="menu-link">
                  <div data-i18n="customer-list">Customer Data</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="{{ route('customerInsert') }}" class="menu-link">
                  <div data-i18n="Vertical Form">Input/Update Customer</div>
                </a>
              </li>
          </li>
        </ul>
      </aside>
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->
        <nav
          class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
          id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="bx bx-menu bx-sm"></i>
            </a>
          </div>

          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            Transactions/<b>Transaction Detail</b>
            <ul class="navbar-nav flex-row align-items-center ms-auto">
            </ul>
          </div>
        </nav>

        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
          <div class="row">

            <div class="col-lg-12 mb-4 order-0">
              <div class="card">
                <div class="row justify-content-center align-items-center p-4">
                  <div class="row p-5">
                    <h3>Transaction Header</h3>
                    <div class="form">
                      {{ csrf_field() }}
                      <div class="row">
                        <div class="col-lg-6 col-md-12 mb-3">
                          <label for="transaction-id" class="form-label">Transaction ID</label>
                          <input type="text" id="transaction-id" placeholder="Transaction ID"
                            class="form-control shadow-none" disabled value="">
                        </div>
                        <div class="col-lg-6 col-md-12 mb-3">
                          <label for="transaction-date" class="form-label">Transaction Date</label>
                          <input type="text" id="transaction-date" placeholder="Date" class="form-control shadow-none"
                            disabled value="">
                        </div>
                        <div class="col-lg-6 col-md-12 mb-3">
                          <label for="cust-id" class="form-label">Customer ID</label>
                          <input type="text" id="cust-id" placeholder="Customer ID" class="form-control shadow-none"
                            disabled value="">
                        </div>
                        <div class="col-lg-6 col-md-12 mb-3">
                          <label for="transaction-status" class="form-label">Status</label>
                          <input type="text" id="transaction-status" placeholder="Status"
                            class="form-control shadow-none" disabled value="">
                        </div>
                        <div class="col-lg-6 col-md-12 mb-3">
                          <label for="payment" class="form-label">Payment Method</label>
                          <input type="text" id="payment" placeholder="Payment Method" class="form-control shadow-none"
                            disabled value="">
                        </div>
                        <div class="col-lg-6 col-md-12 mb-3">
                          <label for="transaction-total" class="form-label">Total</label>
                          <input type="number" id="transaction-total" placeholder="Total"
                            class="form-control shadow-none" disabled value="">
                        </div>
                      </div>
                    </div>
                    <hr>
                    <h3>Transaction Details</h3>
                    <div class="table-responsive text-nowrap">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Product Code</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Price</th>
                          </tr>
                        </thead>
                        <tbody>
                          <!-- Dummy Data Row 1 -->
                          <tr>
                            <td>001</td>
                            <td>PRD123</td>
                            <td>Product A Description</td>
                            <td>10</td>
                            <td>$15.00</td>
                          </tr>

                          <!-- Dummy Data Row 2 -->
                          <tr>
                            <td>002</td>
                            <td>PRD456</td>
                            <td>Product B Description</td>
                            <td>5</td>
                            <td>$25.00</td>
                          </tr>

                          <!-- Dummy Data Row 3 -->
                          <tr>
                            <td>003</td>
                            <td>PRD789</td>
                            <td>Product C Description</td>
                            <td>2</td>
                            <td>$50.00</td>
                          </tr>

                          <!-- Dummy Data Row 4 -->
                          <tr>
                            <td>004</td>
                            <td>PRD012</td>
                            <td>Product D Description</td>
                            <td>1</td>
                            <td>$100.00</td>
                          </tr>

                          <!-- Dummy Data Row 5 -->
                          <tr>
                            <td>005</td>
                            <td>PRD345</td>
                            <td>Product E Description</td>
                            <td>7</td>
                            <td>$20.00</td>
                          </tr>
                        </tbody>

                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- / Content -->

        <!-- Footer -->
        <footer class="content-footer footer bg-footer-theme">
          <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
            <div class="mb-2 mb-md-0">
              <a href="javascript:void(0);" class="footer-link d-inline-block">MonoMode</a>
            </div>
            <div>
              <a href="javascript:void(0);" class="footer-link d-inline-block me-4">Privacy</a>
              <a href="javascript:void(0);" class="footer-link d-inline-block me-4">Terms</a>
            </div>
          </div>
        </footer>
        <!-- / Footer -->
      </div>
      <!-- / Layout container -->
    </div>
  </div>

  <!-- Core JS -->
  <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
  <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
  <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
  <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

  <!-- Vendors JS -->
  <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>

  <!-- Main JS -->
  <script src="{{ asset('assets/js/main.js') }}"></script>
  <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
</body>

</html>