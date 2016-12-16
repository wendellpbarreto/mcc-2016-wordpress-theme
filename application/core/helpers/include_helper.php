<?php
function include_for_mobile($path){
  if (is_mobile())
    include get_application_root() . '/' . $path;
}

function include_for_desktop($path){
  if (!is_mobile())
    include get_application_root() . '/' . $path;
}