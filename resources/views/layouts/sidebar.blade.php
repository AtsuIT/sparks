<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">


     <!-- LOGO -->
     <div class="navbar-brand-box">
        <a href="index" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{URL::asset('assets/images/logo-sm.svg')}}" alt="" height="26">
            </span>
            <span class="logo-lg">
                <img src="{{URL::asset('assets/images/logo-sm.svg')}}" alt="" height="26"> <span class="logo-txt">Vuesy</span>
            </span>
        </a>

        <a href="index" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{URL::asset('assets/images/logo-sm.svg')}}" alt="" height="26">
            </span>
            <span class="logo-lg">
                <img src="{{URL::asset('assets/images/logo-sm.svg')}}" alt="" height="26"> <span class="logo-txt">Vuesy</span>
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-16 header-item vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>

                <li>
                    <a href="index">
                        <i class="bx bx-home-circle nav-icon"></i>
                        <span class="menu-item" data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>

                <li class="menu-title" data-key="t-applications">Applications</li>

                <li>
                    <a href="apps-calendar">
                        <i class="bx bx-calendar-alt nav-icon"></i>
                        <span class="menu-item" data-key="t-calendar">Calendar</span>
                    </a>
                </li>

                <li>
                    <a href="apps-chat">
                        <i class="bx bx-chat nav-icon"></i>
                        <span class="menu-item" data-key="t-chat">Chat</span>
                        <span class="badge rounded-pill badge-soft-danger" data-key="t-hot">Hot</span>
                    </a>
                </li>

                <li>
                    <a href="apps-kanban-board">
                        <i class="bx bxl-trello nav-icon"></i>
                        <span class="menu-item" data-key="t-kanban">Kanban Board</span>
                    </a>
                </li>

                <li>
                    <a href="apps-file-manager">
                        <i class="bx bx-folder nav-icon"></i>
                        <span class="menu-item" data-key="t-filemanager">File Manager</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-shield-quarter nav-icon"></i>
                        <span class="menu-item" data-key="t-ecommerce">Ecommerce</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="ecommerce-products" data-key="t-products">Products</a></li>
                        <li><a href="ecommerce-product-detail" data-key="t-product-detail">Product Detail</a></li>
                        <li><a href="ecommerce-orders" data-key="t-orders">Orders</a></li>
                        <li><a href="ecommerce-customers" data-key="t-customers">Customers</a></li>
                        <li><a href="ecommerce-cart" data-key="t-cart">Cart</a></li>
                        <li><a href="ecommerce-checkout" data-key="t-checkout">Checkout</a></li>
                        <li><a href="ecommerce-shops" data-key="t-shops">Shops</a></li>
                        <li><a href="ecommerce-add-product" data-key="t-add-product">Add Product</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-mail-send nav-icon"></i>
                        <span class="menu-item" data-key="t-email">Email</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="email-inbox" data-key="t-inbox">Inbox</a></li>
                        <li><a href="email-read" data-key="t-read-email">Read Email</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-book nav-icon"></i>
                        <span class="menu-item" data-key="t-contacts">Contacts</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="contacts-grid" data-key="t-user-grid">User Grid</a></li>
                        <li><a href="contacts-list" data-key="t-user-list">User List</a></li>
                        <li><a href="contacts-settings" data-key="t-user-settings">User Settings</a></li>
                    </ul>
                </li>

                <li>
                    <a href="apps-gallery">
                        <i class="bx bx-image-alt nav-icon"></i>
                        <span class="menu-item" data-key="t-gallery">Gallery</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-briefcase-alt-2 nav-icon"></i>
                        <span class="menu-item" data-key="t-projects">Projects</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="projects-grid" data-key="t-p-grid">Projects Grid</a></li>
                        <li><a href="projects-list" data-key="t-p-list">Projects List</a></li>
                        <li><a href="projects-overview" data-key="t-p-overview">Project Overview</a></li>
                        <li><a href="projects-create" data-key="t-create-new">Create New</a></li>
                    </ul>
                </li>

                <li class="menu-title" data-key="t-layouts">Layouts</li>
                
                <li>
                    <a href="layout-vertical">
                        <i class="bx bx-layout nav-icon"></i>
                        <span class="menu-item" data-key="t-verfical">Vertical</span>
                    </a>
                </li>

                <li class="menu-title" data-key="t-pages">Pages</li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="bx bx-user nav-icon"></i>
                        <span class="menu-item" data-key="t-authentication">Authentication</span>
                        <span class="badge rounded-pill bg-info">9</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" data-key="t-signin">Sign In</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="auth-signin-basic" data-key="t-basic">Basic</a></li>
                                <li><a href="auth-signin-cover" data-key="t-cover">Cover</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow" data-key="t-signup">Sign Up</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="auth-signup-basic" data-key="t-basic">Basic</a></li>
                                <li><a href="auth-signup-cover" data-key="t-cover">Cover</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow" data-key="t-signout">Sign Out</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="auth-signout-basic" data-key="t-basic">Basic</a></li>
                                <li><a href="auth-signout-cover" data-key="t-cover">Cover</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow" data-key="t-lock-screen">Lock Screen</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="auth-lockscreen-basic" data-key="t-basic">Basic</a></li>
                                <li><a href="auth-lockscreen-cover" data-key="t-cover">Cover</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow" data-key="t-forgot-password">Forgot Password</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="auth-forgotpassword-basic" data-key="t-basic">Basic</a></li>
                                <li><a href="auth-forgotpassword-cover" data-key="t-cover">Cover</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow" data-key="t-reset-password">Reset Password</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="auth-resetpassword-basic" data-key="t-basic">Basic</a></li>
                                <li><a href="auth-resetpassword-cover" data-key="t-cover">Cover</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow" data-key="t-email-verification">Email Verification</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="auth-emailverification-basic" data-key="t-basic">Basic</a></li>
                                <li><a href="auth-emailverification-cover" data-key="t-cover">Cover</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow" data-key="t-2step-verification">2-step Verification</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="auth-2step-basic" data-key="t-basic">Basic</a></li>
                                <li><a href="auth-2step-cover" data-key="t-cover">Cover</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow" data-key="t-thankyou">Thank you</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="auth-thankyou-basic" data-key="t-basic">Basic</a></li>
                                <li><a href="auth-thankyou-cover" data-key="t-cover">Cover</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-info-circle nav-icon"></i>
                        <span class="menu-item" data-key="t-error-pages">Error Pages</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="error-404-basic" data-key="t-error-404-basic">404 Basic</a></li>
                        <li><a href="error-404-cover" data-key="t-error-404-cover">404 Cover</a></li>
                        <li><a href="error-500-basic" data-key="t-error-500-basic">500 Basic</a></li>
                        <li><a href="error-500-cover" data-key="t-error-500-cover">500 Cover</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-file-blank nav-icon"></i>
                        <span class="menu-item" data-key="t-utility">Utility</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="pages-starter" data-key="t-starter-page">Starter Page</a></li>
                        <li><a href="pages-profile" data-key="t-profile">Profile</a></li>
                        <li><a href="pages-maintenance" data-key="t-maintenance">Maintenance</a></li>
                        <li><a href="pages-comingsoon" data-key="t-coming-soon">Coming Soon</a></li>
                        <li><a href="pages-faqs" data-key="t-faqs">FAQs</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-purchase-tag-alt nav-icon"></i>
                        <span class="menu-item" data-key="t-pricing">Pricing</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="pricing-basic" data-key="t-basic">Basic</a></li>
                        <li><a href="pricing-table" data-key="t-table">Table</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-file nav-icon"></i>
                        <span class="menu-item" data-key="t-invoices">Invoices</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="invoices-list" data-key="t-invoice-list">Invoice List</a></li>
                        <li><a href="invoices-detail" data-key="t-invoice-detail">Invoice Detail</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-award nav-icon"></i>
                        <span class="menu-item" data-key="t-timeline">Timeline</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="timeline-center" data-key="t-center-view">Center View</a></li>
                        <li><a href="timeline-left" data-key="t-left-view">Left View</a></li>
                    </ul>
                </li>

                <li class="menu-title" data-key="t-components">Components</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-tone nav-icon"></i>
                        <span class="menu-item" data-key="t-ui-elements">UI Elements</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="ui-alerts" data-key="t-alerts">Alerts</a></li>
                        <li><a href="ui-buttons" data-key="t-buttons">Buttons</a></li>
                        <li><a href="ui-cards" data-key="t-cards">Cards</a></li>
                        <li><a href="ui-carousel" data-key="t-carousel">Carousel</a></li>
                        <li><a href="ui-dropdowns" data-key="t-dropdowns">Dropdowns</a></li>
                        <li><a href="ui-grid" data-key="t-grid">Grid</a></li>
                        <li><a href="ui-images" data-key="t-images">Images</a></li>
                        <li><a href="ui-modals" data-key="t-modals">Modals</a></li>
                        <li><a href="ui-offcanvas" data-key="t-offcanvas">Offcanvas</a></li>
                        <li><a href="ui-placeholders" data-key="t-placeholders">Placeholders</a></li>
                        <li><a href="ui-progressbars" data-key="t-progress-bars">Progress Bars</a></li>
                        <li><a href="ui-tabs-accordions" data-key="t-tabs-accordions">Tabs & Accordions</a></li>
                        <li><a href="ui-typography" data-key="t-typography">Typography</a></li>
                        <li><a href="ui-video" data-key="t-video">Video</a></li>
                        <li><a href="ui-general" data-key="t-general">General</a></li>
                        <li><a href="ui-colors" data-key="t-colors">Colors</a></li>
                        <li><a href="ui-utilities" data-key="t-utilities">Utilities</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-customize nav-icon"></i>
                        <span class="menu-item" data-key="t-extend-ui">Extended UI</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="extended-lightbox" data-key="t-lightbox">Lightbox</a></li>
                        <li><a href="extended-rangeslider" data-key="t-range-slider">Range Slider</a></li>
                        <li><a href="extended-sweet-alert" data-key="t-sweetalert">SweetAlert 2</a></li>
                        <li><a href="extended-rating" data-key="t-rating">Rating</a></li>
                        <li><a href="extended-notifications" data-key="t-notifications">Notifications</a></li>
                        <li><a href="extended-swiperslider" data-key="t-swiperslider">Swiper Slider</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-pencil nav-icon"></i>
                        <span class="menu-item" data-key="t-forms">Forms</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="form-elements" data-key="t-basic-elements">Basic Elements</a></li>
                        <li><a href="form-validation" data-key="t-validation">Validation</a></li>
                        <li><a href="form-advanced" data-key="t-advanced-plugins">Advanced Plugins</a></li>
                        <li><a href="form-editors" data-key="t-editors">Editors</a></li>
                        <li><a href="form-uploads" data-key="t-file-upload">File Upload</a></li>
                        <li><a href="form-wizard" data-key="t-wizard">Wizard</a></li>
                        <li><a href="form-mask" data-key="t-mask">Mask</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-table nav-icon"></i>
                        <span class="menu-item" data-key="t-tables">Tables</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="tables-basic" data-key="t-bootstrap-basic">Bootstrap Basic</a></li>
                        <li><a href="tables-advanced" data-key="t-advanced-tables">Advance Tables</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-bar-chart-alt-2 nav-icon"></i>
                        <span class="menu-item" data-key="t-apex-charts">Apex Charts</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="charts-line" data-key="t-line">Line</a></li>
                        <li><a href="charts-area" data-key="t-area">Area</a></li>
                        <li><a href="charts-column" data-key="t-column">Column</a></li>
                        <li><a href="charts-bar" data-key="t-bar">Bar</a></li>
                        <li><a href="charts-mixed" data-key="t-mixed">Mixed</a></li>
                        <li><a href="charts-timeline" data-key="t-timeline">Timeline</a></li>
                        <li><a href="charts-candlestick" data-key="t-candlestick">Candlestick</a></li>
                        <li><a href="charts-boxplot" data-key="t-boxplot">Boxplot</a></li>
                        <li><a href="charts-bubble" data-key="t-bubble">Bubble</a></li>
                        <li><a href="charts-scatter" data-key="t-scatter">Scatter</a></li>
                        <li><a href="charts-heatmap" data-key="t-heatmap">Heatmap</a></li>
                        <li><a href="charts-treemap" data-key="t-treemap">Treemap</a></li>
                        <li><a href="charts-pie" data-key="t-pie">Pie</a></li>
                        <li><a href="charts-radialbar" data-key="t-radialbar">Radialbar</a></li>
                        <li><a href="charts-radar" data-key="t-radar">Radar</a></li>
                        <li><a href="charts-polararea" data-key="t-polararea">Polararea</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-archive nav-icon"></i>
                        <span class="menu-item" data-key="t-icons">Icons</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="icons-unicons" data-key="t-unicons">Unicons</a></li>
                        <li><a href="icons-feathericons" data-key="t-feather-icons">Feather icons</a></li>
                        <li><a href="icons-boxicons" data-key="t-boxicons">Boxicons</a></li>
                        <li><a href="icons-materialdesign" data-key="t-material-design">Material Design</a></li>
                        <li><a href="icons-fontawesome" data-key="t-font-awesome">Font Awesome 5</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-map-alt nav-icon"></i>
                        <span class="menu-item" data-key="t-maps">Maps</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="maps-google" data-key="t-google">Google</a></li>
                        <li><a href="maps-vector" data-key="t-vector">Vector</a></li>
                        <li><a href="maps-leaflet" data-key="t-leaflet">Leaflet</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-share-alt nav-icon"></i>
                        <span class="menu-item" data-key="t-multi-level">Multi Level</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="javascript: void(0);" data-key="t-level-1.1">Level 1.1</a></li>
                        <li><a href="javascript: void(0);" class="has-arrow" data-key="t-level-1.2">Level 1.2</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="javascript: void(0);" data-key="t-level-2.1">Level 2.1</a></li>
                                <li><a href="javascript: void(0);" data-key="t-level-2.2">Level 2.2</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->