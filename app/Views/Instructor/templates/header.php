<?php
    $uri = request()->uri->getPath();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Marketplace for Bootstrap Admin Dashboards" />
    <meta name="author" content="Bootstrap Gallery" />
    <link rel="canonical" href="https://www.bootstrap.gallery/">
    <meta property="og:url" content="https://www.bootstrap.gallery">
    <meta property="og:title" content="Admin Templates - Dashboard Templates | Bootstrap Gallery">
    <meta property="og:description" content="Marketplace for Bootstrap Admin Dashboards">
    <meta property="og:type" content="Website">
    <meta property="og:site_name" content="Bootstrap Gallery">
    <title><?php echo ucwords($title); ?></title>
    
    <?php 
    if($uri == '/instructor/login') {
        echo '
        <link rel="shortcut icon" href="/assets/template/images/favicon.svg" />
		<link rel="stylesheet" href="/assets/template/fonts/bootstrap/bootstrap-icons.css" />
		<link rel="stylesheet" href="/assets/template/css/main.css" />
        <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.31/sweetalert2.min.css" integrity="sha512-IScV5kvJo+TIPbxENerxZcEpu9VrLUGh1qYWv6Z9aylhxWE4k4Fch3CHl0IYYmN+jrnWQBPlpoTVoWfSMakoKA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dompurify/3.0.6/purify.min.js" integrity="sha512-H+rglffZ6f5gF7UJgvH4Naa+fGCgjrHKMgoFOGmcPTRwR6oILo5R+gtzNrpDp7iMV3udbymBVjkeZGNz1Em4rQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.31/sweetalert2.min.js" integrity="sha512-dbgWBkIauIf3iy96dqgzBD9ysKHp7mAuym+V7AqaNIuICxDBVm6nzvl1Yi+rdfnh25SdmYDw2JbFk/FOXf6Ycg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script type="module" src="/assets/js/instructor/login.js"></script>
    ';
    } else {
    echo '
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script> 

        <link rel="shortcut icon" href="/assets/template/images/favicon.svg" />
        <link rel="stylesheet" href="/assets/template/fonts/bootstrap/bootstrap-icons.css" />
        <link rel="stylesheet" href="/assets/template/css/main.css" />
        <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.31/sweetalert2.min.css" integrity="sha512-IScV5kvJo+TIPbxENerxZcEpu9VrLUGh1qYWv6Z9aylhxWE4k4Fch3CHl0IYYmN+jrnWQBPlpoTVoWfSMakoKA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link href="https://cdn.quilljs.com/1.2.6/quill.snow.css" rel="stylesheet">


        <!-- Scrollbar CSS -->
		<link rel="stylesheet" href="/assets/template/vendor/overlay-scroll/OverlayScrollbars.min.css" />

		<!-- Toastify CSS -->
		<link rel="stylesheet" href="/assets/template/vendor/toastify/toastify.css" />
        <link rel="stylesheet" href="/assets/template/css/custom.css "/>

        <script type="text/javascript" src="/assets/template/js/ckeditor.js"></script>
        
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.5.3/ace.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.31/sweetalert2.min.js" integrity="sha512-dbgWBkIauIf3iy96dqgzBD9ysKHp7mAuym+V7AqaNIuICxDBVm6nzvl1Yi+rdfnh25SdmYDw2JbFk/FOXf6Ycg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dompurify/3.0.6/purify.min.js" integrity="sha512-H+rglffZ6f5gF7UJgvH4Naa+fGCgjrHKMgoFOGmcPTRwR6oILo5R+gtzNrpDp7iMV3udbymBVjkeZGNz1Em4rQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script type="module" src="/assets/js/instructor/app.js"></script>
        <script type="module" src="/assets/js/instructor/instructor.js"></script>
    ';
    }

    ?>    
</head>
<body>
