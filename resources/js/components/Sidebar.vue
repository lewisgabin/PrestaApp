<template>
  <div
    class="main-menu menu-fixed menu-light menu-accordion menu-shadow"
    data-scroll-to-active="true"
  >
    <div class="navbar-header">
      <ul class="nav navbar-nav flex-row">
        <li class="nav-item mr-auto" style="margin-top: 12px">
          <h3 style="color: white; font-family: cursive; font-weight: 500">
            PrestaApp
          </h3>
        </li>
        <li class="nav-item nav-toggle">
          <a
            class="nav-link modern-nav-toggle pr-0"
            style="color: white"
            data-toggle="collapse"
            ><i class="bx bx-x d-block d-xl-none font-medium-4"></i
            ><i
              class="toggle-icon bx font-medium-4 d-none d-xl-block"
              data-ticon="bx-disc"
            ></i
          ></a>
        </li>
      </ul>
    </div>
    <div class="shadow-bottom"></div>
    <!-- begin menu -->
    <div class="main-menu-content">
      <ul
        class="navigation navigation-main"
        id="main-menu-navigation"
        data-menu="menu-navigation"
        data-icon-style=""
      >
        <li class="kt-menu__section">
          <h4 class="kt-menu__section-text">Menu</h4>
          <i class="kt-menu__section-icon flaticon-more-v2"></i>
        </li>
        <template v-if="listRolPermiso.includes('index.clientes')">
          <li class="nav-item">
            <router-link class="kt-menu__link" :to="'/cliente'">
              <span class="svg-icon svg-icon-primary svg-icon-5x">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  xmlns:xlink="http://www.w3.org/1999/xlink"
                  width="24px"
                  height="24px"
                  viewBox="0 0 24 24"
                  version="1.1"
                  class="kt-svg-icon"
                >
                  <g
                    stroke="none"
                    stroke-width="1"
                    fill="none"
                    fill-rule="evenodd"
                  >
                    <rect x="0" y="0" width="24" height="24"></rect>
                    <path
                      d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z"
                      fill="#000000"
                      opacity="0.3"
                    ></path>
                    <path
                      d="M12,13 C10.8954305,13 10,12.1045695 10,11 C10,9.8954305 10.8954305,9 12,9 C13.1045695,9 14,9.8954305 14,11 C14,12.1045695 13.1045695,13 12,13 Z"
                      fill="#000000"
                      opacity="0.3"
                    ></path>
                    <path
                      d="M7.00036205,18.4995035 C7.21569918,15.5165724 9.36772908,14 11.9907452,14 C14.6506758,14 16.8360465,15.4332455 16.9988413,18.5 C17.0053266,18.6221713 16.9988413,19 16.5815,19 C14.5228466,19 11.463736,19 7.4041679,19 C7.26484009,19 6.98863236,18.6619875 7.00036205,18.4995035 Z"
                      fill="#000000"
                      opacity="0.3"
                    ></path>
                  </g>
                </svg>
              </span>
              <span class="kt-menu__link-text"
                ><font style="vertical-align: inherit"
                  ><font style="vertical-align: inherit">Clientes</font></font
                ></span
              >
            </router-link>
          </li>
        </template>

        <li class="nav-item">
          <a href="#" class="kt-menu__link">
            <span class="svg-icon svg-icon-primary svg-icon-5x"
              ><svg
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
                width="24px"
                height="24px"
                viewBox="0 0 24 24"
                version="1.1"
                class="kt-svg-icon"
              >
                <g
                  stroke="none"
                  stroke-width="1"
                  fill="none"
                  fill-rule="evenodd"
                >
                  <rect x="0" y="0" width="24" height="24"></rect>
                  <circle
                    fill="#000000"
                    opacity="0.3"
                    cx="20.5"
                    cy="12.5"
                    r="1.5"
                  ></circle>
                  <rect
                    fill="#000000"
                    opacity="0.3"
                    transform="translate(12.000000, 6.500000) rotate(-15.000000) translate(-12.000000, -6.500000) "
                    x="3"
                    y="3"
                    width="18"
                    height="7"
                    rx="1"
                  ></rect>
                  <path
                    d="M22,9.33681558 C21.5453723,9.12084552 21.0367986,9 20.5,9 C18.5670034,9 17,10.5670034 17,12.5 C17,14.4329966 18.5670034,16 20.5,16 C21.0367986,16 21.5453723,15.8791545 22,15.6631844 L22,18 C22,19.1045695 21.1045695,20 20,20 L4,20 C2.8954305,20 2,19.1045695 2,18 L2,6 C2,4.8954305 2.8954305,4 4,4 L20,4 C21.1045695,4 22,4.8954305 22,6 L22,9.33681558 Z"
                    fill="#000000"
                  ></path>
                </g></svg
            ></span>
            <span class="kt-menu__link-text"
              ><font style="vertical-align: inherit"
                ><font style="vertical-align: inherit">Prestamos</font></font
              ></span
            >
          </a>

          <ul class="menu-content">
            <li>
                <router-link class="d-flex align-items-center" :to="'/permiso'"
                  ><i class="bx bx-right-arrow-alt"></i
                  ><span class="menu-item text-truncate"
                    >Mis prestamos</span
                  ></router-link
                >
         
            </li>
               <li>
                <router-link class="d-flex align-items-center" :to="'/nuevo/prestamo'"
                  ><i class="bx bx-right-arrow-alt"></i
                  ><span class="menu-item text-truncate"
                    >Nuevo prestamos</span
                  ></router-link
                >
         
            </li>
               <li>
                <router-link class="d-flex align-items-center" :to="'/permiso'"
                  ><i class="bx bx-right-arrow-alt"></i
                  ><span class="menu-item text-truncate"
                    >Pendientes</span
                  ></router-link
                >
         
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="kt-menu__link">
            <span class="svg-icon svg-icon-primary svg-icon-5x">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
                width="24px"
                height="24px"
                viewBox="0 0 24 24"
                version="1.1"
                class="kt-svg-icon"
              >
                <g
                  stroke="none"
                  stroke-width="1"
                  fill="none"
                  fill-rule="evenodd"
                >
                  <rect x="0" y="0" width="24" height="24"></rect>
                  <path
                    d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z"
                    fill="#000000"
                    opacity="0.3"
                  ></path>
                  <path
                    d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z"
                    fill="#000000"
                  ></path>
                  <rect
                    fill="#000000"
                    opacity="0.3"
                    x="10"
                    y="9"
                    width="7"
                    height="2"
                    rx="1"
                  ></rect>
                  <rect
                    fill="#000000"
                    opacity="0.3"
                    x="7"
                    y="9"
                    width="2"
                    height="2"
                    rx="1"
                  ></rect>
                  <rect
                    fill="#000000"
                    opacity="0.3"
                    x="7"
                    y="13"
                    width="2"
                    height="2"
                    rx="1"
                  ></rect>
                  <rect
                    fill="#000000"
                    opacity="0.3"
                    x="10"
                    y="13"
                    width="7"
                    height="2"
                    rx="1"
                  ></rect>
                  <rect
                    fill="#000000"
                    opacity="0.3"
                    x="7"
                    y="17"
                    width="2"
                    height="2"
                    rx="1"
                  ></rect>
                  <rect
                    fill="#000000"
                    opacity="0.3"
                    x="10"
                    y="17"
                    width="7"
                    height="2"
                    rx="1"
                  ></rect>
                </g>
              </svg>
            </span>
            <span class="kt-menu__link-text"
              ><font style="vertical-align: inherit"
                ><font style="vertical-align: inherit">Solicitud</font></font
              ></span
            >
          </a>

          <ul class="menu-content">
            <li>
              <a
                class="d-flex align-items-center"
                href="../../../starter-kit/ltr/vertical-menu-boxicons-template/sk-layout-1-column.html"
                ><i class="bx bx-right-arrow-alt"></i
                ><span class="menu-item text-truncate" data-i18n="1 column"
                  >1 column</span
                ></a
              >
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="kt-menu__link">
            <span class="svg-icon svg-icon-primary svg-icon-5x">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
                width="24px"
                height="24px"
                viewBox="0 0 24 24"
                version="1.1"
                class="kt-svg-icon"
              >
                <g
                  stroke="none"
                  stroke-width="1"
                  fill="none"
                  fill-rule="evenodd"
                >
                  <rect x="0" y="0" width="24" height="24"></rect>
                  <path
                    d="M20.4061385,6.73606154 C20.7672665,6.89656288 21,7.25468437 21,7.64987309 L21,16.4115967 C21,16.7747638 20.8031081,17.1093844 20.4856429,17.2857539 L12.4856429,21.7301984 C12.1836204,21.8979887 11.8163796,21.8979887 11.5143571,21.7301984 L3.51435707,17.2857539 C3.19689188,17.1093844 3,16.7747638 3,16.4115967 L3,7.64987309 C3,7.25468437 3.23273352,6.89656288 3.59386153,6.73606154 L11.5938615,3.18050598 C11.8524269,3.06558805 12.1475731,3.06558805 12.4061385,3.18050598 L20.4061385,6.73606154 Z"
                    fill="#000000"
                    opacity="0.3"
                  ></path>
                  <polygon
                    fill="#000000"
                    points="14.9671522 4.22441676 7.5999999 8.31727912 7.5999999 12.9056825 9.5999999 13.9056825 9.5999999 9.49408582 17.25507 5.24126912"
                  ></polygon>
                </g>
              </svg>
            </span>
            <span class="kt-menu__link-text"
              ><font style="vertical-align: inherit"
                ><font style="vertical-align: inherit">Solicitud</font></font
              ></span
            >
          </a>

          <ul class="menu-content">
            <li>
              <a
                class="d-flex align-items-center"
                href="../../../starter-kit/ltr/vertical-menu-boxicons-template/sk-layout-1-column.html"
                ><i class="bx bx-right-arrow-alt"></i
                ><span class="menu-item text-truncate" data-i18n="1 column"
                  >1 column</span
                ></a
              >
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="kt-menu__link">
            <span class="svg-icon svg-icon-primary svg-icon-5x">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
                width="24px"
                height="24px"
                viewBox="0 0 24 24"
                version="1.1"
                class="kt-svg-icon"
              >
                <g
                  stroke="none"
                  stroke-width="1"
                  fill="none"
                  fill-rule="evenodd"
                >
                  <rect x="0" y="0" width="24" height="24"></rect>
                  <rect
                    fill="#000000"
                    opacity="0.3"
                    x="12"
                    y="4"
                    width="3"
                    height="13"
                    rx="1.5"
                  ></rect>
                  <rect
                    fill="#000000"
                    opacity="0.3"
                    x="7"
                    y="9"
                    width="3"
                    height="8"
                    rx="1.5"
                  ></rect>
                  <path
                    d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z"
                    fill="#000000"
                    fill-rule="nonzero"
                  ></path>
                  <rect
                    fill="#000000"
                    opacity="0.3"
                    x="17"
                    y="11"
                    width="3"
                    height="6"
                    rx="1.5"
                  ></rect>
                </g>
              </svg>
            </span>
            <span class="kt-menu__link-text"
              ><font style="vertical-align: inherit"
                ><font style="vertical-align: inherit">Reportes</font></font
              ></span
            >
          </a>

          <ul class="menu-content">
            <li>
              <a
                class="d-flex align-items-center"
                href="../../../starter-kit/ltr/vertical-menu-boxicons-template/sk-layout-1-column.html"
                ><i class="bx bx-right-arrow-alt"></i
                ><span class="menu-item text-truncate" data-i18n="1 column"
                  >1 column</span
                ></a
              >
            </li>
          </ul>
        </li>

        <li class="kt-menu__section">
          <h4 class="kt-menu__section-text">Configuracion</h4>
          <i class="kt-menu__section-icon flaticon-more-v2"></i>
        </li>
        <li class="nav-item">
          <a href="#" class="kt-menu__link">
            <span class="svg-icon svg-icon-primary svg-icon-5x">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
                width="24px"
                height="24px"
                viewBox="0 0 24 24"
                version="1.1"
                class="kt-svg-icon"
              >
                <g
                  stroke="none"
                  stroke-width="1"
                  fill="none"
                  fill-rule="evenodd"
                >
                  <rect x="0" y="0" width="24" height="24"></rect>
                  <path
                    d="M5,10.5 C5,6 8,3 12.5,3 C17,3 20,6.75 20,10.5 C20,12.8325623 17.8236613,16.03566 13.470984,20.1092932 C12.9154018,20.6292577 12.0585054,20.6508331 11.4774555,20.1594925 C7.15915182,16.5078313 5,13.2880005 5,10.5 Z M12.5,12 C13.8807119,12 15,10.8807119 15,9.5 C15,8.11928813 13.8807119,7 12.5,7 C11.1192881,7 10,8.11928813 10,9.5 C10,10.8807119 11.1192881,12 12.5,12 Z"
                    fill="#000000"
                    fill-rule="nonzero"
                  ></path>
                </g>
              </svg>
            </span>
            <span class="kt-menu__link-text"
              ><font style="vertical-align: inherit"
                ><font style="vertical-align: inherit">Ruta y Sector</font></font
              ></span
            >
          </a>

          <ul class="menu-content">
            <li>
                <router-link class="d-flex align-items-center" :to="'/ruta'"
                  ><i class="bx bx-right-arrow-alt"></i
                  ><span class="menu-item text-truncate"
                    >Ruta</span
                  ></router-link>         
            </li>
            <li>
                <router-link class="d-flex align-items-center" :to="'/sector'"
                  ><i class="bx bx-right-arrow-alt"></i
                  ><span class="menu-item text-truncate"
                    >Sector</span
                  ></router-link>         
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <router-link class="kt-menu__link" :to="'/empresa'">
            <span class="svg-icon svg-icon-primary svg-icon-5x">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
                width="24px"
                height="24px"
                viewBox="0 0 24 24"
                version="1.1"
              >
                <g
                  stroke="none"
                  stroke-width="1"
                  fill="none"
                  fill-rule="evenodd"
                >
                  <rect x="0" y="0" width="24" height="24" />
                  <path
                    d="M13.5,21 L13.5,18 C13.5,17.4477153 13.0522847,17 12.5,17 L11.5,17 C10.9477153,17 10.5,17.4477153 10.5,18 L10.5,21 L5,21 L5,4 C5,2.8954305 5.8954305,2 7,2 L17,2 C18.1045695,2 19,2.8954305 19,4 L19,21 L13.5,21 Z M9,4 C8.44771525,4 8,4.44771525 8,5 L8,6 C8,6.55228475 8.44771525,7 9,7 L10,7 C10.5522847,7 11,6.55228475 11,6 L11,5 C11,4.44771525 10.5522847,4 10,4 L9,4 Z M14,4 C13.4477153,4 13,4.44771525 13,5 L13,6 C13,6.55228475 13.4477153,7 14,7 L15,7 C15.5522847,7 16,6.55228475 16,6 L16,5 C16,4.44771525 15.5522847,4 15,4 L14,4 Z M9,8 C8.44771525,8 8,8.44771525 8,9 L8,10 C8,10.5522847 8.44771525,11 9,11 L10,11 C10.5522847,11 11,10.5522847 11,10 L11,9 C11,8.44771525 10.5522847,8 10,8 L9,8 Z M9,12 C8.44771525,12 8,12.4477153 8,13 L8,14 C8,14.5522847 8.44771525,15 9,15 L10,15 C10.5522847,15 11,14.5522847 11,14 L11,13 C11,12.4477153 10.5522847,12 10,12 L9,12 Z M14,12 C13.4477153,12 13,12.4477153 13,13 L13,14 C13,14.5522847 13.4477153,15 14,15 L15,15 C15.5522847,15 16,14.5522847 16,14 L16,13 C16,12.4477153 15.5522847,12 15,12 L14,12 Z"
                    fill="#000000"
                  />
                  <rect
                    fill="#FFFFFF"
                    x="13"
                    y="8"
                    width="3"
                    height="3"
                    rx="1"
                  />
                  <path
                    d="M4,21 L20,21 C20.5522847,21 21,21.4477153 21,22 L21,22.4 C21,22.7313708 20.7313708,23 20.4,23 L3.6,23 C3.26862915,23 3,22.7313708 3,22.4 L3,22 C3,21.4477153 3.44771525,21 4,21 Z"
                    fill="#000000"
                    opacity="0.3"
                  />
                </g>
              </svg>
            </span>
            <span class="kt-menu__link-text"
              ><font style="vertical-align: inherit"
                ><font style="vertical-align: inherit">Empresa</font></font
              ></span
            >
          </router-link>
        </li>
        <li class="nav-item">
          <a href="#" class="kt-menu__link">
            <span class="svg-icon svg-icon-primary svg-icon-5x">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
                width="24px"
                height="24px"
                viewBox="0 0 24 24"
                version="1.1"
                class="kt-svg-icon"
              >
                <g
                  stroke="none"
                  stroke-width="1"
                  fill="none"
                  fill-rule="evenodd"
                >
                  <polygon points="0 0 24 0 24 24 0 24"></polygon>
                  <path
                    d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z"
                    fill="#000000"
                    fill-rule="nonzero"
                    opacity="0.3"
                  ></path>
                  <rect
                    fill="#000000"
                    x="6"
                    y="11"
                    width="9"
                    height="2"
                    rx="1"
                  ></rect>
                  <rect
                    fill="#000000"
                    x="6"
                    y="15"
                    width="5"
                    height="2"
                    rx="1"
                  ></rect>
                </g>
              </svg>
            </span>
            <span class="kt-menu__link-text"
              ><font style="vertical-align: inherit"
                ><font style="vertical-align: inherit">Documentos</font></font
              ></span
            >
          </a>

          <ul class="menu-content">
            <li>
              <a
                class="d-flex align-items-center"
                href="../../../starter-kit/ltr/vertical-menu-boxicons-template/sk-layout-1-column.html"
                ><i class="bx bx-right-arrow-alt"></i
                ><span class="menu-item text-truncate" data-i18n="1 column"
                  >1 column</span
                ></a
              >
            </li>
          </ul>
        </li>

        <li class="kt-menu__section">
          <h4 class="kt-menu__section-text">Seguridad</h4>
          <i class="kt-menu__section-icon flaticon-more-v2"></i>
        </li>

        <li class="nav-item">
          <a href="#" class="kt-menu__link">
            <span class="svg-icon svg-icon-primary svg-icon-5x">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
                width="24px"
                height="24px"
                viewBox="0 0 24 24"
                version="1.1"
                class="kt-svg-icon"
              >
                <g
                  stroke="none"
                  stroke-width="1"
                  fill="none"
                  fill-rule="evenodd"
                >
                  <rect x="0" y="0" width="24" height="24"></rect>
                  <polygon
                    fill="#000000"
                    opacity="0.3"
                    transform="translate(8.885842, 16.114158) rotate(-315.000000) translate(-8.885842, -16.114158) "
                    points="6.89784488 10.6187476 6.76452164 19.4882481 8.88584198 21.6095684 11.0071623 19.4882481 9.59294876 18.0740345 10.9659914 16.7009919 9.55177787 15.2867783 11.0071623 13.8313939 10.8837471 10.6187476"
                  ></polygon>
                  <path
                    d="M15.9852814,14.9852814 C12.6715729,14.9852814 9.98528137,12.2989899 9.98528137,8.98528137 C9.98528137,5.67157288 12.6715729,2.98528137 15.9852814,2.98528137 C19.2989899,2.98528137 21.9852814,5.67157288 21.9852814,8.98528137 C21.9852814,12.2989899 19.2989899,14.9852814 15.9852814,14.9852814 Z M16.1776695,9.07106781 C17.0060967,9.07106781 17.6776695,8.39949494 17.6776695,7.57106781 C17.6776695,6.74264069 17.0060967,6.07106781 16.1776695,6.07106781 C15.3492424,6.07106781 14.6776695,6.74264069 14.6776695,7.57106781 C14.6776695,8.39949494 15.3492424,9.07106781 16.1776695,9.07106781 Z"
                    fill="#000000"
                    transform="translate(15.985281, 8.985281) rotate(-315.000000) translate(-15.985281, -8.985281) "
                  ></path>
                </g>
              </svg>
            </span>
            <span class="kt-menu__link-text"
              ><font style="vertical-align: inherit"
                ><font style="vertical-align: inherit"
                  >Roles y Permisos</font
                ></font
              ></span
            >
          </a>

          <ul class="menu-content">
            <li>
              <template v-if="listRolPermiso.includes('index.permiso')">
                <router-link class="d-flex align-items-center" :to="'/permiso'"
                  ><i class="bx bx-right-arrow-alt"></i
                  ><span class="menu-item text-truncate"
                    >Permisos</span
                  ></router-link
                >
              </template>
            </li>
            <li>
              <template v-if="listRolPermiso.includes('index.rol')">
                <router-link class="d-flex align-items-center" :to="'/rol'"
                  ><i class="bx bx-right-arrow-alt"></i
                  ><span class="menu-item text-truncate" data-i18n="Rol"
                    >Rol</span
                  ></router-link
                >
              </template>
            </li>
          </ul>
        </li>
        <template v-if="listRolPermiso.includes('index.usuario')">
          <li class="nav-item">
            <router-link class="kt-menu__link" :to="'/usuario'">
              <span class="svg-icon svg-icon-primary svg-icon-5x">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  xmlns:xlink="http://www.w3.org/1999/xlink"
                  width="24px"
                  height="24px"
                  viewBox="0 0 24 24"
                  version="1.1"
                >
                  <g
                    stroke="none"
                    stroke-width="1"
                    fill="none"
                    fill-rule="evenodd"
                  >
                    <rect x="0" y="0" width="24" height="24" />
                    <path
                      d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z"
                      fill="#000000"
                      opacity="0.3"
                    />
                    <path
                      d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z"
                      fill="#000000"
                      opacity="0.3"
                    />
                    <path
                      d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z"
                      fill="#000000"
                      opacity="0.3"
                    />
                  </g>
                </svg>
              </span>
              <span class="kt-menu__link-text"
                ><font style="vertical-align: inherit"
                  ><font style="vertical-align: inherit">Usuarios</font></font
                ></span
              >
            </router-link>
          </li>
        </template>

        <li class="nav-item">
          <router-link :to="'/calculadora'"
            ><i class="bx bx-folder"></i
            ><span class="menu-title text-truncate" data-i18n="clientes"
              >calculadora</span
            ></router-link
          >
        </li>
        <li class="nav-item">
          <a href="#/listar" class="kt-menu__link"> </a>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  props: ["ruta"],
  data() {
    return {
      listRolPermiso: [],
    };
  },
  mounted() {
    this.listRolPermiso = JSON.parse(sessionStorage.getItem("ListRolPermiso"));
  },
};
</script>

