<div class="wrapper">
    <!-- sidebar -->
    <?php 
        include(APPPATH . 'Modules/Admin/Views/templates/sidebar.php');
    ?>

    <div id="content">
        <div class="site-header px-3">
            <!-- navbar -->
            <?php 
                include(APPPATH . 'Modules/Admin/Views/templates/navbar.php');
            ?>
            <div class="container">
                <div class="mt-5">
                    <div class="text-banner">
                        <h3>File Manager</h3>
                        <?php 
                            include(APPPATH . 'Modules/Admin/Views/templates/text-banner.php');
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div id="dashboard" class="mx-2">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <nav id="breadcrumb-fmanager">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><small class="fw-bold">PATH:</small></li>
                                <li class="breadcrumb-item active"  aria-current="page">
                                    <a href="filemanager">Home</a>
                                </li>
                                <?php
                                   $filemanagerLink = 'filemanager?open=';
                                   $arr = explode('/', $current_path);
                                   if (!empty($arr)) {
                                       $totalPaths = count($arr);
                                       foreach ($arr as $key => $path) {
                                           $filemanagerLink .= $path . '/';
                                           $isLastPath = ($key + 1) === $totalPaths;                                           
                                           if ($isLastPath) {
                                               $filemanagerLink = rtrim($filemanagerLink, '/');
                                           }
                                           echo '
                                           <li class="breadcrumb-item active"  aria-current="page">
                                               <a href="'.$filemanagerLink.'">'.$path.'</a>
                                           </li>
                                           ';
                                       }
                                   }                                   
                                   
                                ?>
                            </ol>
                        </nav>
                        <p class="mb-0"><small><span class="fw-bold">IP Address:</span> <?php echo request()->getIPAddress(); ?></small></p>
                        <p class="mb-0"><small><span class="fw-bold">User Agent:</span> <?php echo request()->getUserAgent(); ?></small></p>
                    </div>
                    <div class="card-body pb-5">
                    <?php 
                        if(isset($display['type']) && $display['type'] == 'openFile') {
                            
                        }
                    ?>
                        <div class="row" id="filemanager">
                            <?php 
                                if(!empty($display) && is_array($display)) {
                                    if(!isset($display[0]['error'])) {

                                        foreach($display as $key => $value) {
                                            if(is_array($value)) {
                                                format_filemanager($value['key'], $value);
                                            } 
                                        }
    
                                        if(isset($display['type']) && $display['type'] == 'openFile') {
                                            if($display['ext'] === 'image') {
                                                echo '<img src="'.$display['path'].'" class="fmanager-image-preview">';
                                            } else {
                                                $removedwhiteSpace = rtrim($display['content']);
                                                echo '
                                                <div class="editor-container">
                                                    <div id="editor">'.$removedwhiteSpace.'</div>
                                                </div>
                                                ';
                                            }
                                        }
                                    } else {
                                        echo '
                                        <div class="col-12 mt-3">
                                            <div>
                                                <i class="bx bx-error-circle"></i>
                                                <span>'.$display[0]['message'].'</span>
                                            </div>  
                                        </div>
                                    ';
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
    if(isset($display['ext'])) {
        $mode = $display['ext'];
    } else {
        $mode = 'text';
    }
?>

<script>
    let editor = document.querySelector("#editor");
    ace.edit(editor, {
        theme: "ace/theme/nord_dark",
        mode: "ace/mode/<?php echo $mode; ?>",
        autoScrollEditorIntoView: true,
        enableBasicAutocompletion: true,
        enableSnippets: true,
        highlightActiveLine: true,
        enableLiveAutocompletion: true
    });


</script>