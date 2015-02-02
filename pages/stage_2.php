<?php
//  Stage 2 - The Converter
//
//
$start_2 = microtime(true);

require_once "../../../include/db.php";
require_once "../../../include/general.php";
require_once "../../../include/authenticate.php";
require_once "../../../include/resource_functions.php";
require_once "../include/ocrstream_functions.php";
spl_autoload_register(function ($class) {
include '../lib/Process/' . $class . '.php';
});

$param_1 = filter_input(INPUT_GET, 'param_1');
$im_preset_1_crop_w = filter_input(INPUT_GET, 'w');
$im_preset_1_crop_h = filter_input(INPUT_GET, 'h');
$im_preset_1_crop_x = filter_input(INPUT_GET, 'x');
$im_preset_1_crop_y = filter_input(INPUT_GET, 'y');
$ID = filter_input(INPUT_GET, 'ref', FILTER_VALIDATE_INT);

if (is_session_started() === FALSE) {
    session_start();
}

if ($_SESSION["ocr_stage_" . $ID] !== 1) {
    session_unset();
    exit(json_encode(array("error" => $lang['ocr_error_stage_1'])));
}

global $imagemagick_path;

// Get original file extension from stage 1
$ext = $_SESSION['ocr_file_extension_' . $ID];

// Build IM-Preset Array
$im_preset_1 = build_im_preset_1 ($im_preset_1_crop_w, $im_preset_1_crop_h, $im_preset_1_crop_x, $im_preset_1_crop_y);

// Create intermediate image(s) for OCR
$ocr_temp_dir = get_ocr_temp_dir();
$_SESSION['ocr_temp_dir'] = $ocr_temp_dir;

// Image processing with Preset 1 settings
if ($param_1 === 'pre_1' || $_SESSION["ocr_force_processing_" . $ID] === 1) {
    ocr_image_processing ($ID, $im_preset_1, $ocr_temp_dir);
    // Check if temp image(s) were created
    if (!file_exists($ocr_temp_dir . '/im_tempfile_' . $ID . '.jpg') && !file_exists($ocr_temp_dir . '/im_tempfile_' . $ID . '-0.jpg')) {
        session_unset();
        exit(json_encode(array("error" => $lang['ocr_error_6'])));
    }
    $_SESSION["ocr_stage_" . $ID] = 2;
    // Measure execution time for stage 2
    $elapsed_2 = round((microtime(true) - $start_2), 3);
    $_SESSION["ocr_stage_2_time"] = $elapsed_2;
    $debug = ('OCR Stage ' . $_SESSION["ocr_stage_" . $ID] . '/4 completed: ' . $ID . ' ext: ' . $ext . ' im_preset: ' . $param_1 . ' Time: ' . $elapsed_2);
} else {
    $_SESSION["ocr_stage_" . $ID] = 2;
    // Measure execution time for stage 2
    $elapsed_2 = round((microtime(true) - $start_2), 3);
    $_SESSION["ocr_stage_2_time"] = $elapsed_2;
    $debug = ('OCR Stage ' . $_SESSION["ocr_stage_" . $ID] . '/4 skipped: ' . $ID . ' im_preset: ' . $param_1 . ' Time: ' . $elapsed_2);
}

echo json_encode(array($ID, $debug));