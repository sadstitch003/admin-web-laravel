<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
  data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Product Insert</title>

  <meta name="description" content="" />


  <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />


  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />


  <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />


  <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="assets/css/demo.css" />


  <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />


  <script src="assets/vendor/js/helpers.js"></script>


  <script src="assets/js/config.js"></script>
</head>

<body>

  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">

      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="dashboard.html" class="app-brand-link">
            <span class="app-brand-logo demo">
              <svg width="25" viewBox="0 0 25 42" xmlns="http://www.w3.org/2000/svg">
                <defs>
                  <path d="M13.7918663,0.358365126 L3.39788168,7.44174259..." id="path-1"></path>
                </defs>
                <g id="g-app-brand" stroke="none" fill-rule="evenodd">
                  <g id="Brand-Logo">
                    <g id="Icon">
                      <g id="Mask">
                        <mask id="mask-2" fill="white">
                          <use xlink:href="#path-1"></use>
                        </mask>
                        <use fill="#696cff" xlink:href="#path-1"></use>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
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
            <a href="dashboard.html" class="menu-link">
              <i class="menu-icon tf-icons bx bx-home-circle"></i>
              <div>Dashboard</div>
            </a>
          </li>


          <li class="menu-header small text-uppercase"><span class="menu-header-text">Data</span></li>


          <li class="menu-item active">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-detail"></i>
              <div>Product</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="productMaster.html" class="menu-link">
                  <div>Product Master</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="productInsert.html" class="menu-link">
                  <div>Input/Update Product</div>
                </a>
              </li>
            </ul>
          </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-detail"></i>
              <div>Transactions</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="transaction.html" class="menu-link">
                  <div>Transaction Header</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="transactionProduct.html" class="menu-link">
                  <div>Transaction Detail</div>
                </a>
              </li>
            </ul>
          </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-detail"></i>
              <div>Customer</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="customerData.html" class="menu-link">
                  <div>Customer Data</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="customerInsert.html" class="menu-link">
                  <div>Input/Update Customer</div>
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
            <ul class="navbar-nav flex-row align-items-center ms-auto"></ul>
          </div>
        </nav>


        <div class="container-xxl flex-grow-1 container-p-y">
          <div class="row">
            <div class="col-lg-12 mb-4 order-0">
              <div class="card">
                <div class="row p-5">
                  <h3>Product Detail</h3>
                  <form action="insertRoute.html" method="POST">
                    <div class="form">
                      <div class="row">
                        <div class="col-xl-7 col-md-8 mb-3">
                          <label for="prod-id" class="form-label">Product ID</label>
                          <input type="text" name="PRODID" placeholder="auto generated by system" id="ID"
                            class="form-control shadow-none" readonly="true" required>
                        </div>
                        <div class="col-xl-7 col-md-8 mb-3">
                          <label for="prod-name" class="form-label">Product Name</label>
                          <input type="text" name="NAME" placeholder="Product Name" id="prod-name"
                            class="form-control shadow-none" required>
                        </div>
                        <div class="col-xl-7 col-md-8 mb-3">
                          <label for="category" class="form-label">Category</label>
                          <select name="CATEGORY" class="form-select shadow-none" id="category" required>
                            <option value="1">Category 1</option>
                            <option value="2">Category 2</option>
                          </select>
                        </div>
                        <div class="col-xl-7 col-md-8 mb-3">
                          <div class="row justify-content-between">
                            <div class="col-xl-6 col-md-12">
                              <label for="prod-price" class="form-label">Price</label>
                              <input type="number" placeholder="0" id="prod-price" name="PRICE"
                                class="form-control shadow-none" required>
                            </div>
                            <div class="col-xl-6 col-md-12">
                              <label for="prod-stock" class="form-label">Stock</label>
                              <input type="number" placeholder="0" id="prod-stock" name="STOCK"
                                class="form-control shadow-none" required>
                            </div>
                          </div>
                        </div>
                        <div class="col-xl-7 col-md-8 mb-3">
                          <label for="prod-desc" class="form-label">Description</label>
                          <textarea name="DESCRIPTION" id="prod-desc" rows="5" class="form-control shadow-none"
                            required></textarea>
                        </div>
                      </div>
                      <button class="btn btn-primary mt-3">Submit</button>
                      <a class="btn btn-outline-primary mt-3" href="productMaster.html">Back</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</body>

</html>