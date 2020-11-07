<?php


define('CS_ACTIVE_FRAMEWORK', false); // default true
define('CS_ACTIVE_METABOX', true); // default true
define('CS_ACTIVE_TAXONOMY', false); // default true
define('CS_ACTIVE_SHORTCODE', true); // default true
define('CS_ACTIVE_CUSTOMIZE', false); // default true

function twentytwenty_csf_metabox()
{
    CSFramework_Metabox::instance(array());
    CSFramework_Shortcode_Manager::instance(array());
}

add_action("init", "twentytwenty_csf_metabox");

function twentytwenty_upload_metabox($options)
{

    $options[] = array(
        'id'        => 'page-upload-metabox',
        'title'     => __('Upload Files', 'twentytwenty'),
        'post_type' => array('page', 'book_gallery'),
        'context'   => 'normal',
        'priority'  => 'default',
        'sections'  => array(
            array(
                'name'   => 'page-section1',
                'title'  => __('Image Gallery', 'twentytwenty'),
                'icon'   => 'fa fa-image',
                'fields' => array(

                    array(
                        'id'      => 'page-gallery',
                        'type'    => 'gallery',
                        'title'   => __('Upload Images', 'twentytwenty'),
                        'add_title'   => __('Add Images', 'twentytwenty'),
                        'edit_title'   => __('Edit Gallery', 'twentytwenty'),
                        'clear_title'   => __('Clear Gallery', 'twentytwenty'),
                    ),
                    array(
                        'id'        => 'fieldset_1',
                        'type'      => 'fieldset',
                        'title'     => 'Fieldset Field',
                        'fields'    => array(

                            array(
                                'id'    => 'fieldset_1_text',
                                'type'  => 'text',
                                'title' => 'Title',
                            ),

                            array(
                                'id'    => 'fieldset_1_textarea',
                                'type'  => 'textarea',
                                'title' => 'Description',
                            ),

                        ),
                    ),

                )
            )
        )
    );

    return $options;
}
add_filter('cs_metabox_options', 'twentytwenty_upload_metabox');


function twtw_gallery_shortcode($options)
{

    $options[] = array(
        'name' => 'gallery1',
        'title' => 'This is added just for gallery',
        'shortcodes' => array(
            array(
                'name' => 'books',
                'title' => 'Add Gallery',
                'fields' => array(
                    array(
                        'id'    => 'per_page',
                        'type'  => 'gallery',
                        'title' => 'Gallery'
                    )
                ),



            ),
        ),





    );
    return $options;
}

add_filter('cs_shortcode_options', 'twtw_gallery_shortcode');




function tw_gallery_section_metabox($metaboxes)
{


    $metaboxes[] = array(
        'id'        => 'tw-section-gallery',
        'title'     => 'Book Gallery',
        'post_type' => 'book_gallery',
        'context'   => 'normal',
        'priority'  => 'default',
        'sections'  => array(
            array(
                'name'   => 'tw-gallery-section-one',
                'icon'   => 'fa fa-image',
                'fields' => array(
                    array(
                        'id'              => 'portfolio',
                        'type'            => 'group',
                        'title'           => 'Add Book Image',
                        'button_title'    => 'New Image',
                        'accordion_title' => 'Add New Image',
                        'fields'          => array(

                            array(
                                'id'    => 'image',
                                'title' => __('Image', 'meal'),
                                'type'  => 'image',
                            ),
                            array(
                                'id'    => 'categories',
                                'title' => __('Categories', 'meal'),
                                'type'  => 'text',
                            ),
                        )
                    ),

                )
            ),

        )
    );

    return $metaboxes;
}

add_filter('cs_metabox_options', 'tw_gallery_section_metabox');
