<?php

/**
 * Address Field Class
 */
class WeForms_Form_Field_Address extends WeForms_Form_Field_Pro {

    function __construct() {
        $this->name       = __( 'Address Field', 'weforms' );
        $this->input_type = 'address_field';
        $this->icon       = 'address-card-o';
    }
}

/**
 * Country Field Class
 */
class WeForms_Form_Field_Country extends WeForms_Form_Field_Pro {

    function __construct() {
        $this->name       = __( 'Country List', 'weforms' );
        $this->input_type = 'country_list_field';
        $this->icon       = 'globe';
    }
}

/**
 * Date Field Class
 */
class WeForms_Form_Field_Date extends WeForms_Form_Field_Pro {

    function __construct() {
        $this->name       = __( 'Date / Time', 'weforms' );
        $this->input_type = 'date_field';
        $this->icon       = 'calendar-o';
    }
}

/**
 * File Field Class
 */
class WeForms_Form_Field_File extends WeForms_Form_Field_Pro {

    function __construct() {
        $this->name       = __( 'File Upload', 'weforms' );
        $this->input_type = 'file_upload';
        $this->icon       = 'upload';
    }
}

/**
 * Text Field Class
 */
class WeForms_Form_Field_GMap extends WeForms_Form_Field_Pro {

    function __construct() {
        $this->name       = __( 'Google Map', 'weforms' );
        $this->input_type = 'google_map';
        $this->icon       = 'map-marker';
    }
}

/**
 * Text Field Class
 */
class WeForms_Form_Field_Hook extends WeForms_Form_Field_Pro {

    function __construct() {
        $this->name       = __( 'Action Hook', 'weforms' );
        $this->input_type = 'action_hook';
        $this->icon       = 'calendar-o';
    }
}

/**
 * Numeric Field Class
 */
class WeForms_Form_Field_Numeric extends WeForms_Form_Field_Pro {

    function __construct() {
        $this->name       = __( 'Numeric Field', 'weforms' );
        $this->input_type = 'numeric_text_field';
        $this->icon       = 'hashtag';
    }
}

/**
 * Rating Field Class
 */
class WeForms_Form_Field_Rating extends WeForms_Form_Field_Pro {

    function __construct() {
        $this->name       = __( 'Ratings', 'weforms' );
        $this->input_type = 'ratings';
        $this->icon       = 'hashtag';
    }
}

/**
 * Repeat Field Class
 */
class WeForms_Form_Field_Repeat extends WeForms_Form_Field_Pro {

    function __construct() {
        $this->name       = __( 'Repeat Field', 'weforms' );
        $this->input_type = 'repeat_field';
        $this->icon       = 'text-width';
    }
}

/**
 * Shortcode Field Class
 */
class WeForms_Form_Field_Shortcode extends WeForms_Form_Field_Pro {

    function __construct() {
        $this->name       = __( 'Shortcode', 'weforms' );
        $this->input_type = 'shortcode';
        $this->icon       = 'calendar-o';
    }
}

/**
 * Step Field Class
 */
class WeForms_Form_Field_Step extends WeForms_Form_Field_Pro {

    function __construct() {
        $this->name       = __( 'Step Start', 'weforms' );
        $this->input_type = 'step_start';
        $this->icon       = 'step-forward';
    }
}

/**
 * TOC Field Class
 */
class WeForms_Form_Field_Toc extends WeForms_Form_Field_Pro {

    function __construct() {
        $this->name       = __( 'Terms & Conditions', 'weforms' );
        $this->input_type = 'toc';
        $this->icon       = 'hashtag';
    }
}
