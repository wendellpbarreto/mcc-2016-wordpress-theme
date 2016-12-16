<?php
 function get_size_dimenssions_from_string($size){
    if (strpos($size, 'x'))
      return explode('x', $size);
    return array($size, $size);
  }

  function load_image_sizes($sizes, $objects){
    foreach ($sizes as $size) {
      foreach ($objects as $object) {
        $path = $object->thumbnail;
        $size_dimensions = get_size_dimenssions_from_string($size);
        $object->thumbnail_sizes[$size] = aq_resize($path, $size_dimensions[0], $size_dimensions[1], true, true, true, false);
      }
    }
    return $objects;
  }