<style>
.kt-menu__link {
  padding-left: 0px !important;
  margin-left: 0 !important;
}

.kt-menu__link-text {
  color: #313752;
  font-weight: 400;
  font-size: 14px;
  padding-left: 12px;
}
.svg-icon svg {
  height: 37px;
  width: 37px;
}

.svg-icon svg g [fill] {
  -webkit-transition: fill 0.3s ease;
  transition: fill 0.3s ease;
  fill: #b5b5c3;
}
.svg-icon svg:hover g [fill] {
  -webkit-transition: fill 0.3s ease;
  transition: fill 0.3s ease;
}
.svg-icon.svg-icon-primary svg g [fill] {
  -webkit-transition: fill 0.3s ease;
  transition: fill 0.3s ease;
  fill: #47617f !important;
}
.svg-icon.svg-icon-primary svg:hover g [fill] {
  -webkit-transition: fill 0.3s ease;
  transition: fill 0.3s ease;
  fill: #5a8dee !important;
}

.kt-menu__section {
  height: 23px;
}
.kt-menu__section-text {
  font-size: 0.8rem;
  font-weight: 500;
  text-transform: uppercase;
  letter-spacing: 0.3px;
  color: #a1a8c3;
  margin-top: 15px;
}
#main-menu-navigation,
.main-menu-content {
  background: white !important;
}
.navbar-header {
  background: #5a8dee;
}
</style>