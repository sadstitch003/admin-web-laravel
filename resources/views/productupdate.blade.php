<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
  data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Product Update</title>

  <meta name="description" content="" />


  <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />


  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />


  <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />


  <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
  <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css')  }}"
    class="template-customizer-theme-css" />
  <link rel="stylesheet" href="{{ asset('assets/css/demo.css')}}" />


  <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />


  <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>


  <script src="{{ asset('assets/js/config.js') }}"></script>
</head>

<body>

  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">

      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="{{ route('dashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo">

            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">MonoMode</span>
          </a>

          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
          </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">

          <li class="menu-item">
            <a href="{{ route('dashboard') }}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-home-circle"></i>
              <div data-i18n="Analytics">Dashboard</div>
            </a>
          </li>


          <li class="menu-header small text-uppercase"><span class="menu-header-text">Data</span></li>

          <li class="menu-item active">
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
          <li class="menu-item">
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
            </ul>
          </li>
        </ul>
      </aside>

      <div class="layout-page">


        <nav
          class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
          id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="bx bx-menu bx-sm"></i>
            </a>
          </div>

          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            Product/<b>Product Detail</b>
            <ul class="navbar-nav flex-row align-items-center ms-auto">
            </ul>
          </div>
        </nav>


        <div class="container-xxl flex-grow-1 container-p-y">
          <div class="row">
            <div class="col-lg-12 mb-4 order-0">
              <div class="card">
                <div class="row p-5">
                  <h3>Product Detail</h3>
                  <form action="{{ route('updateRoute', 1) }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form">
                      <div class="row">
                        <div class="col-xl-7 col-md-8 mb-3">
                          <label for="prod-id" class="form-label">Product ID</label>
                          <input type="text" name="PRODID" value="12345" id="ID" class="form-control shadow-none"
                            readonly="true" required>
                        </div>
                        <div class="col-xl-7 col-md-8 mb-3">
                          <label for="prod-name" class="form-label">Product Name</label>
                          <input type="text" name="NAME" value="Sample Product" id="prod-name"
                            class="form-control shadow-none" required>
                        </div>
                        <div class="col-xl-7 col-md-8 mb-3">
                          <label for="category" class="form-label">Category</label>
                          <select name="CATEGORY" class="form-select shadow-none" id="category" required>
                            <option value="1" selected>Electronics</option>
                            <option value="2">Books</option>
                            <option value="3">Clothing</option>
                          </select>
                        </div>
                        <div class="col-xl-7 col-md-8 mb-3">
                          <div class="row justify-content-between">
                            <div class="col-xl-6 col-md-12">
                              <label for="prod-price" class="form-label">Price</label>
                              <input type="number" value="99.99" placeholder="0" id="prod-price" name="PRICE"
                                class="form-control shadow-none" required>
                            </div>
                            <div class="col-xl-6 col-md-12">
                              <label for="prod-stock" class="form-label">Stock</label>
                              <input type="number" value="100" placeholder="0" id="prod-stock" name="STOCK"
                                class="form-control shadow-none" required>
                            </div>
                          </div>
                        </div>
                        <div class="col-xl-7 col-md-8 mb-3">
                          <label for="prod-description" class="form-label">Description</label>
                          <textarea id="prod-description" class="form-control shadow-none" name="DESCRIPTION" rows="3"
                            required>Sample description here.</textarea>
                        </div>
                        <div class="col-xl-7 col-md-8 mb-3">
                          <label for="prod-status" class="form-label">Status</label>
                          <select name="STATUS" class="form-select shadow-none" id="prod-status" required>
                            <option value="1" selected>Active</option>
                            <option value="2">Inactive</option>
                          </select>
                        </div>
                        <div class="col-xl-7 col-md-8 mb-3">
                          <button type="submit" class="btn btn-primary">Update Product</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

        <footer class="content-footer footer bg-footer-theme">
          <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
            <div class="mb-2 mb-md-0">
              <a href="javascript:void(0)" class="footer-link d-inline-block">License</a>
              <a href="javascript:void(0)" class="footer-link d-inline-block">Help</a>
            </div>
            <div class="text-center">
              <a href="javascript:void(0)" class="footer-link d-inline-block">About</a>
            </div>
          </div>
        </footer>

      </div>

    </div>
  </div>

  <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
  <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
  <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
  <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
  <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
  <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>