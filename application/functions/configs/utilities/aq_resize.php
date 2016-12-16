<?php

/**
 * Title         : Aqua Resizer
 * Description   : Resizes WordPress images on the fly
 * Version       : 1.2.0
 * Author        : Syamil MJ
 * Author URI    : http://aquagraphite.com
 * License       : WTFPL - http://sam.zoy.org/wtfpl/
 * Documentation : https://github.com/sy4mil/Aqua-Resizer/
 *
 * @param string  $url      - (required) must be uploaded using wp media uploader
 * @param int     $width    - (required)
 * @param int     $height   - (optional)
 * @param bool    $crop     - (optional) default to soft crop
 * @param bool    $single   - (optional) returns an array if false
 * @param bool    $upscale  - (optional) resizes smaller images
 * @uses  wp_upload_dir()
 * @uses  image_resize_dimensions()
 * @uses  wp_get_image_editor()
 *
 * @return str|array
 */

if (!class_exists('Aq_Resize')) {
    class Aq_Exception extends Exception {}

    class Aq_Resize {
        /**
         * The singleton instance
         */
        static private $instance = null;

        /**
         * Should an Aq_Exception be thrown on error?
         * If false (default), then the error will just be logged.
         */
        public $throwOnError = false;

        /**
         * No initialization allowed
         */
        private function __construct() {}

        /**
         * No cloning allowed
         */
        private function __clone() {}

        /**
         * For your custom default usage you may want to initialize an Aq_Resize object by yourself and then have own defaults
         */
        static public function getInstance() {
            if(self::$instance == null) {
                self::$instance = new self;
            }

            return self::$instance;
        }

        /**
         * Run, forest.
         */
        public function process( $url, $width = null, $height = null, $crop = null, $single = true, $upscale = false, $zoom = false, $blog_id=null) {
            try {
                // Validate inputs.
                if (!$url)
                    throw new Aq_Exception('$url parameter is required');
                if (!$width)
                    throw new Aq_Exception('$width parameter is required');
                if (!$height)
                    throw new Aq_Exception('$height parameter is required');

                // Caipt'n, ready to hook.
                if ( true === $upscale) add_filter( 'image_resize_dimensions', array($this, 'aq_upscale'), 10, 6);

                // Define upload path & dir.
                if ($blog_id != null) switch_to_blog($blog_id);
                $upload_info = wp_upload_dir();
                if ($blog_id != null) restore_current_blog();
                $upload_dir = $upload_info['basedir'];
                $upload_url = $upload_info['baseurl'];
                if ($blog_id != null) $upload_url = get_blog_upload_url($blog_id);

                $http_prefix = "http://";
                $https_prefix = "https://";
                $relative_prefix = "//"; // The protocol-relative URL

                /* if the $url scheme differs from $upload_url scheme, make them match
                   if the schemes differe, images don't show up. */
                if (!strncmp($url, $https_prefix, strlen($https_prefix))) { //if url begins with https:// make $upload_url begin with https:// as well
                    $upload_url = str_replace($http_prefix, $https_prefix, $upload_url);
                } elseif (!strncmp($url, $http_prefix, strlen($http_prefix))) { //if url begins with http:// make $upload_url begin with http:// as well
                    $upload_url = str_replace($https_prefix, $http_prefix, $upload_url);
                } elseif (!strncmp($url, $relative_prefix, strlen($relative_prefix))) { //if url begins with // make $upload_url begin with // as well
                    $upload_url = str_replace(array( 0 => "$http_prefix",  1 => "$https_prefix"), $relative_prefix,$upload_url);
                }

                // Check if $img_url is local.
                if ( false === strpos( $url, $upload_url))
                    throw new Aq_Exception('Image must be local: ' . $url);

                // Define path of image.
                $rel_path = str_replace( $upload_url, '', $url);
                $img_path = $upload_dir . $rel_path;

                // Check if img path exists, and is an image indeed.
                if ( ! file_exists( $img_path) or ! getimagesize( $img_path))
                    throw new Aq_Exception('Image file does not exist (or is not an image): ' . $img_path);


                // Get image info.
                $info = pathinfo( $img_path);
                $ext = $info['extension'];
                list( $orig_w, $orig_h) = getimagesize( $img_path);

                if ($zoom){
                    $resize_w = $width;
                    $width = ($height*$orig_w)/$orig_h;
                }

                // Get image size after cropping.
                $dims = image_resize_dimensions( $orig_w, $orig_h, $width, $height, $crop);
                $dst_w = $dims[4];
                $dst_h = $dims[5];

                // Return the original image only if it exactly fits the needed measures.
                if ( ! $dims && ( ( ( null === $height && $orig_w == $width) xor ( null === $width && $orig_h == $height)) xor ( $height == $orig_h && $width == $orig_w))) {
                    $img_url = $url;
                    $dst_w = $orig_w;
                    $dst_h = $orig_h;
                } else {
                    // Use this to check if cropped image already exists, so we can return that instead.
                    $suffix = "{$dst_w}x{$dst_h}";
                    $dst_rel_path = str_replace( '.' . $ext, '', $rel_path);
                    $destfilename = "{$upload_dir}{$dst_rel_path}-{$suffix}.{$ext}";

                    if ( ! $dims || ( true == $crop && false == $upscale && ( $dst_w < $width || $dst_h < $height))) {
                        // Can't resize, so return false saying that the action to do could not be processed as planned.
                        throw new Aq_Exception('Unable to resize image because image_resize_dimensions() failed');
                    }
                    // Else check if cache exists.
                    elseif ( file_exists( $destfilename) && getimagesize( $destfilename)) {
                        $img_url = "{$upload_url}{$dst_rel_path}-{$suffix}.{$ext}";
                    }
                    // Else, we resize the image and return the new resized image url.
                    else {

                        $editor = wp_get_image_editor( $img_path);

                        if ( is_wp_error( $editor) || is_wp_error( $editor->resize( $width, $height, $crop))) {

                            unlink($img_path);

                            throw new Aq_Exception('Unable to get WP_Image_Editor: ' .
                                                   $editor->get_error_message() . ' (is GD or ImageMagick installed?)');
                        }

                        $resized_file = $editor->save();

                        if ( ! is_wp_error( $resized_file)) {
                            $resized_rel_path = str_replace( $upload_dir, '', $resized_file['path']);
                            $img_url = $upload_url . $resized_rel_path;
                        } else {
                            throw new Aq_Exception('Unable to save resized image file: ' . $editor->get_error_message());
                        }

                    }
                }

                // Okay, leave the ship.
                if ( true === $upscale) remove_filter( 'image_resize_dimensions', array( $this, 'aq_upscale'));

                // Return the output.
                if ( $single) {
                    // str return.
                    $image = $img_url;
                } else {
                    // array return.
                    $image = array (
                        0 => $img_url,
                        1 => $dst_w,
                        2 => $dst_h
                   );
                }
                error_log($image);
                // If zoom required
                if ($zoom) {
                    $rel_path = str_replace( $upload_url, '', $image);
                    $img_path = $upload_dir . $rel_path;

                    $info = pathinfo( $img_path);
                    $ext = $info['extension'];
                    list( $orig_w, $orig_h) = getimagesize( $img_path);

                    $width_ratio = round($resize_w / $orig_w, 2);
                    $height_ratio = round($height / $orig_h, 2);

                    if ($width_ratio > $height_ratio){
                        $zoomed_width = round($resize_w / $height_ratio);
                        $zoomed_height = $orig_h;
                    }else{
                        $zoomed_width = $orig_w;
                        $zoomed_height = round($height / $width_ratio);
                    }
                    // wr = 51 / 900 = 0.05
                    // hr = 160 / 900 = 0.1
                    // die();
                    $zoomed_suffix = "zoomed-{$zoomed_width}-{$zoomed_height}";
                    $zoomed_rel_path = str_replace( '.' . $ext, '', $rel_path);
                    $zoomed_img_path = "{$zoomed_rel_path}-{$zoomed_suffix}.{$ext}";
                    $zoomed_filename = "{$upload_dir}{$zoomed_img_path}";
                    $zoomed_filename = str_replace( ' ', '-', $zoomed_filename);

                    if (!file_exists( $zoomed_filename)){
                        switch ($ext) {
                            case 'jpg':
                            case 'jpeg':
                                $new_img = $this->zoom_box(imagecreatefromjpeg($img_path), $zoomed_width, $zoomed_height);
                                imagejpeg($new_img, $zoomed_filename, 100);
                                break;
                            case 'gif':
                                $new_img = $this->zoom_box(imagecreatefromgif($img_path), $zoomed_width, $zoomed_height);
                                imagegif($new_img, $zoomed_filename, 100);
                                break;
                            case 'png':
                                $new_img = $this->zoom_box(imagecreatefrompng($img_path), $zoomed_width, $zoomed_height);
                                imagepng($new_img, $zoomed_filename, 9);
                                break;
                            default:
                                $img = false;
                                break;
                        }
                    }
                    $image = str_replace($upload_dir, $upload_url, $zoomed_filename);
                }

                return $image;
            } catch (Aq_Exception $ex) {
                error_log('Aq_Resize.process() error: ' . $ex->getMessage());

                if ($this->throwOnError) {
                    // Bubble up exception.
                    throw $ex;
                }
                else {
                    // Return false, so that this patch is backwards-compatible.
                    return false;
                }
            }
        }

        /**
         * Callback to overwrite WP computing of thumbnail measures
         */
        function aq_upscale( $default, $orig_w, $orig_h, $dest_w, $dest_h, $crop) {
            if ( ! $crop) return null; // Let the wordpress default function handle this.

            // Here is the point we allow to use larger image size than the original one.
            $aspect_ratio = $orig_w / $orig_h;
            $new_w = $dest_w;
            $new_h = $dest_h;

            if ( ! $new_w) {
                $new_w = intval( $new_h * $aspect_ratio);
            }

            if ( ! $new_h) {
                $new_h = intval( $new_w / $aspect_ratio);
            }

            $size_ratio = max( $new_w / $orig_w, $new_h / $orig_h);

            $crop_w = round( $new_w / $size_ratio);
            $crop_h = round( $new_h / $size_ratio);

            $s_x = floor( ( $orig_w - $crop_w) / 2);
            $s_y = floor( ( $orig_h - $crop_h) / 2);

            return array( 0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h);
        }

        function zoom_box( $img, $box_w, $box_h) {
            ini_set('memory_limit', '-1');

            //create the image, of the required size
            $new = imagecreatetruecolor($box_w, $box_h);
            imagesavealpha($new, true);

            if($new === false) {
                //creation failed -- probably not enough memory
                return null;
            }

            //Fill the image with a transparent color
            //(this will be visible in the padding around the image,
            //if the aspect ratios of the image and the thumbnail do not match)
            //Replace this with any color you want, or comment it out for black.
            //I used grey for testing =)
            $trans_colour = imagecolorallocatealpha($new, 255, 255, 255, 127);
            imagefill($new, 0, 0, $trans_colour);

            //compute resize ratio
            $hratio = $box_h / imagesy($img);
            $wratio = $box_w / imagesx($img);
            $ratio = min($hratio, $wratio);

            //if the source is smaller than the thumbnail size,
            //don't resize -- add a margin instead
            //(that is, dont magnify images)
            if($ratio > 1.0)
                $ratio = 1.0;

            //compute sizes
            $sy = floor(imagesy($img) * $ratio);
            $sx = floor(imagesx($img) * $ratio);

            //compute margins
            //Using these margins centers the image in the thumbnail.
            //If you always want the image to the top left,
            //set both of these to 0
            $m_y = floor(($box_h - $sy) / 2);
            $m_x = floor(($box_w - $sx) / 2);

            //Copy the image data, and resample
            //
            //If you want a fast and ugly thumbnail,
            //replace imagecopyresampled with imagecopyresized
            if(!imagecopyresampled($new, $img,
                $m_x, $m_y, //dest x, y (margins)
                0, 0, //src x, y (0,0 means top left)
                $sx, $sy,//dest w, h (resample to this size (computed above)
                imagesx($img), imagesy($img)) //src w, h (the full size of the original)
           ) {
                //copy failed
                imagedestroy($new);
                return null;
            }
            //copy successful
            return $new;
        }
    }
}


if (!function_exists('aq_resize')) {

    /**
     * This is just a tiny wrapper function for the class above so that there is no
     * need to change any code in your own WP themes. Usage is still the same :)
     */
    function aq_resize( $url, $width = null, $height = null, $crop = null, $single = true, $upscale = false, $zoom = false, $blog_id = null) {
        $aq_resize = Aq_Resize::getInstance();
        return $aq_resize->process( $url, $width, $height, $crop, $single, $upscale, $zoom, $blog_id);
    }
}


