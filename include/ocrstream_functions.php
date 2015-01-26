<?php
global $lang;
/**
 * Checks if OS is Windows
 * 
 * @return boolean
 */
function is_windows() {
    $os = php_uname('s');
    if (stristr($os, 'win')) {
        if (stristr($os, 'Darwin')) {
            $is_windows = false;
        } else {
            $is_windows = true;
        }
    } else {
        $is_windows = false;
    }
    return $is_windows;
}

/**
 * Get path to tesseract executable
 * 
 * @global string $tesseract_path Tesseract directory path
 * @return string
 */
function get_tesseract_fullpath() {
    global $tesseract_path;
    if (is_windows()) {
        $tesseract_fullpath = $tesseract_path . '\tesseract.exe';
    } else {
        $tesseract_fullpath = $tesseract_path . '/tesseract';
    }
    return $tesseract_fullpath;
}

/**
 * Checks if tesseract executable exists
 * 
 * @return boolean 
 */
function is_tesseract_installed() {
    $tesseract_fullpath = get_tesseract_fullpath();
    if (file_exists($tesseract_fullpath)) {
        $tesseract_installed = true;
    } else {
        $tesseract_installed = false;
    }
    return $tesseract_installed;
}

/**
 * Get tesseract version
 * 
 * @return string Tesseract version output string
 */
function get_tesseract_version() {
    $tesseract_fullpath = get_tesseract_fullpath();
    $tesseract_version_command = shell_exec($tesseract_fullpath . ' -v 2>&1');
    $tesseract_version_output = explode("\n", $tesseract_version_command);
    if (stristr($tesseract_version_output [0], 'libtiff.so.5')) { // Skipping error output in first line if libftiff/liblept version mismatch
        $tesseract_version = $tesseract_version_output[1];
    } else {
        $tesseract_version = $tesseract_version_output[0];
    }
    return $tesseract_version;
}

/**
 * Get leptonica version
 * 
 * @return string Leptonica version output string
 * @todo remove if not needed
 */
function get_leptonica_version() {
    $tesseract_fullpath = get_tesseract_fullpath();
    $tesseract_version_command = shell_exec($tesseract_fullpath . ' -v 2>&1');
    $tesseract_version_output = explode("\n", $tesseract_version_command);
    if (stristr($tesseract_version_output [0], 'libtiff.so.5')) { // Skipping error output in first line if libftiff/liblept version mismatch
        $leptonica_version = $tesseract_version_output[2];
    } else {
        $leptonica_version = $tesseract_version_output[1];
    }
    return $leptonica_version;
}

/**
 * Get available language for tesseract ocr
 * 
 * Returns an array of languages that are currently installed into the /TESSDATA directory.
 * Language codes use ISO 639-2 standard.
 * 
 * @link https://code.google.com/p/tesseract-ocr/downloads/list tesseract language data downloads
 * @return array 
 */
function get_tesseract_languages() {
    $tesseract_fullpath = get_tesseract_fullpath();
    $tesseract_language_command = shell_exec($tesseract_fullpath . ' --list-langs 2>&1');
    $tesseract_languages = explode("\n", $tesseract_language_command);
    if (stristr($tesseract_languages [0], 'libtiff.so.5')) { // Skipping additional line if libftiff version does not match liblept version
        array_shift($tesseract_languages);
        array_shift($tesseract_languages);
        array_pop($tesseract_languages);
    } else {
        array_shift($tesseract_languages); // Skipping first line output ("Available languages...")
        array_pop($tesseract_languages); // Skipping last line (empty)
    }
    return $tesseract_languages;
}

/**
 * Check if tesseract version is old
 * 
 * Version 3.0.3 of tesseract includes many improvements and optimizations.
 * Older Versions do not support image input via textfile (list of imagepaths) for multipage processing and don't support pdf output.
 * 
 * @return boolean
 */
function tesseract_version_is_old() {
    $tesseract_version = get_tesseract_version();
    if (substr($tesseract_version, 10, 1) < 3) {
        $tesseract_version_is_old = true;
    } else {
        if (substr($tesseract_version, 13, 1) < 3) {
            $tesseract_version_is_old = true;
        } else {
            $tesseract_version_is_old = false;
        }
    }
    return $tesseract_version_is_old;
}

/**
 * Check if PHP Session is started
 * 
 * @return boolean
 */
function is_session_started()
{
    if ( php_sapi_name() !== 'cli' ) {
        if ( version_compare(phpversion(), '5.4.0', '>=') ) {
            return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
        } else {
            return session_id() === '' ? FALSE : TRUE;
        }
    }
    return FALSE;
}

/**
 * Get the file extension from the original resource file
 * 
 * @param int $ref
 * @return string file extension
 */
function get_file_extension ($ref) {
    $ext = sql_value("select file_extension value from resource where ref = '$ref'", '');
    return $ext;
}

/**
 * Check if Resource ID is valid INTEGER and exists in database
 * 
 * @param int $ID
 * @return boolean
 */
function is_resource_id_valid ($ID) {
    if ($ID == null || $ID < 1 || $ID > sql_value("SELECT ref value FROM resource ORDER BY ref DESC LIMIT 1", '')) {
    session_unset();
    return false;
    } else {
    return true;
    }
}

/**
 * Get Image density
 * 
 * @global string $imagemagick_path
 * @param string $resource_path
 * @return mixed Density value
 */
function get_image_density ($resource_path) {
    global $imagemagick_path;
    $density = run_command($imagemagick_path . '/convert -format %y ' . $resource_path . ' info:');
    return $density;
}

/**
 * Get image geometry
 * 
 * @param int $ID
 * @return int Image geometry
 */
function get_image_geometry ($ID) {
    $geometry = sql_value("SELECT width value FROM resource_dimensions WHERE resource ='$ID'", '');
    return $geometry;
}

/**
 * Get Resource Type
 * 
 * @param int $ID
 * @return int Resource type
 */
function get_res_type ($ID) {
    $res_type = sql_value("select resource_type value from resource where ref ='$ID'", '');
    return $res_type;
}