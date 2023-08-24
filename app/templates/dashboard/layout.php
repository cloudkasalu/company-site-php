<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="/css/dashboard.css" rel="stylesheet">
    <script defer src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
    <script defer src="/js/dashboard.js"></script>
</head>
<body>
    <main id="dashboard">
        <nav id="mainNav">
            <div class="dashboard-brand">
                <img src="/images/logo.svg" alt="logo">
                <button class="btn btn-none nav-toggler toggle-close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M6.4 19L5 17.6l5.6-5.6L5 6.4L6.4 5l5.6 5.6L17.6 5L19 6.4L13.4 12l5.6 5.6l-1.4 1.4l-5.6-5.6L6.4 19Z"/></svg>
                </button>
            </div>
            <div class="navbar">
                <ul class="dashboard-nav-list">
                    <li class="dashboard-nav-item">
                        <a href="/dashboard" class="icon-content link" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M3 11V3h8v8H3Zm0 10v-8h8v8H3Zm10-10V3h8v8h-8Zm0 10v-8h8v8h-8ZM5 9h4V5H5v4Zm10 0h4V5h-4v4Zm0 10h4v-4h-4v4ZM5 19h4v-4H5v4ZM15 9Zm0 6Zm-6 0Zm0-6Z"/></svg>
                        Dashboard
                        </a>
                    </li>
                    <li class="dashboard-nav-item dropdown">
                        <button class="dropdown-button btn btn-none" aria-expanded="false">
                            <span class="dropdown-icon-left icon-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21 16.5c0 .38-.21.71-.53.88l-7.9 4.44c-.16.12-.36.18-.57.18c-.21 0-.41-.06-.57-.18l-7.9-4.44A.991.991 0 0 1 3 16.5v-9c0-.38.21-.71.53-.88l7.9-4.44c.16-.12.36-.18.57-.18c.21 0 .41.06.57.18l7.9 4.44c.32.17.53.5.53.88v9M12 4.15L6.04 7.5L12 10.85l5.96-3.35L12 4.15M5 15.91l6 3.38v-6.71L5 9.21v6.7m14 0v-6.7l-6 3.37v6.71l6-3.38Z"/></svg>
                                CMS
                            </span>
                            <span class="dropdown-icon-right dropdown-icon icon-content">
                               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16.293 9.293L12 13.586L7.707 9.293l-1.414 1.414L12 16.414l5.707-5.707z"/></svg>
                            </span>
                        </button>
                        <ul class="pages-list dropdown-menu">
                            <li><a href="<?php echo ROOT_DASHBOARD ?>/pages">Pages</a></li>
                        </ul>
                    </li>
                    <li class="dashboard-nav-item dropdown">
                        <button class="dropdown-button btn btn-none" aria-expanded="false">
                            <span class="dropdown-icon-left icon-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M10 20H6V4h7v5h5v3.1l2-2V8l-6-6H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h4v-2m10.2-7c.1 0 .3.1.4.2l1.3 1.3c.2.2.2.6 0 .8l-1 1l-2.1-2.1l1-1c.1-.1.2-.2.4-.2m0 3.9L14.1 23H12v-2.1l6.1-6.1l2.1 2.1Z"/></svg>
                                Blog
                            </span>
                            <span class="dropdown-icon-right dropdown-icon icon-content">
                               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16.293 9.293L12 13.586L7.707 9.293l-1.414 1.414L12 16.414l5.707-5.707z"/></svg>
                            </span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo ROOT_DASHBOARD ?>/blogs">Blogs</a></li>
                            <li><a href="<?php echo ROOT_DASHBOARD ?>/categories">Categories</a></li>
                        </ul>
                    </li>
                    <li class="dashboard-nav-item dropdown">
                        <button class="dropdown-button btn btn-none" aria-expanded="false">
                            <span class="dropdown-icon-left icon-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12 4a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4m0 2a2 2 0 0 0-2 2a2 2 0 0 0 2 2a2 2 0 0 0 2-2a2 2 0 0 0-2-2m0 7c2.67 0 8 1.33 8 4v3H4v-3c0-2.67 5.33-4 8-4m0 1.9c-2.97 0-6.1 1.46-6.1 2.1v1.1h12.2V17c0-.64-3.13-2.1-6.1-2.1Z"/></svg>
                                User
                            </span>
                            <span class="dropdown-icon-right dropdown-icon icon-content">
                               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16.293 9.293L12 13.586L7.707 9.293l-1.414 1.414L12 16.414l5.707-5.707z"/></svg>
                            </span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo ROOT_DASHBOARD ?>/users">Users</a></li>
                            <li><a href="<?php echo ROOT_DASHBOARD ?>/groups">Groups</a></li>
                        </ul>
                    </li>
                    <!-- <li class="dashboard-nav-item"><a class="icon-content link" href="dasboard/blog"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m7 17.013l4.413-.015l9.632-9.54c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.756-.756-2.075-.752-2.825-.003L7 12.583v4.43zM18.045 4.458l1.589 1.583l-1.597 1.582l-1.586-1.585l1.594-1.58zM9 13.417l6.03-5.973l1.586 1.586l-6.029 5.971L9 15.006v-1.589z"/><path fill="currentColor" d="M5 21h14c1.103 0 2-.897 2-2v-8.668l-2 2V19H8.158c-.026 0-.053.01-.079.01c-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2z"/></svg>Blog</a></li> -->
                    <!-- <li class="dashboard-nav-item"><a href="/dashboard/team"  class="icon-content link"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12 11a5 5 0 0 1 5 5v6h-2v-6a3 3 0 0 0-2.824-2.995L12 13a3 3 0 0 0-2.995 2.824L9 16v6H7v-6a5 5 0 0 1 5-5Zm-6.5 3c.279 0 .55.033.81.094a5.948 5.948 0 0 0-.301 1.575L6 16v.086a1.493 1.493 0 0 0-.356-.08L5.5 16a1.5 1.5 0 0 0-1.493 1.355L4 17.5V22H2v-4.5A3.5 3.5 0 0 1 5.5 14Zm13 0a3.5 3.5 0 0 1 3.5 3.5V22h-2v-4.5a1.5 1.5 0 0 0-1.355-1.493L18.5 16c-.175 0-.343.03-.5.085V16c0-.666-.108-1.306-.308-1.904c.258-.063.53-.096.808-.096Zm-13-6a2.5 2.5 0 1 1 0 5a2.5 2.5 0 0 1 0-5Zm13 0a2.5 2.5 0 1 1 0 5a2.5 2.5 0 0 1 0-5Zm-13 2a.5.5 0 1 0 0 1a.5.5 0 0 0 0-1Zm13 0a.5.5 0 1 0 0 1a.5.5 0 0 0 0-1ZM12 2a4 4 0 1 1 0 8a4 4 0 0 1 0-8Zm0 2a2 2 0 1 0 0 4a2 2 0 0 0 0-4Z"/></svg>Team</a></li> -->
                </ul>
                <div class="nav-bottom">
                    <a href="/dashboard/login/logout" class="icon-content">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m17 8l-1.4 1.4l1.6 1.6H9v2h8.2l-1.6 1.6L17 16l4-4l-4-4M5 5h7V3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h7v-2H5V5Z"/></svg>
                        Logout
                    </a> 
                </div>
            </div>
        </nav>
        <section class="main-section">
            <header class="main-section-header">
            <button class="btn btn-none nav-toggler toggle-open">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M3 18v-2h18v2H3Zm0-5v-2h18v2H3Zm0-5V6h18v2H3Z"/></svg>
            </button>
            <div class="content-header"><h3><?=$title?></h3> </div>
            <div class="user-profile">
                <div class="user-profile-image">
                    <div class="image-container">
                        <img src="/images/avatar.png" alt="">
                    </div>
                </div>
                <span class="user-name">Admin</span>
            </div>
            </header>
            <section class="content"> 
                <?php echo $output ?>
             </section>
        </section>
    </main>
</body>
</html>