<?php
#
# English Language File for the ResourceSpace plugin ocrstream
#
$lang['ocrstream_title'] = 'OCR Stream';
$lang['ocrstream_intro']='OCR Stream Plugin Configuration';
$lang['ocrstream_language_select'] = 'Standard language for text recognition (only installed laguages are displayed).';
$lang['tesseract_path_info'] = 'Path to tesseract-ocr:';
$lang['ocr_single_resource'] = 'OCR processing';
$lang['ocr_start'] = 'Start OCR';
$lang['tesseract_path_input'] = '<p style="color:red"><b>Tesseract-ocr not found, please specify path to tesseract-ocr executable. Reload page after saving configuration!</b></p>';
$lang['tesseract_old_version_info'] = 'Please update tesseract to minimum version 3.03 for best performance and extended functionality.';
$lang['ocr_input_formats'] = 'Allowed filetypes:';
$lang['ocr_psm'] = 'Tesseract page segmentation mode';
$lang['ocr_ftype_1'] = 'Select field the extracted text should be written to:';
$lang['ocr_db_filter'] = 'Filter text before writing to DB.';
$lang['ocr_db_filter_help'] = 'If enabled numbers and special characters will be removed for better keywording.';
$lang['ocr_min_density'] = 'Minimum image density for OCR processing (dpi/ppi)';
$lang['ocr_max_density'] = 'Maximum image density for OCR processing (dpi/ppi)';
$lang['ocr_max_density_help'] = 'Images with density above that value will be processed before doing OCR.';
$lang['ocr_min_geometry'] = 'Minimum image geometry (px)';
$lang['ocr_min_geometry_help'] = 'Sets the minimum size of the shortest side for images to be OCR-processed.';
$lang['ocr_max_geometry'] = 'Maximum image geometry (px)';
$lang['ocr_max_geometry_help'] = 'Sets the maximum size of the shortest side for images, if it exceeds the value the image will processed with settings below.';
$lang["ocr_language_select"] = 'Language for text recognition';
$lang["ocr_parameter_select"] = 'Parameter 1';
$lang["ocr_error_1"] = 'Error: No valid Resource ID!.';
$lang["ocr_error_2"] = 'Error: Resource filetype is not allowed for OCR processing.';
$lang["ocr_error_3"] = 'Error: Image density (dpi/ppi) too low for OCR processing.';
$lang["ocr_error_4"] = 'Error: Wrong resourcetype. OCR is only allowed for type Document.';
$lang["ocr_error_5"] = 'Error: Image width (px) too low for OCR processing.';
$lang["ocr_error_6"] = 'Error: No temp files were created in stage 2 (image processing).';
$lang["ocr_error_7"] = 'Error: No temp files were created in stage 3 (text recognition).';
$lang["ocr_error_stage_1"] = 'Error: Something went wrong. Stage 1 did not complete.';
$lang["ocr_error_stage_2"] = 'Error: Something went wrong. Stage 2 did not complete.';
$lang["ocr_error_stage_3"] = 'Error: Something went wrong. Stage 3 did not complete.';
$lang['im_processing_header'] = '<div id= "im_processing_headerDIV">Image processing settings</div>';
$lang['im_processing_help'] = 'Some resources need addtional image processing before doing the OCR. <br> A temporary file will be created, the original resource will not be changed. <br> You can adjust the settings for this process here.';
$lang['im_preset_density'] = 'Density (-density [dpi])';
$lang['im_preset_density_help'] = 'Sets the density of the temporary image for OCR processing. <br> Lower values can speed up processing but results can get worse.';
$lang['im_preset_geometry'] = 'Size (-geometry [px])';
$lang['im_preset_geometry_help'] = 'Sets maximum width of the temporary image. <br> Very high values can slow down processing.';
$lang['im_preset_quality'] = 'Quality (-quality [Value])';
$lang['im_preset_quality_help'] = 'Sets the zlib compression level and filter-type for the PNG image format. <br> Values 0-100, default PNG quality is 75. Higher Values can produce better results at cost of processing time.';
$lang['im_preset_deskew'] = 'Straighten (-deskew [%])';
$lang['im_preset_deskew_help'] = 'Straighten an image. Works poor at angles > 5%. <br> A threshold of 40% works for most images.';
$lang['im_preset_sharpen_r'] = 'Sharpen radius <br> (-sharpen [radius]x[sigma])';
$lang['im_preset_sharpen_r_help'] = 'Sets the radius of the Gaussian operator.';
$lang['im_preset_sharpen_s'] = 'Sharpen sigma <br> (-sharpen [radius]x[sigma])';
$lang['im_preset_sharpen_s_help'] = 'Sets the standard deviation of the Gaussian operator. Default is 1.';
$lang["im_preset_select"] = 'Image processing';
$lang["ocr-upload-options"] = 'OCR Options';
$lang['ocr_cronjob'] = 'Set cronjob for OCR processing.';
$lang['ocr_cronjob_help'] = 'Marked resources (ocr_state = 1) will processed with default settings.';
$lang["ocr_upload_cronjob"] = 'Set cronjob with global OCR settings';
$lang['ocronjob_enabled'] = 'Cronjob enabled';
$lang['ocr_in_progress'] = 'OCR in progress...';
?>
