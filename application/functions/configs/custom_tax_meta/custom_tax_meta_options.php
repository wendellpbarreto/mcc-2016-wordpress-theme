<?php
//include the main class file
require_once("custom_tax_meta.php");

/*
* configure taxonomy custom fields
*/
$config = array(
   'id' => 'demo_meta_box',                         // meta box id, unique per meta box
   'title' => 'Demo Meta Box',                      // meta box title
   'pages' => array('product_category'),                    // taxonomy name, accept categories, post_tag and custom taxonomies
   'context' => 'normal',                           // where the meta box appear: normal (default), advanced, side; optional
   'fields' => array(),                             // list of meta fields (can be added by field arrays)
   'local_images' => false,                         // Use local or hosted images (meta box images for add/remove)
   'use_with_theme' => false                        //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
);

/*
* Initiate your taxonomy custom fields
*/

$my_meta = new Tax_Meta_Class($config);


/*
* Add fields
*/

//text field
$my_meta->addText('text_field_id',array('name'=> 'My Text '));
//textarea field
$my_meta->addTextarea('textarea_field_id',array('name'=> 'My Textarea '));
//checkbox field
$my_meta->addCheckbox('checkbox_field_id',array('name'=> 'My Checkbox '));
//select field
$my_meta->addSelect('select_field_id',array('selectkey1'=>'Select Value1','selectkey2'=>'Select Value2'),array('name'=> 'My select ', 'std'=> array('selectkey2')));
//radio field
$my_meta->addRadio('radio_field_id',array('radiokey1'=>'Radio Value1','radiokey2'=>'Radio Value2'),array('name'=> 'My Radio Filed', 'std'=> array('radionkey2')));
//date field
$my_meta->addDate('date_field_id',array('name'=> 'My Date '));
//Time field
$my_meta->addTime('time_field_id',array('name'=> 'My Time '));
//Color field
$my_meta->addColor('color_field_id',array('name'=> 'My Color '));
//Image field
$my_meta->addImage('image_field_id',array('name'=> 'My Image '));
//file upload field
$my_meta->addFile('file_field_id',array('name'=> 'My File '));
//wysiwyg field
$my_meta->addWysiwyg('wysiwyg_field_id',array('name'=> 'My wysiwyg Editor '));
//taxonomy field
$my_meta->addTaxonomy('taxonomy_field_id',array('taxonomy' => 'category'),array('name'=> 'My Taxonomy '));
//posts field
$my_meta->addPosts('posts_field_id',array('post_type' => 'post'),array('name'=> 'My Posts '));

/*
* To Create a reapeater Block first create an array of fields
* use the same functions as above but add true as a last param
*/

$repeater_fields[] = $my_meta->addText('re_text_field_id',array('name'=> 'My Text '),true);
$repeater_fields[] = $my_meta->addTextarea('re_textarea_field_id',array('name'=> 'My Textarea '),true);
$repeater_fields[] = $my_meta->addCheckbox('re_checkbox_field_id',array('name'=> 'My Checkbox '),true);
$repeater_fields[] = $my_meta->addImage('image_field_id',array('name'=> 'My Image '),true);

/*
* Then just add the fields to the repeater block
*/

//repeater block
$my_meta->addRepeaterBlock('re_',array('inline' => true, 'name' => 'This is a Repeater Block','fields' => $repeater_fields));

/*
* Don't Forget to Close up the meta box deceleration
*/
//Finish Taxonomy Extra fields Deceleration
$my_meta->Finish();
