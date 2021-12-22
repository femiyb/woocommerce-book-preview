<?php ?>
<div id="wbps_woo_options" class="panel woocommerce_options_panel">
            <div style="width: 100%; height: auto;">
				<?php
woocommerce_wp_text_input(
  array(
    'id'          => 'wbps_preview_content_author',
    'label'       => __( 'Author', 'wbps' ),
    'desc_tip'    => 'true',
    'description' => __( 'Insert any text that .', 'wbps' ),
  )
  );

woocommerce_wp_text_input(
    array(
      'id'          => 'wbps_preview_year_publication',
      'label'       => __( 'Year of Publication', 'wbps' ),
      'desc_tip'    => 'true',
      'description' => __( 'Insert any text that .', 'wbps' ),
    )
    );

woocommerce_wp_textarea_input(
					array(
						'id'          => 'wbps-preview-text-content',
						'label'       => __( 'Book Preview Content', 'wbps' ),
						'desc_tip'    => 'true',
						'description' => __( 'Insert any text that .', 'wbps' ),
					)
				);
				?>
                <script type="text/javascript">
                    
                jQuery(document).ready(function() {

                if ( typeof( tinyMCE ) == "object") {
                tinyMCE.init({
                selector: '#wbps-preview-text-content',
                height: 650,
                skin: "snow",   
                branding: false,
                menubar: 'file edit view',
                plugins: ['lists link image', 'fullscreen','media'],
              
                toolbar1: 'fontselect | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | insertfile link image media',
                image_title: false,
                automatic_uploads: true,
                file_picker_types: 'image file ',
                file_picker_callback: function (cb, value, meta) {
                  var input = document.createElement('input');
                  input.setAttribute('type', 'file');
                  input.setAttribute('accept', 'image/*');
                input.onchange = function () {
                  var file = this.files[0];
                  var reader = new FileReader();
                  reader.onload = function () {
                    var id = 'blobid' + (new Date()).getTime();
                    var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                    var base64 = reader.result.split(',')[1];
                    var blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);
                    cb(blobInfo.blobUri(), { title: file.name });
                  };
                  reader.readAsDataURL(file);
                };
                input.click();
              },
              content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
                        });
                    }
                    
                });
                </script>
            </div>
    </div>