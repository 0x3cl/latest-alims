<div class="wrapper">
    <!-- sidebar -->
    <?php 
        include(APPPATH . 'Views/Admin/templates/sidebar.php');
    ?>

    <div id="content">
        <div class="site-header px-3">
            <!-- navbar -->
            <?php 
                include(APPPATH . 'Views/Admin/templates/navbar.php');
            ?>
            <div class="container">
                <div class="mt-5">
                    <div class="text-banner">
                        <h3>File Manager</h3>
                        <?php 
                            include(APPPATH . 'Views/Admin/templates/text-banner.php');
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
                                <?php
                                   $filemanagerLink = 'filemanager?open=';
                                   $arr = explode('/', $requested_data['current_path']);
                                   unset($arr[0]);
                                   if (!empty($arr)) {
                                        echo  '
                                        <li class="breadcrumb-item active" aria-current="page">
                                            <a href="filemanager">HOME</a>
                                        </li>
                                        ';
                                       foreach ($arr as $key  => $path) {
                                            
                                            $filemanagerLink .= 'uploads/'.$path;
                                            echo '
                                            <li class="breadcrumb-item active"  aria-current="page">
                                               <a href="'.$filemanagerLink.'">'.strtoupper($path).'</a>
                                            </li>
                                           ';
                                       }
                                    } else {
                                        echo '
                                        <li class="breadcrumb-item active" aria-current="page">
                                            <a href="filemanager">HOME</a>
                                        </li>
                                        ';
                                    }                          
                                   
                                ?>
                            </ol>
                        </nav>
                        <p class="mb-0"><small><span class="fw-bold">IP Address:</span> <?php echo request()->getIPAddress(); ?></small></p>
                        <p class="mb-0"><small><span class="fw-bold">User Agent:</span> <?php echo request()->getUserAgent(); ?></small></p>
                    </div>
                    <div class="card-body pb-5">
                    <?php 
                        if(isset(($requested_data['display'])['type']) && $requested_data['display']['type'] == 'openFile') {
                            
                        }
                    ?>
                        <div class="row" id="filemanager">
                            <?php 
                                if(!empty(($requested_data['display'])) && is_array(($requested_data['display']))) {
                                    if(!isset(($requested_data['display'])[0]['error'])) {

                                        foreach(($requested_data['display']) as $key => $value) {
                                            if(is_array($value)) {
                                                format_filemanager($value['key'], $value);
                                            } 
                                        }
    
                                        if(isset(($requested_data['display'])['type']) && $requested_data['display']['type'] == 'openFile') {
                                            if(($requested_data['display'])['ext'] === 'image') {
                                                echo '<img src="/'.$requested_data['display']['path'].'" class="fmanager-image-preview">';
                                            } else {
                                                $removedwhiteSpace = rtrim(($requested_data['display'])['content']);
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
                                                <span>'.$requested_data['display'][0]['message'].'</span>
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
    if(isset(($requested_data['display'])['ext'])) {
        $mode = $requested_data['display']['ext'];
    } else {
        $mode = 'text';
    }
?>

<script>
    const div = document.querySelector("#editor");
    const editor = ace.edit(div, {
        theme: "ace/theme/nord_dark",
        mode: "ace/mode/<?php echo $mode; ?>",
        autoScrollEditorIntoView: true,
        enableBasicAutocompletion: true,
        enableSnippets: true,
        highlightActiveLine: true,
        enableLiveAutocompletion: true
    });

    editor.setReadOnly(true);



</script>